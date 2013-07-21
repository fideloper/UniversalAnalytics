<?php

class ExceptionTest extends PHPUnit_Framework_TestCase {

	public function testIndivisualAttributes()
	{
		$entity = new UniversalAnalytics\Track\Exception;

		$entity->description = 'RuntimeException';
		$entity->fatal = '1';

		$this->assertEquals('RuntimeException', $entity->description);
		$this->assertEquals('1', $entity->fatal);

	}

	public function testConstructorAttributes()
	{
		$data = array(
			'description' => 'RuntimeException',
	        'fatal' => '1',
		);
		
		$entity = new UniversalAnalytics\Track\Exception($data);

		$this->assertEquals('RuntimeException', $entity->description);
		$this->assertEquals('1', $entity->fatal);
	}

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidAttributeThrowsException()
	{
		$entity = new UniversalAnalytics\Track\Exception();

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

		$entity = new UniversalAnalytics\Track\Exception($badData);

	}

	public function testIsValid()
	{
		$entity = new UniversalAnalytics\Track\Exception;

		// This entity has no required attributes
		$this->assertTrue($entity->valid());
	}

	public function testIsNotValid()
	{
		$entity = new UniversalAnalytics\Track\Exception;

		// This entity has no required attributes
		$this->assertTrue($entity->valid());
	}

}