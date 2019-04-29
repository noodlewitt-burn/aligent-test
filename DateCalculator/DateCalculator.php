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

class DateCalculator {

	private $date_1;
	private $date_2;

	public function __construct(DateTime $date_1, DateTime $date_2) {
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

}