<?php

/**
 * DateTime
 */
//$dt = DateTime::createFromFormat('Y/m/d','2023/04/06', new DateTimeZone('Asia/Seoul'));
//var_dump($dt);
$dt = new DateTime('now', new DateTimeZone('Asia/Seoul'));
$dt->modify('+2 days');
//var_dump($dt->format('h:i:s: Y/m/d D'));

/**
 * DateTimeZone
 */

$dz = new DateTimeZone('Asia/Seoul');
//var_dump(DateTimeZone::listIdentifiers(), $dz->getLocation(), $dz->getName());

/**
 * DateInterval
 */
$dt2 = new DateTime('now', new DateTimeZone('Asia/Seoul'));
//var_dump($dt2->diff($dt));
$di = new DateInterval('P2D');
$di2 = DateInterval::createFromDateString('+2 days');
//var_dump($di2);


/**
 * DatePeriod
 */
$dt3 = new DateTime('2019-12-31');
$dt4 = new DateTime('2020-12-31');
$di = DateInterval::createFromDateString('+5 dayd');

$dp = new DatePeriod($dt3, $di, $dt4);

var_dump($dp);