<?php

class EventTest extends PHPUnit_Framework_TestCase {

	public function testIndivisualAttributes()
	{
		$entity = new UniversalAnalytics\Track\Event;

		$entity->category = 'Video';
		$entity->action = 'play';
		$entity->label = 'Cat Video';
		$entity->value = '0';

		$this->assertEquals('Video', $entity->category);
		$this->assertEquals('play', $entity->action);
		$this->assertEquals('Cat Video', $entity->label);
		$this->assertEquals('0', $entity->value);
	}

	public function testConstructorAttributes()
	{
		$data = array(
			'category' => 'Video',
	        'action' => 'play',
	        'label' => 'Cat Video',
	        'value' => '0',
		);

		$entity = new UniversalAnalytics\Track\Event($data);

		$this->assertEquals('Video', $entity->category);
		$this->assertEquals('play', $entity->action);
		$this->assertEquals('Cat Video', $entity->label);
		$this->assertEquals('0', $entity->value);
	}

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidAttributeThrowsException()
	{
		$entity = new UniversalAnalytics\Track\Event();

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

		$entity = new UniversalAnalytics\Track\Event($badData);

	}

	public function testIsValid()
	{
		// ID required
		$data = array(
			'category' => 'Video',
			'action' => 'play',
		);

		$entity = new UniversalAnalytics\Track\Event($data);

		$this->assertTrue($entity->valid());
	}

	public function testIsNotValid()
	{
		// No Action
		$dataName = array(
			'category' => 'Video',
		);

		$entityName = new UniversalAnalytics\Track\Event($dataName);

		$this->assertFalse($entityName->valid());

		// No Category
		$dataName = array(
			'action' => 'play',
		);

		$entityName = new UniversalAnalytics\Track\Event($dataName);

		$this->assertFalse($entityName->valid());
	}

}