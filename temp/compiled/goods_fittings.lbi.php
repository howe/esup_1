<?php if ($this->_var['fittings']): ?>
<div class="goods_fittings box" id="fittings">
	<div class="hd"><h3><?php echo $this->_var['lang']['fittings']; ?></h3><div class="extra"><em><?php 
$k = array (
  'name' => 'count',
  'array' => $this->_var['fittings'],
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
			<?php $_from = $this->_var['fittings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_89204700_1337677871');$this->_foreach['fittings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fittings']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_89204700_1337677871']):
        $this->_foreach['fittings']['iteration']++;
?>
			<li<?php if (($this->_foreach['fittings']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?> data="id:'<?php echo $this->_var['goods_0_89204700_1337677871']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['goods_0_89204700_1337677871']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_89204700_1337677871']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_0_89204700_1337677871']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_89204700_1337677871']['goods_name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods_0_89204700_1337677871']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_89204700_1337677871']['goods_name']); ?>" class="name"><?php echo $this->_var['goods_0_89204700_1337677871']['short_name']; ?></a>
					<em class="price fittings"><?php echo $this->_var['goods_0_89204700_1337677871']['fittings_price']; ?></em>
				</span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>