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
	<div class="col_main">
	<?php echo $this->_var['render']['before_col_main']; ?>
	
		<div class="tags_cloud box">
			<div class="hd"><h3><?php echo $this->_var['lang']['tag_cloud']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<p class="description"><?php echo $this->_var['lang']['tag_cloud_desc']; ?></p>
				<?php if ($this->_var['tags']): ?>
				<p class="tags">
				<?php $_from = $this->_var['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?>
				<span class="item_wrapper"><a href="<?php echo $this->_var['tag']['url']; ?>" class="item"><?php echo htmlspecialchars($this->_var['tag']['tag_words']); ?><em><?php echo $this->_var['tag']['tag_count']; ?></em></a>
				<?php if ($this->_var['tag']['user_id'] == $_SESSION['user_id']): ?><a href="user.php?act=act_del_tag&tag_words=<?php echo urlencode($this->_var['tag']['tag_words']); ?>&uid=<?php echo $this->_var['tag']['user_id']; ?>" class="drop"><?php echo $this->_var['lang']['drop']; ?></a><?php endif; ?></span>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</p>
				<?php else: ?>
				<p class="empty"><?php echo $this->_var['lang']['tags_cloud_empty']; ?><p>
				<?php endif; ?>
			</div>
		</div>
	
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