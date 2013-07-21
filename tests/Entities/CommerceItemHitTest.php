<?php

class CommerceItemHitTest extends PHPUnit_Framework_TestCase {

	public function testIndivisualAttributes()
	{
		$entity = new UniversalAnalytics\Track\CommerceItemHit;

		$entity->id = '1';
		$entity->name = 'sofa';
		$entity->price = '9.99';
		$entity->quantity = '3';
		$entity->code = '1234';
		$entity->variation = 'blue';
		$entity->currency_code = 'US';

		$this->assertEquals('1', $entity->id);
		$this->assertEquals('sofa', $entity->name);
		$this->assertEquals('9.99', $entity->price);
		$this->assertEquals('3', $entity->quantity);
		$this->assertEquals('1234', $entity->code);
		$this->assertEquals('blue', $entity->variation);
		$this->assertEquals('US', $entity->currency_code);
	}

	public function testConstructorAttributes()
	{
		$data = array(
			'id' => '1',
			"name" => 'sofa',
			"price" => '9.99',
			"quantity" => '3',
			"code" => '1234',
			"variation" => 'blue',
			"currency_code" => 'US',
		);

		$entity = new UniversalAnalytics\Track\CommerceItemHit($data);

		$this->assertEquals('1', $entity->id);
		$this->assertEquals('sofa', $entity->name);
		$this->assertEquals('9.99', $entity->price);
		$this->assertEquals('3', $entity->quantity);
		$this->assertEquals('1234', $entity->code);
		$this->assertEquals('blue', $entity->variation);
		$this->assertEquals('US', $entity->currency_code);
	}

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidAttributeThrowsException()
	{
		$entity = new UniversalAnalytics\Track\CommerceItemHit();

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

		$entity = new UniversalAnalytics\Track\CommerceItemHit($badData);

	}

	public function testIsValid()
	{
		// ID, Name required
		$data = array(
			'id' => '1',
			"name" => 'sofa',
		);

		$entity = new UniversalAnalytics\Track\CommerceItemHit($data);

		$this->assertTrue($entity->valid());
	}

	public function testIsNotValid()
	{
		// No ID
		$dataName = array(
			"name" => 'sofa',
		);

		$entityName = new UniversalAnalytics\Track\CommerceItemHit($dataName);

		$this->assertFalse($entityName->valid());

		// No Name
		$dataId = array(
			"id" => '1',
		);

		$entityId = new UniversalAnalytics\Track\CommerceItemHit($dataId);

		$this->assertFalse($entityId->valid());
	}

}