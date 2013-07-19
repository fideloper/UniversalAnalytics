<?php namespace UniversalAnalytics\Track;

class Event extends Entity {

    protected $shortName = 'event';

    protected $attributes = array(
        'type' => 'event',
        'category' => null,
        'action' => null,
        'label' => null,
        'value' => null,
    );

    protected $googleAttributes = array(
        't' => 'event',
        'ec' => null,
        'ea' => null,
        'el' => null,
        'ev' => null,
    );

}