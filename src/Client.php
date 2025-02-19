<?php

namespace Onetoweb\DpdShipper;

use Onetoweb\DpdShipper\Endpoint\Endpoints;
use Onetoweb\DpdShipper\AccessToken;
use Onetoweb\DpdShipper\Exception\{
    SoapErrorException,
    LoginException
};
use SoapClient;
use SoapHeader;
use SoapFault;
use DateTime;

/**
 * Dpd Shipper Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Base wsdl.
     */
    public const BASE_WSDL_TEST = 'https://shipperadmintest.dpd.nl/PublicApi/WSDL/';
    public const BASE_WSDL_LIVE = 'https://wsshipper.dpd.nl/soap/WSDL/';
    
    /**
     * Wsdl services.
     */
    public const WSDL_SERVICE_LOGIN = 'LoginServiceV21.wsdl';
    public const WSDL_SERVICE_SHIPMENT = 'ShipmentServiceV35.wsdl';
    public const WSDL_SERVICE_PARCEL_SHOP_FINDER = 'ParcelShopFinderServiceV50.wsdl';
    public const WSDL_SERVICE_PARCEL_LIFECYCLE = 'ParcelLifecycleServiceV20.wsdl';
    
    /**
     * Base types url.
     */
    public const BASE_TYPE_URL = 'http://dpd.com/common/service/types/';
    
    /**
     * Types.
     */
    public const NS_AUTHENTICATION = 'Authentication/2.0';
    
    /**
     * Dateformat.
     */
    public const DATEFORMAT_EXPIRED = 'Y-m-d\TH:i:s.u\Z';
    
    /**
     * @var string
     */
    private $delisId;
    
    /**
     * @var string
     */
    private $password;
    
    /**
     * @var AccessToken
     */
    private $accessToken;
    
    /**
     * @var callable
     */
    private $updateTokenCallback;
    
    /**
     * @var string
     */
    private $messageLanguage = 'en_EN';
    
    /**
     * @param string $delisId
     * @param string $password
     * @param bool $testModus = true
     */
    public function __construct(string $delisId, string $password, bool $testModus = true)
    {
        $this->delisId = $delisId;
        $this->password = $password;
        $this->testModus = $testModus;
        
        // load endpoints
        $this->loadEndpoints();
    }
    
    /**
     * @param string $messageLanguage
     * 
     * @return void
     */
    public function setMessageLanguage(string $messageLanguage): void
    {
        $this->messageLanguage = $messageLanguage;
    }
    
    /**
     * @param callable $updateTokenCallback
     * 
     * @return void
     */
    public function setUpdateTokenCallback(callable $updateTokenCallback): void
    {
        $this->updateTokenCallback = $updateTokenCallback;
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this);
        }
    }
    
    /**
     * @return string
     */
    public function getBaseWsdl(): string
    {
        return $this->testModus ? self::BASE_WSDL_TEST : self::BASE_WSDL_LIVE;
    }
    
    /**
     * @param string $service
     * 
     * @return string
     */
    public function getWsdl(string $service): string
    {
        return $this->getBaseWsdl() . ltrim($service, '/');
    }
    
    /**
     * @param string $service
     * 
     * @return string
     */
    public function getNamespace(string $type): string
    {
        return self::BASE_TYPE_URL . ltrim($type, '/');
    }
    
    /**
     * @param AccessToken $accessToken
     * 
     * @return void
     */
    public function setAccessToken(AccessToken $accessToken): void
    {
        $this->accessToken = $accessToken;
    }
    
    /**
     * @param SoapFault $soapFault
     * 
     * @return array|null
     */
    public function getSoapFaultErrorMessage(SoapFault $soapFault): ?string
    {
        if (isset($soapFault->detail)) {
            
            foreach ($soapFault->detail as $error) {
                
                if (isset($error->errorMessage)) {
                    
                    if (isset($error->errorCode)) {
                        
                        return $error->errorCode . ', ' . $error->errorMessage;
                    }
                    
                    return $error->errorMessage;
                }
            }
        }
        
        if (isset($soapFault->detail->faults->message)) {
            return $soapFault->detail->faults->message;
        }
        
        return null;
    }
    
    /**
     * @param string $wsdl
     * 
     * @return SoapClient
     */
    public function getSoapClient(string $wsdl): SoapClient
    {
        // init soap client
        return new SoapClient($wsdl, [
            'trace' => true,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
            'encoding' => 'utf-8'
        ]);
    }
    
    /**
     * @throws LoginException if login attempt fails
     * @throws SoapErrorException if the soap fault occurs and contains a error message 
     * 
     * @return void
     */
    public function login(): void
    {
        // get soap client
        $soapClient = $this->getSoapClient($this->getWsdl(self::WSDL_SERVICE_LOGIN));
        
        try {
            
            // make login call
            $response = $soapClient->__soapCall('getAuth', ['getAuth' => [
                'delisId' => $this->delisId,
                'password' => $this->password,
                'messageLanguage' => $this->messageLanguage,
            ]]);
            
        } catch (SoapFault $soapFault) {
            
            // find error message
            $errorMessage = $this->getSoapFaultErrorMessage($soapFault);
            
            if ($errorMessage !== null) {
                
                // create SoapErrorException
                throw (new SoapErrorException($errorMessage, 0, $soapFault))
                    ->setLastRequest($soapClient->__getLastRequest())
                    ->setLastResponse($soapClient->__getLastResponse())
                ;
            }
            
            throw $soapFault;
        }
        
        // build access token
        $expires = DateTime::createFromFormat(self::DATEFORMAT_EXPIRED, $response->return->authTokenExpires);
        
        // expires 5 minute fallback
        if (!$expires instanceof DateTime) {
            $expires = (new DateTime())->modify('+5 minute');
        }
        
        // build access token
        $this->accessToken = new AccessToken($response->return->authToken, $expires);
        
        // update token callback
        if ($this->updateTokenCallback !== null) {
            ($this->updateTokenCallback)($this->accessToken);
        }
    }
    
    /**
     * @param string $value
     *
     * @return bool
     */
    public static function isBinary(string $value): bool
    {
        return (mb_detect_encoding($value, null, true) === false);
    }
    
    /**
     * @param object|array $object
     * 
     * @return array
     */
    public function objectToArray($object): array
    {
        $result = [];
        
        foreach ($object as $key => $value) {
            
            $result[$key] = (is_array($value) or is_object($value)) ? $this->objectToArray($value) : (self::isBinary($value) ? base64_encode($value) : $value);
        }
        
        return $result;
    }
    
    /**
     * @param string $service
     * @param string $function
     * @param array $arguments = []
     * 
     * @throws SoapErrorException if the soap fault occurs and contains a error message
     * 
     * @return array|null
     */
    public function call(string $service, string $function, array $arguments = []): ?array
    {
        // check for a valid access token
        if (
            $this->accessToken === null
            or $this->accessToken->isExpired()
        ) {
            $this->login();
        }
        
        // get soap client
        $soapClient = $this->getSoapClient($this->getWsdl($service));
        
        // build authentication header
        $header = new SoapHeader($this->getNamespace(self::NS_AUTHENTICATION), 'authentication', (object) [
            'delisId' => $this->delisId,
            'authToken' => (string) $this->accessToken,
            'messageLanguage' => $this->messageLanguage,
        ]);
        
        // add soap headers to soap client
        $soapClient->__setSoapHeaders($header);
        
        try {
            
            // make the soap call
            $response = $soapClient->__soapCall($function, [$function => $arguments]);
            
        } catch (SoapFault $soapFault) {
            
            // find error message
            $errorMessage = $this->getSoapFaultErrorMessage($soapFault);
            
            if ($errorMessage !== null) {
                
                // create SoapErrorException
                throw (new SoapErrorException($errorMessage, 0, $soapFault))
                    ->setLastRequest($soapClient->__getLastRequest())
                    ->setLastResponse($soapClient->__getLastResponse())
                ;
            }
            
            throw $soapFault;
        }
        
        // turn object reponse to array
        return $this->objectToArray($response);
    }
}
