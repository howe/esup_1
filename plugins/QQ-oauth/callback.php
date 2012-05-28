<?php
define ( 'IN_ECS', true );
require ('../../includes/init.php');
include_once ('../../includes/lib_transaction.php');
include_once ('../../includes/lib_passport.php');
require_once ("config.php");

function qq_callback() {
	//debug
	//print_r($_REQUEST);
	//print_r($_SESSION);
	

	if ($_REQUEST ['state'] == $_SESSION ['state']) //csrf
{
		$token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&" . "client_id=" . $_SESSION ["appid"] . "&redirect_uri=" . urlencode ( $_SESSION ["callback"] ) . "&client_secret=" . $_SESSION ["appkey"] . "&code=" . $_REQUEST ["code"];
		
		$response = file_get_contents ( $token_url );
		if (strpos ( $response, "callback" ) !== false) {
			$lpos = strpos ( $response, "(" );
			$rpos = strrpos ( $response, ")" );
			$response = substr ( $response, $lpos + 1, $rpos - $lpos - 1 );
			$msg = json_decode ( $response );
			if (isset ( $msg->error )) {
				echo "<h3>error:</h3>" . $msg->error;
				echo "<h3>msg  :</h3>" . $msg->error_description;
				exit ();
			}
		}
		
		$params = array ();
		parse_str ( $response, $params );
		
		//debug
		//print_r($params);
		

		//set access token to session
		$_SESSION ["access_token"] = $params ["access_token"];
	
	} else {
		echo ("The state does not match. You may be a victim of CSRF.");
	}
}

function get_openid() {
	$graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" . $_SESSION ['access_token'];
	
	$str = file_get_contents ( $graph_url );
	if (strpos ( $str, "callback" ) !== false) {
		$lpos = strpos ( $str, "(" );
		$rpos = strrpos ( $str, ")" );
		$str = substr ( $str, $lpos + 1, $rpos - $lpos - 1 );
	}
	
	$user = json_decode ( $str );
	if (isset ( $user->error )) {
		echo "<h3>error:</h3>" . $user->error;
		echo "<h3>msg  :</h3>" . $user->error_description;
		exit ();
	}
	
	//debug
	//echo("Hello " . $user->openid);
	

	//set openid to session
	$_SESSION ["openid"] = $user->openid;
}

//QQ登录成功后的回调地址,主要保存access token
qq_callback ();

//获取用户标示id
get_openid ();

//print_r($_SESSION);
function getUserInfo() {
	$getUserInfo = "https://graph.qq.com/user/get_user_info?" . "access_token=" . $_SESSION ['access_token'] . "&oauth_consumer_key=" . $_SESSION ["appid"] . "&openid=" . $_SESSION ["openid"] . "&format=json";
	
	$info = file_get_contents ( $getUserInfo );
	$arr = json_decode ( $info, true );
	
	return $arr;
}

//获取用户基本资料
$arr = getUserInfo ();
//print_r($arr);
$username = 'QQ'.substr($_SESSION ["openid"],0,10);//获取到的openid太长，取前面10位就够了
$alias = trim ( $arr ["nickname"] );
$password = time ();//随便取个密码，反正用不着
$gender = $arr ["gender"];
if ($gender == '男') {
	$sex = 1;
} elseif ($gender == '女') {
	$sex = 2;
} else {
	$sex = 0;
}
$email = $username . '@esup.cn';
function check_user($username) {
	$sql = "SELECT user_id FROM " . $GLOBALS ['ecs']->table ( "users" ) . " WHERE user_name='$username'";
	$row = $GLOBALS ['db']->getRow ( $sql );
	if (! empty ( $row )) {
		return true;
	} else {
		return false;
	}
}
if (check_user ( $username ) !== false) {
	$GLOBALS ['user']->set_session ( $username );
	$GLOBALS ['user']->set_cookie ( $username );
	$_SESSION['user_name'] = $username;
	update_user_info ();
	recalculate_price ();
	header ( "Location: /user.php\n" );
	exit ();
} else {
	$reg_date = time ();
	$password = md5 ( $password );
	$GLOBALS ['db']->query ( 'INSERT INTO ' . $GLOBALS ['ecs']->table ( "users" ) . "(`user_name`, `password`, `sex`, `reg_time`, `last_login`, `last_ip`, `alias` , `email`, `is_validated`) VALUES ('$username', '$password', '$sex', '$reg_date', '$reg_date', '$ip', '$alias', '$email','1')" );
	$GLOBALS ['user']->set_session ( $username );
	$GLOBALS ['user']->set_cookie ( $username );
	$_SESSION['user_name'] = $username;
	update_user_info ();
	recalculate_price ();
	header ( "Location: /user.php\n" );
	exit ();

}
//echo "<script>window.close();</script>";
?>
