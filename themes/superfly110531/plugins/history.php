<?php
/*
插件名称: 浏览历史
描    述: 获取用户的浏览历史
作    者: David@Shopiy.com
版    本: 1.5
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
number    显示商品数量 默认和最大值为5
form      模板模块 默认是library/siy_history.lbi
*/

function siy_history($atts) {
	$str = '';
	if (!empty($_COOKIE['ECS']['history'])) {
		$number = ($atts['number'] > 0) ? $atts['number'] : '5';
		$where = db_create_in($_COOKIE['ECS']['history'], 'goods_id');
		$sql   = 'SELECT goods_id, goods_name, goods_thumb, shop_price, promote_price, promote_start_date, promote_end_date FROM ' . $GLOBALS['ecs']->table('goods') .
				" WHERE $where AND is_on_sale = 1 AND is_alone_sale = 1 AND is_delete = 0";
		$res = $GLOBALS['db']->SelectLimit($sql, $number);
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
			$goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
			$goods[$idx]['shop_price']   = price_format($row['shop_price']);
			$goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
			$goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
			$goods[$idx]['short_style_name'] = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
			$idx++;
		}
		$GLOBALS['smarty']->assign('goods', $goods);
		$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_history.lbi';
		$str= $GLOBALS['smarty']->fetch($form);
	}
	return $str;
}

?>
