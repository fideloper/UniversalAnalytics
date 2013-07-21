<?php namespace UniversalAnalytics;

use Buzz\Message\Response as CoreResponse;

class Response {

    private $coreResponse;

    public function __construct(CoreResponse $response=null)
    {
        if( is_null($response) === false )
        {
            $this->setCoreResponse($response);
        }

    }

    /**
     * Set core response object sending the http request
     *
     * @param Buzz\Message\Response
     * @return void
     */
    public function setCoreResponse(CoreResponse $response)
    {
        $this->coreResponse = $response;
    }

    /**
     * Get core response object sending the http request
     *
     * @return Buzz\Message\Response
     */
    public function getCoreResponse()
    {
        return $this->coreResponse;
    }

}