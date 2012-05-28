<?php if ($this->_var['collection_goods']): ?>
<h2 class="title"><span><?php echo $this->_var['lang']['label_collection']; ?></span><em class="extra"><a href="user.php?act=collection_list" title="<?php echo $this->_var['lang']['manage']; ?><?php echo $this->_var['lang']['label_collection']; ?>" rel="external"><?php echo $this->_var['lang']['manage']; ?></a></em></h2>
<div class="goods_slider">
	<div class="goods_list display_grid" id="goods_slider_cg">
	<ul>
		<?php $_from = $this->_var['collection_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_55488300_1337678773');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_55488300_1337678773']):
        $this->_foreach['goods']['iteration']++;
?>
		<li>
			<span class="photo">
				<a href="<?php echo $this->_var['goods_0_55488300_1337678773']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_55488300_1337678773']['name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_0_55488300_1337678773']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_55488300_1337678773']['name']); ?>"/></a>
			</span>
			<span class="info">
				<a href="<?php echo $this->_var['goods_0_55488300_1337678773']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_55488300_1337678773']['name']); ?>" class="name"><?php echo $this->_var['goods_0_55488300_1337678773']['short_name']; ?></a>
				<em class="price"><?php if ($this->_var['goods_0_55488300_1337678773']['promote_price']): ?><?php echo $this->_var['goods_0_55488300_1337678773']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_55488300_1337678773']['shop_price']; ?><?php endif; ?></em><?php if ($this->_var['goods_0_55488300_1337678773']['promote_price']): ?><span class="promo" title="<?php echo htmlspecialchars($this->_var['goods_0_55488300_1337678773']['shop_price']); ?> &gt; <?php echo htmlspecialchars($this->_var['goods_0_55488300_1337678773']['promote_price']); ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
			</span>
			<span class="actions">
				<a href="javascript:buy(<?php echo $this->_var['goods_0_55488300_1337678773']['id']; ?>)" class="button"><span><?php echo $this->_var['lang']['add_to_cart']; ?></span></a>
			</span>
		</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
	</div>
</div>
<?php endif; ?>