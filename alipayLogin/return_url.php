<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.2
 * 日期：2011-03-25
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 该页面称作“页面跳转同步通知页面”
 * 可放入HTML等美化页面的代码和商户业务逻辑处理程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数AlipayFunction.logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */
 
//header('Content-Type: text/html; charset=UTF-8');
define('IN_ECS', true);
session_start();
require('../includes/init.php');
include_once('../includes/lib_transaction.php');
include_once('../includes/lib_passport.php');
require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");


//计算得出通知验证结果
$alipayNotify = new AlipayNotify($aliapy_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//执行商户的业务程序
	$alipay_user_id          = $_GET['user_id']; //支付宝用户ID
	$_SESSION['alipay_token']= $_GET['token']; //判断是否是支付宝快捷登录的session值，非常重要
	$email 					 = $_GET['email']; //返回真实邮箱
	$target_url 			 = $_GET['target_url'];//如果是一淘传值过来的，那么此参数不为一个url，否则为空
	if(isset($alipay_user_id)){
		//$new_real_name = $_GET['real_name']; //获取支付宝用户真实姓名
		$username = 'alipay_'.$alipay_user_id;
		//if(empty($new_real_name)){ //如果不存在真实姓名
		//	$username = "支付宝会员<span style=display:none;>".$alipay_user_id."</span>";
		//}else{
		//	$username = $new_real_name."<span style=display:none;>".$alipay_user_id."</span>";
		//}
		$alias = 'alipay_'.$alipay_user_id;
    	$password=time();//创建密码，无用
   		if(empty($email)){
			$email='alipay_'.$alipay_user_id.'@esup.cn';//支付宝如果没有返回邮箱，自己定义， 其他的可以根据返回情况而定
		}
        
		/* 检测用户email是否已经存在 */
  		if (check_user($username)){
 			
			$GLOBALS['user']->set_session($username);/* 设置登录session */
			$GLOBALS['user']->set_cookie($username);
			if(!empty($target_url)){
				die("<script>window.location.href='".$target_url."';</script>");
			}else{
				die("<script>window.location.href='flow.php?step=cart';</script>");//跳转(改为自己网站的购物车路径)
			}
			
   		}else{
			$reg_date = time();
			$ip = real_ip();
			/*用户数据插入数据库*/
			$GLOBALS['db']->query('INSERT INTO ' . $GLOBALS['ecs']->table("users") . "(`email`, `user_name`, `password`, `reg_time`, `last_login`, `last_ip`, `alias`, `is_validated`) VALUES ('$email', '$username', '$password', '$reg_date', '$reg_date', '$ip','$alias','1')");
			   
			$GLOBALS['user']->set_session($username);/* 设置登录session */
			$GLOBALS['user']->set_cookie($username);/* 设置登录cookie */
			if(!empty($target_url)){
				die("<script>window.location.href='".$target_url."';</script>");
			}else{
				die("<script>window.location.href='flow.php?step=cart';</script>");//跳转(改为自己网站的购物车路径)
			}
		}
	}else{
	  echo 'fail';
	  exit;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}else {
   //验证失败
   //如要调试，请看alipay_notify.php页面的return_verify函数，比对sign和mysign的值是否相等，或者检查$veryfy_result有没有返回true
    echo "验证失败";
}
	
/*检测用户名是否存在*/	
function check_user($username){
	$sql = "SELECT user_id FROM  " . $GLOBALS['ecs']->table('users'). " WHERE user_name='$username'";
    $row = $GLOBALS['db']->getRow($sql);
	
   if (!empty($row)){
    return true;
   }else{
    return false;
   }
}
?>