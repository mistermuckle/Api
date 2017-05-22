<?php

namespace AyeAye\Api\Status;

use AyeAye\Api\StatusInterface;

/**
 * Wrapper to make custom 4XX statuses implement ClientErrorStatusInterface
 */
class ClientErrorStatusWrapper extends AbstractStatusWrapper implements ClientErrorStatusInterface
{
    private $wrapped;
    
    public function __construct(StatusInterface $wrapped)
    {
        if ($wrapped->getCode() < 400 || $wrapped->getCode() > 499) {
            throw new \Exception('Status code must be between 400 and 499, inclusive.');
        }
        
        self::__construct($wrapped);
    }
    
    
}