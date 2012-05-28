<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php if ($this->_var['description']): ?><meta name="description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<?php if ($this->_var['keywords']): ?><meta name="keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<title><?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>"<?php if ($this->_var['option']['three_column']): ?> class="three_col"<?php endif; ?>>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	<div class="col_main">
	<?php echo $this->_var['render']['before_col_main']; ?>
	<?php if ($this->_var['shop_notice']): ?><div class="shop_notice notice_box"><?php echo $this->_var['shop_notice']; ?></div><?php endif; ?>
	
	<?php echo $this->fetch('library/index_ad.lbi'); ?>
	
		<?php echo $this->fetch('library/recommend_promotion.lbi'); ?>
		<?php echo $this->fetch('library/recommend_new.lbi'); ?>
		<?php echo $this->fetch('library/recommend_best.lbi'); ?>
	
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
	
		<?php echo $this->fetch('library/category_tree.lbi'); ?>
		<?php echo $this->fetch('library/order_query.lbi'); ?>
		<?php echo $this->fetch('library/invoice_query.lbi'); ?>
		<?php echo $this->fetch('library/vote_list.lbi'); ?>
		<?php echo $this->fetch('library/ad_position.lbi'); ?>
	
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
	<?php if ($this->_var['option']['three_column']): ?>
	<div class="col_extra">
	<?php echo $this->_var['render']['before_col_extra']; ?>
	
	
		<?php echo $this->fetch('library/cat_articles.lbi'); ?>
		<?php echo $this->fetch('library/ad_position.lbi'); ?>
		<?php echo $this->fetch('library/brands.lbi'); ?>
		<?php echo $this->fetch('library/top10.lbi'); ?>
		<?php echo $this->fetch('library/email_list.lbi'); ?>
	
	
	<?php echo $this->_var['render']['after_col_extra']; ?>
	</div>
	<?php endif; ?>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>