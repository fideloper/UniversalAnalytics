<?php namespace UniversalAnalytics\Track;

use UniversalAnalytics\Contracts\ValidableInterface;

class CommerceTransactionHit extends Entity implements ValidableInterface {

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

    public function valid()
    {
        if( is_null($this->id) )
        {
            return false;
        }

        return true;
    }

}