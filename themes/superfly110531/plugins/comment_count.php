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
type      评论类别 0为商品 1为文章
*/

function siy_comment_count($atts) {
	$id = !empty($atts['id']) ? intval($atts['id']) : 0;
	$type = !empty($atts['type']) ? intval($atts['type']) : 0;
	$count = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('comment').
		" WHERE id_value = '$id' AND comment_type = '$type' AND status = 1 AND parent_id = 0");
	return $count;
}

?>
