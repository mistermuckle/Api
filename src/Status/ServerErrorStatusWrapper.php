<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

/**
 * Wrapper to make custom 5XX statuses implement ServerErrorStatusInterface
 */
class ServerErrorStatusWrapper extends AbstractStatusWrapper implements ServerErrorStatusInterface
{
    private $wrapped;
    
    public function __construct(StatusInterface $wrapped)
    {
        if ($wrapped->getCode() < 500 || $wrapped->getCode() > 599) {
            throw new \Exception('Status code must be between 500 and 599, inclusive.');
        }
        
        self::__construct($wrapped);
    }
    
    
}