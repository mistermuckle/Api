<?php
/**
 * [Description]
 * @author Daniel Mason
 * @copyright Daniel Mason, 2014
 */

namespace Gisleburt\Api\Tests;


use Gisleburt\Api\Exception;
use Gisleburt\Api\Status;

class StatusTest extends TestCase {

    /**
     * Test that general Exception behavior is maintained
     * @throws \Gisleburt\Api\Exception
     *
     * @expectedException        Exception
     * @expectedExceptionMessage Status '9001' does not exist
     * @expectedExceptionCode    500
     */
    public function testConstructThrowException() {
        $status = new Status(9001);
    }


    public function testJsonSerialisable() {
        $status = new Status(418);
        $statusObject = json_decode(json_encode($status));

        $this->assertTrue(
            $statusObject->code === 418,
            'Status code should be 418, is actually: '.PHP_EOL.$statusObject->code
        );

        $this->assertTrue(
            $statusObject->message === 'I\'m a teapot',
            'Status message should be I\'m a teapot, is actually: '.PHP_EOL.$statusObject->message
        );
    }

}
 