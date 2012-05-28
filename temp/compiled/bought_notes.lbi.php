<?php if ($this->_var['notes']): ?>
<table class="data_table">
	<colgroup>
		<col width="100"/>
		<col width="50"/>
		<col width="100"/>
		<col width="50"/>
	</colgroup>
	<thead>
		<tr>
			<th><?php echo $this->_var['lang']['username']; ?></th>
			<th><?php echo $this->_var['lang']['number']; ?></th>
			<th><?php echo $this->_var['lang']['bought_time']; ?></th>
			<th class="last"><?php echo $this->_var['lang']['order_status']; ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $_from = $this->_var['notes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'note');$this->_foreach['notes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['notes']['total'] > 0):
    foreach ($_from AS $this->_var['note']):
        $this->_foreach['notes']['iteration']++;
?>
		<tr class="<?php echo $this->cycle(array('values'=>'odd,even')); ?><?php if (($this->_foreach['notes']['iteration'] == $this->_foreach['notes']['total'])): ?> last<?php endif; ?>">
			<td><?php if ($this->_var['note']['user_name']): ?><?php echo htmlspecialchars($this->_var['note']['user_name']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></td>
			<td><?php echo $this->_var['note']['goods_number']; ?></td>
			<td><?php echo $this->_var['note']['add_time']; ?></td>
			<td class="last"><?php if ($this->_var['note']['order_status']): ?><?php echo $this->_var['lang']['turnover']; ?><?php else: ?><?php echo $this->_var['lang']['is_cancel']; ?><?php endif; ?></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</tbody>
</table>
<?php echo $this->fetch('library/pages.lbi'); ?>
<?php else: ?>
<p class="empty"><?php echo $this->_var['lang']['no_notes']; ?></p>
<?php endif; ?>