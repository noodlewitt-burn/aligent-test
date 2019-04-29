aligent-test
============


example usage
--------
There's an example usage at `usage.php`. You can run this via cli like this: 
```
php usage.php
```
Alternatively, you can run like this:

```$php
$date_1_timezone = new DateTimeZone('Australia/Adelaide');
$date_2_timezone = new DateTimeZone('Australia/Adelaide');
$date_1 = new DateTime('12/11/2016 14:48:21', $date_1_timezone);
$date_2 = new DateTime('11/09/2016 14:48:21', $date_2_timezone);
$datecalc = new DateCalculator\DateCalculator($date_1, $date_2);

echo("\nSeconds between:".$datecalc->getBetween(new \DateCalculator\DatePeriods\Seconds()));
```

unit testing
--------
```
❯ phpunit --bootstrap vendor/autoload.php DateCalculator\\Tests\\DateCalculatorTest
```
