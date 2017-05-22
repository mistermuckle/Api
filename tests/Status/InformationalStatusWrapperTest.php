<?php

namespace AyeAye\Api\Status;

class InformationalStatusWrapperTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider get1XXStatusCodes
     */
    public function testWrappedStatusThatReturns1XXCodeImplementsInformationalStatusInterface($code)
    {
        $this->assertInstanceOf(
            'AyeAye\Api\Status\InformationalStatusInterface',
            new InformationalStatusWrapper($this->getMockStatus($code))
        );
    }
    
    /**
     * @dataProvider getOtherStatusCodes
     * @expectedException Exception
     */
    public function testConstructorThrowsAnExceptionIfWrappedStatusDoesNotReturn1XXCode($code)
    {
        new InformationalStatusWrapper($this->getMockStatus($wrapped));
    }
    
    public function get1XXStatusCodes()
    {
        return [
            [100],
            [199]
        ];
    }
    
    public function getOtherStatusCodes()
    {
        return [
            [200],
            [299],
            [300],
            [399],
            [400],
            [499]
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