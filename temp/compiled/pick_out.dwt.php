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
	
		<div class="pick_out box">
			<div class="hd"><h3><?php echo $this->_var['lang']['pick_out']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<?php $_from = $this->_var['condition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'caption');if (count($_from)):
    foreach ($_from AS $this->_var['caption']):
?>
				<dl class="table">
					<dt class="title"><?php echo $this->_var['caption']['name']; ?></dt>
					<?php $_from = $this->_var['caption']['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
					<dt><?php echo $this->_var['cat']['cat_name']; ?></dt>
					<dd class="<?php echo $this->cycle(array('values'=>'even,odd')); ?>"><?php $_from = $this->_var['cat']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?><a href="<?php echo $this->_var['list']['url']; ?>"><?php echo $this->_var['list']['name']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</dl>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</div>
		<div class="box">
			<div class="hd"><h3><?php echo $this->_var['lang']['search_result']; ?>(<?php echo $this->_var['count']; ?>)</h3><div class="extra"></div></div>
			<div class="bd goods_list">
				<ul>
					<?php $_from = $this->_var['pickout_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['pickout_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pickout_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['pickout_goods']['iteration']++;
?>
					<li<?php if (($this->_foreach['pickout_goods']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?> data="id:'<?php echo $this->_var['goods']['goods_id']; ?>'">
						<span class="photo">
							<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"/></a>
						</span>
						<span class="info">
							<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="name"><?php echo $this->_var['goods']['name']; ?></a>
							<em class="price<?php if ($this->_var['goods']['promote_price']): ?> promote<?php endif; ?>"><?php if ($this->_var['goods']['promote_price']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></em>
						</span>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
				<?php if ($this->_var['count'] > 4): ?><a href="<?php echo $this->_var['url']; ?>" title="<?php echo $this->_var['lang']['more']; ?><?php echo $this->_var['lang']['search_result']; ?>" class="more button brighter_button"><span><?php echo $this->_var['lang']['more']; ?></span></a><?php endif; ?>
			</div>
		</div>
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
		<?php if ($this->_var['picks']['1']): ?>
		<div class="your_choose box">
			<div class="hd"><h3><?php echo $this->_var['lang']['your_choose']; ?></h3><div class="extra"></div></div>
			<div class="bd">
					<?php $_from = $this->_var['picks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pick');$this->_foreach['picks'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['picks']['total'] > 0):
    foreach ($_from AS $this->_var['pick']):
        $this->_foreach['picks']['iteration']++;
?>
					<p<?php if (($this->_foreach['picks']['iteration'] == $this->_foreach['picks']['total'])): ?> class="action"<?php endif; ?>><a href="<?php echo $this->_var['pick']['url']; ?>"><?php echo $this->_var['pick']['name']; ?></a></p>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->_var['cat_list']): ?>
		<div class="po_cat_list box">
			<div class="hd"><h3><?php echo $this->_var['lang']['goods_category']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<ul class="text_list">
					<?php $_from = $this->_var['cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['cat_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_list']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['cat_list']['iteration']++;
?>
					<li<?php if (($this->_foreach['cat_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
						<a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['cat_name']); ?><?php if ($this->_var['cat']['goods_num']): ?><sup><?php echo $this->_var['cat']['goods_num']; ?></sup><?php endif; ?></a>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->_var['brand_list']): ?>
		<div class="brands box">
			<div class="hd"><h3><?php echo $this->_var['lang']['brands_list']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<ul>
					<?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brand_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brand_foreach']['iteration']++;
?>
					<?php if ($this->_var['brand']['brand_logo']): ?> 
					<li class="image<?php if (($this->_foreach['brand_foreach']['iteration'] <= 1)): ?> first<?php endif; ?>"><a href="<?php echo $this->_var['brand']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?>"><img src="<?php echo $this->_var['option']['static_path']; ?>data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" alt="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?>"/></a></li>
					<?php else: ?>
					<li class="text<?php if (($this->_foreach['brand_foreach']['iteration'] <= 1)): ?> first<?php endif; ?>"><a href="<?php echo $this->_var['brand']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?>"><?php echo $this->_var['brand']['brand_name']; ?></a></li>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>