<div class="user_form_box box thin_box full_box">
	<div class="hd"><h3></h3><div class="extra"></div></div>
	<div class="bd">
		<div class="user_form_wrapper clearfix">
			<form method="post" action="flow.php?step=login" class="user_form" id="user_login">
				<h1><?php echo $this->_var['lang']['login_title']; ?></h1>
				<div class="req"><b>*</b><?php echo $this->_var['lang']['required_indicates']; ?></div>
				<label for="username"><b><span class="req">*</span><?php echo $this->_var['lang']['label_username']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="username" value="" tabindex="1" id="username_login"/>
				</label>
				<label for="password"><b><span class="req">*</span><?php echo $this->_var['lang']['label_password']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="password" name="password" value="" tabindex="2" id="password_login"/><em><a href="user.php?act=get_password"><?php echo $this->_var['lang']['forgot_password']; ?></a></em>
				</label>
				<?php if ($this->_var['enabled_register_captcha']): ?>
				<label for="captcha"><b><span class="req">*</span><?php echo $this->_var['lang']['comment_captcha']; ?><?php echo $this->_var['lang']['colon']; ?></b>
					<input type="text" name="captcha" maxlength="4" size="6" tabindex="3" class="captcha" id="captcha_login"/><span><img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>" class="captcha tip" title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?is_login=1&'+Math.random()"></span>
				</label>
				<?php endif; ?>
				<fieldset class="checkbox_wrap label"><b>&nbsp;</b>
					<fieldset>
					<label for="remember"><input type="checkbox" name="remember" value="1" tabindex="3" class="checkbox" id="remember"/><?php echo $this->_var['lang']['remember']; ?></label>
					</fieldset>
				</fieldset>
				<div class="submit_wrap">
					<input type="submit" value="<?php echo $this->_var['lang']['btn_login']; ?>" tabindex="4" class="submit btn_special btn_login"/>
					<?php if ($this->_var['anonymous_buy'] == 1): ?><a href="flow.php?step=consignee&amp;direct_shopping=1" class="quick_buy button text_button"><span><?php echo $this->_var['lang']['direct_shopping']; ?></span></a><?php endif; ?>
					<input type="hidden" name="act" value="signin"/>
				</div>
			</form>
			<div class="extra">
				<h2><?php echo $this->_var['lang']['new_account']; ?></h2>
				<p><?php echo $this->_var['lang']['register_text']; ?></p>
				<p><a href="user.php?act=register" class="button"><span><?php echo $this->_var['lang']['register_now']; ?></span></a></p>
			</div>
		</div>
	</div>
</div>