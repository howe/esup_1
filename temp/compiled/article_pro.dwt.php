<?php if ($_GET['ajax'] != 1): ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	
	<div class="article article_pro box thin_box full_box">
		<div class="hd"><h3></h3><div class="extra"></div></div>
		<div class="bd<?php if ($_GET['ajax'] == 1): ?> ap_ajax<?php endif; ?>">
<?php endif; ?>
			<div class="article_title clearfix">
				<h1><?php echo htmlspecialchars($this->_var['article']['title']); ?></h1>
			</div>
			<?php if ($this->_var['article']['content']): ?>
			<div class="article_content"><?php echo $this->_var['article']['content']; ?></div>
			<?php else: ?>
			<p class="empty"><?php echo $this->_var['lang']['content_empty']; ?></p>
			<?php endif; ?>
<?php if ($_GET['ajax'] != 1): ?>
		</div>
	</div>
	
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>
<?php endif; ?>