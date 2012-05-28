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
	
		<form action="<?php echo $this->_var['search_url']; ?>" name="search_form" method="post" class="article_search">
			<input type="text" name="keywords" value="<?php echo $this->_var['search_value']; ?>"/>
			<input type="submit" value="<?php echo $this->_var['lang']['article_search']; ?>" class="keyword btn_s3"/>
			<input type="hidden" name="id" value="<?php echo $this->_var['cat_id']; ?>"/>
			<input type="hidden" name="cur_url" id="cur_url" value=""/>
		</form>
		<div class="box">
			<div class="hd"><h3><?php echo $this->_var['lang']['article_list']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<ul class="article_list">
					<?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['artciles_list']['iteration']++;
?>
					<li<?php if (($this->_foreach['artciles_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
						<span class="title"><a href="<?php echo $this->_var['article']['url']; ?>"><?php echo $this->_var['article']['title']; ?></a></span>
						<span class="author"><?php echo $this->_var['article']['author']; ?></span>
						<span class="time"><?php echo $this->_var['article']['add_time']; ?></span>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
				<?php echo $this->fetch('library/pages.lbi'); ?>
			</div>
		</div>
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
	
	<?php echo $this->fetch('library/article_category_tree.lbi'); ?>
	
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>