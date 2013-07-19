<?php namespace UniversalAnalytics;

use Buzz\Message\Response as CoreResponse;

class Response {

    private $coreResponse;

    public function __construct(CoreResponse $response=null)
    {
        if( is_null($response) === false )
        {
            $this->setCoreResponse($response)
        }

    }

    public function setCoreResponse(CoreResponse $response)
    {
        $this->coreResponse = $response;
    }

    public function getCoreResponse()
    {
        return $this->coreResponse;
    }

}