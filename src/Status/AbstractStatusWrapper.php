<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

abstract class AbstractStatusWrapper implements StatusInterface
{
    private $wrapped;
    
    public function __construct(StatusInterface $wrapped)
    {
        $this->wrapped = $wrapped;
    }
    
    public function getCode()
    {
        return $this->wrapped->getCode();
    }
    
    public function getMessage()
    {
        return $this->wrapped->getMessage();
    }
    
    public function __call($method, array $args)
    {
        return call_user_func_arrray([$this->wrapped, $method], $args);
    }
}
