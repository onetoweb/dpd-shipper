.. _top:
.. title:: Shipment

`Back to index <index.rst>`_

========
Shipment
========

.. contents::
    :local:


Store Orders
````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'order' => [
            'generalShipmentData' => [
                'sendingDepot' => 'string',
                'product' => 'string',
                'sender' => [
                    'name1' => 'string',
                    'street' => 'string',
                    'houseNo' => 'string',
                    'country' => 'string',
                    'zipCode' => 'string',
                    'city' => 'string',
                ],
                'recipient' => [
                    'name1' => 'string',
                    'street' => 'string',
                    'houseNo' => 'string',
                    'country' => 'string',
                    'zipCode' => 'string',
                    'city' => 'string',
                ],
            ],
            'parcels' => [[
                'parcelLabelNumber' => 'string',
                'customerReferenceNumber1' => 'string',
                'swap' => 'boolean',
                'volume' => 'int',
                'weight' => 'int',
                'info1' => 'string',
            ], [
                'parcelLabelNumber' => 'string',
                'customerReferenceNumber1' => 'string',
                'swap' => 'boolean',
                'volume' => 'int',
                'weight' => 'int',
                'info1' => 'string',
            ]],
            'productAndServiceData' => [
                'orderType' => 'string',
            ]
        ],
    ]);


Get Available Products And Services
```````````````````````````````````

.. code-block:: php
    
    $result = $client->shipment->getAvailableProductsAndServices();


Export Orders
`````````````

.. code-block:: php
    
    $result = $client->shipment->exportOrders([
        'parcelLabelNumber' => 'string'
    ]);


