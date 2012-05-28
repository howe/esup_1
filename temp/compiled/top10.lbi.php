<?php if ($this->_var['top_goods']): ?>
<div class="top_goods box">
	<div class="hd"><h3><?php echo $this->_var['lang']['top10']; ?></h3><div class="extra"></div></div>
	<div class="bd goods_list">
		<ul>
			<?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_83894200_1328330802');$this->_foreach['top_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_83894200_1328330802']):
        $this->_foreach['top_goods']['iteration']++;
?>
			<?php if (($this->_foreach['top_goods']['iteration'] - 1) < $this->_var['option']['top_number']): ?>
			<li<?php if (($this->_foreach['top_goods']['iteration'] <= 1)): ?> class="first"<?php endif; ?><?php if (($this->_foreach['top_goods']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?> data="id:'<?php echo $this->_var['goods_0_83894200_1328330802']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['goods_0_83894200_1328330802']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_83894200_1328330802']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_0_83894200_1328330802']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_83894200_1328330802']['goods_name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods_0_83894200_1328330802']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_83894200_1328330802']['goods_name']); ?>" class="name"><em><?php echo $this->_foreach['top_goods']['iteration']; ?>.&nbsp;</em><?php echo $this->_var['goods_0_83894200_1328330802']['short_name']; ?></a>
					<em class="price"><?php if ($this->_var['goods_0_83894200_1328330802']['promote_price']): ?><?php echo $this->_var['goods_0_83894200_1328330802']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_83894200_1328330802']['price']; ?><?php endif; ?></em><?php if ($this->_var['goods_0_83894200_1328330802']['promote_price']): ?><span class="promo" title="<?php echo htmlspecialchars($this->_var['goods_0_83894200_1328330802']['shop_price']); ?> &gt; <?php echo htmlspecialchars($this->_var['goods_0_83894200_1328330802']['promote_price']); ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
				</span>
			</li>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>