<?php
/*
插件名称: 商品购买记录统计
描    述: 商品购买记录统计
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
id        商品id
*/

function siy_bought_count($atts) {
	$id = !empty($atts['id']) ? intval($atts['id']) : 0;
	$sql = 'SELECT count(*) ' .
		'FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS oi LEFT JOIN ' . $GLOBALS['ecs']->table('users') . ' AS u ON oi.user_id = u.user_id, ' . $GLOBALS['ecs']->table('order_goods') . ' AS og ' .
		'WHERE oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 AND og.goods_id = ' . $id;
	$count = $GLOBALS['db']->getOne($sql);
	return $count;
}

?>
