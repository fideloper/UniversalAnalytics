<?php namespace UniversalAnalytics\Track;

use UniversalAnalytics\Contracts\ValidableInterface;

class Page extends Entity implements ValidableInterface {

    protected $shortName = 'page';

    protected $attributes = array(
        'type' => 'pageview',
        'hostname' => null,
        'page' => null,
        'title' => null,
    );

    protected $googleAttributes = array(
        't' => 'pageview',
        'dh' => null,
        'dp' => null,
        'dt' => null,
    );

    public function valid()
    {
        return true;
    }

}