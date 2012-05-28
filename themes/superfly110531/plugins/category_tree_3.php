<?php
/*
插件名称: 自定义分类树
描    述: 自定义分类树 固定二级分类
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
id        分类id
form      模板模块 默认是library/siy_category_tree_3.lbi
*/

function siy_category_tree_3($atts) {
	$id = !empty($atts['id']) ? intval($atts['id']) : 0;

	$GLOBALS['smarty']->assign('categories', siy_get_categories_tree_3($id));
	$GLOBALS['smarty']->assign('categories_parent', siy_get_categories_parent($id));
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_category_tree_3.lbi';
	$val= $GLOBALS['smarty']->fetch($form);

	return $val;
}

function siy_get_categories_tree_3($cat_id = 0) {
	$cat_arr = array();
	if ($cat_id > 0) {
		$parent_id = $cat_id;
		$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$cat_id'";
		$parent_id_current = $GLOBALS['db']->getOne($sql);
		if($parent_id_current > 0) {
			$parent_id = $parent_id_current;
			$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$parent_id_current'";
			$parent_id_current = $GLOBALS['db']->getOne($sql);
			if($parent_id_current > 0) {
				$parent_id = $parent_id_current;
				$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$parent_id_current'";
				$parent_id_current = $GLOBALS['db']->getOne($sql);
				if($parent_id_current > 0) {
					$parent_id = $parent_id_current;
				}
			}
		}
	} else {
		$parent_id = 0;
	}

	$sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$parent_id' AND is_show = 1 ";
	if ($GLOBALS['db']->getOne($sql) || $parent_id == 0) {
		$sql = 'SELECT cat_id, cat_name, parent_id ' .
			'FROM ' . $GLOBALS['ecs']->table('category') .
			"WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
		$res = $GLOBALS['db']->getAll($sql);
		foreach ($res AS $row) {
			$cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
			$cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
			$cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
			if (isset($row['cat_id']) != NULL) {
				$cat_arr[$row['cat_id']]['cat_id'] = siy_get_child_tree_3($row['cat_id'], $cat_id);
			}
			$cat_arr[$row['cat_id']]['current'] = ($row['cat_id'] == $cat_id) ? 1 : 0;
			$cat_arr[$row['cat_id']]['parent'] = ($row['cat_id'] == $parent_id) ? 1 : 0;
		}
	}
	return $cat_arr;
}

function siy_get_child_tree_3($tree_id = 0, $cat_id = 0) {
	$three_arr = array();
	if ($cat_id > 0) {
		$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$cat_id'";
		$parent_id = $GLOBALS['db']->getOne($sql);
	} else {
		$parent_id = 0;
	}
	$sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$tree_id' AND is_show = 1 ";
	if ($GLOBALS['db']->getOne($sql) || $tree_id == 0) {
		$child_sql = 'SELECT cat_id, cat_name, parent_id, is_show ' .
			'FROM ' . $GLOBALS['ecs']->table('category') .
			"WHERE parent_id = '$tree_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
		$res = $GLOBALS['db']->getAll($child_sql);
		foreach ($res AS $row) {
			$three_arr[$row['cat_id']]['id']   = $row['cat_id'];
			$three_arr[$row['cat_id']]['name'] = $row['cat_name'];
			$three_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
			if (isset($row['cat_id']) != NULL) {
				$three_arr[$row['cat_id']]['cat_id'] = siy_get_child_tree_3($row['cat_id'], $cat_id);
			}
			$three_arr[$row['cat_id']]['current'] = ($row['cat_id'] == $cat_id) ? 1 : 0;
			$three_arr[$row['cat_id']]['parent'] = ($row['cat_id'] == $parent_id) ? 1 : 0;
		}
	}
	return $three_arr;
}

function siy_get_categories_parent($cat_id = 0) {
	$cat_arr = array();
	if ($cat_id > 0) {
		$parent_id = $cat_id;
		$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$cat_id'";
		$parent_id_current = $GLOBALS['db']->getOne($sql);
		if($parent_id_current > 0) {
			$parent_id = $parent_id_current;
			$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$parent_id_current'";
			$parent_id_current = $GLOBALS['db']->getOne($sql);
			if($parent_id_current > 0) {
				$parent_id = $parent_id_current;
				$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$parent_id_current'";
				$parent_id_current = $GLOBALS['db']->getOne($sql);
				if($parent_id_current > 0) {
					$parent_id = $parent_id_current;
				}
			}
		}
		$sql = 'SELECT cat_name FROM '.$GLOBALS['ecs']->table('category').' WHERE cat_id = '.$parent_id;
		$str = $GLOBALS['db']->getOne($sql);
	} else {
		$str = $GLOBALS['_LANG']['goods_category'];
	}
	return $str;
}
?>
