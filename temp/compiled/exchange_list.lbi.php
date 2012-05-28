<div class="tab_able_box">
<div class="tab_wrapper">
	<p class="tabs order">
		<em class="label"><?php echo $this->_var['lang']['order_by']; ?><?php echo $this->_var['lang']['colon']; ?></em>
		<?php if ($this->_var['pager']['sort'] == 'goods_id'): ?>
		<a href="<?php if ($this->_var['pager']['order'] == 'DESC'): ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'goods_id',
  'order' => 'ASC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php else: ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'goods_id',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php endif; ?>#goods_list" class="current"><span><?php echo $this->_var['lang']['order_by_time']; ?><?php if ($this->_var['pager']['order'] == 'DESC'): ?><em class="arrow_up">&uarr;</em><?php else: ?><em class="arrow_down">&darr;</em><?php endif; ?></span></a>
		<?php else: ?>
		<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'goods_id',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>#goods_list"><span><?php echo $this->_var['lang']['order_by_time']; ?></span></a>
		<?php endif; ?>
		<?php if ($this->_var['pager']['sort'] == 'last_update'): ?>
		<a href="<?php if ($this->_var['pager']['order'] == 'DESC'): ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'last_update',
  'order' => 'ASC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php else: ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'last_update',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php endif; ?>#goods_list" class="current"><span><?php echo $this->_var['lang']['order_by_update']; ?><?php if ($this->_var['pager']['order'] == 'DESC'): ?><em class="arrow_up">&uarr;</em><?php else: ?><em class="arrow_down">&darr;</em><?php endif; ?></span></a>
		<?php else: ?>
		<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'last_update',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>#goods_list"><span><?php echo $this->_var['lang']['order_by_update']; ?></span></a>
		<?php endif; ?>
		<?php if ($this->_var['pager']['sort'] == 'exchange_integral'): ?>
		<a href="<?php if ($this->_var['pager']['order'] == 'DESC'): ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'exchange_integral',
  'order' => 'ASC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php else: ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'exchange_integral',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php endif; ?>#goods_list" class="current"><span><?php echo $this->_var['lang']['order_by_point']; ?><?php if ($this->_var['pager']['order'] == 'ASC'): ?><em class="arrow_up">&uarr;</em><?php else: ?><em class="arrow_down">&darr;</em><?php endif; ?></span></a>
		<?php else: ?>
		<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'exchange_integral',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>#goods_list"><span><?php echo $this->_var['lang']['order_by_point']; ?></span></a>
		<?php endif; ?>
	</p>
	<div class="extra">
		<?php if ($this->_var['option']['display_mode_enabled']): ?>
		<p class="display">
		<em><?php echo $this->_var['lang']['display']; ?><?php echo $this->_var['lang']['colon']; ?></em>
		<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => $this->_var['pager']['sort'],
  'order' => $this->_var['pager']['order'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php if ($this->_var['option']['rewrite'] == '0'): ?>&<?php else: ?>?<?php endif; ?>display=grid#goods_list" title="<?php echo $this->_var['lang']['display_grid']; ?>" class="dp_grid<?php if ($this->_var['pager']['display'] == 'grid'): ?> dp_grid_current<?php endif; ?>"><?php echo $this->_var['lang']['display_grid']; ?></a>
		<?php if ($this->_var['option']['display_list_enabled']): ?><a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => $this->_var['pager']['sort'],
  'order' => $this->_var['pager']['order'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php if ($this->_var['option']['rewrite'] == '0'): ?>&<?php else: ?>?<?php endif; ?>display=list#goods_list" title="<?php echo $this->_var['lang']['display_list']; ?>" class="dp_list<?php if ($this->_var['pager']['display'] == 'list'): ?> dp_list_current<?php endif; ?>"><?php echo $this->_var['lang']['display_list']; ?></a><?php endif; ?>
		<?php if ($this->_var['option']['display_text_enabled']): ?><a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'exchange',
  'cid' => $this->_var['category'],
  'integral_min' => $this->_var['integral_min'],
  'integral_max' => $this->_var['integral_max'],
  'page' => $this->_var['pager']['page'],
  'sort' => $this->_var['pager']['sort'],
  'order' => $this->_var['pager']['order'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php if ($this->_var['option']['rewrite'] == '0'): ?>&<?php else: ?>?<?php endif; ?>display=text#goods_list" title="<?php echo $this->_var['lang']['display_text']; ?>" class="dp_text<?php if ($this->_var['pager']['display'] == 'text'): ?> dp_text_current<?php endif; ?>"><?php echo $this->_var['lang']['display_text']; ?></a><?php endif; ?>
		</p>
		<?php endif; ?>
	</div>
</div>
<div class="box" id="goods_list">
	<div class="hd"><h3><?php echo $this->_var['lang']['goods_list']; ?></h3><div class="extra"></div>
	</div>
	<div class="bd goods_list<?php if ($this->_var['pager']['display'] == 'list'): ?> display_list<?php elseif ($this->_var['pager']['display'] == 'text'): ?> display_text<?php endif; ?>">
		<?php if ($this->_var['goods_list']): ?>
		<ul>
			<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
			<li<?php if ($this->_var['pager']['display'] == 'grid'): ?><?php if (($this->_foreach['goods_list']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?><?php elseif ($this->_var['pager']['display'] == 'list'): ?><?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?> class="first_child"<?php endif; ?><?php elseif ($this->_var['pager']['display'] == 'text'): ?><?php if (($this->_foreach['goods_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?><?php endif; ?> data="id:'<?php echo $this->_var['goods']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php if ($this->_var['pager']['display'] == 'list'): ?><?php echo $this->_var['goods']['goods_img']; ?><?php else: ?><?php echo $this->_var['goods']['goods_thumb']; ?><?php endif; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="name"><?php echo $this->_var['goods']['goods_style_name']; ?></a>
					<em class="price discount"><span><?php echo $this->_var['lang']['exchange_integral']; ?></span><?php echo $this->_var['goods']['exchange_integral']; ?></em>
				</span>
				<?php if ($this->_var['pager']['display'] == 'text'): ?>
				<span class="actions">
					<a href="<?php echo $this->_var['goods']['url']; ?>" class="button brighter_button"><span><?php echo $this->_var['lang']['btn_detail']; ?></span></a>
				</span>
				<?php endif; ?>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		<?php echo $this->fetch('library/pages.lbi'); ?>
		<?php else: ?>
		<p class="empty"><?php echo $this->_var['lang']['goods_empty']; ?></p>
		<?php endif; ?>
	</div>
</div>
</div>