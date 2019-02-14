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
        $end = '2018-02-03 23:23:59';

        $this->assertEquals(2, $date->getDates($start, $end));

        $start = '2018-02-01 00:00:00';
        $end = '2018-02-04 00:00:00';

        $this->assertEquals(3, $date->getDates($start, $end));

        $start = '2018-02-28 00:00:00';
        $end = '2018-03-01 00:00:00';

        $this->assertEquals(1, $date->getDates($start, $end));

        $start = '2020-02-28 00:00:00';
        $end = '2020-03-01 00:00:00';

        $this->assertEquals(2, $date->getDates($start, $end));

    }
}
