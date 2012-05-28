<div class="tab_able_box">
<div class="tab_wrapper">
	<p class="tabs order">
		<em class="label"><?php echo $this->_var['lang']['order_by']; ?><?php echo $this->_var['lang']['colon']; ?></em>
		<?php if ($this->_var['pager']['sort'] == 'goods_id'): ?>
		<a href="<?php if ($this->_var['pager']['order'] == 'DESC'): ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
		<?php if ($this->_var['pager']['sort'] == 'shop_price'): ?>
		<a href="<?php if ($this->_var['pager']['order'] == 'DESC'): ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'shop_price',
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'shop_price',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php endif; ?>#goods_list" class="current"><span><?php echo $this->_var['lang']['order_by_price']; ?><?php if ($this->_var['pager']['order'] == 'ASC'): ?><em class="arrow_up">&uarr;</em><?php else: ?><em class="arrow_down">&darr;</em><?php endif; ?></span></a>
		<?php else: ?>
		<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'shop_price',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>#goods_list"><span><?php echo $this->_var['lang']['order_by_price']; ?></span></a>
		<?php endif; ?>
        <?php if ($this->_var['pager']['sort'] == 'danjia'): ?>
		<a href="<?php if ($this->_var['pager']['order'] == 'DESC'): ?><?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'danjia',
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'danjia',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php endif; ?>#goods_list" class="current"><span><?php echo $this->_var['lang']['order_by_danjia']; ?><?php if ($this->_var['pager']['order'] == 'ASC'): ?><em class="arrow_up">&uarr;</em><?php else: ?><em class="arrow_down">&darr;</em><?php endif; ?></span></a>
		<?php else: ?>
		<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
  'page' => $this->_var['pager']['page'],
  'sort' => 'danjia',
  'order' => 'DESC',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>#goods_list"><span><?php echo $this->_var['lang']['order_by_danjia']; ?></span></a>
		<?php endif; ?>
	</p>
	<div class="extra">
		<?php if ($this->_var['option']['display_mode_enabled']): ?>
		<p class="display">
		<em><?php echo $this->_var['lang']['display']; ?><?php echo $this->_var['lang']['colon']; ?></em>
		<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
  'app' => 'category',
  'cid' => $this->_var['category'],
  'bid' => $this->_var['brand_id'],
  'price_min' => $this->_var['price_min'],
  'price_max' => $this->_var['price_max'],
  'filter_attr' => $this->_var['filter_attr'],
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
	<div class="hd"><h3><?php echo $this->_var['lang']['goods_list']; ?></h3><div class="extra"></div></div>
	<div class="bd goods_list<?php if ($this->_var['pager']['display'] == 'list'): ?> display_list<?php elseif ($this->_var['pager']['display'] == 'text'): ?> display_text<?php endif; ?>">
		<?php if ($this->_var['goods_list']): ?>
		<ul>
			<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_26314800_1328330823');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_26314800_1328330823']):
        $this->_foreach['goods_list']['iteration']++;
