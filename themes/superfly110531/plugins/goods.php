<?php
/*
插件名称: 获取指定商品
描    述: 获取指定商品
作    者: David@Shopiy.com
版    本: 1.3
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
type     推荐类型，可以是 best, new, hot, promote
cats     分类的ID
brand    品牌的ID
min      商品价格下限
max      商品价格上限
ext      商品扩展查询
number   调用商品数量
order    排列方式 0按更新时间 1随机
*/

function siy_goods($atts) {
	$need_cache = $GLOBALS['smarty']->caching;
	$need_compile = $GLOBALS['smarty']->force_compile;

	$GLOBALS['smarty']->caching = false;
	$GLOBALS['smarty']->force_compile = true;

	$number = ($atts['number'] > 0) ? $atts['number'] : '3';

	$brand_where = ($atts['brand'] > 0) ? " AND g.brand_id = " . $atts['brand'] : '';
	$price_where = ($atts['min'] > 0) ? " AND g.shop_price >= " . $atts['min'] : '';
	$price_where .= ($atts['max'] > 0) ? " AND g.shop_price <=" . $atts['max'] : '';

	$sql =  'SELECT g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
			"IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
			'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, b.brand_name ' .
		'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
		'LEFT JOIN ' . $GLOBALS['ecs']->table('brand') . ' AS b ON b.brand_id = g.brand_id ' .
		"LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
		"ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
		'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ' . $brand_where . $price_where . $ext;

	switch ($atts['type'])
	{
	case 'best':
		$sql .= ' AND is_best = 1';
		break;
	case 'new':
		$sql .= ' AND is_new = 1';
		break;
	case 'hot':
		$sql .= ' AND is_hot = 1';
		break;
	case 'promote':
		$time = gmtime();
		$sql .= " AND is_promote = 1 AND promote_start_date <= '$time' AND promote_end_date >= '$time'";
		break;
	}

	if (!empty($atts['cats']))
	{
		$sql .= " AND (" . get_children($atts['cats']) . " OR " . get_extension_goods($atts['cats']) .")";
	}

	$order = ($atts['order'] == 1) ? 1 : 0;
	$sql .= ($order == 0) ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY RAND()';
	$res = $GLOBALS['db']->selectLimit($sql, $number);

	$idx = 0;
	$goods = array();
	while ($row = $GLOBALS['db']->fetchRow($res))
	{
		if ($row['promote_price'] > 0)
		{
			$promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
			$goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
		}
		else
		{
			$goods[$idx]['promote_price'] = '';
		}

		$goods[$idx]['id']           = $row['goods_id'];
		$goods[$idx]['name']         = $row['goods_name'];
		$goods[$idx]['brief']        = $row['goods_brief'];
		$goods[$idx]['brand_name']   = $row['brand_name'];
		$goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
		$goods[$idx]['market_price'] = price_format($row['market_price']);
		$goods[$idx]['shop_price']   = price_format($row['shop_price']);
		$goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
		$goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
		$goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
		$goods[$idx]['short_style_name'] = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
		$idx++;
	}

	$GLOBALS['smarty']->assign('goods', $goods);

	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_goods.lbi';
	$val= $GLOBALS['smarty']->fetch($form);

	$GLOBALS['smarty']->caching = $need_cache;
	$GLOBALS['smarty']->force_compile = $need_compile;

	return $val;
}

?>
