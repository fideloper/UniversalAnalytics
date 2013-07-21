<?php namespace UniversalAnalytics;

use Buzz\Browser;
use Buzz\Message\RequestInterface;
use Buzz\Client\Curl;
use UniversalAnalytics\Track\Entity;
use UniversalAnalytics\Contracts\ValidableInterface;


class Request implements ValidableInterface {

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

    /**
     * UniversalAnalytics\Track\Entity
     *
     * @access protected
     */
    protected $entity;

    public function __construct(Array $attributes, Entity $entity)
    {
        $this->build($attributes);
        $this->entity = $entity;
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
        if( $this->valid() === false )
        {
            throw new \DomainException('Invalid Request, ensure required fields are set');
        }

        $this->build($this->entity->toArray(true));

		$buzzBrowser = new Browser;
        $buzzBrowser->setClient( new Curl );
		$buzzResponse = $buzzBrowser->submit($this->base, $this->attributes, RequestInterface::METHOD_POST, array());

        return new Response($buzzResponse);
	}

    /**
     * Validate Request
     *
     * @return Bool
     */
    public function valid()
    {
        if( is_null($this->attributes['v']) || is_null($this->attributes['tid']) || is_null($this->attributes['cid']) )
        {
            return false;
        }

        // This will pass TRUE or FALSE
        return $this->entity->valid();
    }

}