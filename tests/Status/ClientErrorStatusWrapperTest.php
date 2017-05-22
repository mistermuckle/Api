<?php

namespace AyeAye\Api\Status;

class ClientErrorStatusWrapperTest extends \PHPUnit\Framework\TestCase
{
    private $wrapped;

    
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
        new ClientErrorStatusWrapper($this->getMockStatus($wrapped));
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
            [399]
            [500],
            [599]
        ];
    }
    
    private function getMockStatus()
    {
        $wrapped = $this->getMock(
            'AyeAye\Api\StatusInterface',
            ['getCode', 'getMessage']
        );
        $wrapped
            ->expects($this->any())
            ->method('getCode')
            ->will($this->returnValue($code));
            
        return $wrapped;
    }
}