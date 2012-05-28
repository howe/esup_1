<?php
/*
插件名称: 获取图片
描    述: 获取图片并生成img标签
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
prefix    前缀
fname      名称
suffix    后缀
*/

function siy_get_extra_image($atts) {
	$prefix = !empty($atts['prefix']) ? $atts['prefix'] : '';
	$fname = !empty($atts['fname']) ? $atts['fname'] : '';
	$suffix = !empty($atts['suffix']) ? $atts['suffix'] : '.gif';

	$img = 'static/img/extra/' . $prefix . $fname . $suffix;

	$str = (file_exists(ROOT_PATH.$img)) ? '<img src="'.$GLOBALS['_CFG']['static_path'].$img.'" />' : '';

	return $str;
}

?>
