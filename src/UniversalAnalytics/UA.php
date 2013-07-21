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

    /**
     * Current set entity
     *
     * @access protected
     */
    private $current;

    /**
     * Attributes commone to every request
     * See getters/setters below
     *
     * @access protected
     */
    protected $attributes = array(
        'v' => null,
        'tid' => null,
        'cid' => null,
    );

    public function __construct(Array $attributes=null)
    {
        if( is_null($attributes) === false )
        {
            $this->build($attributes);
        }
    }

    /**
     * Add object attributes via array
     *
     * @param Array     Key => Value array of attributes
     * @return UniversalAnalytics\UA
     */
    public function build(Array $data)
    {
        foreach( $data as $key => $value )
        {
            $this->attributes[$key] = $value;
        }

        return $this;
    }

    /**
     * Version 't' getter/setter
     *
     * @param String    API Version
     * @return UniversalAnalytics\UA
     */
    public function version($version=null)
    {
        if( is_null($version) )
        {
            return $this->attributes['v'];
        }

        $this->attributes['v'] = $version;

        return $this;
    }

    /**
     * Tracking ID 'tid' getter/setter
     *
     * @param String    Tracking ID
     * @return UniversalAnalytics\UA
     */
    public function trackingid($trackingid=null)
    {
        if( is_null($trackingid) )
        {
            return $this->attributes['tid'];
        }

        $this->attributes['tid'] = $trackingid;

        return $this;
    }

    /**
     * Client anonymous ID 'cid' getter/setter
     *
     * @param String    Client ID
     * @return UniversalAnalytics\UA
     */
    public function clientid($clientid=null)
    {
        if( is_null($clientid) )
        {
            return $this->attributes['cid'];
        }

        $this->attributes['cid'] = $clientid;

        return $this;
    }

    /**
     * Get or Set current Entity
     *
     * @param UniversalAnalytics\Track\Entity
     * @return UniversalAnalytics\UA
     */
    public function current(Entity $current=null)
    {
        if( is_null($current) )
        {
            return $this->current = $current;
        }

        $this->current = $current;

        return $this;
    }

/**************************************************************
**************************************************************/

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

/**************************************************************
**************************************************************/

    /**
     * Track entity
     *
     * @param UniversalAnalytics\Track\Entity
     * @return UniversalAnalytics\Request
     */
    public function track(Entity $track=null)
    {
        if( is_null($track) )
        {
            $track = $this->current;
        }

        return new Request($this->attributes, $track);
    }

}