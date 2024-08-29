<?php

namespace Onetoweb\DpdShipper\Endpoint\Endpoints;

use Onetoweb\DpdShipper\Endpoint\AbstractEndpoint;

/**
 * Parcel Endpoint.
 */
class Parcel extends AbstractEndpoint
{
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function getParcelLabelNumberForWebNumber(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_PARCEL_LIFECYCLE, 'getParcelLabelNumberForWebNumber', $arguments);
    }
    
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function getTrackingData(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_PARCEL_LIFECYCLE, 'getTrackingData', $arguments);
    }
}
