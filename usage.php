<?php
require __DIR__ . '/vendor/autoload.php';

$date_1_timezone = new DateTimeZone('Australia/Adelaide');
$date_2_timezone = new DateTimeZone('Australia/Adelaide');
$date_1 = new DateTime('12/11/2016 14:48:21', $date_1_timezone);
$date_2 = new DateTime('11/09/2016 14:48:21', $date_2_timezone);
$datecalc = new DateCalculator\DateCalculator($date_1, $date_2);


echo("\nSeconds between:".$datecalc->getBetween(new \DateCalculator\DatePeriods\Seconds()));
echo("\nDays between:".$datecalc->getBetween(new \DateCalculator\DatePeriods\Days()));
echo("\nHours between:".$datecalc->getBetween(new \DateCalculator\DatePeriods\Hours()));
echo("\nMinutes between:".$datecalc->getBetween(new \DateCalculator\DatePeriods\Minutes()));
echo("\nWeeks between:".$datecalc->getBetween(new \DateCalculator\DatePeriods\Weeks()));
echo("\nWeek Days between:".$datecalc->getBetween(new \DateCalculator\DatePeriods\WeekDays()));
