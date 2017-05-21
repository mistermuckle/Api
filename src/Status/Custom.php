<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

class CustomStatus implements
    StatusInterface,
    \JsonSerializable
{
    const DEFAULT_MESSAGE = 'Custom Status';
    
    private $code;
    private $message;
    
    /**
     * @param int $code
     * @param string|null $message
     */
    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = is_null($message) ? self::DEFAULT_MESSAGE : $message;
    }
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'message' => $this->message
        ];
    }
}