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
	
	<div class="all_cat_list box full_box">
		<div class="hd"><h3><?php echo $this->_var['lang']['catalog']; ?></h3><div class="extra"></div></div>
		<div class="bd">
			<dl>
				<?php $_from = $this->_var['cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
				<?php if ($this->_var['cat']['level'] > 0): ?>
				<dd<?php if ($this->_var['cat']['has_children'] != 0): ?> class="parent"<?php endif; ?>><a href="<?php echo $this->_var['cat']['url']; ?>" title="<?php echo $this->_var['cat']['cat_name']; ?>"><?php echo $this->_var['cat']['cat_name']; ?></a></dd>
				<?php else: ?>
				<dt<?php if ($this->_var['cat']['has_children'] != 0): ?> class="parent"<?php endif; ?>><a href="<?php echo $this->_var['cat']['url']; ?>" title="<?php echo $this->_var['cat']['cat_name']; ?>"><?php echo $this->_var['cat']['cat_name']; ?></a></dt>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</dl>
		</div>
	</div>
	<div class="brand_list all_brand_list box full_box">
		<div class="hd"><h3><?php echo $this->_var['lang']['all_brand']; ?></h3><div class="extra"></div></div>
		<div class="bd">
			<ul>
				<?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
				<li><?php if ($this->_var['brand']['brand_logo']): ?><a href="<?php echo $this->_var['brand']['url']; ?>" class="logo"><img src="<?php echo $this->_var['option']['static_path']; ?>data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" alt="<?php echo $this->_var['brand']['brand_name']; ?>(<?php echo $this->_var['brand']['goods_num']; ?>)"/></a><a href="<?php echo $this->_var['brand']['url']; ?>" class="name"><?php echo $this->_var['brand']['brand_name']; ?></a><?php else: ?><a href="<?php echo $this->_var['brand']['url']; ?>" class="logo"><?php echo $this->_var['brand']['brand_name']; ?></a><?php endif; ?></li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
	</div>
	
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>