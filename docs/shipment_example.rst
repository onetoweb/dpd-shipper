.. _top:
.. title:: More Shipment Examples

| `Back to index <index.rst>`_
| `Back to shipment <shipment.rst>`_

======================
More Shipment Examples
======================

.. contents::
    :local:


DPD Classic
```````````

These are examples of the standard shipment product with minimal mandatory namespaces entry.

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2B',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Frederiklaan 10A',
                    'country' => 'NL',
                    'zipCode' => '5616NH',
                    'city' => 'Eindhoven',
                    'type' => 'B'
                ]
            ],
            'parcels' => [
                'weight' => '500'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment'
            ]
        ]
    ]);


DPD Classic Predict B2B
```````````````````````

DPD Classic Predict is identical to a regular DPD Classic. It sends a Predict message to the receiver with delivery information of their parcel.

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2B',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Frederiklaan 10A',
                    'country' => 'NL',
                    'zipCode' => '5616NH',
                    'city' => 'Eindhoven',
                    'type' => 'B',
                    'phone' => '+31#612345678',
                    'email' => 'test@dpd.nl'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '340'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'predict' => [
                    'channel' => '1',
                    'value' => 'test@dpd.nl',
                    'language' => 'NL'
                ]
            ]
        ]
    ]);



DPD Classic Predict B2C
```````````````````````

DPD Classic Predict is identical to a regular DPD Classic. It sends a Predict message to the receiver with delivery information of their parcel.

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2C',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Frederiklaan 10A',
                    'country' => 'NL',
                    'zipCode' => '5616NH',
                    'city' => 'Eindhoven',
                    'type' => 'P',
                    'phone' => '+31#612345678',
                    'email' => 'test@dpd.nl'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '340'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'predict' => [
                    'channel' => '1',
                    'value' => 'test@dpd.nl',
                    'language' => 'NL'
                ]
            ]
        ]
    ]);


DPD Parcelshop/2Shop
````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2C',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Frederiklaan 10A',
                    'country' => 'NL',
                    'zipCode' => '5616NH',
                    'city' => 'Eindhoven',
                    'type' => 'P',
                    'phone' => '+31#612345678',
                    'email' => 'test@dpd.nl'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '340'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'parcelShopDelivery' => [
                    'parcelShopId' => '787611436',
                    'parcelShopNotification' => [
                        'channel' => '3',
                        'value' => '+31#612345678',
                        'language' => 'NL'
                    ]
                ]
            ]
        ]
    ]);


Shop Return
```````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2C',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Frederiklaan 10A',
                    'country' => 'NL',
                    'zipCode' => '5616NH',
                    'city' => 'Eindhoven',
                    'type' => 'B'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'returns' => 'true'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment'
            ]
        ]
    ]);


DPD ParcelLetter
````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'PL',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Frederiklaan 10A',
                    'country' => 'NL',
                    'zipCode' => '5616NH',
                    'city' => 'Eindhoven',
                    'type' => 'P',
                    'phone' => '+31#612345678',
                    'email' => 'test@dpd.nl'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'volume' => '036026003',
                'weight' => '100'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'predict' => [
                    'channel' => '1',
                    'value' => 'test@dpd.nl',
                    'language' => 'NL'
                ]
            ]
        ]
    ]);


DPD 10:00, 12:00 and Guarantee Shipment
```````````````````````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'E18',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Teststraat 5',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'contact' => 'Mr. Contactman',
                    'phone' => '0612345678',
                    'type' => 'B'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment'
            ]
        ]
    ]);


Saturday Delivery Shipment
``````````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2B',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Pakket Onderweg 1',
                    'country' => 'NL',
                    'zipCode' => '5688HB',
                    'city' => 'Oirschot',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Frederiklaan 10A',
                    'country' => 'NL',
                    'zipCode' => '5616NH',
                    'city' => 'Eindhoven',
                    'type' => 'B'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '340'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'saturdayDelivery' => 'true'
            ]
        ]
    ]);


Tyres (bulk) Shipment
`````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0530',
                'product' => 'CL',
                'sender' => [
                    'name1' => 'Senders BVBA',
                    'name2' => 'Jan Jansens',
                    'street' => 'EGIDE WALSCHAERTSTRAAT 20',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Testman',
                    'street' => 'Bruul 5',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'type' => 'P'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '340'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'tyres' => 'true'
            ]
        ]
    ]);


