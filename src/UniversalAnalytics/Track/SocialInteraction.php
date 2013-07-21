<?php namespace UniversalAnalytics\Track;

use UniversalAnalytics\Contracts\ValidableInterface;

class SocialInteraction extends Entity implements ValidableInterface {

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

    public function valid()
    {
        if( is_null($this->action) || is_null($this->network) || is_null($this->target) )
        {
            return false;
        }

        return true;
    }

}