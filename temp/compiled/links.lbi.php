<?php if ($this->_var['option']['links_enabled'] && ( $this->_var['img_links'] || $this->_var['txt_links'] )): ?>
<div class="links box thin_box full_box">
	<div class="hd"><h3><?php echo $this->_var['lang']['links']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<p class="link_list">
			<?php if ($this->_var['img_links']): ?>
			<?php $_from = $this->_var['img_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['img_links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['img_links']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['img_links']['iteration']++;
?>
			<a href="<?php echo $this->_var['link']['url']; ?>" rel="external"><img src="<?php echo $this->_var['link']['logo']; ?>" alt="<?php echo $this->_var['link']['name']; ?>"/></a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<?php endif; ?>
			<?php if ($this->_var['txt_links']): ?>
			<?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['txt_links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['txt_links']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['txt_links']['iteration']++;
?>
			<a href="<?php echo $this->_var['link']['url']; ?>" rel="external"><?php echo $this->_var['link']['name']; ?></a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<?php endif; ?>
		</p>
	</div>
</div>
<?php endif; ?>