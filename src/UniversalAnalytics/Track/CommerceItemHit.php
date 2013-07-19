<?php namespace UnivseralAnalytics\Track;

class CommerceItemHit extends Entity {

    protected $shortName = 'commerceitem';

    protected $attributes = array(
        'version' => null,
        'tracking_id' => null,
        'client_id' => null,
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
        'v' => null,
        'tid' => null,
        'cid' => null,
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