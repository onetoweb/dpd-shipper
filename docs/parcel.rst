.. _top:
.. title:: Parcel

`Back to index <index.rst>`_

======
Parcel
======

.. contents::
    :local:


Get Parcel Label Number For Web Number
``````````````````````````````````````

.. code-block:: php
    
    $result = $client->parcel->getParcelLabelNumberForWebNumber([
        'webNumber' => 'string'
    ]);


Get Tracking Data
`````````````````

.. code-block:: php
    
    $result = $client->parcel->getTrackingData([
        'parcelLabelNumber' => 'string'
    ]);


`Back to top <#top>`_