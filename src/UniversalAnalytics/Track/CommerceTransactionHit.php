<?php namespace UnivseralAnalytics\Track;

class CommerceTransactionHit extends Entity {

    protected $shortName = 'commercetrans';

    protected $attributes = array(
        'version' => null,
        'tracking_id' => null,
        'client_id' => null,
        'type' => 'transaction',
        'id' => null,
        'affiliation' => null,
        'revenue' => null,
        'shipping' => null,
        'tax' => null,
        'currency_code' => null,
    );

    protected $googleAttributes = array(
        'v' => null,
        'tid' => null,
        'cid' => null,
        't' => 'transaction',
        'ti' => null,
        'ta' => null,
        'tr' => null,
        'ts' => null,
        'tt' => null,
        'cu' => null,
    );

}