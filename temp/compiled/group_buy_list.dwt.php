<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php if ($this->_var['description']): ?><meta name="description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<?php if ($this->_var['keywords']): ?><meta name="keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<title><?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>" class="right_sidebar">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	<?php echo $this->fetch('library/ur_here.lbi'); ?>
	<div class="col_main">
	<?php echo $this->_var['render']['before_col_main']; ?>
	
	<?php echo $this->fetch('library/group_buy_list.lbi'); ?>
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
	
	
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>