Delete Orders
`````````````

.. code-block:: php
    
    $result = $client->shipment->deleteOrders([
        'parcelLabelNumber' => 'string'
    ]);


Start Orders Consolidation
``````````````````````````

.. code-block:: php
    
    $result = $client->shipment->startOrdersConsolidation([
        'consolidationDate' => 'int'
    ]);



Store Order Example With All Possible Values
````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->shipment->storeOrders([
        'printOptions' => [
            'printerLanguage' => 'string',
            'paperFormat' => 'string',
            'printer' => [
                'manufacturer' => 'string',
                'model' => 'string',
                'revision' => 'string',
                'offsetX' => 'decimal',
                'offsetY' => 'decimal',
                'connectionType' => 'string',
                'barcodeCapable2D' => 'boolean'
            ],
            'startPosition' => 'StartPositionEnum',
            'printerResolution' => 'double',
            'isELabel' => 'boolean'
        ],
        'order' => [
            'generalShipmentData' => [
                'mpsId' => 'string',
                'cUser' => 'string',
                'mpsCustomerReferenceNumber1' => 'string',
                'mpsCustomerReferenceNumber2' => 'string',
                'mpsCustomerReferenceNumber3' => 'string',
                'mpsCustomerReferenceNumber4' => 'string',
                'identificationNumber' => 'string',
                'sendingDepot' => 'string',
                'product' => 'string',
                'mpsCompleteDelivery' => 'boolean',
                'mpsCompleteDeliveryLabel' => 'boolean',
                'mpsVolume' => 'long',
                'mpsWeight' => 'long',
                'mpsExpectedSendingDate' => 'string',
                'mpsExpectedSendingTime' => 'string',
                'sender' => [
                    'name1' => 'string',
                    'name2' => 'string',
                    'street' => 'string',
                    'houseNo' => 'string',
                    'street2' => 'string',
                    'state' => 'string',
                    'country' => 'string',
                    'zipCode' => 'string',
                    'city' => 'string',
                    'gln' => 'long',
                    'customerNumber' => 'string',
                    'type' => 'string',
                    'contact' => 'string',
                    'phone' => 'string',
                    'fax' => 'string',
                    'email' => 'string',
                    'comment' => 'string',
                    'iaccount' => 'string',
                    'eoriNumber' => 'string',
                    'vatNumber' => 'string',
                    'idDocType' => 'string',
                    'idDocNumber' => 'string',
                    'webSite' => 'string',
                    'referenceNumber' => 'string',
                    'destinationCountryRegistration' => 'string'
                ],
                'senderMaskingAddress' => [
                    'name1' => 'string',
                    'name2' => 'string',
                    'street' => 'string',
                    'houseNo' => 'string',
                    'street2' => 'string',
                    'state' => 'string',
                    'country' => 'string',
                    'zipCode' => 'string',
                    'city' => 'string',
                    'gln' => 'long',
                    'customerNumber' => 'string',
                    'type' => 'string',
                    'contact' => 'string',
                    'phone' => 'string',
                    'fax' => 'string',
                    'email' => 'string',
                    'comment' => 'string',
                    'iaccount' => 'string',
                    'eoriNumber' => 'string',
                    'vatNumber' => 'string',
                    'idDocType' => 'string',
                    'idDocNumber' => 'string',
                    'webSite' => 'string',
                    'referenceNumber' => 'string',
                    'destinationCountryRegistration' => 'string'
                ],
                'recipient' => [
                    'name1' => 'string',
                    'name2' => 'string',
                    'street' => 'string',
                    'houseNo' => 'string',
                    'street2' => 'string',
                    'state' => 'string',
                    'country' => 'string',
                    'zipCode' => 'string',
                    'city' => 'string',
                    'gln' => 'long',
                    'customerNumber' => 'string',
                    'type' => 'string',
                    'contact' => 'string',
                    'phone' => 'string',
                    'fax' => 'string',
                    'email' => 'string',
                    'comment' => 'string',
                    'iaccount' => 'string',
                    'eoriNumber' => 'string',
                    'vatNumber' => 'string',
                    'idDocType' => 'string',
                    'idDocNumber' => 'string',
                    'webSite' => 'string',
                    'referenceNumber' => 'string',
                    'destinationCountryRegistration' => 'string'
                ]
            ],
            'parcels' => [
                'parcelLabelNumber' => 'string',
                'customerReferenceNumber1' => 'string',
                'customerReferenceNumber2' => 'string',
                'customerReferenceNumber3' => 'string',
                'customerReferenceNumber4' => 'string',
                'swap' => 'boolean',
                'volume' => 'int',
                'weight' => 'int',
                'hazardousLimitedQuantities' => 'boolean',
                'higherInsurance' => [
                    'amount' => 'long',
                    'currency' => 'string'
                ],
                'content' => 'string',
                'addService' => 'int',
                'messageNumber' => 'int',
                'function' => 'string',
                'parameter' => 'string',
                'cod' => [
                    'amount' => 'long',
                    'currency' => 'string',
                    'inkasso' => 'int',
                    'purpose' => 'string',
                    'bankCode' => 'string',
                    'bankName' => 'string',
                    'bankAccountNumber' => 'string',
                    'bankAccountHolder' => 'string',
                    'iban' => 'string',
                    'bic' => 'string'
                ],
                'international' => [
                    'parcelType' => 'boolean',
                    'customsAmount' => 'long',
                    'customsCurrency' => 'string',
                    'customsAmountEx' => 'long',
                    'customsCurrencyEx' => 'string',
                    'clearanceCleared' => 'string',
                    'prealertStatus' => 'string',
                    'exportReason' => 'string',
                    'customsTerms' => 'string',
                    'customsContent' => 'string',
                    'customsPaper' => 'string',
                    'customsEnclosure' => 'boolean',
                    'customsInvoice' => 'string',
                    'customsInvoiceDate' => 'int',
                    'customsAmountParcel' => 'long',
                    'linehaul' => 'string',
                    'shipMrn' => 'string',
                    'collectiveCustomsClearance' => 'boolean',
                    'comment1' => 'string',
                    'comment2' => 'string',
                    'commercialInvoiceConsigneeVatNumber' => 'string',
                    'commercialInvoiceConsignee' => [
                        'name1' => 'string',
                        'name2' => 'string',
                        'street' => 'string',
                        'houseNo' => 'string',
                        'street2' => 'string',
                        'state' => 'string',
                        'country' => 'string',
                        'zipCode' => 'string',
                        'city' => 'string',
                        'gln' => 'long',
                        'customerNumber' => 'string',
                        'type' => 'string',
                        'contact' => 'string',
                        'phone' => 'string',
                        'fax' => 'string',
                        'email' => 'string',
                        'comment' => 'string',
                        'iaccount' => 'string',
                        'eoriNumber' => 'string',
                        'vatNumber' => 'string',
                        'idDocType' => 'string',
                        'idDocNumber' => 'string',
                        'webSite' => 'string',
                        'referenceNumber' => 'string',
                        'destinationCountryRegistration' => 'string'
                    ],
                    'commercialInvoiceConsignor' => [
                        'name1' => 'string',
                        'name2' => 'string',
                        'street' => 'string',
                        'houseNo' => 'string',
                        'street2' => 'string',
                        'state' => 'string',
                        'country' => 'string',
                        'zipCode' => 'string',
                        'city' => 'string',
                        'gln' => 'long',
                        'customerNumber' => 'string',
                        'type' => 'string',
                        'contact' => 'string',
                        'phone' => 'string',
                        'fax' => 'string',
                        'email' => 'string',
                        'comment' => 'string',
                        'iaccount' => 'string',
                        'eoriNumber' => 'string',
                        'vatNumber' => 'string',
                        'idDocType' => 'string',
                        'idDocNumber' => 'string',
                        'webSite' => 'string',
                        'referenceNumber' => 'string',
                        'destinationCountryRegistration' => 'string'
                    ],
                    'commercialInvoiceLine' => [
                        'customsTarif' => 'string',
                        'receiverCustomsTarif' => 'string',
                        'productCode' => 'string',
                        'content' => 'string',
                        'grossWeight' => 'int',
                        'itemsNumber' => 'int',
                        'amountLine' => 'long',
                        'customsOrigin' => 'string',
                        'invoicePosition' => 'string'
                    ]
                ],
                'hazardous' => [
                    'identificationUnNo' => 'string',
                    'identificationClass' => 'string',
                    'classificationCode' => 'string',
                    'packingGroup' => 'string',
                    'packingCode' => 'string',
                    'description' => 'string',
                    'subsidiaryRisk' => 'string',
                    'tunnelRestrictionCode' => 'string',
                    'hazardousWeight' => 'decimal',
                    'netWeight' => 'decimal',
                    'factor' => 'int',
                    'notOtherwiseSpecified' => 'string'
                ],
                'printInfo1OnParcelLabel' => 'boolean',
                'info1' => 'string',
                'info2' => 'string',
                'returns' => 'boolean',
                'customsTransportCost' => 'long',
                'customsTransportCostCurrency' => 'string',
                'goodsExpirationDate' => 'int',
                'goodsMinimumStorageTemperature' => 'int',
                'goodsMaximumStorageTemperature' => 'int',
                'goodsDescription' => 'string'
            ],
            'productAndServiceData' => [
                'orderType' => 'string',
                'saturdayDelivery' => 'boolean',
                'exWorksDelivery' => 'boolean',
                'guarantee' => 'boolean',
                'tyres' => 'boolean',
                'personalDelivery' => [
                    'type' => 'int',
                    'floor' => 'string',
                    'building' => 'string',
                    'department' => 'string',
                    'name' => 'string',
                    'phone' => 'string',
                    'personId' => 'string'
                ],
                'pickup' => [
                    'tour' => 'int',
                    'quantity' => 'int',
                    'date' => 'int',
                    'day' => 'int',
                    'fromTime1' => 'int',
                    'toTime1' => 'int',
                    'fromTime2' => 'int',
                    'toTime2' => 'int',
                    'extraPickup' => 'boolean',
                    'collectionRequestAddress' => [
                        'name1' => 'string',
                        'name2' => 'string',
                        'street' => 'string',
                        'houseNo' => 'string',
                        'street2' => 'string',
                        'state' => 'string',
                        'country' => 'string',
                        'zipCode' => 'string',
                        'city' => 'string',
                        'gln' => 'long',
                        'customerNumber' => 'string',
                        'type' => 'string',
                        'contact' => 'string',
                        'phone' => 'string',
                        'fax' => 'string',
                        'email' => 'string',
                        'comment' => 'string',
                        'iaccount' => 'string',
                        'eoriNumber' => 'string',
                        'vatNumber' => 'string',
                        'idDocType' => 'string',
                        'idDocNumber' => 'string',
                        'webSite' => 'string',
                        'referenceNumber' => 'string',
                        'destinationCountryRegistration' => 'string'
                    ]
                ],
                'parcelShopDelivery' => [
                    'parcelShopId' => 'long',
                    'parcelShopNotification' => [
                        'channel' => 'int',
                        'value' => 'string',
                        'language' => 'string'
                    ]
                ],
                'predict' => [
                    'channel' => 'int',
                    'value' => 'string',
                    'language' => 'string'
                ],
                'personalDeliveryNotification' => [
                    'channel' => 'int',
                    'value' => 'string',
                    'language' => 'string'
                ],
                'proactiveNotification' => [
                    'channel' => 'int',
                    'value' => 'string',
                    'rule' => 'int',
                    'language' => 'string'
                ],
                'delivery' => [
                    'day' => 'string',
                    'dateFrom' => 'int',
                    'dateTo' => 'int',
                    'timeFrom' => 'int',
                    'timeTo' => 'int'
                ],
                'invoiceAddress' => [
                    'name1' => 'string',
                    'name2' => 'string',
                    'street' => 'string',
                    'houseNo' => 'string',
                    'street2' => 'string',
                    'state' => 'string',
                    'country' => 'string',
                    'zipCode' => 'string',
                    'city' => 'string',
                    'gln' => 'long',
                    'customerNumber' => 'string',
                    'type' => 'string',
                    'contact' => 'string',
                    'phone' => 'string',
                    'fax' => 'string',
                    'email' => 'string',
                    'comment' => 'string',
                    'iaccount' => 'string',
                    'eoriNumber' => 'string',
                    'vatNumber' => 'string',
                    'idDocType' => 'string',
                    'idDocNumber' => 'string',
                    'webSite' => 'string',
                    'referenceNumber' => 'string',
                    'destinationCountryRegistration' => 'string'
                ],
                'countrySpecificService' => 'string',
                'ageCheck' => 'boolean',
                'returnAddress' => [
                    'name1' => 'string',
                    'name2' => 'string',
                    'street' => 'string',
                    'houseNo' => 'string',
                    'street2' => 'string',
                    'state' => 'string',
                    'country' => 'string',
                    'zipCode' => 'string',
                    'city' => 'string',
                    'gln' => 'long',
                    'customerNumber' => 'string',
                    'type' => 'string',
                    'contact' => 'string',
                    'phone' => 'string',
                    'fax' => 'string',
                    'email' => 'string',
                    'comment' => 'string',
                    'iaccount' => 'string',
                    'eoriNumber' => 'string',
                    'vatNumber' => 'string',
                    'idDocType' => 'string',
                    'idDocNumber' => 'string',
                    'webSite' => 'string',
                    'referenceNumber' => 'string',
                    'destinationCountryRegistration' => 'string'
                ]
            ]
        ],
        'isLastRequest' => 'boolean'
    ]);


More Shipment Examples
``````````````````````
`More shipment examples <shipment_example.rst>`_


`Back to top <#top>`_