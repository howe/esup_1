<?php if ($this->_var['brand_list']): ?>
<div class="brands box">
	<div class="hd"><h3><?php echo $this->_var['lang']['brands_list']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<div class="vertical_slider_wrapper">
		<div class="vertical_slider">
		<ul>
			<?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brand'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brand']['iteration']++;
?>
			<?php if (($this->_foreach['brand']['iteration'] - 1) < $this->_var['option']['index_brands_number']): ?>
			<?php if ($this->_var['brand']['brand_logo']): ?>
			<li class="image<?php if (($this->_foreach['brand']['iteration'] <= 1)): ?> first<?php endif; ?>"><a href="<?php echo $this->_var['brand']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?>"><img src="<?php echo $this->_var['option']['static_path']; ?>data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" alt="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?>"/></a></li>
			<?php else: ?>
			<li class="text<?php if (($this->_foreach['brand']['iteration'] <= 1)): ?> first<?php endif; ?>"><a href="<?php echo $this->_var['brand']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?>"><?php echo $this->_var['brand']['brand_name']; ?></a></li>
			<?php endif; ?>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		</div>
		</div>
		<div class="bottom_button"><a href="brand.php" class="btn_s4_b"><?php echo $this->_var['lang']['all_brand']; ?></a></div>
	</div>
</div>
<?php endif; ?>