<?php
require __DIR__ . '/vendor/autoload.php';

$datecalc = new DateCalculator\DateCalculator();
$date_1_timezone = new DateTimeZone('Australia/Adelaide');
$date_1 = new DateTime('12/10/2016 14:48:21', $date_1_timezone);
$date_2 = new DateTime('11/11/2016 14:48:21', $date_1_timezone);

echo("\nDays between:".$datecalc->getNumberOfDaysBetween($date_1, $date_2));

echo("\nWeekdays between:".$datecalc->getNumberOfWeekDaysBetween($date_1, $date_2));

echo("\nWhole weeks between:".$datecalc->getNumberOfWeeksBetween($date_1, $date_2));