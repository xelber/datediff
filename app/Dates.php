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
}