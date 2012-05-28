<?php

/**
 * ECSHOP 财付通插件
 * ============================================================================
 * 版权所有 2005-2011 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: douqinghua $
 * $Id: tenpay.php 17217 2011-01-19 06:29:08Z douqinghua $
 */

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}
require_once(ROOT_PATH . 'includes/cls_transport.php');
$payment_lang = ROOT_PATH . 'languages/' .$GLOBALS['_CFG']['lang']. '/payment/tenpay.php';

if (file_exists($payment_lang))
{
    global $_LANG;

    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'tenpay_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 作者 */
    $modules[$i]['author']  = 'ECSHOP TEAM';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.tenpay.com';

    /* 版本号 */
    $modules[$i]['version'] = '2.0.0';

    /* 配置信息 */
    $modules[$i]['config']  = array(
        array('name' => 'tenpay_account',   'type' => 'text', 'value' => ''),
        array('name' => 'tenpay_key',       'type' => 'text', 'value' => ''),
        //array('name' => 'magic_string',     'type' => 'text', 'value' => ''),
        array('name' => 'tenpay_pay_method',        'type' => 'select', 'value' => '1'),
        array('name' => 'tenpay_type',       'type' => 'select', 'value'=>'1')
    );

    return;
}

/**
 * 类
 */
class tenpay
{
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
	var $t          = null;

    function tenpay()
    {
		$this->t = new transport(-1, -1, -1, false);
    }

    function __construct()
    {
        $this->tenpay();
    }

    /**
     * 生成支付代码
     * @param   array    $order       订单信息
     * @param   array    $payment     支付方式信息
     */
    function get_code($order, $payment)
    {
        if (!defined('EC_CHARSET'))
        {
            $charset = 'GBK';
        }
        else
        {
            $charset = EC_CHARSET;
        }
        $partner      =  $payment['tenpay_account'];
        $out_trade_no = $order['order_sn'];
        
        $total_fee = floatval($order['order_amount']) * 100;
        /* 订单描述，用订单号替代 */
        if (!empty($order['order_id']))
        {
            $body = $order['order_sn'];
            $attach = '';
        }
        else
        {
            $body = $GLOBALS['_LANG']['account_voucher'];
            $attach = 'voucher';
        }
        
        /* 银行类型:支持纯网关和财付通 */
        $bank_type = 'DEFAULT';

        //$transport_fee  =  floatval($order['shipping_fee']) * 100;
        //$product_fee    =  $total_fee-$transport_fee;
        
        /* 交易类型：2、虚拟交易，1、实物交易 */
        $trans_type = empty($payment['tenpay_type']) ? '1' : $payment['tenpay_type'];
        $trade_mode=empty($payment['tenpay_pay_method']) ? '1' : $payment['tenpay_pay_method'];
        /* 交易参数 */
        $parameter = array(
            'partner'              => $partner,
            'out_trade_no'         => $out_trade_no,                           //订单号
            'total_fee'            => $total_fee,                              //总金额
            'notify_url'           => return_url(basename(__FILE__, '.php')),  //返回地址
            'return_url'           => return_url(basename(__FILE__, '.php')),  //提醒地址
            'body'                 => $body,                            //交易描述
            'bank_type'            => $bank_type,                       //交易类型  默认财付通

            //用户ip
            'spbill_create_ip'     => $_SERVER['REMOTE_ADDR'],          //交易ip
            'fee_type'             => '1',                        //币种  1 人民币
            'subject'              => $body,                            //商品名称

            //系统可选参数
            'sign_type'            => 'MD5',                            //加密方式
            'service_version'      => '1.0',                            //接口版本号 默认1.0
            'input_charset'        => $charset,                         //系统编码  'GBK'
            'sign_key_index'       => '1',                              //密钥序号

            //业务可选参数
            'attach'               => $attach,            //附加数据 原样返回  默认为空
            'product_fee'          => '',                 //商品费用
            'transport_fee'        => '0',                //物流费用
            'time_start'           => date("YmdHis"),     //订单生成时间   date("YmdHis")
            'time_expire'          => '',                 //订单失效时间
            'buyer_id'             => '',                 //买方财付通帐号
            'goods_tag'            => '',                 //商品标记
            'trade_mode'           => $trade_mode,        //交易模式（1.即时到帐模式，2.中介担保模式，3.后台选择（卖家进入支付中心列表选择））
            'transport_desc'       => '',                 //物流说明
            'trans_type'           => $trans_type,        //交易类型
            'agentid'              => '',                 //平台ID
            'agent_type'           => '',                 //代理模式（0.无代理，1.表示卡易售模式，2.表示网店模式）
            'seller_id'            => ''                  //卖家商户号
        );
        ksort($parameter);
        reset($parameter);
        $param = '';
        $sign  = '';
        foreach ($parameter AS $key => $val)
        {
            $param .= "$key=" .urlencode($val). "&";
            if("" != $val && "sign" != $key) {
                $sign  .= "$key=$val&";
            }
        }
        $param = substr($param, 0, -1);
        $sign .= "key=".$payment['tenpay_key'];
        $sign = strtolower(md5($sign));  
        
		$button = '<div style="text-align:center"><a href="https://gw.tenpay.com/gateway/pay.htm?'.$param. '&sign='.$sign.'"><img src="'. $GLOBALS['ecs']->url() .'images/tenpay.gif" alt="' .$GLOBALS['_LANG']['pay_button']. '" border=\'0\'/><a></div>'; 
        
        return $button;
    }


