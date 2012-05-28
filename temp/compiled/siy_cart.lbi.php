<p class="cart_info"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
<div class="list_wrapper">
<div class="list">
	<em class="list_arrow">&uarr;</em>
	<div class="loader">&nbsp;</div>
	<?php if ($this->_var['goods_list']): ?>
	<ul>
		<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
		<li class="clearfix<?php if (($this->_foreach['goods_list']['iteration'] <= 1)): ?> first<?php endif; ?>">
			<span class="info">
				<?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
				<a href="<?php 
$k = array (
  'name' => 'goods_info',
  'id' => $this->_var['goods']['goods_id'],
  'type' => 'url',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" class="photo" rel="external"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_thumb']; ?>"/></a>
				<a href="<?php 
$k = array (
  'name' => 'goods_info',
  'id' => $this->_var['goods']['goods_id'],
  'type' => 'url',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" class="name" rel="external"><?php echo $this->_var['goods']['goods_name']; ?></a>
				<span class="extra_info">
					<?php if ($this->_var['goods']['goods_attr']): ?><?php echo $this->_var['goods']['goods_attr']; ?><?php endif; ?>
					<?php if ($this->_var['goods']['is_shipping']): ?><em class="carriage_free"><?php echo $this->_var['lang']['carriage_free']; ?></em><?php endif; ?>
					<?php if ($this->_var['goods']['parent_id'] > 0): ?><em class="accessories"><?php echo $this->_var['lang']['accessories']; ?></em><?php endif; ?>
					<?php if ($this->_var['goods']['is_gift'] > 0): ?><em class="largess"><?php echo $this->_var['lang']['largess']; ?></em><?php endif; ?>
				</span>
				<?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
				<span class="name package_name"><?php echo $this->_var['goods']['goods_name']; ?></span>
				<span class="package_goods_list"><?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');$this->_foreach['package_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['package_goods_list']):
        $this->_foreach['package_goods_list']['iteration']++;
?><em><?php echo $this->_var['package_goods_list']['goods_name']; ?></em><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span>
				<?php else: ?>
				<?php echo $this->_var['goods']['goods_name']; ?>
				<?php endif; ?>
			</span>
			<span class="price"><?php echo $this->_var['goods']['goods_price']; ?> &times; <?php echo $this->_var['goods']['goods_number']; ?></span>
			<span class="action"><a href="javascript:cartDrop(<?php echo $this->_var['goods']['rec_id']; ?>);"><?php echo $this->_var['lang']['drop']; ?></a></span>
		</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
	<p class="total"><?php echo $this->_var['shopping_money']; ?></p>
	<p class="next"><a href="flow.php?step=cart" class="button brighter_button"><span><?php echo $this->_var['lang']['to_cart']; ?></span></a></p>
	<?php else: ?>
	<p class="cart_empty"><?php echo $this->_var['lang']['cart_empty']; ?></p>
	<?php endif; ?>
	<a href="javascript:closeCart();" class="close button"><span><?php echo $this->_var['lang']['close']; ?></span></a>
</div>
</div>