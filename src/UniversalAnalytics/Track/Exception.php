<?php namespace UnivseralAnalytics\Track;

class Exception extends Entity {

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

}