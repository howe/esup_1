<?php
/*
插件名称: 用户信息
描    述: 获取用户的详细信息
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
number    显示数量 默认是3
form      模板模块 默认是library/siy_history.lbi
*/

function siy_collection_goods($atts)
{
	$need_cache = $GLOBALS['smarty']->caching;
	$need_compile = $GLOBALS['smarty']->force_compile;
	if ($_SESSION['user_id'] > 0)
	{
		$user_id = $_SESSION['user_id'];
		$number = ($atts['number'] > 0) ? $atts['number'] : '3';
		$sql = 'SELECT g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.market_price, g.shop_price AS org_price, '.
			"IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
			'g.promote_price, g.promote_start_date,g.promote_end_date, c.rec_id, c.is_attention' .
			' FROM ' . $GLOBALS['ecs']->table('collect_goods') . ' AS c' .
			" LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ".
			"ON g.goods_id = c.goods_id ".
			" LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
			"ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
			" WHERE c.user_id = '$user_id' ORDER BY c.rec_id DESC";
		$res = $GLOBALS['db'] -> selectLimit($sql, $number, 0);
		$query = $GLOBALS['db']->fetch_array($res);
		$goods = array();
		while ($row = $GLOBALS['db']->fetch_array($res))
		{
			if ($row['promote_price'] > 0)
			{
				$promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
			}
			else
			{
				$promote_price = 0;
			}

			$goods[$row['goods_id']]['rec_id']        = $row['rec_id'];
			$goods[$row['goods_id']]['is_attention']  = $row['is_attention'];
			$goods[$row['goods_id']]['id']            = $row['goods_id'];
			$goods[$row['goods_id']]['name']          = $row['goods_name'];
			$goods[$row['goods_id']]['short_name']    = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
			$goods[$row['goods_id']]['market_price']  = price_format($row['market_price']);
			$goods[$row['goods_id']]['shop_price']    = price_format($row['shop_price']);
			$goods[$row['goods_id']]['promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
			$goods[$row['goods_id']]['url']           = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
			$goods[$row['goods_id']]['thumb']         = get_image_path($row['goods_id'], $row['goods_thumb'], true);
			$goods[$row['goods_id']]['img']           = get_image_path($row['goods_id'], $row['goods_img']);
		}
	}
	$GLOBALS['smarty']->assign('collection_goods', $goods);
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_collection_goods.lbi';
	$val= $GLOBALS['smarty']->fetch($form);
	$GLOBALS['smarty']->caching = $need_cache;
	$GLOBALS['smarty']->force_compile = $need_compile;
	return $val;
}

?>
