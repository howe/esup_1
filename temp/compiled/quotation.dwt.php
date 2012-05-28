<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php if ($this->_var['description']): ?><meta name="description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<?php if ($this->_var['keywords']): ?><meta name="keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<title><?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	<?php echo $this->fetch('library/ur_here.lbi'); ?>
	
	<div class="quotation box full_box">
		<div class="hd"><h3><?php echo $this->_var['lang']['print_quotation']; ?></h3><div class="extra"></div></div>
		<div class="bd">
			<form action="quotation.php" method="post" name="searchForm">
				<select name="cat_id"><option value="0"><?php echo $this->_var['lang']['all_category']; ?></option><?php echo $this->_var['cat_list']; ?></select>
				<select name="brand_id"><option value="0"><?php echo $this->_var['lang']['all_brand']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['brand_list'])); ?></select>
				<?php echo $this->_var['lang']['keywords']; ?> <input type="text" name="keyword" class="input"/>
				<input type="submit" name="print_quotation" id="print_quotation" value="<?php echo $this->_var['lang']['print_quotation']; ?>" class="btn_s4_b" />
				<input name="act" type="hidden" value="print_quotation" />
			</form>
		</div>
	</div>
	
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>