<?php
/**
 * User: sidavies
 * Date: 2019-04-16
 * Time: 16:56
 * File: Weeks.php
 */
namespace DateCalculator\DatePeriods;
use Carbon\Carbon;

class Seconds implements TimeUnit {

	public function calculateInterval(Carbon $date_1, Carbon $date_2){
		return $date_1->diffInSeconds($date_2);
	}
}