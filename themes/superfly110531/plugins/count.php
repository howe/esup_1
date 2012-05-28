<?php
/*
插件名称: 统计数组数量
描    述: 统计数组数量
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
array     数组
*/

function siy_count($atts) {
	return count($atts['array']);
}

?>
