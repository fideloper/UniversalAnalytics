<?php namespace UniversalAnalytics\Track;

class UserTiming extends Entity {

    protected $shortName = 'user';

    protected $attributes = array(
        'type' => 'timing',
        'category' => null,
        'variable' => null,
        'time' => null,
        'label' => null,
    );

    protected $googleAttributes = array(
        't' => 'timing',
        'utc' => null,
        'utv' => null,
        'utt' => null,
        'utl' => null,
    );

}