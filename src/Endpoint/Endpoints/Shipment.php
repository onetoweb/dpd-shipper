<?php

namespace Onetoweb\DpdShipper\Endpoint\Endpoints;

use Onetoweb\DpdShipper\Endpoint\AbstractEndpoint;

/**
 * Shipment Endpoint.
 */
class Shipment extends AbstractEndpoint
{
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function storeOrders(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_SHIPMENT, 'storeOrders', $arguments);
    }
    
    /**
     * @return array|null
     */
    public function getAvailableProductsAndServices(): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_SHIPMENT, 'getAvailableProductsAndServices');
    }
    
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function exportOrders(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_SHIPMENT, 'exportOrders', $arguments);
    }
    
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function deleteOrders(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_SHIPMENT, 'deleteOrders', $arguments);
    }
    
    /**
     * @param array $arguments
     * 
     * @return array|null
     */
    public function startOrdersConsolidation(array $arguments): ?array
    {
        return $this->client->call($this->client::WSDL_SERVICE_SHIPMENT, 'startOrdersConsolidation', $arguments);
    }
}
