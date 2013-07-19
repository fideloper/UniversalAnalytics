<?php namespace UnivseralAnalytics\Track;

class Page extends Entity {

    protected $shortName = 'page';

    protected $attributes = array(
        'version' => null,
        'tracking_id' => null,
        'client_id' => null,
        'type' => 'pageview',
        'hostname' => null,
        'page' => null,
        'title' => null,
    );

    protected $googleAttributes = array(
        'v' => null,
        'tid' => null,
        'cid' => null,
        't' => 'pageview',
        'dh' => null,
        'dp' => null,
        'dt' => null,
    );

}