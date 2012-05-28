<?php 
$k = array (
  'name' => 'load_user_info',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>
<p class="user_status">
	<span class="hello"><?php echo $this->_var['lang']['hello']; ?><em><?php echo $this->_var['info']['username']; ?></em></span>
	<span class="log"><?php echo $this->_var['lang']['last_time']; ?><em><?php echo $this->_var['info']['last_time']; ?></em></span>
	<span class="rank"><?php echo $this->_var['rank_name']; ?><?php echo $this->_var['next_rank_name']; ?></span>
	<?php if ($this->_var['info']['is_validate'] == 0): ?><span class="email_valid"><?php echo $this->_var['lang']['not_validated']; ?><a href="javascript:sendHashMail()"><?php echo $this->_var['lang']['resend_hash_mail']; ?></a></span><?php endif; ?>
</p>
<?php if ($this->_var['user_notice']): ?><div class="shop_notice notice_box"><?php echo $this->_var['user_notice']; ?></div><?php endif; ?>
<div class="user_dashboard">
	<div class="item first">
		<a href="user.php?act=account_detail" class="item_inner"><span class="count"><em class="price"><?php echo $this->_var['siy_user_info']['surplus']; ?></em></span><em class="label"><?php echo $this->_var['lang']['your_surplus']; ?></em></a>
	</div>
	<div class="item">
		<?php if ($this->_var['option']['points_rule']): ?>
		<a href="user.php?act=transform_points" class="item_inner"><span class="count"><?php echo $this->_var['siy_user_info']['points']; ?></span><em class="label"><?php echo $this->_var['lang']['your_integral']; ?></em></a>
		<?php else: ?>
		<div class="item_inner"><span class="count"><?php echo $this->_var['siy_user_info']['points']; ?></span><em class="label"><?php echo $this->_var['lang']['your_integral']; ?></em></div>
		<?php endif; ?>
	</div>
	<div class="item third">
		<a href="user.php?act=bonus" class="item_inner"><span class="count"><?php echo $this->_var['siy_user_info']['bonus']; ?></span><em class="label"><?php echo $this->_var['lang']['your_bonus']; ?></em></a>
	</div>
	<div class="item">
		<a href="user.php?act=order_list" class="item_inner"><span class="count"><?php echo $this->_var['info']['order_count']; ?></span><em class="label"><?php echo $this->_var['lang']['last_month_order']; ?></em></a>
	</div>
</div>
<?php if ($this->_var['prompt'] || $this->_var['info']['shipped_order']): ?>
<div class="box">
	<div class="hd"><h3><?php echo $this->_var['lang']['your_notice']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<ul class="text_list">
			<?php $_from = $this->_var['prompt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['prompt_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prompt_item']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['prompt_item']['iteration']++;
?>
			<li<?php if (($this->_foreach['prompt_item']['iteration'] <= 1)): ?> class="first"<?php endif; ?>><?php echo $this->_var['item']['text']; ?></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<?php $_from = $this->_var['info']['shipped_order']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['shipped_order_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipped_order_item']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['shipped_order_item']['iteration']++;
?>
			<li<?php if (! $this->_var['prompt'] && ($this->_foreach['shipped_order_item']['iteration'] <= 1)): ?> class="first"<?php endif; ?>><?php echo $this->_var['lang']['please_received']; ?><a href="user.php?act=order_detail&order_id=<?php echo $this->_var['item']['order_id']; ?>"><?php echo $this->_var['item']['order_sn']; ?></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>
<div class="order_list box">
	<div class="hd"><h3><?php echo $this->_var['lang']['recent_orders']; ?></h3><div class="extra"><a href="user.php?act=order_list"><?php echo $this->_var['lang']['more']; ?></a></div></div>
	<div class="bd">
		<?php 
$k = array (
  'name' => 'user_orders',
  'number' => '5',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>
	</div>
</div>