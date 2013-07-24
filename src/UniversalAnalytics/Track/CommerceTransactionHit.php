<?php namespace UniversalAnalytics\Track;

class CommerceTransactionHit extends Entity {

    protected $shortName = 'commercetrans';

    protected $attributes = array(
        'type' => 'transaction',
        'id' => null, /* Required */
        'affiliation' => null,
        'revenue' => null,
        'shipping' => null,
        'tax' => null,
        'currency_code' => null,
    );

    protected $googleAttributes = array(
        't' => 'transaction',
        'ti' => null, /* Required */
        'ta' => null,
        'tr' => null,
        'ts' => null,
        'tt' => null,
        'cu' => null,
    );

    protected $required = array(
        'ti',
    );

}