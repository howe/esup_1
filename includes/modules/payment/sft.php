<?php


/**
 * ECSHOP 盛付通语言文件
 * ============================================================================
 * 版权所有 2005-2010 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liujun $
 * $Id: sft.php 17063 2011-09-1 06:35:46Z liujun $
 */

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

$payment_lang = ROOT_PATH . 'languages/' . $GLOBALS['_CFG']['lang'] . '/payment/sft.php';

if (file_exists($payment_lang))
{
    global $_LANG;

    include_once($payment_lang);
}

/**
 * 模块信息
 */
if (isset($set_modules) && $set_modules == true)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code'] = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc'] = 'sft_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod'] = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online'] = '1';

    /* 作者 */
    $modules[$i]['author']  = 'ECSHOP TEAM';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.lanweng.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'sft_account', 'type' => 'text', 'value' => ''),
        array('name' => 'sft_key', 'type' => 'text', 'value' => ''),
    );

    return;

}

class sft
{
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */

    function sft()
    {
    }

    function __construct()
    {
        $this->sft();
    }

   /**
     * 生成支付代码
     * @param   array   $order  订单信息
     * @param   array   $payment    支付方式信息
     */
   function get_code($order, $payment)
   {
$key                = trim($payment['sft_key']);
$version="3.0" ;//'版本号
$amount=$order['order_amount'] ;// '订单金额，保留两位小数
$orderid=$order['order_sn'];// '商户支付请求号，需保证唯一性
$merid=trim($payment['sft_account']);// '商户号，盛大提供,010002是通用测试商户号
$meruesr="" ;// '商户的用户
$paychannel="";// '支付渠道,显示的支付渠道,不传显示商户签约的全部渠道,多个用逗号隔开。如 03,04。编码表参加接口文档。
$postbackurl=return_url(basename(__FILE__, '.php'));// '支付成功后，浏览器显示支付结果的地址
$notifyurl=return_url(basename(__FILE__, '.php'));//'支付成功后，服务器端通知商户发货的地址,需要公网域名或ip
$backurl=return_url(basename(__FILE__, '.php'));// '重新发起订单的地址
$ordertime=date('YmdHis');//'订单日期,14位数字,格式yyyyMMddHHmmss
$curtype="RMB" ;//'货币类型，目前仅支持"RMB"
$notifytype="http" ;//'发货通知方式：http,https等等
$signtype="2" ;//'签名方式。1.rsa 2.md5 3.pki
$prono=$order['order_sn'];// '商户产品编号
$prodesc=$order['order_sn'];// '产品描述
$remark1=$order['log_id']; ;//'备注1
$remark2="remark2";// '备注2
$bankcode="" ;//'银行编码,银行卡支付时，默认选择的银行
$defaultchannel="" ;//'用户默认打开的支付渠道.必需是paychannel指定的渠道之一。
$producturl="http://".$_SERVER['SERVER_NAME'] ;//商品展示地址，如不为空，用户在盛大支付平台可点击查看商品详情

        /* 生成加密签名串 请务必按照如下顺序和规则组成加密串！*/
        
        
        
        $signmsg    = $version . $amount . $orderid . $merid. $meruesr. $paychannel. $postbackurl. $notifyurl . $backurl. $ordertime . $curtype. $notifytype . $signtype. $prono. $prodesc. $remark1 . $remark2 . $bankcode . $defaultchannel . $producturl ;    //签名字符串 不可空
        $signmsg    =md5($signmsg.$key);

        $def_url  = '<div style="text-align:center"><form name="paymentSubmit" style="text-align:center;" method="post" action="http://netpay.sdo.com/paygate/default.aspx" target="_blank">';
        $def_url .= "
        <input type='hidden' name='Version' value='".$version."' />";
        $def_url .= "
        <input type='hidden'  name='Amount' value='".$amount."'/>";
        $def_url .= "
        <input type='hidden' name='OrderNo' value='".$orderid."'/>";
        $def_url .= "
        <input type='hidden' name='MerchantNo' value='" . $merid . "' />";
        $def_url .= "
        <input type='hidden' name='MerchantUserId' value='" . $meruesr . "' />";
        $def_url .= "
        <input type='hidden' name='PayChannel' value='".$paychannel."'/>"; 
        $def_url .= "
        <input type='hidden' name='PostBackURL' value='" . $postbackurl . "' />" ;
        $def_url .= "
        <input type='hidden' name='NotifyURL' value='" . $notifyurl . "' />" ;
        $def_url .= "
        <input type='hidden' name='BackURL' value='" . $backurl . "' />" ;
        $def_url .= "
        <input type='hidden' name='OrderTime' value='" . $ordertime . "' />";
        $def_url .= "
        <input type='hidden' name='CurrencyType' value='".$curtype."' />";
        $def_url .= "
        <input type='hidden' name='NotifyURLType' value='".$notifytype."'/>";
        $def_url .= "
        <input type='hidden' name='SignType' value='".$signtype."'/>";
        $def_url .= "
        <input type='hidden' name='ProductNo' value='" . $prono . "' />";
        $def_url .= "
        <input type='hidden' name='ProductDesc' value='" . $prodesc . "' />";
        $def_url .= "
        <input type='hidden' name='Remark1' value='" . $remark1 . "' />";
        $def_url .= "
        <input type='hidden' name='Remark2' value='" . $remark2 . "' />";
        $def_url .= "
        <input type='hidden' name='BankCode' value='".$bankcode."' />";
        $def_url .= "
        <input type='hidden' name='DefaultChannel' value='".$defaultchannel."'/>";
        $def_url .= "
        <input type='hidden' name='ProductURL' value='".$producturl."' />";
        $def_url .= "
        <input type='hidden' name='MAC' value='".$signmsg."'/>";
        $def_url .= "
        <input type='submit' name='v_action' value='" . $GLOBALS['_LANG']['pay_button'] . "' />";
        $def_url .= "</form></div></br>";

        return $def_url;
    }

