<?php if ($_GET['ajax'] != 1): ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title><?php if ($this->_var['action'] == 'login'): ?><?php echo $this->_var['lang']['login_title']; ?><?php endif; ?><?php if ($this->_var['action'] == 'register'): ?><?php echo $this->_var['lang']['register_title']; ?><?php endif; ?><?php if ($this->_var['action'] == 'get_password'): ?><?php echo $this->_var['lang']['get_password']; ?><?php endif; ?><?php if ($this->_var['action'] == 'qpassword_name'): ?><?php echo $this->_var['lang']['get_password']; ?><?php endif; ?><?php if ($this->_var['action'] == 'get_passwd_question'): ?><?php echo $this->_var['lang']['get_password']; ?><?php endif; ?><?php if ($this->_var['action'] == 'reset_password'): ?><?php echo $this->_var['lang']['reset_password']; ?><?php endif; ?> - <?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	
	<div class="user_form_box box thin_box full_box">
		<div class="hd"><h3></h3><div class="extra"></div></div>
		<div class="bd">
	<div class="user_form_wrapper clearfix" id="user_form_wrapper">
<?php endif; ?>
			<?php if ($this->_var['action'] == 'login'): ?>
			<form method="post" action="user.php" class="user_form" id="user_login">
				<h1><?php echo $this->_var['lang']['login_title']; ?></h1>
				<div class="req"><b>*</b><?php echo $this->_var['lang']['required_indicates']; ?></div>
				<label for="username_login"><b><span class="req">*</span><?php echo $this->_var['lang']['label_username']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="username" value="" tabindex="2" id="username_login"/>
				</label>
				<label for="password_login"><b><span class="req">*</span><?php echo $this->_var['lang']['label_password']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="password" name="password" value="" tabindex="3" id="password_login"/><em><a href="user.php?act=get_password"><?php echo $this->_var['lang']['forgot_password']; ?></a></em>
				</label>
				<?php if ($this->_var['enabled_captcha']): ?>
				<label for="captcha_login"><b><span class="req">*</span><?php echo $this->_var['lang']['comment_captcha']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="captcha" maxlength="4" size="6" tabindex="3" class="captcha" id="captcha_login"/><span><img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>" class="captcha tip" title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?is_login=1&'+Math.random()"></span>
				</label>
				<?php endif; ?>
				<fieldset class="checkbox_wrap label"><b>&nbsp;</b>
					<fieldset>
					<label for="remember_login"><input type="checkbox" name="remember" value="1" tabindex="3" class="checkbox" id="remember_login"/><?php echo $this->_var['lang']['remember']; ?></label>
					</fieldset>
				</fieldset>
				<div class="submit_wrap">
					<input type="submit" value="<?php echo $this->_var['lang']['btn_login']; ?>" tabindex="4" class="submit btn_special btn_login"/>
					<?php if ($_GET['ajax'] == 1): ?><a href="user.php?act=register" class="button text_button"><?php echo $this->_var['lang']['register_now']; ?></a><?php endif; ?>
					<input type="hidden" name="act" value="act_login"/>
					<input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>"/>
				</div>
			</form>
			<?php if ($_GET['ajax'] != 1): ?>
			<div class="extra">
				<h2><?php echo $this->_var['lang']['new_account']; ?></h2>
				<p><?php echo $this->_var['lang']['register_text']; ?></p>
				<p><a href="user.php?act=register" class="button"><span><?php echo $this->_var['lang']['register_now']; ?></span></a></p>
			</div>
			<?php endif; ?>
			<?php endif; ?>
			<?php if ($this->_var['action'] == 'register'): ?>
			<?php if ($this->_var['shop_reg_closed'] == 1): ?>
			<span class="closed"><?php echo $this->_var['lang']['shop_register_closed']; ?></span>
			<?php else: ?>
			<form method="post" action="user.php" class="user_form" id="user_reg">
				<h1><?php echo $this->_var['lang']['register_title']; ?></h1>
				<div class="req"><b>*</b><?php echo $this->_var['lang']['required_indicates']; ?></div>
				<label for="username"><b><span class="req">*</span><?php echo $this->_var['lang']['label_username']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="username" tabindex="2" id="username_reg"/>
				</label>
				<label for="email"><b><span class="req">*</span><?php echo $this->_var['lang']['email']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="email" tabindex="3" id="email_reg"/>
				</label>
				<label for="password"><b><span class="req">*</span><?php echo $this->_var['lang']['label_password']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="password" name="password" tabindex="4" id="password_reg"/>
				</label>
				<label for="confirm_password"><b><span class="req">*</span><?php echo $this->_var['lang']['label_confirm_password']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="password" name="confirm_password" tabindex="5" id="password_c_reg"/>
				</label>
				<?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
				<?php if ($this->_var['field']['id'] == 6): ?>
				<label for="sel_question"><b><?php if ($this->_var['field']['is_need']): ?><span class="req">*</span><?php endif; ?><?php echo $this->_var['lang']['passwd_question']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<select name="sel_question" tabindex="10"<?php if ($this->_var['field']['is_need']): ?> class="required"<?php endif; ?> id="sel_ques">
						<option value="0"><?php echo $this->_var['lang']['sel_question']; ?></option>
						<?php echo $this->html_options(array('options'=>$this->_var['passwd_questions'],'selected'=>$this->_var['profile']['passwd_question'])); ?>
					</select>
				</label>
				<label for="passwd_answer"<?php if ($this->_var['field']['is_need']): ?> id="pw_ques"<?php endif; ?>><b><?php if ($this->_var['field']['is_need']): ?><span class="req">*</span><?php endif; ?><?php echo $this->_var['lang']['passwd_answer']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="passwd_answer" value="<?php echo $this->_var['profile']['passwd_answer']; ?>" maxlength="20" tabindex="10"<?php if ($this->_var['field']['is_need']): ?> class="required"<?php endif; ?> id="pw_answer"/>
				</label>
				<?php else: ?>
				<label for="extend_field_<?php echo $this->_var['field']['id']; ?>"><b><?php if ($this->_var['field']['is_need']): ?><span class="req">*</span><?php endif; ?><?php echo $this->_var['field']['reg_field_name']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="extend_field<?php echo $this->_var['field']['id']; ?>" value="<?php echo $this->_var['field']['content']; ?>" tabindex="10"<?php if ($this->_var['field']['is_need']): ?> class="required"<?php endif; ?> id="extend_field_<?php echo $this->_var['field']['id']; ?>"/>
				</label>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php if ($this->_var['enabled_captcha']): ?>
				<label for="captcha"><b><span class="req">*</span><?php echo $this->_var['lang']['comment_captcha']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="captcha" maxlength="4" size="6" tabindex="11" class="captcha" id="captcha_reg"/>
					<span><img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>" class="captcha tip" title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?'+Math.random()"></span>
				</label>
				<?php endif; ?>
				<label for="agreement"><b>&nbsp;</b>
					<input type="checkbox" name="agreement" tabindex="12" value="1" checked="checked" id="agreement"/>
					<em><?php echo $this->_var['lang']['agreement']; ?></em>
				</label>
				<div class="submit_wrap">
					<input type="submit" name="Submit" value="<?php echo $this->_var['lang']['btn_register']; ?>" tabindex="14" class="submit btn_special btn_register"/>
					<input type="hidden" name="act" value="act_register"/>
					<input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>"/>
				</div>
			</form>
			<?php endif; ?>
			<div class="extra">
				<h2><?php echo $this->_var['lang']['login_now']; ?></h2>
				<p><?php echo $this->_var['lang']['login_text']; ?></p>
				<p><a href="user.php?act=login" class="button"><span><?php echo $this->_var['lang']['login_now']; ?></span></a></p>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['action'] == 'get_password'): ?>
			<script type="text/javascript">
			<?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
			var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</script>
			<form method="post" action="user.php" class="user_form" id="user_gpw">
				<h1><?php echo $this->_var['lang']['get_password']; ?></h1>
				<div class="req"><b>*</b><?php echo $this->_var['lang']['required_indicates']; ?></div>
				<label for="user_name"><b><span class="req">*</span><?php echo $this->_var['lang']['label_username']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="user_name" tabindex="2" id="username_gpw"/>
				</label>
				<label for="email"><b><span class="req">*</span><?php echo $this->_var['lang']['email']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="email" tabindex="3" id="email_gpw"/>
				</label>
				<div class="submit_wrap">
					<input type="submit" value="<?php echo $this->_var['lang']['submit']; ?>" tabindex="4" class="submit btn_special btn_submit"/>
					<input type="hidden" name="act" value="send_pwd_email"/>
				</div>
			</form>
			<div class="extra">
				<h2><?php echo $this->_var['lang']['get_password_tip']; ?></h2>
				<p><?php echo $this->_var['lang']['get_password_tip_text']; ?></p>
				<p><a href="user.php?act=qpassword_name" class="button"><span><?php echo $this->_var['lang']['get_password_by_question']; ?></span></a></p>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['action'] == 'qpassword_name'): ?>
			<form method="post" action="user.php" class="user_form" id="user_qpn">
				<h1><?php echo $this->_var['lang']['get_question_username']; ?></h1>
				<label for="user_name"><b><?php echo $this->_var['lang']['label_username']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="user_name" tabindex="2" id="username_qpn"/>
				</label>
				<div class="submit_wrap">
					<input type="submit" value="<?php echo $this->_var['lang']['submit']; ?>" tabindex="3" class="submit btn_special btn_submit"/>
					<input type="hidden" name="act" value="get_passwd_question"/>
				</div>
			</form>
			<div class="extra">
				<h2><?php echo $this->_var['lang']['get_password_tip']; ?></h2>
				<p><?php echo $this->_var['lang']['get_password_tip_text2']; ?></p>
				<p><a href="user.php?act=get_password" class="button"><span><?php echo $this->_var['lang']['get_password_by_mail']; ?></span></a></p>
			</div>
		<?php endif; ?>
			<?php if ($this->_var['action'] == 'get_passwd_question'): ?>
			<form method="post" action="user.php" class="user_form" id="user_gpq">
				<h1><?php echo $this->_var['lang']['input_answer']; ?></h1>
				<div class="req"><b>*</b><?php echo $this->_var['lang']['required_indicates']; ?></div>
				<p class="label"><b><?php echo $this->_var['lang']['passwd_question']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<em><?php echo $this->_var['passwd_question']; ?></em>
				</p>
				<label for="passwd_answer"><b><span class="req">*</span><?php echo $this->_var['lang']['passwd_answer']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="passwd_answer" tabindex="2" id="pw_answer"/>
				</label>
				<?php if ($this->_var['enabled_captcha']): ?>
				<label for="captcha"><b><span class="req">*</span><?php echo $this->_var['lang']['comment_captcha']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="captcha" maxlength="4" size="6" tabindex="3" class="captcha" id="captcha_gpq"/><span><img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>" class="captcha tip" title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?is_login=1&'+Math.random()"></span>
				</label>
				<?php endif; ?>
				<div class="submit_wrap">
					<input type="submit" value="<?php echo $this->_var['lang']['submit']; ?>" tabindex="4" class="submit btn_special btn_submit"/>
					<input type="hidden" name="act" value="check_answer"/>
				</div>
			</form>
			<div class="extra">
				<h2><?php echo $this->_var['lang']['get_password_tip']; ?></h2>
				<p><?php echo $this->_var['lang']['get_password_tip_text2']; ?></p>
				<p><a href="user.php?act=get_password" class="button"><span><?php echo $this->_var['lang']['get_password_by_mail']; ?></span></a></p>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['action'] == 'reset_password'): ?>
			<script type="text/javascript">
			<?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
			var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</script>
			<form action="user.php" method="post" class="user_form" id="user_rpw">
				<h1><?php echo $this->_var['lang']['reset_password']; ?></h1>
				<div class="req"><b>*</b><?php echo $this->_var['lang']['required_indicates']; ?></div>
				<label for="new_password"><b><span class="req">*</span><?php echo $this->_var['lang']['new_password']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="password" name="new_password" tabindex="1" value="" id="password_rpw"/>
				</label>
				<label for="confirm_password"><b><span class="req">*</span><?php echo $this->_var['lang']['confirm_password']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="password" name="confirm_password" tabindex="2" value="" id="password_c_rpw"/>
				</label>
				<div class="submit_wrap">
					<input type="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" tabindex="4" class="submit btn_special btn_submit"/>
					<input type="hidden" name="act" value="act_edit_password"/>
					<input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>"/>
					<input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>"/>
				</div>
			</form>
			<div class="extra">
				<h2><?php echo $this->_var['lang']['get_password_tip']; ?></h2>
				<p><?php echo $this->_var['lang']['get_password_tip_text3']; ?></p>
			</div>
			<?php endif; ?>
<?php if ($_GET['ajax'] != 1): ?>
		</div>
	
	</div>
		</div>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html><?php endif; ?>