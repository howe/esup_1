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
form      模板模块 默认是library/siy_history.lbi
*/

function siy_load_user_info($atts) {
	$user_id = !empty($atts['user_id']) ? $atts['user_id'] : $_SESSION['user_id'];;
	$user_info = siy_get_user_info($user_id);
	$GLOBALS['smarty']->assign('siy_user_info', $user_info);
}

function siy_get_user_info($user_id) {

	$sql = "SELECT SUM(bt.type_money) AS bonus_value, COUNT(*) AS bonus_count ".
			"FROM " .$GLOBALS['ecs']->table('user_bonus'). " AS ub, ".
				$GLOBALS['ecs']->table('bonus_type') . " AS bt ".
			"WHERE ub.user_id = '$user_id' AND ub.bonus_type_id = bt.type_id AND ub.order_id = 0";
	$user_bonus = $GLOBALS['db']->getRow($sql);

	$sql = "SELECT pay_points, user_money, credit_line, last_login, is_validated FROM " .$GLOBALS['ecs']->table('users'). " WHERE user_id = '$user_id'";
	$row = $GLOBALS['db']->getRow($sql);
	$info = array();
	$info['username']  = stripslashes($_SESSION['user_name']);
	$info['points']  = $row['pay_points'];
	$info['is_validate'] = ($GLOBALS['_CFG']['member_email_validate'] && !$row['is_validated'])?0:1;
	$info['credit_line'] = $row['credit_line'];
	$info['formated_credit_line'] = price_format($info['credit_line'], false);
	$last_time = !isset($_SESSION['last_time']) ? $row['last_login'] : $_SESSION['last_time'];
	if ($last_time == 0) $_SESSION['last_time'] = $last_time = gmtime();
	$info['last_time'] = local_date($GLOBALS['_CFG']['time_format'], $last_time);
	$info['surplus']   = siy_price_format($row['user_money'], false);
	$info['bonus']     = $user_bonus['bonus_count'];
	$info['bonus_value']     = price_format($user_bonus['bonus_value'], false);

	$sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('order_info').
			" WHERE user_id = '" .$user_id. "' AND add_time > '" .local_strtotime('-1 months'). "'";
	$info['order_count'] = $GLOBALS['db']->getOne($sql);

	include_once(ROOT_PATH . 'includes/lib_order.php');
	$sql = "SELECT order_id, order_sn ".
			" FROM " .$GLOBALS['ecs']->table('order_info').
			" WHERE user_id = '" .$user_id. "' AND shipping_time > '" .$last_time. "'". order_query_sql('shipped');
	$info['shipped_order'] = $GLOBALS['db']->getAll($sql);

	return $info;
}

?>
