<?php if ($this->_var['hot_goods']): ?>
<div class="hot_goods box">
	<div class="hd"><h3><?php echo $this->_var['lang']['top_exchange']; ?></h3><div class="extra"></div></div>
	<div class="bd goods_list">
		<ul>
			<?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['hot_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['hot_goods']['iteration']++;
?>
			<li<?php if (($this->_foreach['hot_goods']['iteration'] <= 1)): ?> class="first"<?php endif; ?> data="id:'<?php echo $this->_var['goods']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="name"><?php echo $this->_var['goods']['short_style_name']; ?></a>
					<em class="price discount"><span><?php echo $this->_var['lang']['exchange_integral']; ?></span><?php echo $this->_var['goods']['exchange_integral']; ?></em>
				</span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>