Ex-Works Shipment
`````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0530',
                'product' => 'CL',
                'sender' => [
                    'name1' => 'Senders NV',
                    'name2' => 'Jan Janssens',
                    'street' => 'Egide Walschaertsstraat 20',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Receivers NV',
                    'street' => 'Teststraat 5',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'type' => 'B'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '340'
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'exWorksDelivery' => 'true'
            ]
        ]
    ]);


International non-EU Shipments B2B
``````````````````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'PDF',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2B',
                'sender' => [
                    'name1' => 'Sender NV',
                    'name2' => 'Jan Jansens',
                    'street' => 'Egide Walschaertsstraat',
                    'houseNo' => '20',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'phone' => '+31612345678',
                    'email' => 'sender@sendercompany.com',
                    'eoriNumber' => '1133113311',
                    'vatNumber' => 'BE123456',
                    'destinationCountryRegistration' => 'QQ123456C'
                ],
                'recipient' => [
                    'name1' => 'British Test',
                    'street' => 'Receiverstraat',
                    'houseNo' => '5',
                    'country' => 'GB',
                    'zipCode' => 'LS101AB',
                    'city' => 'Leeds',
                    'phone' => '+442012345678',
                    'email' => 'receiver@receivercompany.com',
                    'eoriNumber' => '7788778877',
                    'vatNumber' => 'GB654321'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '123',
                'international' => [
                    'parcelType' => 'false',
                    'customsAmount' => '1400',
                    'customsCurrency' => 'EUR',
                    'customsAmountEx' => '1400',
                    'customsCurrencyEx' => 'EUR',
                    'clearanceCleared' => 'N',
                    'prealertStatus' => 'S03',
                    'exportReason' => '01',
                    'customsTerms' => '06',
                    'customsContent' => 'Paperclips',
                    'customsInvoice' => '12345',
                    'customsInvoiceDate' => '20190624',
                    'comment2' => 'QQ123456C',
                    'commercialInvoiceConsigneeVatNumber' => 'GB654321',
                    'commercialInvoiceConsignee' => [
                        'name1' => 'British Test',
                        'street' => 'Receiverstraat',
                        'houseNo' => '5',
                        'country' => 'GB',
                        'zipCode' => 'LS101AB',
                        'city' => 'Leeds',
                        'phone' => '+442012345678',
                        'email' => 'receiver@receivercompany.com',
                        'eoriNumber' => '7788778877',
                        'vatNumber' => 'GB654321'
                    ],
                    'commercialInvoiceConsignor' => [
                        'name1' => 'Sender NV',
                        'name2' => 'Jan Jansens',
                        'street' => 'Egide Walschaertsstraat',
                        'houseNo' => '20',
                        'country' => 'BE',
                        'zipCode' => '2800',
                        'city' => 'Mechelen',
                        'phone' => '+31612345678',
                        'email' => 'sender@sendercompany.com',
                        'eoriNumber' => '1133113311',
                        'vatNumber' => 'BE123456'
                    ],
                    'commercialInvoiceLine' => [
                        'customsTarif' => '2225522',
                        'receiverCustomsTarif' => '5552255',
                        'productCode' => '88776655',
                        'content' => 'Paperclips',
                        'grossWeight' => '123',
                        'itemsNumber' => '1',
                        'amountLine' => '1515',
                        'customsOrigin' => 'BE'
                    ]
                ]
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment'
            ]
        ]
    ]);


International non-EU Shipments B2C
``````````````````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'ZPL',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2C',
                'sender' => [
                    'name1' => 'Sender NV',
                    'name2' => 'Jan Jansens',
                    'street' => 'Egide Walschaertsstraat',
                    'houseNo' => '20',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'phone' => '0031612345678',
                    'email' => 'sender@sendercompany.com',
                    'eoriNumber' => '1133113311',
                    'vatNumber' => 'BE123456'
                ],
                'recipient' => [
                    'name1' => 'B2B British Test',
                    'street' => 'Receiverstraat',
                    'houseNo' => '5',
                    'country' => 'GB',
                    'zipCode' => 'LS101AB',
                    'city' => 'Leeds',
                    'phone' => '00446123456',
                    'email' => 'receiver@receivercompany.com',
                    'eoriNumber' => '1133113311',
                    'vatNumber' => 'BE123456'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '340',
                'international' => [
                    'parcelType' => 'false',
                    'customsAmount' => '1400',
                    'customsCurrency' => 'EUR',
                    'customsAmountEx' => '1400',
                    'customsCurrencyEx' => 'EUR',
                    'clearanceCleared' => 'F',
                    'prealertStatus' => 'S03',
                    'exportReason' => '01',
                    'customsTerms' => '06',
                    'customsContent' => 'Paperclips',
                    'customsInvoice' => '12345',
                    'customsInvoiceDate' => '20190624',
                    'comment2' => 'QQ123456C',
                    'commercialInvoiceConsigneeVatNumber' => 'BE123456',
                    'commercialInvoiceConsignee' => [
                        'name1' => 'B2B British Test',
                        'street' => 'Receiverstraat',
                        'houseNo' => '5',
                        'country' => 'GB',
                        'zipCode' => 'LS101AB',
                        'city' => 'Leeds',
                        'phone' => '00446123456',
                        'email' => 'receiver@receivercompany.com',
                        'eoriNumber' => '1133113311',
                        'vatNumber' => 'BE123456'
                    ],
                    'commercialInvoiceConsignor' => [
                        'name1' => 'Sender NV',
                        'name2' => 'Jan Jansens',
                        'street' => 'Egide Walschaertsstraat',
                        'houseNo' => '20',
                        'country' => 'BE',
                        'zipCode' => '2800',
                        'city' => 'Mechelen',
                        'phone' => '0031612345678',
                        'email' => 'sender@sendercompany.com',
                        'eoriNumber' => '1133113311',
                        'vatNumber' => 'BE123456'
                    ],
                    'commercialInvoiceLine' => [
                        'customsTarif' => '2225522',
                        'receiverCustomsTarif' => '5552255',
                        'productCode' => '88776655',
                        'content' => 'Paperclips',
                        'grossWeight' => '340',
                        'itemsNumber' => '1',
                        'amountLine' => '1515',
                        'customsOrigin' => 'BE'
                    ]
                ]
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment',
                'predict' => [
                    'channel' => '1',
                    'value' => 'receiver@receivercompany.com',
                    'language' => 'NL'
                ]
            ]
        ]
    ]);


International non-EU Shipments B2B with several different items
```````````````````````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'ZPL',
            'paperFormat' => 'A6'
        ],
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2B',
                'sender' => [
                    'name1' => 'Sender NV',
                    'name2' => 'Jan Jansens',
                    'street' => 'Egide Walschaertsstraat',
                    'houseNo' => '20',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'phone' => '0031612345678',
                    'email' => 'sender@sendercompany.com',
                    'eoriNumber' => '1133113311',
                    'vatNumber' => 'BE123456'
                ],
                'recipient' => [
                    'name1' => 'British Test',
                    'street' => 'Receiverstraat',
                    'houseNo' => '5',
                    'country' => 'GB',
                    'zipCode' => 'LS101AB',
                    'city' => 'Leeds',
                    'phone' => '00446123456',
                    'email' => 'receiver@receivercompany.com',
                    'eoriNumber' => '7788778877',
                    'vatNumber' => 'GB654321'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'Box 1234',
                'weight' => '470',
                'international' => [
                    'parcelType' => 'false',
                    'customsAmount' => '2700',
                    'customsCurrency' => 'EUR',
                    'customsAmountEx' => '2700',
                    'customsCurrencyEx' => 'EUR',
                    'clearanceCleared' => 'N',
                    'prealertStatus' => 'S03',
                    'exportReason' => '01',
                    'customsTerms' => '06',
                    'customsContent' => 'Paperclips',
                    'customsInvoice' => '12345',
                    'customsInvoiceDate' => '20190624',
                    'comment2' => 'QQ123456C',
                    'commercialInvoiceConsigneeVatNumber' => 'GB654321',
                    'commercialInvoiceConsignee' => [
                        'name1' => 'British Test',
                        'street' => 'Receiverstraat',
                        'houseNo' => '5',
                        'country' => 'GB',
                        'zipCode' => 'LS101AB',
                        'city' => 'Leeds',
                        'phone' => '00446123456',
                        'email' => 'receiver@receivercompany.com',
                        'eoriNumber' => '7788778877',
                        'vatNumber' => 'GB654321'
                    ],
                    'commercialInvoiceConsignor' => [
                        'name1' => 'Sender NV',
                        'name2' => 'Jan Jansens',
                        'street' => 'Egide Walschaertsstraat',
                        'houseNo' => '20',
                        'country' => 'BE',
                        'zipCode' => '2800',
                        'city' => 'Mechelen',
                        'phone' => '0031612345678',
                        'email' => 'sender@sendercompany.com',
                        'eoriNumber' => '1133113311',
                        'vatNumber' => 'BE123456'
                    ],
                    'commercialInvoiceLine' => [
                        [
                            'customsTarif' => '2225522',
                            'receiverCustomsTarif' => '5552255',
                            'productCode' => '88776655',
                            'content' => 'Paperclips',
                            'grossWeight' => '230',
                            'itemsNumber' => '1',
                            'amountLine' => '1200',
                            'customsOrigin' => 'BE'
                        ],
                        [
                            'customsTarif' => '885588',
                            'receiverCustomsTarif' => '558855',
                            'productCode' => '10101212',
                            'content' => 'Pencils',
                            'grossWeight' => '240',
                            'itemsNumber' => '1',
                            'amountLine' => '1500',
                            'customsOrigin' => 'BE'
                        ]
                    ]
                ]
            ],
            'productAndServiceData' => [
                'orderType' => 'consignment'
            ]
        ]
    ]);


