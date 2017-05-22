<?php

namespace AyeAye\Api\Status;

class RedirectionStatusWrapperTest extends \PHPUnit\Framework\TestCase
{   
    /**
     * @dataProvider get3XXStatusCodes
     */
    public function testWrappedStatusThatReturns3XXCodeImplementsRedirectionStatusInterface($code)
    {
        $this->assertInstanceOf(
            'AyeAye\Api\Status\RedirectionStatusInterface',
            new RedirectionStatusWrapper($this->getMockStatus($code))
        );
    }
    
    /**
     * @dataProvider getOtherStatusCodes
     * @expectedException Exception
     */
    public function testConstructorThrowsAnExceptionIfWrappedStatusDoesNotReturn1XXCode($code)
    {
        new RedirectionStatusWrapper($this->getMockStatus($wrapped));
    }
    
    public function get3XXStatusCodes()
    {
        return [
            [300],
            [399]
        ];
    }
    
    public function getOtherStatusCodes()
    {
        return [
            [100],
            [199],
            [200],
            [299],
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