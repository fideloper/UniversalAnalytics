<?php namespace UniversalAnalytics\Track;

class SocialInteraction extends Entity {

    protected $shortName = 'social';

    protected $attributes = array(
        'type' => 'social',
        'action' => null, /* Required */
        'network' => null, /* Required */
        'target' => null, /* Required */
    );

    protected $googleAttributes = array(
        't' => 'social',
        'sa' => null, /* Required */
        'sn' => null, /* Required */
        'st' => null, /* Required */
    );

    protected $required = array(
        'sa',
        'sn',
        'st',
    );

}