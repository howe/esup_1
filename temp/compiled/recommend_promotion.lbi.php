<?php if ($this->_var['promotion_goods']): ?>
<div class="box promotion_goods special_goods">
	<div class="hd">
		<h3><?php echo $this->_var['lang']['promotion_goods']; ?></h3>
		<div class="extra">
		</div>
	</div>
	<div class="bd goods_list">
		<div class="goods_slider">
		<ul>
			<?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_75720300_1337677545');$this->_foreach['promotion_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_75720300_1337677545']):
        $this->_foreach['promotion_goods']['iteration']++;
?>
			<li<?php if (($this->_foreach['promotion_goods']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?> data="id:'<?php echo $this->_var['goods_0_75720300_1337677545']['id']; ?>'">
				<span class="time"><?php 
$k = array (
  'name' => 'promote_end_date',
  'id' => $this->_var['goods_0_75720300_1337677545']['id'],
  'format' => $this->_var['lang']['promote_end_date_format'],
  'format2' => 'Y-m-d-G-i-s',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?></span>
				<span class="photo">
					<a href="<?php echo $this->_var['goods_0_75720300_1337677545']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_75720300_1337677545']['name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_0_75720300_1337677545']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_75720300_1337677545']['name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods_0_75720300_1337677545']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_75720300_1337677545']['name']); ?>" class="name"><?php echo $this->_var['goods_0_75720300_1337677545']['short_style_name']; ?></a>
					<em class="price"><?php if ($this->_var['goods_0_75720300_1337677545']['promote_price']): ?><?php echo $this->_var['goods_0_75720300_1337677545']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_75720300_1337677545']['shop_price']; ?><?php endif; ?></em><?php if ($this->_var['goods_0_75720300_1337677545']['promote_price']): ?><span class="promo" title="<?php echo htmlspecialchars($this->_var['goods_0_75720300_1337677545']['shop_price']); ?> &gt; <?php echo htmlspecialchars($this->_var['goods_0_75720300_1337677545']['promote_price']); ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
				</span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		</div>
		<a href="search.php?intro=promotion" title="<?php echo $this->_var['lang']['more']; ?><?php echo $this->_var['lang']['promotion_goods']; ?>" class="more button brighter_button"><span><?php echo $this->_var['lang']['more']; ?></span></a>
	</div>
</div>
<?php endif; ?>