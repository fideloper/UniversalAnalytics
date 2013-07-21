<?php namespace UniversalAnalytics\Track;

use UniversalAnalytics\Contracts\ValidableInterface;

class Event extends Entity implements ValidableInterface  {

    protected $shortName = 'event';

    protected $attributes = array(
        'type' => 'event',
        'category' => null, /* Required */
        'action' => null, /* Required */
        'label' => null,
        'value' => null,
    );

    protected $googleAttributes = array(
        't' => 'event',
        'ec' => null, /* Required */
        'ea' => null, /* Required */
        'el' => null,
        'ev' => null,
    );

    public function valid()
    {
        if( is_null($this->category) || is_null($this->action) )
        {
            return false;
        }

        return true;
    }

}