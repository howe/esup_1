<?php if ($this->_var['brands']['1'] || $this->_var['price_grade']['1'] || $this->_var['filter_attr_list']): ?>
<div class="filter box">
	<div class="hd"><h3><?php echo $this->_var['lang']['goods_filter']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<?php if ($this->_var['brands']['1']): ?>
		<dl class="first">
			<dt><?php echo $this->_var['lang']['brand']; ?><?php echo $this->_var['lang']['colon']; ?></dt>
			<dd><?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brands'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brands']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brands']['iteration']++;
?><a href="<?php echo $this->_var['brand']['url']; ?>" class="item<?php if (($this->_foreach['brands']['iteration'] <= 1)): ?> all<?php endif; ?><?php if ($this->_var['brand']['selected']): ?> current<?php endif; ?>"><?php echo $this->_var['brand']['brand_name']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
		</dl>
		<?php endif; ?>
		<?php if ($this->_var['price_grade']['1']): ?>
		<dl<?php if ($this->_var['brands']['1']): ?><?php else: ?> class="first"<?php endif; ?>>
			<dt><?php echo $this->_var['lang']['price']; ?><?php echo $this->_var['lang']['colon']; ?></dt>
			<dd><?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');$this->_foreach['price_grade'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['price_grade']['total'] > 0):
    foreach ($_from AS $this->_var['grade']):
        $this->_foreach['price_grade']['iteration']++;
?><a href="<?php echo $this->_var['grade']['url']; ?>" class="item<?php if (($this->_foreach['price_grade']['iteration'] <= 1)): ?> all<?php endif; ?><?php if ($this->_var['grade']['selected']): ?> current<?php endif; ?>"><?php echo $this->_var['grade']['price_range']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
		</dl>
		<?php endif; ?>
		<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_24168200_1328330823');$this->_foreach['filter_attr_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter_attr_list']['total'] > 0):
    foreach ($_from AS $this->_var['filter_attr_0_24168200_1328330823']):
        $this->_foreach['filter_attr_list']['iteration']++;
?>
		<dl>
			<dt><?php echo htmlspecialchars($this->_var['filter_attr_0_24168200_1328330823']['filter_attr_name']); ?><?php echo $this->_var['lang']['colon']; ?></dt>
			<dd><?php $_from = $this->_var['filter_attr_0_24168200_1328330823']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');$this->_foreach['filter_attr'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter_attr']['total'] > 0):
    foreach ($_from AS $this->_var['attr']):
        $this->_foreach['filter_attr']['iteration']++;
?><a href="<?php echo $this->_var['attr']['url']; ?>" class="item<?php if (($this->_foreach['filter_attr']['iteration'] <= 1)): ?> all<?php endif; ?><?php if ($this->_var['attr']['selected']): ?> current<?php endif; ?>"><?php echo $this->_var['attr']['attr_value']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
		</dl>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>
<?php endif; ?> 