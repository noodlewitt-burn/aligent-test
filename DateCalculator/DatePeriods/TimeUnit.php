<?php
/**
 * User: sidavies
 * Date: 2019-04-16
 * Time: 16:55
 * File: DatePeriod.php
 */
namespace DateCalculator\DatePeriods;

use Carbon\Carbon;

interface TimeUnit {
	public function calculateInterval(Carbon $date_1, Carbon $date_2);
}