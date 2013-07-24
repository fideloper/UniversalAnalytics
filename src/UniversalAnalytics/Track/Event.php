<?php namespace UniversalAnalytics\Track;

class Event extends Entity {

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

    protected $required = array(
        'ec',
        'ea',
    );

}