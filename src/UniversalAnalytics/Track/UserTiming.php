<?php namespace UnivseralAnalytics\Track;

class UserTiming extends Entity {

    protected $shortName = 'user';

    protected $attributes = array(
        'version' => null,
        'tracking_id' => null,
        'client_id' => null,
        'type' => 'timing',
        'category' => null,
        'variable' => null,
        'time' => null,
        'label' => null,
    );

    protected $googleAttributes = array(
        'v' => null,
        'tid' => null,
        'cid' => null,
        't' => 'timing',
        'utc' => null,
        'utv' => null,
        'utt' => null,
        'utl' => null,
    );

}