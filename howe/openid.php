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

/* 代码 */
require(dirname(__FILE__) . '/includes/init.php');
admin_priv('all');
/* act操作项的初始化 */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'list';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

if (!isset($GLOBALS['_CFG']['alipay_id']))
{
    $fastlogin = $db->getRow('SELECT * FROM '. $ecs->table('shop_config') .' WHERE code="alipay_id"');
    if (empty($fastlogin))
    {
        $db->query('INSERT INTO '. $ecs->table('shop_config') .' (parent_id,code,type,sort_order) VALUES ("6","alipay_id","hidden","1"),("6","alipay_token","hidden","1"),("6","alipay_consignee","hidden","1")');
        $db->query("ALTER TABLE `es_users` ADD `open_id` VARCHAR( 20 ) NULL ");
    }
}

if ($_REQUEST['act'] == 'list')
{
    $fastlogin = $db->getAll('SELECT * FROM '. $ecs->table('shop_config') .' WHERE code="alipay_id" or code="alipay_token" or code="alipay_consignee"');
    $smarty->assign('fastlogin', $fastlogin);
    $smarty->display('openid.htm');
}
elseif ($_REQUEST['act'] == 'post')
{
    $alipay_id = empty($_POST['alipay_id']) ? '' : $_POST['alipay_id'];
    $alipay_token = empty($_POST['alipay_token']) ? '' : trim($_POST['alipay_token']);
    $alipay_consignee = empty($_POST['alipay_consignee']) ? 0 : intval($_POST['alipay_id']);
    require_once(ROOT_PATH . '/includes/lib_openid.php');
    if(openid_save($alipay_id,$alipay_token))
    {
        $sql = "UPDATE " . $ecs->table('shop_config') . " SET value = '" . $alipay_id . "' WHERE code = 'alipay_id'";
        $db->query($sql);
        $sql = "UPDATE " . $ecs->table('shop_config') . " SET value = '" . $alipay_token . "' WHERE code = 'alipay_token'";
        $db->query($sql);
        $sql = "UPDATE " . $ecs->table('shop_config') . " SET value = '" . $alipay_consignee . "' WHERE code = 'alipay_consignee'";
        $db->query($sql);
        clear_all_files();
        sys_msg($_LANG['save_success']);
    }
    else
    {
        sys_msg($_LANG['save_fail']);
    }
}
?>