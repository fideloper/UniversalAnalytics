<?php namespace UniversalAnalytics\Track;

class CommerceTransactionHit extends Entity {

    protected $shortName = 'commercetrans';

    protected $attributes = array(
        'type' => 'transaction',
        'id' => null,
        'affiliation' => null,
        'revenue' => null,
        'shipping' => null,
        'tax' => null,
        'currency_code' => null,
    );

    protected $googleAttributes = array(
        't' => 'transaction',
        'ti' => null,
        'ta' => null,
        'tr' => null,
        'ts' => null,
        'tt' => null,
        'cu' => null,
    );

}