<?php namespace UniversalAnalytics\Track;

class CommerceItemHit extends Entity {

    protected $shortName = 'commerceitem';

    protected $attributes = array(
        'type' => 'item',
        'id' => null, /* Required */
        'name' => null, /* Required */
        'price' => null,
        'quantity' => null,
        'code' => null,
        'variation' => null,
        'currency_code' => null,
    );

    protected $googleAttributes = array(
        't' => 'item',
        'ti' => null, /* Required */
        'in' => null, /* Required */
        'ip' => null,
        'iq' => null,
        'ic' => null,
        'iv' => null,
        'cu' => null,
    );

    protected $required = array(
        'ti',
        'in',
    );

}