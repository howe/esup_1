<div class="cat_articles box">
	<div class="hd">
		<h3><a href="<?php echo $this->_var['articles_cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['articles_cat']['name']); ?></a></h3>
		<div class="extra">
			<a href="<?php echo $this->_var['articles_cat']['url']; ?>"><?php echo $this->_var['lang']['more']; ?></a>
		</div>
	</div>
	<div class="bd">	
		<ul class="text_list">
			<?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_item');$this->_foreach['articles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articles']['total'] > 0):
    foreach ($_from AS $this->_var['article_item']):
        $this->_foreach['articles']['iteration']++;
?>
			<li<?php if (($this->_foreach['articles']['iteration'] <= 1)): ?> class="first"<?php endif; ?>><a href="<?php echo $this->_var['article_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article_item']['title']); ?>"><?php echo htmlspecialchars($this->_var['article_item']['short_title']); ?></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>