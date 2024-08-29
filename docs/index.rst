.. title:: Index

===========
Basic Usage
===========

Setup
        
.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\DpdShipper\Client;
    use Onetoweb\DpdShipper\AccessToken;
    
    // param
    $delisId = '{delis_id}';
    $password = '{password}';
    $testModus = true;
    
    // setup client
    $client = new Client($delisId, $password, $testModus);
    
    // (optional) set message language, defaults to: en_EN
    $client->setMessageLanguage('nl_NL');
    
    // example file to store token data in
    $tokenFile = '/path/to/token.txt';
    
    // store access token if a new token is requested
    $client->setUpdateTokenCallback(function(AccessToken $accessToken) use ($tokenFile) {
        
        // example store token in file
        file_put_contents($tokenFile, serialize([
            'value' => $accessToken->getValue(),
            'expires' => $accessToken->getExpires(),
        ]));
        
    });
    
    // load stored access token
    // example load token from file
    $tokenData = unserialize(file_get_contents($tokenFile));
    
    if (isset($tokenData['value']) and isset($tokenData['expires'])) {
        
        // init AccessToken
        $accessToken = new AccessToken(
            $tokenData['value'],
            $tokenData['expires']
        );
        
        // set access token
        $client->setAccessToken($accessToken);
    }


========
Examples
========

* `Shipment <shipment.rst>`_
* `Parcel shop <parcel_shop.rst>`_
* `Parcel <parcel.rst>`_
