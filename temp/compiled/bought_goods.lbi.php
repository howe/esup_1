<?php if ($this->_var['bought_goods']): ?>
<div class="bought-goods box">
	<div class="hd"><h3><?php echo $this->_var['lang']['shopping_and_other']; ?></h3><div class="extra"></div></div>
	<div class="bd goods_list">
		<ul>
			<?php $_from = $this->_var['bought_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_90358600_1337677871');$this->_foreach['bought_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bought_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_90358600_1337677871']):
        $this->_foreach['bought_goods']['iteration']++;
?>
			<li<?php if (($this->_foreach['bought_goods']['iteration'] <= 1)): ?> class="first"<?php endif; ?> data="id:'<?php echo $this->_var['goods_0_90358600_1337677871']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['goods_0_90358600_1337677871']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_90358600_1337677871']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_0_90358600_1337677871']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_90358600_1337677871']['goods_name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods_0_90358600_1337677871']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_90358600_1337677871']['goods_name']); ?>" class="name"><?php echo $this->_var['goods_0_90358600_1337677871']['short_name']; ?></a>
					<em class="price"><?php if ($this->_var['goods_0_90358600_1337677871']['formated_promote_price']): ?><?php echo $this->_var['goods_0_90358600_1337677871']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_90358600_1337677871']['shop_price']; ?><?php endif; ?></em><?php if ($this->_var['goods_0_90358600_1337677871']['formated_promote_price']): ?><span class="promo" title="<?php echo htmlspecialchars($this->_var['goods_0_90358600_1337677871']['shop_price']); ?> &gt; <?php echo htmlspecialchars($this->_var['goods_0_90358600_1337677871']['formated_promote_price']); ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
				</span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>