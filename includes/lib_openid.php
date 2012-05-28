<?php

/**
 * ECSHOP OPEN ID 相关函数库
 * ============================================================================
 * 版权所有 2005-2011 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: lib_openid.php 16336 2009-06-24 07:09:13Z liubo $
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

define('OPENID_VERSION', '1.0');

/**
 * 功能：生成签名
 * @param   string     参数
 * @param   string     证书token
 * @return  string
 */
function openid_sign($params, $token , $type=1)
{
    if (!is_array($params))
    {
        return;
    }
    ksort($params);
    $str = '';
    if ($type)
    {
        foreach($params as $key=>$value){
            $str .= $key.'='.$value.'&';
        }
        return md5(substr($str,0,strlen($str)-1) . $token);
    }
    else
    {
        foreach($params as $key=>$value){
            $str .= $key.'='.urlencode($value).'&';
        }
        return md5(substr($str,0,strlen($str)-1) . $token);
    }
}


/**
 * 功能：open id 信息保存
 */
function openid_save($app_id='', $api_secret='', $type = 'fastlogin', $use_lib = 0)
{
    // 登录信息配置
    $params['service'] = 'app.save_app_key'; // 接口方法
    $params['v'] = OPENID_VERSION; // 接口版本号
    include_once(ROOT_PATH . 'includes/lib_license.php');
    $license = get_shop_license();
    if (empty($license['certificate_id']) || empty($license['token']) || empty($license['certi']))
    {
        return false;
    }
    $params['certi_id'] = $license['certificate_id']; // license id
    $params['type'] = $type;
    $params['app_id'] = $app_id;
    $params['api_secret'] = $api_secret;
    $params['sign'] = openid_sign($params, $license['token']);
    $api_str = '';
    foreach ($params as $key => $value)
    {
        $api_str .= '&' . $key . '=' . $value;
    }
    $api_str = trim($api_str, '&');
    include_once(ROOT_PATH . 'includes/cls_transport.php');
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $transport = new transport;
    //$transport->connect_timeout = 1;
    $request = $transport->request('http://esb.shopex.cn/api.php', $api_str, 'POST');
    $request_str = json_str_iconv($request['body']);

    if (empty($use_lib))
    {
        $json = new JSON();
        $request_arr = $json->decode($request_str, 1);
    }
    else
    {
        include_once(ROOT_PATH . 'includes/shopex_json.php');
        $request_arr = json_decode($request_str, 1);
    }
    if ($request_arr["result"] == "succ")
    {
        return true;
    }
    else
    {
        return false;
    }
}

function openid_consignee($open_token='', $return_url='')
{
    global $_CFG;
    // 登录信息配置
    $params['service'] = 'user.logistics.address.query'; // 接口方法
    $params['partner'] = $_CFG['alipay_id']; // 支付宝数字ID
    $params['_input_charset'] = 'utf-8'; // 编码
    $params['return_url'] = $return_url; // 返回地址
    $params['token'] = $open_token;
    $params['sign'] = openid_sign($params, $_CFG['alipay_token']);
    $params['sign_type'] = 'MD5';
    
    $api_str = '';
    foreach ($params as $key => $value)
    {
        $api_str .= '&' . $key . '=' . $value;
    }
    $api_str = trim($api_str, '&');
    ecs_header("Location: https://mapi.alipay.com/gateway.do?".$api_str."\n");
}

/**
 * 功能：open id 登陆入口
 */
function openid_login($callback_url='', $open='fastlogin')
{
    global $_CFG;
    ecs_header("Location: http://openid.ecos.shopex.cn/redirect.php?open=".$open."&certi_id=".$_CFG['certificate_id']."&refertype=all&callback_url=".$callback_url."\n");
}
?>