     /**
     * 响应操作
     */
    function respond()
    {
        $attach         = $_GET['attach'];
        $trade_state    = $_GET['trade_state'];
        $total_fee      = $_GET['total_fee'];
        $payment    = get_payment('tenpay');
        $out_trade_no = trim($_GET['out_trade_no']);

        if ($attach == 'voucher')
        {
            $log_id = get_order_id_by_sn($out_trade_no, "true");
        }
        else
        {
            $log_id = get_order_id_by_sn($out_trade_no);
        }
        /* 检查数字签名是否正确 */
        ksort($_GET);
        reset($_GET);

        
        $sign = '';
        foreach ($_GET AS $key => $val)
        {
            if("" != $val && "sign" != $key && $key != 'code') {
                $sign  .= "$key=$val&";
            }
        }
        
        $sign .= "key=".$payment['tenpay_key'];
    
        if (strtolower(md5($sign)) == strtolower($_GET['sign']))
        {
            if($trade_state==0 &&$this->Verification($payment,$_GET['notify_id']))
            {
			    if (count($_COOKIE) == 0)
                {
                    echo 'success';
                }
                /* 改变订单状态 */
                order_paid($log_id);
				
                return true;
            }
               
        }
        else
        {
            return false;
        }

    }

    function Verification($payment,$notify_id)
	{
        $tenpay_url="https://gw.tenpay.com/gateway/simpleverifynotifyid.xml";
        $send_str['partner']=$payment['tenpay_account'];
        $send_str['notify_id']=$_GET['notify_id'];
	    ksort($send_str);
        $sign_notify = '';
        foreach ($send_str AS $key => $val)
        {
            if("" != $val && "sign" != $key) 
			{
                $sign_notify  .= "$key=$val&";
            }
        }
        
		$sign_notify .= "key=".$payment['tenpay_key'];
		$send_str['sign']=strtolower(md5($sign_notify));
		$response= $this->t->request($tenpay_url, $send_str);
		
		if(!empty($response['body']))
		{
		   if(!function_exists('simplexml_load_string')||!function_exists('iconv'))
           {
              $result=$this->get_value_byxml_php4($response['body']);
           }
		   else
		   {
		      $result=$this->get_value_byxml($response['body']); 
		   }
		}
		else
		{
           return false;
		}
		if($result['retcode']==0)
		{
           return true;
		}
		else
		{
           return false;
		}

	}
    function get_value_byxml($content)
    {
		$xml = simplexml_load_string($content);
		$encode = $this->getXmlEncode($content);
		if($xml && $xml->children()) 
		{
		   foreach ($xml->children() as $node)
		    {
				//有子节点
			   if($node->children()) 
			   {
					$k = $node->getName();
					$nodeXml = $node->asXML();
					$v = substr($nodeXml, strlen($k)+2, strlen($nodeXml)-2*strlen($k)-5);
					
			   }
			   else 
			   {
					$k = $node->getName();
					$v = (string)$node;
			   }
				
			   if($encode!="" && $encode != "UTF-8")
				{
					$k = iconv("UTF-8", $encode, $k);
					$v = iconv("UTF-8", $encode, $v);
				}
				
			   $res[$k]= $v;		
		   }
		   return $res;
		}
		else
		{
           return false;
		}
	}
	
	//解决PHP4老环境下不支持simplexml和 iconv功能的函数
    function get_value_byxml_php4($content)
    {
        $encode = $this->getXmlEncode($content);
        $result = str_replace('<?xml version=\"1.0\" encoding='.$encode.'?>','',$result);
        $p = xml_parser_create();
        xml_parse_into_struct($p, $result, $vals, $index);
        xml_parser_free($p);
        
        foreach($vals as $key => $value)
        {
            if($encode!="" && $encode != "UTF-8")
	          {
		        $k = mb_convert_encoding(strtolower($value['tag']), $encode, "UTF-8");
		        $v = mb_convert_encoding($value['value'], $encode, "UTF-8");								
	          }
	        else 
	         {
		        $k = strtolower($value['tag']);
		        $v = $value['value'];
	         }
     
	  
	        $res[$k]= $v;
	  
        }
        return $res;
     }


	//获取xml编码
	function getXmlEncode($xml) {
		$ret = preg_match ("/<?xml[^>]* encoding=\"(.*)\"[^>]* ?>/i", $xml, $arr);
		if($ret) {
			return strtoupper ( $arr[1] );
		} else {
			return "";
		}
	}
	
    
    
}

?>