<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

/**
 * Wrapper to make custom 1XX statuses implement InformationalStatusInterface
 */
class InformationalStatusWrapper extends AbstractStatusWrapper implements InformationalStatusInterface
{
    private $wrapped;
    
    public function __construct(StatusInterface $wrapped)
    {
        if ($wrapped->getCode() < 100 || $wrapped->getCode() > 199) {
            throw new \Exception('Status code must be between 100 and 199, inclusive.');
        }
        
        parent::__construct($wrapped);
    }
    
    
}
