<?php if ($this->_var['invoice_list']): ?>
<div class="invoice_list box">
	<div class="hd"><h3><?php echo $this->_var['lang']['invoice_list']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<div class="vertical_slider_wrapper">
		<div class="vertical_slider">
		<ul>
			<?php $_from = $this->_var['invoice_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'invoice');$this->_foreach['invoice_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['invoice_list']['total'] > 0):
    foreach ($_from AS $this->_var['invoice']):
        $this->_foreach['invoice_list']['iteration']++;
?>
			<li<?php if (($this->_foreach['invoice_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
				<em class="title"><?php echo $this->_var['lang']['order_number']; ?></em><span class="data"><?php echo $this->_var['invoice']['order_sn']; ?></span>
				<em class="title"><?php echo $this->_var['lang']['consignment']; ?></em><span class="data"><?php echo $this->_var['invoice']['invoice_no']; ?></span>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		</div>
		</div>
	</div>
</div>
<?php endif; ?>
