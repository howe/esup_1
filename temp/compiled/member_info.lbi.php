<?php if ($this->_var['user_info']): ?>
<em><?php echo $this->_var['lang']['hello']; ?>&nbsp;<?php if ($this->_var['user_info']['alias']): ?><?php echo $this->_var['user_info']['alias']; ?><?php else: ?><?php echo sub_str($this->_var['user_info']['username'],15); ?><?php endif; ?></em>
<a href="user.php" class="gotouser"><?php echo $this->_var['lang']['edit_user_info']; ?></a>
<a href="user.php?act=logout" class="logout"><?php echo $this->_var['lang']['user_logout']; ?></a>
<?php else: ?>
<em><?php echo $this->_var['lang']['welcome_to']; ?><?php echo $this->_var['shop_name']; ?><?php echo $this->_var['lang']['excla']; ?></em>
<a href="user.php?act=register" class="register"><?php echo $this->_var['lang']['reg_free']; ?></a>
<a href="user.php?act=login" class="login<?php if ($_GET['act'] != 'login' && $_GET['step'] != 'login'): ?> quick_login<?php endif; ?>"><?php echo $this->_var['lang']['login']; ?></a>
&nbsp;&nbsp;&nbsp;&nbsp;
合作网站帐号登录&nbsp;
<a href="plugins/weibo-oauth/" title="新浪微博登录"><img src="http://www.sinaimg.cn/blog/developer/wiki/16x16.png" height="16"></a>
<a href="plugins/QQ-oauth/" title="QQ登录"><img src="http://qzonestyle.gtimg.cn/qzone/vas/opensns/res/img/Connect_logo_1.png" height="16"></a>
<a href="alipayLogin/auth_authorize.php?type=user" title="支付宝快捷登录"><img src="http://www.esup.cn/images/AliPayLogoBig.png" height="16"></a>
<?php endif; ?>