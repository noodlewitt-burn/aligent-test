<?php
/**
 * User: sidavies
 * Date: 2019-04-29
 * Time: 15:14
 * File: DateCalculator.php
 */
namespace DateCalculator;

use Carbon\Carbon;
use \DateTime;
use \DateCalculator\DatePeriods\TimeUnit as TimeUnit;
use \DateInterval;
use \DatePeriod;
use \Exception;

class DateCalculator {

	private $date_1;
	private $date_2;

	public function __construct($date_1, $date_2) {
		$this->date_1 = Carbon::instance($date_1);
		$this->date_2 = Carbon::instance($date_2);
	}

	/**
	 * get time between 2 dates
	 * @param TimeUnit $unit
	 *
	 * @return string
	 */
	public function getBetween(TimeUnit $unit){
		return $unit->calculateInterval($this->date_1, $this->date_2);
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

		$diff = $this->date_1->diff($this->date_2);
		return $unit->calculateInterval($diff);


		$interval = new DateInterval('P1D');
		$period = new DatePeriod($date_2, $interval, $date_1);
		//TODO: ^^^ order this correctly

		$business_day_count = 0;
		foreach($period as $day){
			if(!$this->isWeekendDay($day)){
				$business_day_count ++;
			}
		}
		return $business_day_count;
	}

	/**
	 * is the date a weekend?
	 * @param DateTime $date
	 *
	 * @return bool
	 */
	public function isWeekendDay(DateTime $date){
		$weekday = $date->format('w');
		if($weekday == 6 || $weekday == 7){
			return true;
		}
		return false;
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