<?php namespace UniversalAnalytics\Track;

class CommerceItemHit extends Entity {

    protected $shortName = 'commerceitem';

    protected $attributes = array(
        'type' => 'item',
        'id' => null,
        'name' => null,
        'price' => null,
        'quantity' => null,
        'code' => null,
        'variation' => null,
        'currency_code' => null,
    );

    protected $googleAttributes = array(
        't' => 'item',
        'ti' => null,
        'in' => null,
        'ip' => null,
        'iq' => null,
        'ic' => null,
        'iv' => null,
        'cu' => null,
    );

}