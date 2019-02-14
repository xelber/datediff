<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{


    public function testDates()
    {
        $date = new \App\Dates();
        $start = '2018-02-01 00:00:00';
        $end = '2018-02-03 23:59:59';
        $this->assertEquals(2, $date->getDates($start, $end));


        $start = '2018-02-01 00:00:00';
        $end = '2018-02-04 00:59:00';
        $this->assertEquals(3, $date->getDates($start, $end));


        //Test for leap years just in case
        $start = '2018-02-28 00:00:00';
        $end = '2018-03-01 00:00:00';
        $this->assertEquals(1, $date->getDates($start, $end));


        $start = '2020-02-28 00:00:00';
        $end = '2020-03-01 00:00:00';
        $this->assertEquals(2, $date->getDates($start, $end));


        // Test that the day needs to be a full day , i.e 24*60*60 seconds
        $start = '2018-02-01 00:00:01';
        $end = '2018-02-02 00:00:00';
        $this->assertEquals(0, $date->getDates($start, $end));


        // Note the end date can be before the start date as well
        $start = '2019-02-10 00:00:00';
        $end = '2018-02-09 00:00:00';
        $this->assertEquals(1, $date->getDates($start, $end));

        // With return type
        $start = '2018-02-01 00:00:00';
        $end = '2018-02-03 23:59:59';
        $this->assertEquals(2*24*60*60, $date->getDates($start, $end, 'seconds'));
        $this->assertEquals(2*24*60, $date->getDates($start, $end, 'minutes'));
        $this->assertEquals(2*24, $date->getDates($start, $end, 'hours'));
    }

    public function testWeeks()
    {
        $date = new \App\Dates();

        $start = '2019-02-01 00:00:01';
        $end = '2019-02-02 00:00:00';
        $this->assertEquals(0, $date->getWeeks($start, $end));


        $start = '2019-02-01 00:00:00';
        $end = '2019-02-08 00:00:00';
        $this->assertEquals(1, $date->getWeeks($start, $end));


        $start = '2019-02-01 00:00:00';
        $end = '2019-02-16 00:00:00';
        $this->assertEquals(2, $date->getWeeks($start, $end));


        // Testing up to the last second
        $start = '2019-02-01 00:00:00';
        $end = '2019-02-15 23:59:59';
        $this->assertEquals(2, $date->getWeeks($start, $end));

        // Without the time, just dates
        $start = '2019-02-01';
        $end = '2019-02-15';
        $this->assertEquals(2, $date->getWeeks($start, $end));

        // With Return type
        $start = '2019-02-01';
        $end = '2019-02-15';
        $this->assertEquals(2*7*24*60*60, $date->getWeeks($start, $end, 'seconds'));
        $this->assertEquals(2*7*24*60, $date->getWeeks($start, $end, 'minutes'));
        $this->assertEquals(2*7*24, $date->getWeeks($start, $end, 'hours'));
    }

    public function testWeekDays()
    {
        $date = new \App\Dates();

        $start = '2019-02-04';
        $end = '2019-02-08';
        $this->assertEquals(5, $date->getWeekDays($start, $end));

        $start = '2019-02-12';
        $end = '2019-02-22';
        $this->assertEquals(9, $date->getWeekDays($start, $end));
    }
}
