<?php

namespace AyeAye\Api\Status;

class ClientErrorStatusWrapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider get4XXStatusCodes
     */
    public function testWrappedStatusThatReturns4XXCodeImplementsClientErrorStatusInterface($code)
    {
        $this->assertInstanceOf(
            'AyeAye\Api\Status\ClientErrorStatusInterface',
            new ClientErrorStatusWrapper($this->getMockStatus($code))
        );
    }
    
    /**
     * @dataProvider getOtherStatusCodes
     * @expectedException Exception
     */
    public function testConstructorThrowsAnExceptionIfWrappedStatusDoesNotReturn4XXCode($code)
    {
        new ClientErrorStatusWrapper($this->getMockStatus($code));
    }
    
    public function get4XXStatusCodes()
    {
        return [
            [400],
            [499]
        ];
    }
    
    public function getOtherStatusCodes()
    {
        return [
            [100],
            [199],
            [200],
            [299],
            [300],
            [399],
            [500],
            [599]
        ];
    }
    
    private function getMockStatus($code)
    {
        $status = $this->getMock(
            'AyeAye\Api\StatusInterface',
            ['getCode', 'getMessage']
        );
        $status
            ->expects($this->any())
            ->method('getCode')
            ->will($this->returnValue($code));
            
        return $status;
    }
}
