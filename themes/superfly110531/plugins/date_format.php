<?php
/*
插件名称: 格式化日期
描    述: 获取用户的详细信息
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
date      日期
format    格式
timezone  时区；如果是已调整好的时区的日期，请设置为0
*/

function siy_date_format($atts) {
	$date = !empty($atts['date']) ? (is_numeric($atts['date']) ? $atts['date'] : strtotime($atts['date'])) : gmtime();
	$timezone = isset($atts['timezone']) ? $atts['timezone'] : (isset($_SESSION['timezone']) ? $_SESSION['timezone'] : $GLOBALS['_CFG']['timezone']);
	$date += ($timezone * 3600);
	$format = !empty($atts['format']) ? str_replace('&nbsp;', ' ', $atts['format']) : 'Y-m-d H:i:s';
	$date_out = date($format, $date);
	return $date_out;
}

?>