    /**
     * 响应操作
     */
    function respond()
    {
    	
    	
    	
    $amount		= $_POST['Amount']       ;// '订单金额
	$payamount	= $_POST['PayAmount']   ;// '实际支付金额
	$orderid	= $_POST['OrderNo']      ;// '商户订单号
	$serialno	= $_POST['serialno']     ;// '盛大支付订单号
	$status	    = $_POST['Status']      ;// '支付状态 1＝成功
	$merid	   	= $_POST['MerchantNo']  ;// '商户号
	$paychannel	= $_POST['PayChannel']  ;//  '支付渠道
	$discount	= $_POST['Discount']    ;// '折扣
	$signtype	= $_POST['SignType']    ;// '签名类型 1:rsa 2:md5
	$paytime	= $_POST['PayTime']      ;// '支付时间
	$ctype		= $_POST['CurrencyType'] ;// '货币类型 RMB
	$prono		= $_POST['ProductNo']    ;// '商品编号
	$prodesc	= $_POST['ProductDesc']  ;// '商品描述
	$remark1	= $_POST['Remark1']     ;// '备注1
	$remark2	= $_POST['Remark2']     ;//  '备注2
	$ex			= $_POST['ExInfo']       ;// '扩展信息,银行卡支付返回:bankid:****(****表示实际支付银行的编码),如：bankid:ICBC
	$mac		= $_POST['MAC']         ;// '签名信息
    $payment             = get_payment($_GET['code']);
    $merchant_acctid     = $payment['sft_account'];                 //人民币账号 不可空
    $key                 = $payment['sft_key'];
    $signString=$amount."|".$payamount."|".$orderid."|".$serialno."|".$status."|".$merid."|".$paychannel."|".$discount."|".$signtype."|".$paytime."|".$ctype."|".$prono."|".$prodesc."|".$remark1."|".$remark2."|".$ex;
    $merchant_signmsg    = strtoupper(md5($signString."|".$key));

        //首先对获得的商户号进行比对
        
        if ($merid != $merchant_acctid)
        {
            return false;
        }




        if ($mac == $merchant_signmsg)
        {
            
                order_paid($remark1);

                return true;
            


        }
        else
        {
        	
        	
        	?>

<script>alert('<?=$signString?>');</script>
<?php
					
					
            //'密钥校对错误';
            return false;
        }
    }

    /**
    * 将变量值不为空的参数组成字符串
    * @param   string   $strs  参数字符串
    * @param   string   $key   参数键名
    * @param   string   $val   参数键对应值
    */
    function append_param($strs,$key,$val)
    {
        if($strs != "")
        {
            if($key != '' && $val != '')
            {
                $strs .= '&' . $key . '=' . $val;
            }
        }
        else
        {
            if($val != '')
            {
                $strs = $key . '=' . $val;
            }
        }
            return $strs;
    }

}

?>