<?php

namespace AyeAye\Api;

/**
 * Describes endpoints and child controllers
 */
interface ControllerInterface
{
    /**
     * Is a method currently hidden.
     *
     * This is used to determine if it should be indexed or not.
     *
     * @param string $methodName
     * @return bool
     * @throws Exception
     */
    public function isMethodHidden($methodName);
    
    public function setStatus(StatusInterface $status);
    
    /**
     * @return StatusInterface
     */
    public function getStatus();
}