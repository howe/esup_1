<?php if ($this->_var['goods_article_list']): ?>
<div class="goods_article box">
	<div class="hd"><h3><?php echo $this->_var['lang']['article_releate']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<ul>
			<?php $_from = $this->_var['goods_article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['goods_article_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_article_list']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['goods_article_list']['iteration']++;
?>
			<li<?php if (($this->_foreach['goods_article_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?>><a href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"><?php echo htmlspecialchars($this->_var['article']['short_title']); ?></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?>
