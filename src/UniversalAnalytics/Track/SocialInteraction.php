<?php namespace UnivseralAnalytics\Track;

class SocialInteraction extends Entity {

    protected $shortName = 'social';

    protected $attributes = array(
        'version' => null,
        'tracking_id' => null,
        'client_id' => null,
        'type' => 'social',
        'action' => null,
        'network' => null,
        'target' => null,
    );

    protected $googleAttributes = array(
        'v' => null,
        'tid' => null,
        'cid' => null,
        't' => 'social',
        'sa' => null,
        'sn' => null,
        'st' => null,
    );

}