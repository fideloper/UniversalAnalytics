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

    public function __construct(Array $attributes, Entity $entity)
    {
        $this->build($attributes);
        $this->build($entity->toArray());
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
	public function send()
	{
        // Validation hurrr
        // 1. Require the v, tid, cid and t parameters (job of this class to validate)
        // 2. Require the specific *required* parameters per tracking entity (job of the entity to validate)

		$buzzBrowser = new Browser;
        $buzzBrowser->setClient( new Curl );
		$buzzResponse = $buzzBrowser->submit($this->base, $this->attributes, RequestInterface::METHOD_POST, array());

        return new Response($buzzResponse);
	}

}