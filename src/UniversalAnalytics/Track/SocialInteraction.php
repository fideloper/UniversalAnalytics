<?php namespace UnivseralAnalytics\Track;

class SocialInteraction extends Entity {

    protected $shortName = 'social';

    protected $attributes = array(
        'type' => 'social',
        'action' => null,
        'network' => null,
        'target' => null,
    );

    protected $googleAttributes = array(
        't' => 'social',
        'sa' => null,
        'sn' => null,
        'st' => null,
    );

}