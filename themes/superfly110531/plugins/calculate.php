<?php
/*
插件名称: 计算
描    述: 使用指定公式计算
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
number    原始数值
formula   公式
*/

function siy_calculate($atts) {
	eval('$result='.$atts['number'].$atts['formula'].';');
	return $result;
}

?>
