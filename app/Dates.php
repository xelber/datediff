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
    /**
     * @param $start
     * @param $end
     * @param null $return_as - seconds, minutes, hours
     * @return int
     */
    public function getDates($start, $end, $return_as = null)
    {
        $start_time = date_create($start);
        $end_time = date_create($end);

        $interval = date_diff($start_time, $end_time);

        $days = $interval->format("%d");

        return $this->convert($days, $return_as);
    }


    public function getWeeks($start, $end, $return_as = null)
    {
        $days = $this->getDates($start, $end);

        $weeks = floor($days/7); // TODO - may be check if we should convert the return float to an int, any risks?

        if ( empty($return_as) ) return $weeks; // Early return to avoid nested ifs

        return $this->convert($weeks*7, $return_as);
    }


    public function getWeekDays($start, $end, $return_as = null)
    {
        $start = new \DateTime( $start );
        $end = new \DateTime( $end );

        $interval = new \DateInterval('P1D');
        $end = $end->modify( '+1 day' ); // Seems to be needed
        $range = new \DatePeriod($start, $interval ,$end);

        $week_days = 0;
        foreach($range as $d)
        {
            if ( $d->format('N') < 6 ) $week_days++; // 'N' gives the date number with respect to the week, 1 - Monday , 2 - Tuesday etc
        }

        return $this->convert($week_days, $return_as);
    }

    // $to can be - seconds, minutes, hours
    private function convert($days, $to)
    {
        switch ($to)
        {
            case 'seconds':
                return $days*24*60*60;
            case 'minutes':
                return $days*24*60;
            case 'hours':
                return $days*24;
        }

        return $days;
    }
}