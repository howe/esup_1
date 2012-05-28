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
	
	<div class="activity_list box full_box">
		<div class="hd"><h3><?php echo $this->_var['lang']['favourable']; ?></h3><div class="extra"></div></div>
		<div class="bd">
			<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['list']['iteration']++;
?>
			<div class="item<?php if (($this->_foreach['list']['iteration'] <= 1)): ?> first<?php endif; ?>" id="<?php echo $this->_var['val']['act_id']; ?>">
				<h2 class="name"><?php echo $this->_var['val']['act_name']; ?></h2>
				<dl class="table">
					<dt><?php echo $this->_var['lang']['label_start_time']; ?></dt><dd><?php echo $this->_var['val']['start_time']; ?></dd>
					<dt><?php echo $this->_var['lang']['label_end_time']; ?></dt><dd class="even"><?php echo $this->_var['val']['end_time']; ?></dd>
					<dt><?php echo $this->_var['lang']['label_max_amount']; ?></dt><dd class="price"><?php if ($this->_var['val']['max_amount'] > 0): ?><?php echo $this->_var['val']['max_amount']; ?><?php else: ?><?php echo $this->_var['lang']['unlimited']; ?><?php endif; ?></dd>
					<dt><?php echo $this->_var['lang']['label_min_amount']; ?></dt><dd class="price even"><?php echo $this->_var['val']['min_amount']; ?></dd>
					<dt><?php echo $this->_var['lang']['label_user_rank']; ?></dt><dd class="user_rank"><?php $_from = $this->_var['val']['user_rank']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?><em><?php echo $this->_var['user']; ?></em><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
					<dt><?php echo $this->_var['lang']['label_act_range']; ?></dt>
					<dd class="even">
						<?php echo $this->_var['val']['act_range']; ?><?php if ($this->_var['val']['act_range'] != $this->_var['lang']['far_all']): ?>
						<?php $_from = $this->_var['val']['act_range_ext']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ext');if (count($_from)):
    foreach ($_from AS $this->_var['ext']):
?>
						<a href="<?php echo $this->_var['val']['program']; ?><?php echo $this->_var['ext']['id']; ?>" taget="_blank"><?php echo $this->_var['ext']['name']; ?></a>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php endif; ?>
					</dd>
					<dt><?php echo $this->_var['lang']['label_act_type']; ?></dt><dd><?php echo $this->_var['val']['act_type']; ?><?php if ($this->_var['val']['act_type'] != $this->_var['lang']['fat_goods']): ?><?php echo $this->_var['val']['act_type_ext']; ?><?php endif; ?></dd>
					<?php if ($this->_var['val']['gift']): ?>
					<dt><?php echo $this->_var['lang']['goods_list']; ?><?php echo $this->_var['lang']['colon']; ?></dt>
					<dd class="even">
						<div class="goods_list display_text">
						<ul class="clearfix">
							<?php $_from = $this->_var['val']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['val_gift'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['val_gift']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['val_gift']['iteration']++;
?>
							<li<?php if (($this->_foreach['val_gift']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
								<span class="photo">
									<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'goods',
  'gid' => $this->_var['goods']['id'],
  'append' => $this->_var['goods']['name'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"/></a>
								</span>
								<span class="info">
									<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'goods',
  'gid' => $this->_var['goods']['id'],
  'append' => $this->_var['goods']['name'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="name"><?php echo $this->_var['goods']['name']; ?></a>
									<em class="price"><?php if ($this->_var['goods']['price'] > 0): ?><?php echo $this->_var['goods']['price']; ?><?php echo $this->_var['lang']['unit_yuan']; ?><?php else: ?><?php echo $this->_var['lang']['for_free']; ?><?php endif; ?></em>
								</span>
								<span class="action">
									<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'goods',
  'gid' => $this->_var['goods']['id'],
  'append' => $this->_var['goods']['name'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" class="button"><span><?php echo $this->_var['lang']['btn_detail']; ?></span></a>
								</span>
							</li>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</ul>
						</div>
					</dd>
					<?php endif; ?>
				</dl>
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
	</div>
	
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>