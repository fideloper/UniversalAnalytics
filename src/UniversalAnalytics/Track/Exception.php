<?php namespace UniversalAnalytics\Track;

use UniversalAnalytics\Contracts\ValidableInterface;

class Exception extends Entity implements ValidableInterface {

    protected $shortName = 'exception';

    protected $attributes = array(
        'type' => 'exception',
        'description' => null,
        'fatal' => null,
    );

    protected $googleAttributes = array(
        't' => 'exception',
        'exd' => null,
        'exf' => null,
    );

    public function valid()
    {
        return true;
    }

}