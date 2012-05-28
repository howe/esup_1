<?php
/*
插件名称: 商品促销期限
描    述: 获取指定商品促销期限
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
id        商品id
format    显示的日期格式
format2   倒计时的日期格式
form      模板模块 默认是library/siy_promote_end_date.lbi

*/

function siy_promote_end_date($atts) {
	$id = !empty($atts['id']) ? intval($atts['id']) : 0;
	$sql = 'SELECT promote_end_date FROM '.$GLOBALS['ecs']->table('goods').' WHERE goods_id = '.$id;
	$date = $GLOBALS['db']->getOne($sql);
	$timezone = isset($atts['timezone']) ? $atts['timezone'] : (isset($_SESSION['timezone']) ? $_SESSION['timezone'] : $GLOBALS['_CFG']['timezone']);
	$date += ($timezone * 3600);
	$format = !empty($atts['format']) ? str_replace('&nbsp;', ' ', $atts['format']) : 'Y-m-d H:i:s';
	$format2 = !empty($atts['format2']) ? str_replace('&nbsp;', ' ', $atts['format2']) : 'Y-m-d H:i:s';
	$date_out = date($format, $date);
	$date_out2 = date($format2, $date);

	$GLOBALS['smarty']->assign('end_date', $date_out);
	$GLOBALS['smarty']->assign('end_date2', $date_out2);
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_promote_end_date.lbi';
	$str= $GLOBALS['smarty']->fetch($form);
	return $str;
}

?>