Pickup Orders
`````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0530',
                'product' => 'CL',
                'sender' => [
                    'name1' => 'Agreed Account Pickup Address',
                    'street' => 'Your Address 1',
                    'country' => 'BE',
                    'zipCode' => '3000',
                    'city' => 'Leuven',
                    'type' => 'B'
                ],
                'recipient' => [
                    'name1' => 'Agreed Account Pickup Address',
                    'street' => 'Your Address 1',
                    'country' => 'BE',
                    'zipCode' => '3000',
                    'city' => 'Leuven',
                    'type' => 'B'
                ]
            ],
            'productAndServiceData' => [
                'orderType' => 'pickup information',
                'pickup' => [
                    'quantity' => '1',
                    'date' => '20200615',
                    'day' => '1',
                    'fromTime1' => '0900',
                    'toTime1' => '1800'
                ]
            ]
        ]
    ]);


Collection Request Orders
`````````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => '0522',
                'product' => 'B2B',
                'sender' => [
                    'name1' => 'Your (masked) account ordering the CR',
                    'street' => 'Office Street 1 (or masked address)',
                    'country' => 'BE',
                    'zipCode' => '3000',
                    'city' => 'Leuven',
                    'type' => 'B',
                    'phone' => '+31612345678',
                    'email' => 'cr-order@dpd.nl'
                ],
                'recipient' => [
                    'name1' => '(Masked) Delivery Destination',
                    'street' => 'CR Destination Street 1',
                    'country' => 'BE',
                    'zipCode' => '2800',
                    'city' => 'Mechelen',
                    'type' => 'B',
                    'phone' => '+31612345678',
                    'email' => 'cr-receiver@dpd.nl'
                ]
            ],
            'parcels' => [
                'customerReferenceNumber1' => 'TEST parcel 1',
                'weight' => '100',
                'printInfo1OnParcelLabel' => 'true',
                'info1' => 'Return Item 1',
                'info2' => '123456789'
            ],
            'productAndServiceData' => [
                'orderType' => 'collection request order',
                'pickup' => [
                    'quantity' => '1',
                    'date' => '20200615',
                    'day' => '1',
                    'collectionRequestAddress' => [
                        'name1' => 'Pickup Place for Goods',
                        'street' => 'CR Pickup Street 1',
                        'country' => 'BE',
                        'zipCode' => '2000',
                        'city' => 'Antwerpen',
                        'type' => 'B',
                        'phone' => '+31612345678',
                        'email' => 'pickupaddress@dpd.nl'
                    ]
                ]
            ]
        ]
    ]);


`Back to top <#top>`_