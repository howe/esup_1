<?php if ($this->_var['orders']): ?>
<table class="data_table">
	<colgroup>
		<col width="120"/>
		<col width="120"/>
		<col width="80"/>
		<col width="200"/>
		<col width="100"/>
	</colgroup>
	<thead>
		<tr>
			<th><?php echo $this->_var['lang']['order_number']; ?></th>
			<th><?php echo $this->_var['lang']['order_addtime']; ?></th>
			<th><?php echo $this->_var['lang']['order_money']; ?></th>
			<th class="order_status"><?php echo $this->_var['lang']['order_status']; ?></th>
			<th class="last handle"><?php echo $this->_var['lang']['handle']; ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['orders'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['orders']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['orders']['iteration']++;
?>
		<tr class="<?php echo $this->cycle(array('values'=>'odd,even')); ?><?php if (($this->_foreach['orders']['iteration'] == $this->_foreach['orders']['total'])): ?> last<?php endif; ?>">
			<td><a href="user.php?act=order_detail&order_id=<?php echo $this->_var['item']['order_id']; ?>" class="order_id"><?php echo $this->_var['item']['order_sn']; ?></a></td>
			<td><?php echo $this->_var['item']['order_time']; ?></td>
			<td><em class="price"><?php echo $this->_var['item']['total_fee']; ?></em></td>
			<td class="order_status"><?php echo $this->_var['item']['order_status']; ?></td>
			<td class="last handler"><?php echo $this->_var['item']['handler']; ?></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</tbody>
</table>
<?php else: ?>
<p class="empty"><?php echo $this->_var['lang']['order_empty']; ?></p>
<?php endif; ?>