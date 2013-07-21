<?php namespace UniversalAnalytics\Track;

use UniversalAnalytics\Contracts\ValidableInterface;

class UserTiming extends Entity implements ValidableInterface {

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

    public function valid()
    {
        return true;
    }

}