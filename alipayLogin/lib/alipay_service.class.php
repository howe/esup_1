<?php
/* *
 * 类名：AlipayService
 * 功能：支付宝各接口构造类
 * 详细：构造支付宝各接口请求参数
 * 版本：3.2
 * 日期：2011-03-25
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。
 */

require_once("alipay.function.php");
require_once("alipay_submit.class.php");
class AlipayService {
	
	var $aliapy_config;
	/**
	 *支付宝网关地址（新）
	 */
	var $alipay_gateway_new = 'https://mapi.alipay.com/gateway.do?';
	/**
	 *支付宝网关地址（旧）
	 */
	var $alipay_gateway_old = 'https://www.alipay.com/cooperate/gateway.do?';

	function __construct($aliapy_config){
		$this->aliapy_config = $aliapy_config;
	}
    function AlipayService($aliapy_config) {
    	$this->__construct($aliapy_config);
    }
	/**
     * 构造快捷登录接口
     * @param $para_temp 请求参数数组
     * @return 表单提交HTML信息
     */
	function alipay_auth_authorize($para_temp) {
		
		//增加基本配置参数
		$para_temp['service'] = 'alipay.auth.authorize';
		$para_temp['target_service'] = 'user.auth.quick.login';
		$para_temp['partner'] = trim($this->aliapy_config['partner']);
		$para_temp['return_url'] = trim($this->aliapy_config['return_url']);
		$para_temp['_input_charset'] = trim(strtolower($this->aliapy_config['input_charset']));
		
		$button_name = "支付宝快捷登录";
		//生成表单提交HTML文本信息
		$alipaySubmit = new AlipaySubmit();
		$html_text = $alipaySubmit->buildForm($para_temp, $this->alipay_gateway_new, "get", $button_name,$this->aliapy_config);

		return $html_text;
	}
	
	/**
     * 用于防钓鱼，调用接口query_timestamp来获取时间戳的处理函数
     * 注意：若要使用远程HTTP获取数据，必须开通SSL服务，该服务请找到php.ini配置文件设置开启，建议与您的网络管理员联系解决。
     * return 时间戳字符串
	 */
	function query_timestamp() {
		$url = $this->alipay_gateway_new."service=query_timestamp&partner=".trim($this->aliapy_config['partner']);
		$encrypt_key = "";
		//获取远程数据
		$xml_data = getHttpResponse($url);
		//解析XML数据
		$para_data = @XML_unserialize($xml_data);
		//获取时间戳
		$encrypt_key = $para_data['alipay']['response']['timestamp']['encrypt_key'];
		
		return $encrypt_key;
	}
	
	/**
     * 构造支付宝其他接口
     * @param $para_temp 请求参数数组
     * @return 表单提交HTML信息/支付宝返回XML处理结果
     */
	function alipay_interface($para_temp) {
		//增加基本配置参数
		$para_temp['service'] = 'alipay_interface';
		$para_temp['partner'] = trim($this->aliapy_config['partner']);
		$para_temp['_input_charset'] = trim(strtolower($this->aliapy_config['input_charset']));

		//获取远程数据
		$alipaySubmit = new AlipaySubmit();
		$html_text = "";
		//请根据不同的接口特性，选择一种请求方式
		//1.构造表单提交HTML数据:
		//$alipaySubmit->buildForm($para_temp, $this->alipay_gateway, "get", $button_name,$this->aliapy_config);
		//2.构造模拟远程HTTP的POST请求，获取支付宝的返回XML处理结果:
		//注意：若要使用远程HTTP获取数据，必须开通SSL服务，该服务请找到php.ini配置文件设置开启，建议与您的网络管理员联系解决。
		//$alipaySubmit->sendPostInfo($para_temp, $this->alipay_gateway, $this->aliapy_config);
		
		return $html_text;
	}
}
?>