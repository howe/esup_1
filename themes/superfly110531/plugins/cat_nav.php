<?php
/*
插件名称: 浏览历史
描    述: 获取用户的浏览历史
作    者: David@Shopiy.com
版    本: 1.2
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
cid       母分类id
ccid      当前分类id
check     检测状态 parent 母分类是否有有效的子分类 current 是否是当前分类及其母分类（需要同时传递当前分类ccid） 
form      模板模块 默认是library/siy_cat_nav.lbi
*/

function siy_cat_nav($atts) {
	$cid = $atts['cid'];
	$ctype = $atts['ctype'];
	if(empty($cid)) return false;
	$ccid = (!empty($atts['ccid'])) ? $atts['ccid'] : '0';
	$check = $atts['check'];
	if(!empty($check)) {
		if ($ctype == 'c') {// 商品分类
			if ($check == 'parent'){
				$count = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('category').
					'WHERE parent_id = ' . $cid . ' AND is_show = 1');
				$str = ($count > 0) ? 'parent' : '';
			} elseif ($check == 'current') {
				$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$ccid'";
				$parent_id = $GLOBALS['db']->getOne($sql);
				$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$parent_id'";
				$grand_id = $GLOBALS['db']->getOne($sql);
				if ($cid == $ccid) {
					$str = 'current';
				} elseif ($cid == $parent_id) {
					$str = 'current current_parent';
				} elseif ($cid == $grand_id) {
					$str = 'current current_grand';
				} else {
					return false;
				}
			} else {
				return false;
			}
		} elseif ($ctype == 'a') {// 文章分类
			if ($check == 'parent'){
				$count = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('article_cat').
					'WHERE parent_id = ' . $cid . ' ');
				$str = ($count > 0) ? 'parent' : '';
			} elseif ($check == 'current') {
				$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('article_cat') . " WHERE cat_id = '$ccid'";
				$parent_id = $GLOBALS['db']->getOne($sql);
				$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('article_cat') . " WHERE cat_id = '$parent_id'";
				$grand_id = $GLOBALS['db']->getOne($sql);
				if ($cid == $ccid) {
					$str = 'current';
				} elseif ($cid == $parent_id) {
					$str = 'current current_parent';
				} elseif ($cid == $grand_id) {
					$str = 'current current_grand';
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	} else {
		if ($ctype == 'c') {// 商品分类
			$sql =  'SELECT cat_id, cat_name ' .
				'FROM ' . $GLOBALS['ecs']->table('category') .
				'WHERE parent_id = ' . $cid . ' AND is_show = 1 ORDER BY sort_order ASC';
			$res = $GLOBALS['db']->getAll($sql);

			$cat_nav = array();
			foreach ($res as $key => $val)
			{
				$cat_nav[$key]['id'] = $val['cat_id'];
				$cat_nav[$key]['name'] = $val['cat_name'];
				$cat_nav[$key]['url'] = build_uri('category', array('cid'=>$val['cat_id']), $val['cat_name']);
			}
		} elseif ($ctype == 'a') {// 文章分类
			$sql =  'SELECT cat_id, cat_name ' .
				'FROM ' . $GLOBALS['ecs']->table('article_cat') .
				'WHERE parent_id = ' . $cid . ' ORDER BY sort_order ASC';
			$res = $GLOBALS['db']->getAll($sql);

			$cat_nav = array();
			foreach ($res as $key => $val)
			{
				$cat_nav[$key]['id'] = $val['cat_id'];
				$cat_nav[$key]['name'] = $val['cat_name'];
				$cat_nav[$key]['url'] = build_uri('article_cat', array('acid'=>$val['cat_id']), $val['cat_name']);
			}
		} else {
			return false;
		}

		$GLOBALS['smarty']->assign('cat_nav', $cat_nav);
		$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_cat_nav.lbi';
		$str= $GLOBALS['smarty']->fetch($form);
	}

	return $str;
}

?>
