--TEST--
Cloning datefmt
--SKIPIF--
<?php if( !extension_loaded( 'intl' ) ) print 'skip'; ?>
--FILE--
<?php
include_once( 'ut_common.inc' );
$GLOBALS['oo-mode'] = true;
$res_str = '';
/*
 * Clone
 */
$start_pattern = 'dd-MM-YY';
$fmt = ut_datefmt_create( "en-US",  IntlDateFormatter::FULL, IntlDateFormatter::FULL, 'America/New_York', IntlDateFormatter::GREGORIAN , $start_pattern );

$formatted = ut_datefmt_format($fmt,0);
$res_str .= "\nResult of formatting timestamp=0 is :  \n$formatted";

$fmt_clone = clone $fmt;
ut_datefmt_set_pattern( $fmt , 'yyyy-DDD.hh:mm:ss z' );

$formatted = ut_datefmt_format($fmt,0);
$res_str .= "\nResult of formatting timestamp=0 is :  \n$formatted";
$formatted = ut_datefmt_format($fmt_clone,0);
$res_str .= "\nResult of clone formatting timestamp=0 is :  \n$formatted";

echo $res_str;

?>
--EXPECTF--
Result of formatting timestamp=0 is :  
31-12-69
Result of formatting timestamp=0 is :  
1969-365.07:00:00 EST
Result of clone formatting timestamp=0 is :  
31-12-69
