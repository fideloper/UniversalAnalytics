<?php

class SocialInteractionTest extends PHPUnit_Framework_TestCase {

	public function testIndivisualAttributes()
	{
		$entity = new UniversalAnalytics\Track\SocialInteraction;

		$entity->action = 'like';
		$entity->network = 'twitter';
		$entity->target = 'http://fideloper.com/tags/laravel';

		$this->assertEquals('like', $entity->action);
		$this->assertEquals('twitter', $entity->network);
		$this->assertEquals('http://fideloper.com/tags/laravel', $entity->target);

	}

	public function testConstructorAttributes()
	{
		$data = array(
			'action' => 'like',
	        'network' => 'twitter',
	        'target' => 'http://fideloper.com/tags/laravel',
		);

		$entity = new UniversalAnalytics\Track\SocialInteraction($data);

		$this->assertEquals('like', $entity->action);
		$this->assertEquals('twitter', $entity->network);
		$this->assertEquals('http://fideloper.com/tags/laravel', $entity->target);
	}

	public function testGoogleAttributes()
    {
        $data = array(
			'action' => 'like',
	        'network' => 'twitter',
	        'target' => 'http://fideloper.com/tags/laravel',
		);

        $entity = new UniversalAnalytics\Track\SocialInteraction($data);

        $googleAttr = $entity->toArray(true);

        $this->assertEquals('like', $googleAttr['sa']);
		$this->assertEquals('twitter', $googleAttr['sn']);
		$this->assertEquals('http://fideloper.com/tags/laravel', $googleAttr['st']);
    }

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidAttributeThrowsException()
	{
		$entity = new UniversalAnalytics\Track\SocialInteraction();

		$entity->wrongattribute = 'this throws and exception';
	}

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidConstructorAttributeThrowsException()
	{
		$badData = array(
			'anotherbadattribute' => 'this also throws and exception'
		);

		$entity = new UniversalAnalytics\Track\SocialInteraction($badData);

	}

	public function testIsValid()
	{
		$data = array(
			'action' => 'like',
	        'network' => 'twitter',
	        'target' => 'http://fideloper.com/tags/laravel',
		);

		$entity = new UniversalAnalytics\Track\SocialInteraction($data);

		// This entity has no required attributes
		$this->assertTrue($entity->valid());
	}

	public function testIsNotValid()
	{
		// No Action
		$dataAction = array(
	        'network' => 'twitter',
	        'target' => 'http://fideloper.com/tags/laravel',
		);

		$entityAction = new UniversalAnalytics\Track\SocialInteraction($dataAction);

		$this->assertFalse($entityAction->valid());

		// No Network
		$dataNetwork = array(
			'action' => 'like',
	        'target' => 'http://fideloper.com/tags/laravel',
		);

		$entityNetwork = new UniversalAnalytics\Track\SocialInteraction($dataNetwork);

		$this->assertFalse($entityNetwork->valid());

		// No Target
		$dataTarget = array(
			'action' => 'like',
			'network' => 'twitter',
		);

		$entityTarget = new UniversalAnalytics\Track\SocialInteraction($dataTarget);

		$this->assertFalse($entityTarget->valid());

	}

}