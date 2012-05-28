<?php if ($_GET['ajax'] == 1): ?><?php echo $this->fetch('library/siy_cart.lbi'); ?><?php else: ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if ($this->_var['description']): ?><meta name="description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<?php if ($this->_var['keywords']): ?><meta name="keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<title><?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"<?php if ($this->_var['step'] != 'login'): ?> class="flow_wrapper"<?php endif; ?>>
	<div class="container">
	
		<?php if ($this->_var['step'] == 'cart'): ?><?php echo $this->fetch('library/flow_cart.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['step'] == 'consignee'): ?><?php echo $this->fetch('library/flow_consignee.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['step'] == 'checkout'): ?><?php echo $this->fetch('library/flow_checkout.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['step'] == 'done'): ?><?php echo $this->fetch('library/flow_done.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['step'] == 'login'): ?><?php echo $this->fetch('library/flow_login.lbi'); ?><?php endif; ?>
	
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html><?php endif; ?>