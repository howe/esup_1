<?php if ($this->_var['nav']): ?>
<div class="nav">
	<ul class="level_1">
		<?php $_from = $this->_var['nav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_0_71109000_1328330802');$this->_foreach['nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav']['total'] > 0):
    foreach ($_from AS $this->_var['nav_0_71109000_1328330802']):
        $this->_foreach['nav']['iteration']++;
?>
		<li class="level_1<?php if (($this->_foreach['nav']['iteration'] <= 1)): ?> first<?php endif; ?><?php if ($this->_var['nav_0_71109000_1328330802']['children']): ?> parent<?php endif; ?>">
			<a href="<?php echo $this->_var['nav_0_71109000_1328330802']['url']; ?>" class="level_1"<?php if ($this->_var['nav_0_71109000_1328330802']['opennew']): ?> rel="external"<?php endif; ?>><strong><span><?php echo $this->_var['nav_0_71109000_1328330802']['name']; ?></span></strong></a>
			<?php if ($this->_var['nav_0_71109000_1328330802']['children']): ?>
			<div class="sub_nav">
				<div class="inner">
					<ul class="level_2 clearfix">
						<?php $_from = $this->_var['nav_0_71109000_1328330802']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['child']['iteration']++;
?>
						<li class="level_2<?php if (($this->_foreach['child']['iteration'] <= 1)): ?> first<?php endif; ?>"><a href="<?php echo $this->_var['child']['url']; ?>" class="level_2"<?php if ($this->_var['child']['opennew']): ?> rel="external"<?php endif; ?>><span><?php echo $this->_var['child']['name']; ?></span></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
		</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
</div>
<?php endif; ?>