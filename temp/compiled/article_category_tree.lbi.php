<?php if ($this->_var['article_categories']): ?>
<div class="box fancy_box article_category">
	<div class="hd"><h3><?php echo $this->_var['lang']['article_cat']; ?></h3><div class="extra"></div></div>
	<div class="bd<?php if ($this->_var['option']['category_show_children']): ?> show_children<?php endif; ?>">
		<ul class="level_1">
			<?php $_from = $this->_var['article_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_15025000_1328417688');$this->_foreach['article_categories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_categories']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_15025000_1328417688']):
        $this->_foreach['article_categories']['iteration']++;
?>
			<li class="level_1<?php if (($this->_foreach['article_categories']['iteration'] <= 1)): ?> first<?php endif; ?>">
				<a href="<?php echo $this->_var['cat_0_15025000_1328417688']['url']; ?>" class="level_1"><span><?php echo $this->_var['cat_0_15025000_1328417688']['name']; ?></span></a>
				<?php if ($this->_var['cat_0_15025000_1328417688']['children']): ?>
				<div class="sub_cat_lv1">
					<ul class="level_2 clearfix">
						<?php $_from = $this->_var['cat_0_15025000_1328417688']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_15047000_1328417688');if (count($_from)):
    foreach ($_from AS $this->_var['child_0_15047000_1328417688']):
?>
						<li class="level_2<?php if (($this->_foreach['child']['iteration'] <= 1)): ?> first<?php endif; ?>"><a href="<?php echo $this->_var['child_0_15047000_1328417688']['url']; ?>" class="level_2"><span><?php echo $this->_var['child_0_15047000_1328417688']['name']; ?></span></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
				</div>
				<?php endif; ?>
			</dl>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>
<div class="help_center box">
	<div class="hd"><h3><?php echo $this->_var['lang']['help_center']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['helps'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['helps']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['helps']['iteration']++;
?>
		<dl<?php if (($this->_foreach['helps']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
			<dt><a href="<?php echo $this->_var['help_cat']['cat_id']; ?>"><?php echo $this->_var['help_cat']['cat_name']; ?></a></dt>
			<?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['help_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['help_list']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['help_list']['iteration']++;
?>
			<dd><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['short_title']; ?></a></dd>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</dl>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>