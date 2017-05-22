<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

abstract class AbstractStatus implements StatusInterface
{
    private $message;
    
    /**
     * @param string|null $message
     */
    public function __construct($message = null)
    {
        $this->message = is_null($message) ? static::MESSAGE : $message;
    }
    
    public function getCode()
    {
        return static::CODE;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function jsonSerialize()
    {
        return [
            'code' => static::CODE,
            'message' => $this->message
        ];
    }
}