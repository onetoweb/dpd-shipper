<?php

namespace Onetoweb\DpdShipper;

use DateTime;

/**
 * Access Token.
 */
class AccessToken
{
    /**
     * @var string
     */
    private $value;
    
    /**
     * @var DateTime
     */
    private $expires;
    
    /**
     * @param string $value
     * @param DateTime $expires
     */
    public function __construct(string $value, DateTime $expires)
    {
        $this->value = $value;
        $this->expires = $expires;
    }
    
    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    
    /**
     * @return DateTime
     */
    public function getExpires(): DateTime
    {
        return $this->expires;
    }
    
    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return (bool) ($this->expires < new DateTime());
    }
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}