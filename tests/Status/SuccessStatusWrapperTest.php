<?php

namespace AyeAye\Api\Status;

class SuccessStatusWrapperTest extends \PHPUnit_Framework_TestCase
{   
    /**
     * @dataProvider get2XXStatusCodes
     */
    public function testWrappedStatusThatReturns2XXCodeImplementsSuccessStatusInterface($code)
    {
        $this->assertInstanceOf(
            'AyeAye\Api\Status\SuccessStatusInterface',
            new SuccessStatusWrapper($this->getMockStatus($code))
        );
    }
    
    /**
     * @dataProvider getOtherStatusCodes
     * @expectedException Exception
     */
    public function testConstructorThrowsAnExceptionIfWrappedStatusDoesNotReturn2XXCode($code)
    {
        new SuccessStatusWrapper($this->getMockStatus($code));
    }
    
    public function get2XXStatusCodes()
    {
        return [
            [200],
            [299]
        ];
    }
    
    public function getOtherStatusCodes()
    {
        return [
            [100],
            [199],
            [300],
            [399],
            [400],
            [499],
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
