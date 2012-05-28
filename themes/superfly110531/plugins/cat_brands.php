<?php
/*
插件名称: 分类的品牌
描    述: 分类的品牌
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
cat_id    分类id
cat_name  分类名称
form      模板模块 默认是library/siy_cat_brands.lbi
*/

function siy_cat_brands($atts) {
	$cat_id = (!empty($atts['cat_id'])) ? $atts['cat_id'] : '0';
	$cat_name = $atts['cat_name'];
	$children = get_children($cat_id);
	$sql = "SELECT b.brand_id, b.brand_name, COUNT(*) AS goods_num ".
		"FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
			$GLOBALS['ecs']->table('goods') . " AS g LEFT JOIN ". $GLOBALS['ecs']->table('goods_cat') . " AS gc ON g.goods_id = gc.goods_id " .
		"WHERE g.brand_id = b.brand_id AND ($children OR " . 'gc.cat_id ' . db_create_in(array_unique(array_merge(array($cat_id), array_keys(cat_list($cat_id, 0, false))))) . ") AND b.is_show = 1 " .
		" AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
		"GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY b.sort_order, b.brand_id ASC";
	$brands = $GLOBALS['db']->getAll($sql);

	foreach ($brands AS $key => $val) {
		$brands[$key]['brand_name'] = $val['brand_name'];
		$brands[$key]['url'] = build_uri('brand', array('cid' => $cat_id, 'bid' => $val['brand_id']), $cat_name);
	}

	$GLOBALS['smarty']->assign('cat_brands', $brands);
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_cat_brands.lbi';
	$str= $GLOBALS['smarty']->fetch($form);
	return $str;
}

?>
