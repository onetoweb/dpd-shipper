<?php

namespace Onetoweb\DpdShipper\Exception;

use Exception;

/**
 * Soap Error Exception.
 */
class SoapErrorException extends Exception
{
    /**
     * @var unknown
     */
    private $lastRequest;
    
    /**
     * @var string
     */
    private $lastResponse;
    
    /**
     * @param string $lastRequest = null
     * 
     * @return self
     */
    public function setLastRequest(string $lastRequest = null): self
    {
        $this->lastRequest = $lastRequest;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getLastRequest(): ?string
    {
        return $this->lastRequest;
    }
    
    /**
     * @param string $lastResponse = null
     *
     * @return self
     */
    public function setLastResponse(string $lastResponse = null): self
    {
        $this->lastResponse = $lastResponse;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getLastResponse(): ?string
    {
        return $this->lastResponse;
    }
}
