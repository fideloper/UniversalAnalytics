<?php namespace UniversalAnalytics;

use Buzz\Browser;
use Buzz\Message\RequestInterface;
use UniversalAnalytics\Track\Entity;

class Request {

	protected $base = 'https://ssl.google-analytics.com/collect';

	public function send(Entity $entity)
	{
		$browser = new Browser;
		$response = $browser->submit($this->base, $entity->toArray(true), RequestInterface::METHOD_POST, array());
	}


}
