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
	
	<div class="box thin_box full_box legend_box">
		<div class="hd"><h3></h3><div class="extra"></div></div>
		<div class="bd">
			<div class="legend"></div>
			<dl class="message_wrapper message_info">
				<dt class="title"><?php echo $this->_var['message']['content']; ?></dt>
				<dd>
					<?php if ($this->_var['message']['url_info']): ?>
					<p>
					<?php $_from = $this->_var['message']['url_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('info', 'url');if (count($_from)):
    foreach ($_from AS $this->_var['info'] => $this->_var['url']):
?>
					<a href="<?php echo $this->_var['url']; ?>" class="button"><span><?php echo $this->_var['info']; ?></span></a>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</p>
					<?php endif; ?>
				</dd>
			</dl>
		</div>
	</div>
	
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>