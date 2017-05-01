<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

abstract class AbstractStatus implements
    StatusInterface,
    \JsonSerializable
{
    private $message;
    
    public function __construct($message = static::MESSAGE)
    {
        $this->message = $message;
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