<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

/**
 * Wrapper to make custom 2XX statuses implement SuccessStatusInterface
 */
class SuccessStatusWrapper extends AbstractStatusWrapper implements SuccessStatusInterface
{
    private $wrapped;
    
    public function __construct(StatusInterface $wrapped)
    {
        if ($wrapped->getCode() < 200 || $wrapped->getCode() > 299) {
            throw new \Exception('Status code must be between 200 and 299, inclusive.');
        }
        
        self::__construct($wrapped);
    }
    
    
}