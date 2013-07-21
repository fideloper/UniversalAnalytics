<?php namespace UniversalAnalytics\Contracts;

interface ValidableInterface {

    /**
     * Validate required fields
     *
     * @return bool
     */
    public function valid();

}