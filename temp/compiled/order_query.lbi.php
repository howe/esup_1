<?php if (empty ( $this->_var['order_query'] )): ?>
<div class="order_query box">
	<div class="hd"><h3><?php echo $this->_var['lang']['order_query']; ?></h3><div class="extra"></div></div>
	<div class="bd" id="order_query">
		<form action="" class="main">
			<input type="text" name="order_sn" title="<?php echo $this->_var['lang']['invalid_order_sn']; ?>" class="input"/>
			<input type="button" value="<?php echo $this->_var['lang']['query_order']; ?>" class="btn_s4"/>
		</form>
	</div>
</div>
<?php else: ?>
	<?php if ($this->_var['order_query']['user_id']): ?><p><em><?php echo $this->_var['lang']['order_number']; ?></em><span><a href="user.php?act=order_detail&order_id=<?php echo $this->_var['order_query']['order_id']; ?>" ><?php echo $this->_var['order_query']['order_sn']; ?></a></span></p><?php else: ?><p><em><?php echo $this->_var['lang']['order_number']; ?></em><span><?php echo $this->_var['order_query']['order_sn']; ?></span></p><?php endif; ?>
	<p><em><?php echo $this->_var['lang']['order_status']; ?></em><span><?php echo $this->_var['order_query']['order_status']; ?></span></p>
	<?php if ($this->_var['order_query']['invoice_no']): ?><p><em><?php echo $this->_var['lang']['consignment']; ?></em><span><?php echo $this->_var['order_query']['invoice_no']; ?></span></p><?php endif; ?>
	<?php if ($this->_var['order_query']['shipping_date']): ?><p><em><?php echo $this->_var['lang']['shipping_date']; ?></em><span><?php echo $this->_var['order_query']['shipping_date']; ?></span></p><?php endif; ?>
<?php endif; ?>