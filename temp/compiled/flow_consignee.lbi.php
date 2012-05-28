<div class="consignee_list box full_box">
	<div class="hd"><h3><?php echo $this->_var['lang']['consignee_info']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');$this->_foreach['consignee_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['consignee_list']['total'] > 0):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
        $this->_foreach['consignee_list']['iteration']++;
?>
		<?php if (! $this->_var['consignee']['consignee']): ?><h4><?php echo $this->_var['lang']['add_address']; ?><?php echo $this->_var['lang']['colon']; ?></h4><?php endif; ?>
		<form action="flow.php" method="post" name="theForm" onsubmit="return checkConsignee(this)"<?php if (($this->_foreach['consignee_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
			<?php echo $this->fetch('library/consignee.lbi'); ?>
		</form>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>
<script type="text/javascript">
<?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</script>