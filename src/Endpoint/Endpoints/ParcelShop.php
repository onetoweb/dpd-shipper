<?php

namespace Onetoweb\DpdShipper\Endpoint\Endpoints;

use Onetoweb\DpdShipper\Endpoint\AbstractEndpoint;

/**
 * Parcel Shop Endpoint.
 */
class ParcelShop extends AbstractEndpoint
{
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function findCities(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_PARCEL_SHOP_FINDER, 'findCities', $arguments);
    }
    
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function findParcelShops(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_PARCEL_SHOP_FINDER, 'findParcelShops', $arguments);
    }
    
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function findParcelShopsByGeoData(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_PARCEL_SHOP_FINDER, 'findParcelShopsByGeoData', $arguments);
    }
}
