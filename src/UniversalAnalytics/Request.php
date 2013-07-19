<?php namespace UniversalAnalytics;

use Buzz\Browser;
use Buzz\Message\RequestInterface;
use UniversalAnalytics\Track\Entity;

class Request {

    /**
     * Base URL for UA api
     *
     * @access protected
     */
	protected $base = 'https://ssl.google-analytics.com/collect';

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
     * Send request and generate response
     *
     * @param Entity
     * @return Response
     */
	public function send(Entity $entity)
	{
        // Build from Entity, using google attributes
        // This will add to the attributes array
        $this->build($entity->toArray(true));

		$buzzBrowser = new Browser;
		$buzzResponse = $buzzBrowser->submit($this->base, $this->attributes, RequestInterface::METHOD_POST, array());

        return new Response($buzzResponse);
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

}
