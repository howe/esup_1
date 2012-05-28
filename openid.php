<?php

/**
 * ECSHOP openid登陆入口
 * ============================================================================
 * 版权所有 2005-2011 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: openid.php 17217 2011-08-02 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . '/includes/lib_openid.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');

$open  = isset($_REQUEST['open']) ? trim($_REQUEST['open']) : '';
$open_type  = isset($_REQUEST['open_type']) ? trim($_REQUEST['open_type']) : '';

if (isset($_SESSION['back_act']) && strpos($_SESSION['back_act'],$ecs->url()) > -1)
{
    $_SESSION['callback'] = $_SESSION['back_act'];
}
elseif (isset($_SERVER["HTTP_REFERER"]) && strpos($_SERVER["HTTP_REFERER"],'flow.php') >-1)
{
    $_SESSION['callback'] = 'flow.php?step=consignee';
}
elseif (!isset($_SESSION['callback']))
{
    $_SESSION['callback'] = 'index.php';
}

if ($open == 'fastlogin')
{
    openid_login($ecs->url() . "openid.php?");
}
elseif ($open_type == 'fastlogin')
{
    $data = $data_sign = array();
    $data['open_type'] = 'fastlogin';
    $data['certi_id'] = isset($_REQUEST['certi_id']) ? intval($_REQUEST['certi_id']) : '';
    $data['email'] = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
    $data['truename'] = isset($_REQUEST['truename']) ? trim($_REQUEST['truename']) : $data['email'];
    $data['open_id'] = isset($_REQUEST['open_id']) ? intval($_REQUEST['open_id']) : '';
    $data['token'] = isset($_REQUEST['token']) ? trim($_REQUEST['token']) : '';
    $sign = isset($_REQUEST['sign']) ? trim($_REQUEST['sign']) : '';
    foreach ($data as $k=>$v)
    {
        if (!empty($v))
        {
            $data_sign[$k] = $v;
        }
    }
    if ($data['certi_id'] != $_CFG['certificate_id'] || openid_sign($data_sign, $_CFG['token'],0) != $sign)
    {
        show_message($_LANG['login_failure'], $_LANG['relogin_lnk'], 'user.php', 'error');
    }
    if (EC_CHARSET != 'utf-8')
    {
        $data['truename'] = ecs_iconv('UTF8', EC_CHARSET, $data['truename']);
    }
    $user_name = $db->getOne('SELECT user_name FROM '. $ecs->table('users') .' WHERE open_id="'.$data['open_id'].'"');
    if (empty($user_name))
    {
        $user_name = $data['truename'].'@'.$data['open_id'];
        $db->query('INSERT INTO '. $ecs->table('users') .' (email,user_name,password,open_id,last_ip,reg_time) VALUES ("'.$data['email'].'","'.$user_name.'","'.md5('alipay'.$data['open_id']).'","'.$data['open_id'].'","'.real_ip().'","'.time().'")');
        $GLOBALS['user']->set_session($user_name);
        $_SESSION['open_id'] = $data['open_id'];
        $_SESSION['open_token'] = $data['token'];
        $_SESSION['user_name'] = $data['truename'];
        $back_act = isset($_SESSION['callback']) ? $_SESSION['callback'] : 'index.php';
        show_message($_LANG['login_success'] . $ucdata , array($_LANG['back_up_page'], $_LANG['profile_lnk']), array($back_act,'user.php'), 'info');
    }
    else
    {
        $GLOBALS['user']->set_session($user_name);/* 设置登录session */
        $_SESSION['open_id'] = $data['open_id'];
        $_SESSION['open_token'] = $data['token'];
        $_SESSION['user_name'] = $data['truename'];
        update_user_info();
        recalculate_price();

        $back_act = isset($_SESSION['callback']) ? $_SESSION['callback'] : 'index.php';
        $_SESSION['callback'] = '';
        $_SESSION['back_act'] = '';
        show_message($_LANG['login_success'] . $ucdata , array($_LANG['back_up_page'], $_LANG['profile_lnk']), array($back_act,'user.php'), 'info');
    }
}
elseif ($open == 'consignee')
{
    $open_id = isset($_SESSION['open_id']) ? $_SESSION['open_id'] : '';
    $open_token = isset($_SESSION['open_token']) ? $_SESSION['open_token'] : '';
    openid_consignee($open_token, $ecs->url().'openid.php');
}
elseif (isset($_POST['receive_address']))
{
    if (!empty($_POST['receive_address']))
    {
        $data_sign = $address_arr = array();
        foreach ($_POST as $k=>$v)
        {
            if ($k != 'sign' && $k != 'sign_type')
            {
                $data_sign[$k] = stripslashes($v);
            }
        }
        if (openid_sign($data_sign, $_CFG['alipay_token'],1) != $_POST['sign'])
        {
            show_message($_LANG['error_message'], $_LANG['relogin_lnk'], 'flow.php?step=consignee', 'error');
        }
        if (isset($_POST['notify_id']))
        {
            include_once(ROOT_PATH . '/includes/cls_transport.php');
            $t = new transport('-1',5);
            $api_comment = $t->request('http://notify.alipay.com/trade/notify_query.do', 'partner='.$_CFG['alipay_id'].'&notify_id='.$_POST['notify_id']);
            if (!preg_match("/true$/i",$api_comment["body"]))
            {
                show_message($_LANG['error_message'], $_LANG['relogin_lnk'], 'flow.php?step=consignee', 'error');
            }
        }
        $_POST['receive_address'] = str_replace('<?xml version=\"1.0\" encoding=\"utf-8\"?>','',$_POST['receive_address']);
        $p = xml_parser_create();
        xml_parse_into_struct($p, $_POST['receive_address'], $vals, $index);
        xml_parser_free($p);
        $address_arr['consignee'] = isset($index['FULLNAME']) ? trim($vals[$index['FULLNAME'][0]]['value']) : '';
        $address_arr['address'] = isset($index['ADDRESS']) ? trim($vals[$index['ADDRESS'][0]]['value']) : '';
        $address_arr['zipcode'] = isset($index['POST']) ? trim($vals[$index['POST'][0]]['value']) : '';
        $address_arr['mobile'] = isset($index['MOBILE_PHONE']) ? trim($vals[$index['MOBILE_PHONE'][0]]['value']) : '';
        $address_arr['province'] = isset($index['PROV']) ? trim($vals[$index['PROV'][0]]['value']) : '';
        $address_arr['city'] = isset($index['CITY']) ? trim($vals[$index['CITY'][0]]['value']) : '';
        $address_arr['district'] = isset($index['AREA']) ? trim($vals[$index['AREA'][0]]['value']) : '';
        $address_arr['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
        if (EC_CHARSET != 'utf-8')
        {
            foreach($address_arr as $k=>$v)
            $address_arr[$k] = ecs_iconv('UTF8', EC_CHARSET, $v);
        }
        $_SESSION['consignee'] = $address_arr;
        ecs_header("Location: flow.php?step=consignee\n");
    }
    else
    {
        show_message($_LANG['error_message'], $_LANG['relogin_lnk'], 'flow.php?step=consignee', 'error');
    }
}
else
{
    show_message($_LANG['error_message'], '', $_SESSION['callback'], 'info',true);
}
?>