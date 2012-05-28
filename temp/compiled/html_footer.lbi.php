<?php echo $this->_var['render']['before_html_footer']; ?>
<?php if ($_SERVER['SERVER_NAME'] == 'demo.shopiy.com'): ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/jquery.js"%3E%3C/script%3E'))</script>
<?php else: ?>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/jquery.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/lang.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/global.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/init.js"></script>
<?php if ($_SESSION['flow_type'] && $_SESSION['flow_type'] != '0'): ?><script type="text/javascript">var ajax_cart_disabled = true;</script><?php endif; ?>
<?php if ($this->_var['option']['goods_popup_menu_enabled']): ?><script type="text/javascript">var goods_popup_menu_enabled = true;</script><?php endif; ?>
<?php if ($this->_var['pname'] == 'index'): ?>
<script type="text/javascript">
var order_input = $('#order_query input[name="order_sn"]');
var vote_form = $('#vote form');
var subscription_email = $('#subscription input[name="email"]');
$(document).ready(function() {
	$('.slider').Slidiy();
	$('.col_main .goods_list').append(loader);
	$('.selector a').click(function() {
		$(this).addClass('current').siblings().removeClass('current');
		$(this).parents('.box').find('.loader').css({visibility:'visible'}).fadeTo(0, 1000);
	});
	$('.col_main .selector').css({visibility:'visible'}).hoverscroll({
		width: ($('html.wide').length > 0)?550:350,
		height: 31
	});

	$('#order_query').append(loader).append(result);
	order_input.tipsy({
		trigger:'manual',gravity:'s',fade: true
	}).focusout(function() {
		$(this).tipsy('hide');
	}).keypress(function() {
		$(this).tipsy('hide');
	});
	$('#order_query input[type="button"]').click(function() {
		orderQuery();
	});

	$('#vote').append(loader).append(result);
	vote_form.tipsy({
		trigger:'manual',gravity:'s',fade: true
	}).focusout(function() {
		$(this).tipsy('hide');
	});
	$('#vote input[name="option_id"]').change(function() {
		vote_form.tipsy('hide');
	});

	$('#subscription').append(loader).append(result);
	subscription_email.tipsy({
		trigger:'manual',gravity:'s',fade: true
	}).focusout(function() {
		$(this).tipsy('hide');
	}).keypress(function() {
		$(this).tipsy('hide');
	});
});
</script>
<?php endif; ?>
<?php if ($this->_var['option']['compare_enabled'] && ( $this->_var['pname'] == 'category' || $this->_var['pname'] == 'search' || $this->_var['pname'] == 'brand' )): ?>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/compare.js"></script>
<?php endif; ?>
<?php if ($this->_var['pname'] == 'goods'): ?>
<script type="text/javascript">
var goodsId = <?php echo $this->_var['goods_id']; ?>;
$(document).ready(function() {
	$('#goods_info').Tabiy();
	<?php if ($this->_var['specification']): ?>
	$('.properties').Formiy();
	$('.properties dl').tipsy({gravity: 'e',fade: true,html:true});
	$('.properties label').tipsy({gravity: 's',fade: true,html:true});
	<?php endif; ?>
	$('#gallery .thumb_inner').mSlidiy({num:5,step:3});
	$('#purchase_form').ChangePriceSiy();
	<?php if ($this->_var['option']['gallery_mode'] == 'color_box'): ?>
	$('#gallery a').colorbox();
	<?php endif; ?>
});
</script>
<?php endif; ?>
<?php if ($this->_var['pname'] == 'flow'): ?>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/flow.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('input[name^="goods_number"]').tipsy({trigger:'manual',gravity:'sw',fade: true});
	$('input[name^="goods_number"]').keypress(function(){
		$(this).tipsy('show');
	});
	$('input[name^="goods_number"]').focusout(function(){
		$(this).tipsy('hide');}
	);
	<?php if ($this->_var['step'] == 'login'): ?>validLogin();<?php endif; ?>
	$('#cart').mouseenter(function(){
		$('#cart .list_wrapper').show();
	});
	$('#cart').mouseleave(function(){
		$('#cart .list_wrapper').hide();
	});
	$('.cart_list li').hover(function(){
		$(this).addClass('hover');
	}, function(){
		$(this).removeClass('hover');
	});
});
<?php if ($this->_var['step'] == 'checkout'): ?>var action = 'checkout';<?php endif; ?>
</script>
<?php endif; ?>
<?php if ($this->_var['pname'] == 'user' && ( $this->_var['action'] == 'login' || $this->_var['action'] == 'register' || $this->_var['action'] == 'get_password' || $this->_var['action'] == 'qpassword_name' || $this->_var['action'] == 'get_passwd_question' || $this->_var['action'] == 'reset_password' )): ?>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/user.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	<?php if ($this->_var['action'] == 'login'): ?>validLogin();<?php endif; ?>
	<?php if ($this->_var['action'] == 'register'): ?>validRegister();<?php endif; ?>
	<?php if ($this->_var['action'] == 'get_password'): ?>validGetpw();<?php endif; ?>
	<?php if ($this->_var['action'] == 'qpassword_name'): ?>validQpn();<?php endif; ?>
	<?php if ($this->_var['action'] == 'get_passwd_question'): ?>validGpq();<?php endif; ?>
	<?php if ($this->_var['action'] == 'reset_password'): ?>validRpw();<?php endif; ?>
});
</script>
<?php endif; ?>
<?php if ($this->_var['pname'] == 'exchange' && $_GET['id'] > 0): ?>
<script type="text/javascript">
$(document).ready(function() {
	$('.properties').Formiy();
	$('.properties dl').tipsy({gravity: 'e',fade: true,html:true});
	$('.properties label').tipsy({gravity: 's',fade: true,html:true});
	$('#gallery .thumb_inner').mSlidiy({num:5,step:3});
	<?php if ($this->_var['option']['gallery_mode'] == 'color_box'): ?>
	$('#gallery a').colorbox();
	<?php endif; ?>
});
</script>
<?php endif; ?>
<?php if ($this->_var['pname'] == 'group_buy' && $_GET['id'] > 0): ?>
<script type="text/javascript">
$(document).ready(function() {
	$('.properties').Formiy();
	$('.properties dl').tipsy({gravity: 'e',fade: true,html:true});
	$('.properties label').tipsy({gravity: 's',fade: true,html:true});
});
</script>
<?php endif; ?>
<?php if ($this->_var['pname'] == 'snatch'): ?>
<script type="text/javascript">
$(document).ready(function() {
	setInterval('newPrice(' + <?php echo $this->_var['id']; ?> + ')', 8000);
});
</script>
<?php endif; ?>
<?php if ($this->_var['pname'] == 'activity'): ?>
<script type="text/javascript">
$(document).ready(function() {
	var link_item = $(location.hash);
	if (link_item.length == 1 && link_item.siblings().length > 0) {
		link_item.addClass('current').siblings().hide();
		link_item.parent().append('<a href="javascript:void(0);" class="show_all button bright_button"><span>'+lang.show_all+'</span></a>');
		link_item.parent().find('.show_all').click(function(){
			link_item.addClass('bright_current').siblings().show();
			$(this).hide();
		});
	};
});
</script>
<?php endif; ?>
<?php echo $this->_var['render']['after_html_footer']; ?>
<?php echo $this->_var['stats_code']; ?>
<?php echo $this->fetch('library/kefu.lbi'); ?>