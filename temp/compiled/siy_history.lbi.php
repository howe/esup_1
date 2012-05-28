<?php if ($this->_var['goods']): ?>
<div id="history" class="history box">
	<div class="hd">
		<h3><?php echo $this->_var['lang']['view_history']; ?></h3>
		<div class="extra">
			<a href="javascript:clearHistory()" title="<?php echo $this->_var['lang']['clear']; ?><?php echo $this->_var['lang']['view_history']; ?>" class="tip"><?php echo $this->_var['lang']['clear']; ?></a>
		</div>
	</div>
	<div class="bd goods_list">
		<ul>
			<?php $_from = $this->_var['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_28482500_1328330823');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_28482500_1328330823']):
        $this->_foreach['goods']['iteration']++;
?>
			<li<?php if (($this->_foreach['goods']['iteration'] <= 1)): ?> class="first"<?php endif; ?> data="id:'<?php echo $this->_var['goods_0_28482500_1328330823']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['goods_0_28482500_1328330823']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_28482500_1328330823']['name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_0_28482500_1328330823']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_28482500_1328330823']['name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods_0_28482500_1328330823']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_28482500_1328330823']['name']); ?>" class="name"><?php echo $this->_var['goods_0_28482500_1328330823']['short_name']; ?></a>
					<em class="price"><?php if ($this->_var['goods_0_28482500_1328330823']['promote_price']): ?><?php echo $this->_var['goods_0_28482500_1328330823']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_28482500_1328330823']['shop_price']; ?><?php endif; ?></em><?php if ($this->_var['goods_0_28482500_1328330823']['promote_price']): ?><span class="promo" title="<?php echo htmlspecialchars($this->_var['goods_0_28482500_1328330823']['shop_price']); ?> &gt; <?php echo htmlspecialchars($this->_var['goods_0_28482500_1328330823']['promote_price']); ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
				</span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>