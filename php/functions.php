<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Date: 23/11/2015
 * Time: 21:52
 */

/**
 * Calculate age in years based on timestamp and reference timestamp
 * If the reference $now is set to 0, then current time is used
 *
 * @param int $timestamp
 * @param int $now
 * @return int
 */
function calculateAge($timestamp = 0, $now = 0) {
    # default to current time when $now not given
    if ($now == 0)
        $now = time();

    # calculate differences between timestamp and current Y/m/d
    $yearDiff   = date("Y", $now) - date("Y", $timestamp);
    $monthDiff  = date("m", $now) - date("m", $timestamp);
    $dayDiff    = date("d", $now) - date("d", $timestamp);

    # check if we already had our birthday
    if ($monthDiff < 0)
        $yearDiff--;
    elseif (($monthDiff == 0) && ($dayDiff < 0))
        $yearDiff--;

    # set the result: age in years
    $result = intval($yearDiff);

    # deliver the result
    return $result;
}