<?php

namespace AyeAye\Api;

/**
 * Represents an HTTP status, used to provide appropriate response
 */
interface StatusInterface
{
    /**
     * @return int HTTP status code
     */
    public function getCode();
    
    /**
     * @return string
     */
    public function getMessage();
}