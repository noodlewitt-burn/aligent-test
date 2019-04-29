<?php
/**
 * User: sidavies
 * Date: 2019-04-16
 * Time: 16:56
 * File: Weeks.php
 */
namespace DateCalculator\DatePeriods;
class Minutes implements TimeUnit {

	public function calculateInterval($days){
		return $days*24*60;
	}
}