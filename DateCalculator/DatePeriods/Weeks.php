<?php
/**
 * User: sidavies
 * Date: 2019-04-16
 * Time: 16:56
 * File: Weeks.php
 */
namespace DateCalculator\DatePeriods;
class Weeks implements TimeUnit {

	public function calculateInterval($days){
		return floor($days/7);
	}
}