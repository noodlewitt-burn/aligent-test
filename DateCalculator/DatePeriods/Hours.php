<?php
/**
 * User: sidavies
 * Date: 2019-04-16
 * Time: 16:56
 * File: Weeks.php
 */
namespace DateCalculator\DatePeriods;
class Hours implements TimeUnit {

	public function calculateInterval($diff){
echo('<pre>');
var_dump($diff->s);
exit();
		return $diff->format("%h");
		//return $days*24;
	}
}