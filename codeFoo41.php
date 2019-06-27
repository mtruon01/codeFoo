<?php declare(strict_types=1);

/**
 * Created by Thong Truong (Tom)
 * Email: thong.truong@MadWireMedia.com
 * Date: 2019-06-24
 * Time: 07:34
 */

/**
 * @param int $num
 */
function bitCounter(int $num) {
    $counterArray = [];

    for($i = 0; $i <= $num; $i++) {
        $binary = decbin($i);
        $digitArray = str_split($binary);
        $counterArray[] = array_sum($digitArray);
    }

    print_r($counterArray);
}

bitCounter(2);
bitCounter(5);