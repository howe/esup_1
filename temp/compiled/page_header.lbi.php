<div id="top">
	<div class="container">
		<p class="user_area" id="user_area"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
			<div class="small_nav top_nav_wrapper">
			<?php 
$k = array (
  'name' => 'nav',
  'type' => 'top',
  'form' => 'library/siy_small_nav.lbi',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>
		</div>
	</div>
</div>
<?php echo $this->_var['render']['before_header']; ?>
<div id="header">
	<div class="container">
		<p id="logo"><a href="<?php echo $this->_var['hu']; ?>" title="<?php echo $this->_var['shop_name']; ?>"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['option']['logo']; ?>" alt="<?php echo $this->_var['shop_name']; ?>"/></a></p>
		<div class="header_bar">
			<div class="header_bar_left">&nbsp;</div>
			<div class="header_bar_right">&nbsp;</div>
			<div class="cart" id="cart">
				<p class="cart_info"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
				<?php if ($_SESSION['flow_type'] && $_SESSION['flow_type'] != '0'): ?>
				<div class="list_wrapper">
				<div class="list">
					<em class="list_arrow">&uarr;</em>
					<div class="loader">&nbsp;</div>
					<p class="cart_empty"><?php echo $this->_var['lang']['cart_empty']; ?></p>
					<a href="javascript:closeCart();" class="close button"><span><?php echo $this->_var['lang']['close']; ?></span></a>
				</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="bright_search">
				<form method="get" action="search.php" id="search">
					<input type="text" name="keywords" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" title="<?php echo $this->_var['lang']['keyword_tip']; ?>" tabindex="1" class="keyword" id="keyword"/>
					<input type="submit" value="<?php echo $this->_var['lang']['btn_search']; ?>" class="submit" />
					<p class="advanced_search"><a href="search.php?act=advanced_search"><?php echo $this->_var['lang']['advanced_search']; ?></a></p>
					<?php if ($this->_var['searchkeywords']): ?><div class="hot_search_wrapper"><p class="hot_search"><em><?php echo $this->_var['lang']['hot_search']; ?></em><?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?><a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>"><?php echo $this->_var['val']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></p></div><?php endif; ?>
				</form>
			</div>
			<div class="nav_wrapper">
				<?php 
$k = array (
  'name' => 'nav',
  'type' => 'middle',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>
			</div>
			<div class="all_cat_wrapper">
				<a href="catalog.php" class="all_cat"><?php echo $this->_var['lang']['goods_category']; ?></a>
				<?php if ($this->_var['pname'] != 'index'): ?>
				<?php echo $this->fetch('library/all_category.lbi'); ?>
				<?php else: ?>
				<div class="fixed"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php echo $this->_var['render']['after_header']; ?>