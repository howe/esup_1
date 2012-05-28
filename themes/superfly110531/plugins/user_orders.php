<?php
/*
插件名称: 订单列表
描    述: 获取用户的订单列表
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
id        用户id
number    显示数量
start     起始数
form      模板模块 默认是library/siy_order_list.lbi
*/

function siy_user_orders($atts)
{
	$user_id = !empty($atts['id']) ? intval($atts['id']) : ($_SESSION['user_id'] > 0 ? $_SESSION['user_id'] : 0);
	$number = !empty($atts['number']) ? intval($atts['number']) : 10;
	$start = !empty($atts['start']) ? intval($atts['start']) : 0;
	if ($user_id == '0'){
		return false;
	} else {
		$orders = siy_get_user_orders($user_id, $number, $start);
	}
	$GLOBALS['smarty']->assign('orders', $orders);
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_order_list.lbi';
	$val= $GLOBALS['smarty']->fetch($form);
	return $val;
}

function siy_get_user_orders($user_id, $number = 10, $start = 0) {
	$arr = array();
	$sql = "SELECT order_id, order_sn, order_status, shipping_status, pay_status, add_time, " .
		"(goods_amount + shipping_fee + insure_fee + pay_fee + pack_fee + card_fee + tax - discount) AS total_fee ".
		" FROM " .$GLOBALS['ecs']->table('order_info') .
		" WHERE user_id = '$user_id' ORDER BY add_time DESC";
	$res = $GLOBALS['db']->SelectLimit($sql, $number, $start);

	while ($row = $GLOBALS['db']->fetchRow($res)) {
		if ($row['order_status'] == OS_UNCONFIRMED) {
			$row['handler'] = "<a href=\"user.php?act=cancel_order&order_id=" .$row['order_id']. "\" onclick=\"if (!confirm('".$GLOBALS['_LANG']['confirm_cancel']."')) return false;\" class=\"button\"><span>".$GLOBALS['_LANG']['cancel']."</span></a>";
		} else if ($row['order_status'] == OS_SPLITED) {
			if ($row['shipping_status'] == SS_SHIPPED) {
				@$row['handler'] = "<a href=\"user.php?act=affirm_received&order_id=" .$row['order_id']. "\" onclick=\"if (!confirm('".$GLOBALS['_LANG']['confirm_received']."')) return false;\" class=\"button brighter_button\"><span>".$GLOBALS['_LANG']['received']."</span></a>";
			} elseif ($row['shipping_status'] == SS_RECEIVED) {
				@$row['handler'] = '<span class="status shipping_status_2">'.$GLOBALS['_LANG']['ss_received'] .'</span>';
			} else {
				if ($row['pay_status'] == PS_UNPAYED) {
					@$row['handler'] = "<a href=\"user.php?act=order_detail&order_id=" .$row['order_id']. '" class="button brighter_button"><span>' .$GLOBALS['_LANG']['pay_money']. '</span></a>';
				} else {
					@$row['handler'] = "<a href=\"user.php?act=order_detail&order_id=" .$row['order_id']. '" class="button"><span>' .$GLOBALS['_LANG']['view_order']. '</span></a>';
				}
			}
		} else {
			$row['handler'] = '<span class="status order_status_'.$row['order_status'].'">'.$GLOBALS['_LANG']['os'][$row['order_status']] .'</span>';
		}

		$row['shipping_status'] = ($row['shipping_status'] == SS_SHIPPED_ING) ? SS_PREPARING : $row['shipping_status'];
		$row['order_status'] = '<em class="order_status_'.$row['order_status'].'">'.$GLOBALS['_LANG']['os'][$row['order_status']].'</em>
								<em class="pay_status_'.$row['pay_status'].'">'.$GLOBALS['_LANG']['ps'][$row['pay_status']].'</em>
								<em class="shipping_status_'.$row['shipping_status'].'">'.$GLOBALS['_LANG']['ss'][$row['shipping_status']].'</em>';

		$arr[] = array('order_id'       => $row['order_id'],
			'order_sn'       => $row['order_sn'],
			'order_time'     => local_date($GLOBALS['_CFG']['time_format'], $row['add_time']),
			'order_status'   => $row['order_status'],
			'total_fee'      => price_format($row['total_fee'], false),
			'handler'        => $row['handler']);
	}

	return $arr;
}

?>
