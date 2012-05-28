<?php
/*
插件名称: 分类的促销活动
描    述: 分类的促销活动
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
cat_id    分类id
form      模板模块 默认是library/siy_cat_promotion.lbi
*/

function siy_cat_promotion($atts) {
	$cat_id = (!empty($atts['cat_id'])) ? $atts['cat_id'] : '0';
	$gmtime = gmtime();
	$favourable = array();
	$sql = 'SELECT act_id, act_range, act_range_ext, act_name, start_time, end_time FROM ' . $GLOBALS['ecs']->table('favourable_activity') . " WHERE start_time <= '$gmtime' AND end_time >= '$gmtime' AND act_range = 1 AND act_range_ext " . db_create_in(array_unique(array_merge(array($cat_id), array_keys(cat_list($cat_id, 0, false)))));
	$res = $GLOBALS['db']->getAll($sql);

	foreach ($res as $rows) {
		$favourable[$rows['act_id']]['name'] = $rows['act_name'];
		$favourable[$rows['act_id']]['url'] = 'activity.php#' . $rows['act_id'];
	}

	$GLOBALS['smarty']->assign('cat_promotion', $favourable);
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_cat_promotion.lbi';
	$str= $GLOBALS['smarty']->fetch($form);
	return $str;
}

?>
