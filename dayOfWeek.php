<?php

/**
 * Custom calendar function returns day of standard seven days week 
 *
 * Definition of calendar:
 * - each year has 13 months
 * - each even month has 21 days, each odd month has 22 days
 * - in leap year last month has less one day
 * - leap year is each year dividable by five without rest
 * - every week has 7 days: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday
 * - first day of year 1990 was Monday  
 *
 * @param      integer       $day    The day  
 * @param      integer       $month  The month, each even month has 21 days, each odd month has 22 days
 * @param      integer       $year   The year, each year has 13 months, in leap year last month has less one day
 *
 * @return     string  ( returns day of standard seven days week )
 */
function dayOfWeek(int $day, int $month, int $year): string
{
    $days = [
        0 => "Saturday",
        1 => "Sunday",
        2 => "Monday",
        3 => "Tuesday",
        4 => "Wednesday",
        5 => "Thursday",
        6 => "Friday",
        7 => "Saturday",
    ];

    $daysPerYear = [
        1 => 22,
        2 => 21,
        3 => 22,
        4 => 21,
        5 => 22,
        6 => 21,
        7 => 22,
        8 => 21,
        9 => 22,
        10 => 21,
        11 => 22,
        12 => 21,
        13 => 22,
    ];

    if ($year > 1990) {
        $fullYearsCount = $year - 1990; // full years from 1990

        $leapYearsCount = ceil($fullYearsCount / 5); // every 5 years is leap year
        
        // 279 days in leap year, 280 days in not leap year
        $yearsDaysCount = ($leapYearsCount * 279) + (($fullYearsCount - $leapYearsCount) * 280);
    }

    $yearsDaysCount = $yearsDaysCount ??  0; // set $allYearsDaysCount if empty

    $currentYearDaysCount = $day + array_sum(array_slice($daysPerYear, 0, ($month - 1))); // 1 is current month

    $allDaysCount = $yearsDaysCount + $currentYearDaysCount;

    if ($allDaysCount < 6) {
        return $days[$day + 1]; // check for first 5 days from 1990
    }
    return $days[($allDaysCount - 6) % 7]; //6 is first six days of 1990, 7 days in week.
}