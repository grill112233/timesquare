<?php

function time_convert($datetime, $full = false) {

	$ago = new DateTime($datetime , new DateTimezone('Asia/Bangkok'));
	$now = new DateTime('now', new DateTimezone('Asia/Bangkok'));
	
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
	

    $string = array(
        'y' => 'ปี',
        'm' => 'เดือน',
        'w' => 'สัปดาห์',
        'd' => 'วัน',
        'h' => 'ชั่วโมง',
        'i' => 'นาที',
        's' => 'วินาที',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . 'ที่แล้ว' : 'ตอนนี้';
}

?>