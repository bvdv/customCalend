<?php

namespace customCalend\tests;

use PHPUnit\Framework\TestCase;

class CustomCalendTest extends TestCase 
{
    public function testDayOfWeek()
    {
        // day of week for 1.1.1990 start of count
        $dayCreated = dayOfWeek(1, 1, 1990);

        $dayExpected = 'Monday';
        
        $this->assertSame($dayCreated, $dayExpected);

        // day pf week for 1.1.1991, must be Sunday, must be Sunday, not Monday, because of one day offset from leap year.
        $dayCreated = dayOfWeek(1, 1, 1991);

        $dayExpected = 'Sunday';
        
        $this->assertSame($dayCreated, $dayExpected);

        // day pf week for 17.11.2013, must be Wednesday
        $dayCreated = dayOfWeek(17, 11, 2013);

        $dayExpected = 'Wednesday';
        
        $this->assertSame($dayCreated, $dayExpected);
    }
}


