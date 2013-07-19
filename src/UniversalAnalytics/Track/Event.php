<?php namespace UnivseralAnalytics\Track;

class Event extends Entity {

    protected $shortName = 'event';

    protected $attributes = array(
        'version' => null,
        'tracking_id' => null,
        'client_id' => null,
        'type' => 'event',
        'category' => null,
        'action' => null,
        'label' => null,
        'value' => null,
    );

    protected $googleAttributes = array(
        'v' => null,
        'tid' => null,
        'cid' => null,
        't' => 'event',
        'ec' => null,
        'ea' => null,
        'el' => null,
        'ev' => null,
    );

}