<?php namespace UniversalAnalytics;

use UniversalAnalytics\Track\Entity;
use UniversalAnalytics\Track\Event;
use UniversalAnalytics\Track\Page;
use UniversalAnalytics\Track\CommerceTransactionHit;
use UniversalAnalytics\Track\CommerceItemHit;
use UniversalAnalytics\Track\SocialInteraction;
use UniversalAnalytics\Track\Exception;
use UniversalAnalytics\Track\UserTiming;

class UA {

    private $current;

    public function page(Array $attributes)
    {
        $this->current = new Page($attributes);

        return $this;
    }

    public function event(Array $attributes)
    {
        $this->current = new Event($attributes);

        return $this;
    }

    public function transaction(Array $attributes)
    {
        $this->current = new CommerceTransactionHit($attributes);

        return $this;
    }

    public function item(Array $attributes)
    {
        $this->current = new CommerceItemHit($attributes);

        return $this;
    }

    public function socialInteraction(Array $attributes)
    {
        $this->current = new SocialInteraction($attributes);

        return $this;
    }

    public function exception(Array $attributes)
    {
        $this->current = new Exception($attributes);

        return $this;
    }

    public function userTiming(Array $attributes)
    {
        $this->current = new UserTiming($attributes);

        return $this;
    }

    public function send(Entity $track=null)
    {
        if( is_null($track) )
        {
            $track = $this->current;
        }

        $request = new Request($track);
        $response = $request->send();

        return $response;
    }

}