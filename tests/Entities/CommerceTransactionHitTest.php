<?php

class CommerceTransactionHitTest extends PHPUnit_Framework_TestCase {

	public function testIndivisualAttributes()
	{
		$entity = new UniversalAnalytics\Track\CommerceTransactionHit;

		$entity->id = '2';
		$entity->affiliation = 'product';
		$entity->revenue = '5.99';
		$entity->shipping = '2.99';
		$entity->tax = '1.99';
		$entity->currency_code = 'US';

		$this->assertEquals('2', $entity->id);
		$this->assertEquals('product', $entity->affiliation);
		$this->assertEquals('5.99', $entity->revenue);
		$this->assertEquals('2.99', $entity->shipping);
		$this->assertEquals('1.99', $entity->tax);
		$this->assertEquals('US', $entity->currency_code);
	}

	public function testConstructorAttributes()
	{
		$data = array(
			'id' => '2',
	        'affiliation' => 'product',
	        'revenue' => '5.99',
	        'shipping' => '2.99',
	        'tax' => '1.99',
	        'currency_code' => 'US',
		);

		$entity = new UniversalAnalytics\Track\CommerceTransactionHit($data);

		$this->assertEquals('2', $entity->id);
		$this->assertEquals('product', $entity->affiliation);
		$this->assertEquals('5.99', $entity->revenue);
		$this->assertEquals('2.99', $entity->shipping);
		$this->assertEquals('1.99', $entity->tax);
		$this->assertEquals('US', $entity->currency_code);
	}

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidAttributeThrowsException()
	{
		$entity = new UniversalAnalytics\Track\CommerceTransactionHit();

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

		$entity = new UniversalAnalytics\Track\CommerceTransactionHit($badData);

	}

	public function testIsValid()
	{
		// ID required
		$data = array(
			'id' => '1',
		);

		$entity = new UniversalAnalytics\Track\CommerceTransactionHit($data);

		$this->assertTrue($entity->valid());
	}

	public function testIsNotValid()
	{
		// No ID
		$dataName = array(
			"affiliation" => 'product',
		);

		$entityName = new UniversalAnalytics\Track\CommerceTransactionHit($dataName);

		$this->assertFalse($entityName->valid());
	}

}