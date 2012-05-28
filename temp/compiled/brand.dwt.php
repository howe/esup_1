<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php if ($this->_var['keywords']): ?><meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<?php if ($this->_var['description']): ?><meta name="Description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<title><?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	<?php echo $this->fetch('library/ur_here.lbi'); ?>
	<div class="col_main">
	<?php echo $this->_var['render']['before_col_main']; ?>
	
	
	<?php echo $this->fetch('library/recommend_best.lbi'); ?>
	
	<?php echo $this->fetch('library/brand_goods_list.lbi'); ?>
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
		<div class="box thin_box brand_details">
			<div class="hd"><h3>&nbsp;</h3><div class="extra"></div></div>
			<div class="bd">
				<h1><?php echo $this->_var['brand']['brand_name']; ?></h1>
				<p class="description">
					<?php if ($this->_var['brand']['brand_logo']): ?><img src="<?php echo $this->_var['option']['static_path']; ?>data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" class="logo" /><?php endif; ?>
					<?php echo nl2br($this->_var['brand']['brand_desc']); ?>
				</p>
				<?php if ($this->_var['brand']['site_url']): ?><p class="website"><?php echo $this->_var['lang']['official_site']; ?><br /><a href="<?php echo $this->_var['brand']['site_url']; ?>"><?php echo $this->_var['brand']['site_url']; ?></a></p><?php endif; ?>
				<p class="cat_list"><strong><?php echo $this->_var['lang']['brand_category']; ?></strong><?php $_from = $this->_var['brand_cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?><a href="<?php echo $this->_var['cat']['url']; ?>"<?php if ($this->_var['cat']['cat_id'] == $this->_var['category']): ?> class="current"<?php endif; ?>><?php echo htmlspecialchars($this->_var['cat']['cat_name']); ?><?php if ($this->_var['cat']['goods_count']): ?><sup><?php echo $this->_var['cat']['goods_count']; ?></sup><?php endif; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></p>
			</div>
		</div>
	
	<?php echo $this->fetch('library/recommend_promotion.lbi'); ?>
	<?php echo $this->fetch('library/top10.lbi'); ?>
	
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>