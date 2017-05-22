<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

/**
 * Wrapper to make custom 3XX statuses implement RedirectionStatusInterface
 */
class RedirectionStatusWrapper extends AbstractStatusWrapper implements RedirectionStatusInterface
{
    private $wrapped;
    
    public function __construct(StatusInterface $wrapped)
    {
        if ($wrapped->getCode() < 300 || $wrapped->getCode() > 399) {
            throw new \Exception('Status code must be between 300 and 399, inclusive.');
        }
        
        parent::__construct($wrapped);
    }
    
    
}
