<?php if ($this->_var['related_goods']): ?>
<div class="goods_related box" id="related">
	<div class="hd"><h3><?php echo $this->_var['lang']['related_goods']; ?></h3><div class="extra"><em><?php 
$k = array (
  'name' => 'count',
  'array' => $this->_var['related_goods'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?></em></div></div>
	<div class="bd goods_list">	
		<ul>
			<?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');$this->_foreach['related_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['related_goods']['total'] > 0):
    foreach ($_from AS $this->_var['releated_goods_data']):
        $this->_foreach['related_goods']['iteration']++;
?>
			<li<?php if (($this->_foreach['related_goods']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?> data="id:'<?php echo $this->_var['goods']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['releated_goods_data']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['releated_goods_data']['goods_name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['releated_goods_data']['goods_name']); ?>" class="name"><?php echo $this->_var['releated_goods_data']['short_name']; ?></a>
					<em class="price"><?php if ($this->_var['releated_goods_data']['formated_promote_price']): ?><?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['releated_goods_data']['shop_price']; ?><?php endif; ?></em><?php if ($this->_var['releated_goods_data']['formated_promote_price']): ?><span class="promo" title="<?php echo $this->_var['releated_goods_data']['shop_price']; ?> &gt; <?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
				</span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>