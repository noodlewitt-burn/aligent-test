<?php
/**
 * User: sidavies
 * Date: 2019-04-29
 * Time: 14:09
 * File: DateCalculatorTest.php
 */
declare(strict_types=1);

namespace DateCalculator\Tests;

use DateCalculator\DatePeriods\Days;
use DateCalculator\DatePeriods\Hours;
use DateCalculator\DatePeriods\Seconds;
use DateCalculator\DatePeriods\WeekDays;
use DateCalculator\DatePeriods\Weeks;
use Faker\Factory as FakerFactory;
use PHPUnit\Framework\TestCase;
use DateCalculator\DateCalculator;
use \Exception;

final class DateCalculatorTest extends TestCase{

	private $faker;

	/**
	 * DateCalculatorTest constructor.
	 *
	 * @param null $name
	 * @param array $data
	 * @param string $dataName
	 */
	public function __construct( $name = null, array $data = [], $dataName = '' ) {
		$this->faker = FakerFactory::create();
		parent::__construct($name,$data,$dataName);
	}

	public function testCanBeCreatedFromValidDateTimes(){
		$this->assertInstanceOf(
			DateCalculator::class,
			new DateCalculator($this->faker->dateTime(), $this->faker->dateTime())
		);
	}

	/**
	 * @param $date_1
	 * @param $date_2
	 * @param $period
	 * @param $expected
	 * @dataProvider validDateTimesProvider
	 */
	public function testValidDateTimes($date_1, $date_2, $period, $expected){
		$calc = new DateCalculator($date_1, $date_2);
		$this->assertEquals($expected, $calc->getBetween($period));
	}

	/**
	 * @param $date_1
	 * @param $date_2
	 * @param $period
	 * @param $expected
	 * @dataProvider invalidDateTimesProvider
	 */
	public function testInvalidDateTimes($date_1, $date_2){
		$this->expectException(\TypeError::class);
		$calc = new DateCalculator($date_1, $date_2);
	}

	/**
	 * @return array
	 * @throws Exception
	 */
	public function validDateTimesProvider(){
		$hours = Hours::class;
		$days = Days::class;
		$seconds = Seconds::class;
		$weekdays = WeekDays::class;
		$weeks = Weeks::class;
		$tz1 = new \DateTimeZone('Australia/Adelaide');
		$tz2 = new \DateTimeZone('Australia/Sydney');
		return[
			[
				//test valid
				new \DateTime('12/11/2016 13:48:21', $tz1),
				new \DateTime('12/11/2016 14:48:21', $tz1),
				new $hours(),
				1
			],
			[
				//test valid days
				new \DateTime('12/11/2016 13:48:21', $tz1),
				new \DateTime('12/11/2017 14:48:21', $tz1),
				new $days(),
				365
			],
			[
				//test 0 hours
				new \DateTime('12/11/2016 13:48:21', $tz1),
				new \DateTime('12/11/2016 13:28:21', $tz1),
				new $hours(),
				0
			],
			[
				//test weeks
				new \DateTime('12/11/2016 13:48:21', $tz1),
				new \DateTime('01/11/2016 13:28:21', $tz1),
				new $weeks(),
				47
			],
			[
				//test seconds
				new \DateTime('12/11/2019 13:48:21', $tz1),
				new \DateTime('12/11/2016 14:48:21', $tz1),
				new $seconds(),
				94604400
			],
			[
				//test weekdays
				new \DateTime('12/11/2019 13:48:21', $tz1),
				new \DateTime('12/11/2016 14:48:21', $tz1),
				new $weekdays(),
				782
			],
			[
				//test timezones
				new \DateTime('12/11/2019 13:48:21', $tz1),
				new \DateTime('12/11/2016 14:48:21', $tz2),
				new $hours(),
				26279
			],
			[
				//test flipped order
				new \DateTime('12/11/2016 13:48:21', $tz2),
				new \DateTime('12/11/2019 14:48:21', $tz1),
				new $hours(),
				26281
			]
		];
	}

	public function inValidDateTimesProvider(){
		$hours = Hours::class;
		$seconds = Seconds::class;
		$tz1 = new \DateTimeZone('Australia/Adelaide');
		return[
			[
				//test invalid words
				$this->faker->word(),
				$this->faker->word(),
				new $hours(),
				1
			],
			[
				//test invalid date looking thing
				'01/01/2001',
				'01/02/2001',
				new $hours(),
				1
			],
			[
				//test invalid mysql looking thing
				'2001-01-01 00:00:00',
				'2001-01-03 00:00:00',
				new $hours(),
				1
			],
			[
				//test invalid timestamp looking thing
				'1556517281',
				'1556517288',
				new $seconds(),
				1
			]
		];
	}
}