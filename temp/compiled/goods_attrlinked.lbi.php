<?php $_from = $this->_var['attribute_linked']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'linked');if (count($_from)):
    foreach ($_from AS $this->_var['linked']):
?>
<?php if ($this->_var['linked']['goods']): ?>
<div class="goods_attrlinked box">
	<div class="hd"><h3><?php echo sub_str($this->_var['linked']['title'],11); ?></h3><div class="extra"></div></div>
	<div class="bd goods_list">	
		<ul>
			<?php $_from = $this->_var['linked']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'linked_goods_data');$this->_foreach['linked_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['linked_goods']['total'] > 0):
    foreach ($_from AS $this->_var['linked_goods_data']):
        $this->_foreach['linked_goods']['iteration']++;
?>
			<li<?php if (($this->_foreach['linked_goods']['iteration'] <= 1)): ?> class="first"<?php endif; ?> data="id:'<?php echo $this->_var['linked_goods_data']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['linked_goods_data']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['linked_goods_data']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['linked_goods_data']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['linked_goods_data']['goods_name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['linked_goods_data']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['linked_goods_data']['goods_name']); ?>" class="name"><?php echo $this->_var['linked_goods_data']['short_name']; ?></a>
					<em class="price"><?php if ($this->_var['linked_goods_data']['promote_price']): ?><?php echo $this->_var['linked_goods_data']['promote_price']; ?><?php else: ?><?php echo $this->_var['linked_goods_data']['shop_price']; ?><?php endif; ?></em><?php if ($this->_var['linked_goods_data']['promote_price']): ?><span class="promo" title="<?php echo $this->_var['linked_goods_data']['shop_price']; ?> &gt; <?php echo $this->_var['linked_goods_data']['promote_price']; ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
				</span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>