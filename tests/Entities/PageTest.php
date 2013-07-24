<?php

class PageTest extends PHPUnit_Framework_TestCase {

	public function testIndivisualAttributes()
	{
		$entity = new UniversalAnalytics\Track\Page;

		$entity->hostname = 'fideloper.com';
		$entity->page = '/tags/laravel';
		$entity->title = 'Laravel';

		$this->assertEquals('fideloper.com', $entity->hostname);
		$this->assertEquals('/tags/laravel', $entity->page);
		$this->assertEquals('Laravel', $entity->title);

	}

	public function testConstructorAttributes()
	{
		$data = array(
			'hostname' => 'fideloper.com',
	        'page' => '/tags/laravel',
	        'title' => 'Laravel',
		);

		$entity = new UniversalAnalytics\Track\Page($data);

		$this->assertEquals('fideloper.com', $entity->hostname);
		$this->assertEquals('/tags/laravel', $entity->page);
		$this->assertEquals('Laravel', $entity->title);
	}

	public function testGoogleAttributes()
    {
        $data = array(
			'hostname' => 'fideloper.com',
	        'page' => '/tags/laravel',
	        'title' => 'Laravel',
		);

        $entity = new UniversalAnalytics\Track\Page($data);

        $googleAttr = $entity->toArray(true);

        $this->assertEquals('fideloper.com', $googleAttr['dh']);
		$this->assertEquals('/tags/laravel', $googleAttr['dp']);
		$this->assertEquals('Laravel', $googleAttr['dt']);
    }

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidAttributeThrowsException()
	{
		$entity = new UniversalAnalytics\Track\Page();

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

		$entity = new UniversalAnalytics\Track\Page($badData);

	}

	public function testIsValid()
	{
		$entity = new UniversalAnalytics\Track\Page;

		// This entity has no required attributes
		$this->assertTrue($entity->valid());
	}

	public function testIsNotValid()
	{
		$entity = new UniversalAnalytics\Track\Page;

		// This entity has no required attributes
		$this->assertTrue($entity->valid());
	}

}