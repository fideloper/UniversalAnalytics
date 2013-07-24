<?php

class UserTimingTest extends PHPUnit_Framework_TestCase {

	public function testIndivisualAttributes()
	{
		$entity = new UniversalAnalytics\Track\UserTiming;

		$entity->category = 'loadjs';
		$entity->variable = 'curlLoader';
		$entity->time = '1500';
		$entity->label = 'jQuery';

		$this->assertEquals('loadjs', $entity->category);
		$this->assertEquals('curlLoader', $entity->variable);
		$this->assertEquals('1500', $entity->time);
		$this->assertEquals('jQuery', $entity->label);

	}

	public function testConstructorAttributes()
	{
		$data = array(
			'category' => 'loadjs',
	        'variable' => 'curlLoader',
	        'time' => '1500',
	        'label' => 'jQuery',
		);

		$entity = new UniversalAnalytics\Track\UserTiming($data);

		$this->assertEquals('loadjs', $entity->category);
		$this->assertEquals('curlLoader', $entity->variable);
		$this->assertEquals('1500', $entity->time);
		$this->assertEquals('jQuery', $entity->label);
	}

	public function testGoogleAttributes()
    {
        $data = array(
			'category' => 'loadjs',
	        'variable' => 'curlLoader',
	        'time' => '1500',
	        'label' => 'jQuery',
		);

        $entity = new UniversalAnalytics\Track\UserTiming($data);

        $googleAttr = $entity->toArray(true);

        $this->assertEquals('loadjs', $googleAttr['utc']);
		$this->assertEquals('curlLoader', $googleAttr['utv']);
		$this->assertEquals('1500', $googleAttr['utt']);
		$this->assertEquals('jQuery', $googleAttr['utl']);
    }

	/**
     * @expectedException UniversalAnalytics\Exception\InvalidAttributeException
     */
	public function testInvalidAttributeThrowsException()
	{
		$entity = new UniversalAnalytics\Track\UserTiming();

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

		$entity = new UniversalAnalytics\Track\UserTiming($badData);

	}

	public function testIsValid()
	{
		$entity = new UniversalAnalytics\Track\UserTiming;

		// This entity has no required attributes
		$this->assertTrue($entity->valid());
	}

	public function testIsNotValid()
	{
		$entity = new UniversalAnalytics\Track\UserTiming;

		// This entity has no required attributes
		$this->assertTrue($entity->valid());
	}

}