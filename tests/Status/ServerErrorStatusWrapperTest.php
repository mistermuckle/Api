<?php

namespace AyeAye\Api\Status;

class ServerErrorStatusWrapperTest extends \PHPUnit\Framework\TestCase
{   
    /**
     * @dataProvider get5XXStatusCodes
     */
    public function testWrappedStatusThatReturns5XXCodeImplementsServerErrorStatusInterface($code)
    {
        $this->assertInstanceOf(
            'AyeAye\Api\Status\ServerErrorStatusInterface',
            new ServerErrorStatusWrapper($this->getMockStatus($code))
        );
    }
    
    /**
     * @dataProvider getOtherStatusCodes
     * @expectedException Exception
     */
    public function testConstructorThrowsAnExceptionIfWrappedStatusDoesNotReturn5XXCode($code)
    {
        new ServerErrorStatusWrapper($this->getMockStatus($wrapped));
    }
    
    public function get5XXStatusCodes()
    {
        return [
            [500],
            [599]
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
            [400],
            [499]
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