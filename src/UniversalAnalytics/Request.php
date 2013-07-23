<?php namespace UniversalAnalytics;

use Buzz\Browser;
use Buzz\Message\RequestInterface;
use Buzz\Client\Curl;
use UniversalAnalytics\Track\Entity;

class Request {

    /**
     * Base URL for UA api
     *
     * @access protected
     */
	protected $base = 'http://www.google-analytics.com/collect';

    /**
     * Base URL for UA api - over SSL
     *
     * @access protected
     */
	protected $base_ssl = 'https://ssl.google-analytics.com/collect';


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

    /**
     * UniversalAnalytics\Track\Entity
     *
     * @access protected
     */
    protected $entity;


    public function __construct(Array $attributes)
    {
        $this->build($attributes);
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
     * @param Bool secure
     * @throws UniversalAnalytics\Exception\InvalidRequestException
     * @return Response
     */
	public function send($secure = true)
	{
		$buzzBrowser = new Browser;
        $buzzBrowser->setClient( new Curl );
        $base = $secure ? $this->base_ssl : $this->base;
		$buzzResponse = $buzzBrowser->submit($base, $this->attributes, RequestInterface::METHOD_POST, array());

        return new Response($buzzResponse);
	}

}