?>
			<?php if ($this->_var['goods_0_26314800_1328330823']['goods_id']): ?>
			<li<?php if ($this->_var['pager']['display'] == 'grid'): ?><?php if (($this->_foreach['goods_list']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?><?php elseif ($this->_var['pager']['display'] == 'list'): ?><?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?> class="first_child"<?php endif; ?><?php elseif ($this->_var['pager']['display'] == 'text'): ?><?php if (($this->_foreach['goods_list']['iteration'] <= 1)): ?> class="first"<?php endif; ?><?php endif; ?> data="id:'<?php echo $this->_var['goods_0_26314800_1328330823']['goods_id']; ?>'">
				<span class="photo">
					<a href="<?php echo $this->_var['goods_0_26314800_1328330823']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_26314800_1328330823']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php if ($this->_var['pager']['display'] == 'list'): ?><?php echo $this->_var['goods_0_26314800_1328330823']['goods_img']; ?><?php else: ?><?php echo $this->_var['goods_0_26314800_1328330823']['goods_thumb']; ?><?php endif; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_26314800_1328330823']['goods_name']); ?>"/></a>
				</span>
				<span class="info">
					<a href="<?php echo $this->_var['goods_0_26314800_1328330823']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_26314800_1328330823']['goods_name']); ?>" class="name"><?php echo $this->_var['goods_0_26314800_1328330823']['goods_style_name']; ?></a>
					<em class="price"><font color="#333333"><?php echo $this->_var['lang']['list_zongjia']; ?></font><?php if ($this->_var['goods_0_26314800_1328330823']['promote_price']): ?><?php echo $this->_var['goods_0_26314800_1328330823']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_26314800_1328330823']['shop_price']; ?><?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333"><?php echo $this->_var['lang']['list_fs']; ?></font><?php echo $this->_var['goods_0_26314800_1328330823']['goods_number']; ?></em><?php if ($this->_var['goods_0_26314800_1328330823']['promote_price']): ?><span class="promo" title="<?php echo htmlspecialchars($this->_var['goods_0_26314800_1328330823']['shop_price']); ?> &gt; <?php echo htmlspecialchars($this->_var['goods_0_26314800_1328330823']['promote_price']); ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
                    <?php if ($this->_var['goods_0_26314800_1328330823']['type'] == "10"): ?>
                    <em><?php echo $this->_var['lang']['list_danjia']; ?><?php echo $this->_var['goods_0_26314800_1328330823']['danjia']; ?>&nbsp;<font color="#FF3333"><?php echo $this->_var['lang']['huobi_rmb']; ?>/<?php echo $this->_var['goods_0_26314800_1328330823']['danwei']; ?></font></em>
					<?php endif; ?>
					<?php if ($this->_var['pager']['display'] == 'text'): ?>&nbsp;&nbsp;<?php else: ?><br/><?php endif; ?>				
                    <em><?php echo $this->_var['lang']['list_wplx']; ?>
							<font color="#0066FF">
                            <?php if ($this->_var['goods_0_26314800_1328330823']['type'] == "10"): ?>
                                <?php echo $this->_var['lang']['type_yxb']; ?>
                            <?php endif; ?>
                            <?php if ($this->_var['goods_0_26314800_1328330823']['type'] == "11"): ?>
                                <?php echo $this->_var['lang']['type_dk']; ?>
                            <?php endif; ?>
                            <?php if ($this->_var['goods_0_26314800_1328330823']['type'] == "12"): ?>
                                <?php echo $this->_var['lang']['type_czk']; ?>
                            <?php endif; ?>
                            <?php if ($this->_var['goods_0_26314800_1328330823']['type'] == "13"): ?>
                                <?php echo $this->_var['lang']['type_yxzb']; ?>
                            <?php endif; ?>
							</font>
                        </em>
					<?php if ($this->_var['pager']['display'] == 'text'): ?>&nbsp;&nbsp;<?php else: ?><br/><?php endif; ?>
				<?php if ($this->_var['goods_0_26314800_1328330823']['type'] == "10" || $this->_var['goods_0_26314800_1328330823']['type'] == "13"): ?>		
                     <em><?php echo $this->_var['lang']['list_qu']; ?><font color="#FF3333"><?php if ($this->_var['goods_0_26314800_1328330823']['yxm']): ?><?php echo $this->_var['goods_0_26314800_1328330823']['yxm']; ?><?php endif; ?><?php if ($this->_var['goods_0_26314800_1328330823']['yxqm']): ?>/<?php echo $this->_var['goods_0_26314800_1328330823']['yxqm']; ?><?php endif; ?><?php if ($this->_var['goods_0_26314800_1328330823']['yxfm']): ?>/<?php echo $this->_var['goods_0_26314800_1328330823']['yxfm']; ?><?php endif; ?><?php if ($this->_var['goods_0_26314800_1328330823']['zhenying']): ?>/<font color="#0033FF"><?php echo $this->_var['goods_0_26314800_1328330823']['zhenying']; ?></font><?php endif; ?></font></em>   
				<?php endif; ?>         
				</span>
				<?php if ($this->_var['pager']['display'] == 'text'): ?>
				<span class="actions">
					<a href="javascript:buy(<?php echo $this->_var['goods_0_26314800_1328330823']['goods_id']; ?>)" class="buy button brighter_button"><span><?php echo $this->_var['lang']['btn_buy']; ?></span></a>
					<a href="javascript:collect(<?php echo $this->_var['goods_0_26314800_1328330823']['goods_id']; ?>);" class="collect button"><span><?php echo $this->_var['lang']['btn_collect']; ?></span></a>
					<?php if ($this->_var['option']['compare_enabled']): ?><a href="javascript:void(0);" onClick="compare.add(<?php echo $this->_var['goods_0_26314800_1328330823']['goods_id']; ?>,'<?php echo htmlspecialchars(sub_str($this->_var['goods_0_26314800_1328330823']['goods_name'],'30')); ?>','<?php echo $this->_var['goods_0_26314800_1328330823']['type']; ?>','<?php echo $this->_var['goods_0_26314800_1328330823']['url']; ?>','<?php echo $this->_var['goods_0_26314800_1328330823']['goods_thumb']; ?>')" class="compare button"><span><?php echo $this->_var['lang']['btn_compare']; ?></span></a><?php endif; ?>
				</span>
				<?php endif; ?>
			</li>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		<?php echo $this->fetch('library/pages.lbi'); ?>
		<?php else: ?>
		<p class="empty"><?php echo $this->_var['lang']['goods_empty']; ?></p>
		<?php endif; ?>
	</div>
</div>
</div>