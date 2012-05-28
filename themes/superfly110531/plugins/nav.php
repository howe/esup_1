<?php
/*
插件名称: 分组导航栏
描    述: 使用导航栏的排序来实现分组，比如排序为12的链接就会在排序为1的链接的子分组。 注意，一级链接的排序只能是1-9，二级链接的排序只能是11-99。
作    者: David@Shopiy.com
版    本: 1.2
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
type      位置 top、middle、bottom
form      模板模块 默认是library/siy_nav.lbi
*/

function siy_nav($atts) {
	$type = (!empty($atts['type']) && in_array($atts['type'], array('top', 'middle', 'bottom'))) ? $atts['type'] : 'middle';
	$sql = 'SELECT * FROM '. $GLOBALS['ecs']->table('nav') . '
		WHERE ifshow = "1" AND type = "'.$type.'" ORDER BY vieworder';
	$res = $GLOBALS['db']->query($sql);

	$cur_url = substr(strrchr($_SERVER['REQUEST_URI'],'/'),1);

	if (intval($GLOBALS['_CFG']['rewrite'])) {
		if(strpos($cur_url, '-')) {
			preg_match('/([a-z]*)-([0-9]*)/',$cur_url,$matches);
			$cur_url = $matches[1].'.php?id='.$matches[2];
		}
	} else {
		$cur_url = substr(strrchr($_SERVER['REQUEST_URI'],'/'),1);
	}

	$active = 0;
	$navlist = array();
	while ($row = $GLOBALS['db']->fetchRow($res)) {
		$navlist[] = array(
			'name'      =>  $row['name'],
			'opennew'   =>  $row['opennew'],
			'url'       =>  $row['url'],
			'ctype'     =>  $row['ctype'],
			'cid'       =>  $row['cid'],
			'order'     =>  $row['vieworder'],
		);
	}
	foreach($navlist as $k=>$v) {
		$condition = empty($v['ctype']) ? (strpos($cur_url, $v['url']) === 0) : (strpos($cur_url, $v['url']) === 0 && strlen($cur_url) == strlen($v['url']));
		if ($condition) {
			$navlist[$k]['active'] = 1;
			$active += 1;
		}
	}

	if(!empty($ctype) && $active < 1) {
		foreach($catlist as $key => $val) {
			foreach($navlist as $k=>$v) {
				if(!empty($v['ctype']) && $v['ctype'] == $ctype && $v['cid'] == $val && $active < 1) {
					$navlist[$k]['active'] = 1;
					$active += 1;
				}
			}
		}
	}

	$nav = array();
	foreach($navlist as $k=>$v) {
		if(strlen(strtr($v['order'], '-', '')) == 1) {
			$nav[] = array(
				'name'      =>  $v['name'],
				'opennew'   =>  $v['opennew'],
				'url'       =>  $v['url'],
				'ctype'     =>  $v['ctype'],
				'cid'       =>  $v['cid'],
				'order'     =>  $v['order'],
				'active'    =>  $v['active'],
				'children'  =>  _siy_nav_children($navlist, $v['order']),
			);
		}
	}
	$GLOBALS['smarty']->assign('nav', $nav);
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_nav.lbi';
	$val= $GLOBALS['smarty']->fetch($form);
	return $val;
}

function _siy_nav_children($navlist, $order) {
	foreach($navlist as $k=>$v) {
		if(strlen(strtr($v['order'], '-', '')) == 2 and (substr($v['order'], 0, 1) == $order or substr($v['order'], 0, 2) == $order)) {
			$children[] = array(
				'name'      =>  $v['name'],
				'opennew'   =>  $v['opennew'],
				'url'       =>  $v['url'],
				'ctype'     =>  $v['ctype'],
				'cid'       =>  $v['cid'],
				'order'     =>  $v['order'],
				'active'    =>  $v['active'],
			);
		}
	}
	return $children;
}

?>
