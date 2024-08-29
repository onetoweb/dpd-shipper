.. _top:
.. title:: Parcel Shop

`Back to index <index.rst>`_

===========
Parcel Shop
===========

.. contents::
    :local:


Find Cities
```````````

.. code-block:: php
    
    $result = $client->parcelShop->findCities([
        'country' => 'string',
        'zipCode' => 'string',
        'city' => 'string',
        'limit' => 'int',
        'order' => 'string'
    ]);


Find Parcel Shops
`````````````````

.. code-block:: php
    
    $result = $client->parcelShop->findParcelShops([
        'country' => 'string',
        'zipCode' => 'string',
        'city' => 'string',
        'street' => 'string',
        'houseNo' => 'string',
        'limit' => 'int',
        'availabilityDate' => 'string',
        'hideClosed' => 'boolean',
        'searchCountry' => 'string',
        'services' => [
            'service' => [
                'code' => 'string',
                'available' => 'boolean',
                'serviceDetail' => [
                    'code' => 'string'
                ]
            ]
        ],
        'type' => 'ParcelShopTypeEnum'
    ]);


Find Parcel Shops By Geo Data
`````````````````````````````

.. code-block:: php
    
    $result = $client->parcelShop->findParcelShopsByGeoData([
        'longitude' => 'double',
        'latitude' => 'double',
        'limit' => 'int',
        'availabilityDate' => 'string',
        'hideClosed' => 'boolean',
        'searchCountry' => 'string',
        'services' => [
            'service' => [
                'code' => 'string',
                'available' => 'boolean',
                'serviceDetail' => [
                    'code' => 'string'
                ]
            ]
        ]
    ]);


`Back to top <#top>`_