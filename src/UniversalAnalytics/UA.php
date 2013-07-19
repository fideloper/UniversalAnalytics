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
     * @return Request
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
     * @return Request
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
     * @return Request
     */
    public function trackingid($trackingid=null)
    {
        if( is_null($version) )
        {
            return $this->attributes['tid'];
        }

        $this->attributes['tid'] = $version;

        return $this;
    }

    /**
     * Client anonymous ID 'cid' getter/setter
     *
     * @param String    Client ID
     * @return Request
     */
    public function clientid($clientid=null)
    {
        if( is_null($version) )
        {
            return $this->attributes['cid'];
        }

        $this->attributes['cid'] = $version;

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

    public function send(Entity $track=null)
    {
        if( is_null($track) )
        {
            $track = $this->current;
        }

        $request = new Request($this->attributes);
        $response = $request->send($track);

        return $response;
    }

}