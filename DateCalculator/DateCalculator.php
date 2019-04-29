<?php
/**
 * User: sidavies
 * Date: 2019-04-29
 * Time: 15:14
 * File: DateCalculator.php
 */
namespace DateCalculator;

use \DateTime;
use \DateInterval;
use \DatePeriod;

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

	/**
	 * count the number of business days between 2 dates
	 * @param DateTime $date_1
	 * @param DateTime $date_2
	 *
	 * @return int
	 * @throws Exception
	 */
	public function getNumberOfWeekDaysBetween(DateTime $date_1, DateTime $date_2){
		$interval = new DateInterval('P1D');
		$period = new DatePeriod($date_1, $interval, $date_2);
		//TODO: order this correctly
		$business_day_count = 0;
		foreach($period as $day){
			if($this->isWeekendDay($day)){
				$business_day_count ++;
			}
		}
		return $business_day_count;
	}

	/**
	 * get number of weeks between 2 dates
	 * @param DateTime $date_1
	 * @param DateTime $date_2
	 *
	 * @return float|int
	 */
	public function getNumberOfWeeksBetween(DateTime $date_1, DateTime $date_2){
		$days = $this->getNumberOfDaysBetween($date_1, $date_2);
		return floor($days/7);
	}

}