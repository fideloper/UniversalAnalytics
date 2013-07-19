<?php namespace UnivseralAnalytics\Track;

class Exception extends Entity {

    protected $shortName = 'exception';

    protected $attributes = array(
        'version' => null,
        'tracking_id' => null,
        'client_id' => null,
        'type' => 'exception',
        'description' => null,
        'fatal' => null,
    );

    protected $googleAttributes = array(
        'v' => null,
        'tid' => null,
        'cid' => null,
        't' => 'exception',
        'exd' => null,
        'exf' => null,
    );

}