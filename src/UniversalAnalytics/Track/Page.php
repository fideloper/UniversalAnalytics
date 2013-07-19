<?php namespace UnivseralAnalytics\Track;

class Page extends Entity {

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

}