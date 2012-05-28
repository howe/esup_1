<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	
		<?php echo $this->fetch('library/goods_detail.lbi'); ?>
<div id="goods_info">
		<?php echo $this->_var['render']['before_goods_info']; ?>
		<?php if ($this->_var['goods']['goods_desc']): ?>
		<div class="goods_desc box" id="description">
			<div class="hd"><h3><?php echo $this->_var['lang']['goods_description']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<div class="goods_description"><?php echo $this->_var['goods']['goods_desc']; ?></div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->_var['properties']): ?>
		<div class="goods_properties box" id="properties">
			<div class="hd"><h3><?php echo $this->_var['lang']['goods_properties']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<div class="goods_description">
					<dl class="table">
						<dt class="head"><?php echo $this->_var['lang']['attr_name']; ?></dt>
						<dd class="head"><?php echo $this->_var['lang']['attr_value']; ?></dd>
						<?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
						<?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
						<dt><?php echo htmlspecialchars($this->_var['property']['name']); ?></dt>
						<dd class="<?php echo $this->cycle(array('values'=>'odd,even')); ?>"><?php echo $this->_var['property']['value']; ?></dd>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</dl>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->_var['package_goods_list']): ?>
		<div class="package_goods box" id="package">
			<div class="hd"><h3><?php echo $this->_var['lang']['remark_package']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<?php $_from = $this->_var['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods');$this->_foreach['package_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['package_goods']):
        $this->_foreach['package_goods_list']['iteration']++;
?>
				<dl<?php if (($this->_foreach['package_goods_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
					<dt><?php echo $this->_var['package_goods']['act_name']; ?></dt>
					<dd class="item_wrapper">
						<?php $_from = $this->_var['package_goods']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods_list']):
        $this->_foreach['goods_list']['iteration']++;
?>
						<span class="item<?php if (($this->_foreach['goods_list']['iteration'] == $this->_foreach['goods_list']['total'])): ?> last<?php endif; ?>">
							<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'goods',
  'gid' => $this->_var['goods_list']['goods_id'],
  'append' => $this->_var['goods_list']['goods_name'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" class="photo"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_list']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_list']['goods_name']); ?>"/></a>
							<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'goods',
  'gid' => $this->_var['goods_list']['goods_id'],
  'append' => $this->_var['goods_list']['goods_name'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" class="name"><?php echo $this->_var['goods_list']['goods_name']; ?><?php echo $this->_var['goods_list']['goods_attr_str']; ?></a>
							<em><?php echo $this->_var['lang']['quantity']; ?><?php echo $this->_var['lang']['colon']; ?><?php echo $this->_var['goods_list']['goods_number']; ?></em>
						</span>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</dd>
					<dd class="price_wrapper">
						<span><?php echo $this->_var['lang']['package_price']; ?><em class="price shop"><?php echo $this->_var['package_goods']['package_price']; ?></em></span>
						<span><?php echo $this->_var['lang']['old_price']; ?><em class="price market_price"><?php echo $this->_var['package_goods']['subtotal']; ?></em></span>
						<span><?php echo $this->_var['lang']['then_old_price']; ?><em class="price"><?php echo $this->_var['package_goods']['saving']; ?></em></span>
					</dd>
					<dd class="action"><a href="javascript:addPackageToCart(<?php echo $this->_var['package_goods']['act_id']; ?>)" class="button brighter_button"><span><?php echo $this->_var['lang']['add_to_cart']; ?></span></a></dd>
				</dl>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php echo $this->fetch('library/goods_fittings.lbi'); ?>
		<?php echo $this->fetch('library/goods_related.lbi'); ?>
		<?php echo $this->fetch('library/bought_note_guide.lbi'); ?>
		<?php echo $this->fetch('library/comments.lbi'); ?>
		<?php echo $this->_var['render']['after_goods_info']; ?>
</div>
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
	
		<?php echo $this->fetch('library/category_tree.lbi'); ?>
		<?php echo $this->fetch('library/goods_attrlinked.lbi'); ?>
		<?php echo $this->fetch('library/bought_goods.lbi'); ?>
		<?php echo $this->fetch('library/goods_article.lbi'); ?>
		<?php echo $this->fetch('library/history.lbi'); ?>
	
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>