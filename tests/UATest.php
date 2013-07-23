<?php

class UATest extends PHPUnit_Framework_TestCase {

	public function testConstructorAttributes()
	{
		$attributes = array(
			'v' => '1',
	        'tid' => 'UX-ABCD-XYZ',
	        'cid' => '555',
		);

		$ua = new UniversalAnalytics\UA($attributes);

		$this->assertEquals('1', $ua->version());
		$this->assertEquals('UX-ABCD-XYZ', $ua->trackingid());
		$this->assertEquals('555', $ua->clientid());
	}

	public function testGetSetAttributes()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->version('1');
		$ua->trackingid('UX-ABCD-XYZ');
		$ua->clientid('555');

		$this->assertEquals('1', $ua->version());
		$this->assertEquals('UX-ABCD-XYZ', $ua->trackingid());
		$this->assertEquals('555', $ua->clientid());
	}

	public function testCommerceItemHitEntity()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->item(array());

		$this->assertInstanceOf('UniversalAnalytics\Track\CommerceItemHit', $ua->current());
	}

	public function testCommerceTransactionHitEntity()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->transaction(array());

		$this->assertInstanceOf('UniversalAnalytics\Track\CommerceTransactionHit', $ua->current());
	}

	public function testEventEntity()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->event(array());

		$this->assertInstanceOf('UniversalAnalytics\Track\Event', $ua->current());
	}

	public function testExceptionEntity()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->exception(array());

		$this->assertInstanceOf('UniversalAnalytics\Track\Exception', $ua->current());
	}

	public function testPageEntity()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->page(array());

		$this->assertInstanceOf('UniversalAnalytics\Track\Page', $ua->current());
	}

	public function testSocialInteractionEntity()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->socialInteraction(array());

		$this->assertInstanceOf('UniversalAnalytics\Track\SocialInteraction', $ua->current());
	}

	public function testUserTimingEntity()
	{
		$ua = new UniversalAnalytics\UA;

		$ua->userTiming(array());

		$this->assertInstanceOf('UniversalAnalytics\Track\UserTiming', $ua->current());
	}

	public function testTrackReturnsRequest()
	{
		$ua = new UniversalAnalytics\UA(array(
			'v' => '1',
	        'tid' => 'UX-ABCD-XYZ',
	        'cid' => '555',
		));

		$request = $ua->track( new UniversalAnalytics\Track\Page );

		$this->assertInstanceOf('UniversalAnalytics\Request', $request);
	}

	public function testTrackGetsCurrent()
	{
		$ua = new UniversalAnalytics\UA(array(
			'v' => '1',
	        'tid' => 'UX-ABCD-XYZ',
	        'cid' => '555',
	    ));

		$request = $ua->page(array())->track();

		$this->assertInstanceOf('UniversalAnalytics\Track\Page', $ua->current());
	}

}