<?php
define ( 'IN_ECS', true );
require ('../../includes/init.php');
include_once ('../../includes/lib_transaction.php');
include_once ('../../includes/lib_passport.php');
//session_start();


include_once ('config.php');
include_once ('saetv2.ex.class.php');

$o = new SaeTOAuthV2 ( WB_AKEY, WB_SKEY );

if (isset ( $_REQUEST ['code'] )) {
	$keys = array ();
	$keys ['code'] = $_REQUEST ['code'];
	$keys ['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken ( 'code', $keys );
	} catch ( OAuthException $e ) {
	}
}

if ($token) {
	$_SESSION ['token'] = $token;
	setcookie ( 'weibojs_' . $o->client_id, http_build_query ( $token ) );
	$c = new SaeTClientV2 ( WB_AKEY, WB_SKEY, $_SESSION ['token'] ['access_token'] );
	$ms = $c->home_timeline (); // done
	$uid_get = $c->get_uid ();
	$uid = $uid_get ['uid'];
	$user_message = $c->show_user_by_id ( $uid ); //根据ID获取用户等基本信息
	if ($user_message ['screen_name'] !== "") {
		$username = 'weibo' . $user_message ['id'];
		$alias = $user_message ['screen_name'];
		$password = time ();
		$gender = $user_message ['gender'];
		
		if ($gender == 'm') {
			$sex = 1;
		} elseif ($gender == 'f') {
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
			update_user_info ();
			recalculate_price ();
			header ( "Location: /user.php\n" );
			exit ();
		} else {
			$reg_date = time ();
			$password = md5 ( $password );
			$GLOBALS ['db']->query ( 'INSERT INTO ' . $GLOBALS ['ecs']->table ( "users" ) . "(`user_name`, `password`, `sex`, `reg_time`, `last_login`, `last_ip`,`alias`, `email`, `is_validated`) VALUES ('$username', '$password', '$sex', '$reg_date', '$reg_date', '$ip','$alias', '$email','1')" );
			$GLOBALS ['user']->set_session ( $username );
			$GLOBALS ['user']->set_cookie ( $username );
			update_user_info ();
			recalculate_price ();
			header ( "Location: /user.php\n" );
			exit ();
		
		}
	
	} else {
		echo 'fail';
		exit ();
	}

} else {
	
	echo '授权失败。';
}
?>
