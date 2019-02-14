<?php
/**
 * Created by PhpStorm.
 * User: hiran
 * Date: 2019-02-14
 * Time: 20:41
 */

namespace App;


class Dates
{
    public function getDates($start, $end)
    {
        $start_time = date_create($start);
        $end_time = date_create($end);

        $interval = date_diff($start_time, $end_time);

        return $interval->format("%d");
    }


    public function getWeeks($start, $end)
    {
        $days = $this->getDates($start, $end);

        return floor($days/7);
    }


    public function getWeekDays($start, $end)
    {
        $start = new \DateTime( $start );
        $end = new \DateTime( $end );

        $interval = new \DateInterval('P1D');
        $end = $end->modify( '+1 day' ); // Seems to be needed
        $range = new \DatePeriod($start, $interval ,$end);

        $weekDays = 0;
        foreach($range as $d)
        {
            if ( $d->format('N') < 6 ) $weekDays++; // 'N' gives the date number with respect to the week, 1 - Monday , 2 - Tuesday etc
        }

        return $weekDays;
    }
}