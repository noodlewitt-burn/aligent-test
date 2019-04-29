<?php
/**
 * User: sidavies
 * Date: 2019-04-29
 * Time: 15:14
 * File: DateCalculator.php
 */
namespace DateCalculator;

use \DateTime;

class DateCalculator {

	/**
	 * get number of days between 2 dates
	 * @param DateTime $date_1
	 * @param DateTime $date_2
	 *
	 * @return string
	 */
	public function getNumberOfDaysBetween(DateTime $date_1, DateTime $date_2){
		$diff = $date_1->diff($date_2);
		return $diff->d;
	}

}