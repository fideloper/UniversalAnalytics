<?php namespace UniversalAnalytics\Track;

use UniversalAnalytics\Contracts\ValidableInterface;

class CommerceItemHit extends Entity implements ValidableInterface {

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

    public function valid()
    {
        if( is_null($this->id) || is_null($this->name) )
        {
            return false;
        }

        return true;
    }

}