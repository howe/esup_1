<div class="goods_details box thin_box">
	<div class="hd"><h3></h3><div class="extra"></div></div>
	<div class="bd">
		<h1><?php if ($this->_var['cfg']['show_goodssn']): ?><em>( <?php echo $this->_var['lang']['goods_sn']; ?><?php echo $this->_var['goods']['goods_sn']; ?> )</em><?php endif; ?><?php echo $this->_var['goods']['goods_name']; ?></h1>
		<?php if ($this->_var['goods']['is_shipping']): ?><p class="slogan"><?php echo $this->_var['lang']['goods_free_shipping']; ?></p><?php endif; ?>
		<div class="details">
			<form action="javascript:buy(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" id="purchase_form">
				<ul class="basic clearfix">
					<?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
					<li class="sale_price promo"><strong><?php echo $this->_var['lang']['promote_price']; ?><?php echo $this->_var['lang']['colon']; ?></strong><em class="price"><?php echo $this->_var['goods']['promote_price']; ?></em><em class="org_price">( <?php echo $this->_var['lang']['original_price']; ?><?php echo $this->_var['goods']['shop_price_formated']; ?> )</em></li>
					<?php else: ?>
					<li class="sale_price"><strong><?php echo $this->_var['lang']['shop_price']; ?></strong><em class="price"><?php echo $this->_var['goods']['shop_price_formated']; ?></em></li>
					<?php endif; ?>
                    <?php if ($this->_var['goods']['goods_type'] != "10" && $this->_var['goods']['goods_type'] != "11" && $this->_var['goods']['goods_type'] != "12" && $this->_var['goods']['goods_type'] != "13"): ?>
                        <?php if ($this->_var['rank_prices']): ?>
                        <li class="rank_price_wrapper">
                            <strong><?php echo $this->_var['lang']['rank_price_label']; ?><?php echo $this->_var['lang']['colon']; ?></strong>
                            <?php $_from = $this->_var['rank_prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'rank_price');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['rank_price']):
?>
                            <span class="rank_price"><?php echo $this->_var['rank_price']['rank_name']; ?><em id="rank_price_<?php echo $this->_var['key']; ?>" class="price"><?php echo $this->_var['rank_price']['price']; ?></em></span>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </dl>
                        <?php endif; ?>                    
                        <?php if ($this->_var['volume_price_list']): ?>
                        <li class="volume_price_wrapper">
                            <strong><?php echo $this->_var['lang']['volume_price_label']; ?><?php echo $this->_var['lang']['colon']; ?></strong>
                            <?php $_from = $this->_var['volume_price_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('price_key', 'price_list');if (count($_from)):
    foreach ($_from AS $this->_var['price_key'] => $this->_var['price_list']):
?>
                            <span class="volume_price"><?php echo $this->_var['lang']['number_to']; ?><?php echo $this->_var['price_list']['number']; ?><em id="rank_price_<?php echo $this->_var['key']; ?>" class="price"><?php echo $this->_var['price_list']['format_price']; ?></em></span>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </li>
                        <?php endif; ?>
                        <?php if ($this->_var['cfg']['show_marketprice']): ?>
                        <li><strong><?php echo $this->_var['lang']['market_price']; ?></strong><em class="price market_price"><?php echo $this->_var['goods']['market_price']; ?></em></li>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    
                    <?php if ($this->_var['goods']['yxbsl'] != "0" && $this->_var['goods']['yxbsl'] != "1" && $this->_var['goods']['goods_type'] == "10"): ?>
					<li><strong><?php echo $this->_var['lang']['yxbsl']; ?></strong><?php echo $this->_var['goods']['yxsl']; ?>&nbsp;<font color="#FF0000"><?php echo $this->_var['goods']['danwei']; ?></font></li>
					<?php endif; ?>
                    
                    
                    <?php if ($this->_var['goods']['danjia'] != $this->_var['goods']['shop_price_formated'] && $this->_var['goods']['goods_type'] == "10"): ?>
					<li><strong><?php echo $this->_var['lang']['danjia']; ?></strong><em class="price"><?php echo $this->_var['goods']['danjia']; ?></em>&nbsp;<font color="#FF0000"><?php echo $this->_var['lang']['huobi_rmb']; ?>/<?php echo $this->_var['goods']['danwei']; ?></font></li>
					<?php endif; ?>
                    
                    
                    <?php if ($this->_var['goods']['yxm'] && $this->_var['goods']['goods_type'] == "10" || $this->_var['goods']['goods_type'] == "13"): ?>
					<li><strong><?php echo $this->_var['lang']['yxqf']; ?></strong><font color="#FF0000"><?php if ($this->_var['goods']['yxm']): ?><?php echo $this->_var['goods']['yxm']; ?><?php endif; ?><?php if ($this->_var['goods']['yxqm']): ?>/<?php echo $this->_var['goods']['yxqm']; ?><?php endif; ?><?php if ($this->_var['goods']['yxfm']): ?>/<?php echo $this->_var['goods']['yxfm']; ?><?php endif; ?><?php if ($this->_var['goods']['zhenying']): ?>/<font color="#0033FF"><?php echo $this->_var['goods']['zhenying']; ?></font><?php endif; ?></font></li>
					<?php endif; ?>
                    
                    
                    <?php if ($this->_var['goods']['goods_type']): ?>  	
					<li><strong><?php echo $this->_var['lang']['wplx']; ?></strong>
                        <?php if ($this->_var['goods']['goods_type'] == "10"): ?>
                            <?php echo $this->_var['lang']['type_yxb']; ?>
                        <?php endif; ?>
                        <?php if ($this->_var['goods']['goods_type'] == "11"): ?>
                            <?php echo $this->_var['lang']['type_dk']; ?>
                        <?php endif; ?>
                        <?php if ($this->_var['goods']['goods_type'] == "12"): ?>
                            <?php echo $this->_var['lang']['type_czk']; ?>
                        <?php endif; ?>
                        <?php if ($this->_var['goods']['goods_type'] == "13"): ?>
                            <?php echo $this->_var['lang']['type_yxzb']; ?>
                        <?php endif; ?>
                    </li>
					<?php endif; ?>
                    
					<?php if ($this->_var['goods']['goods_brand'] != "" && $this->_var['cfg']['show_brand']): ?>
					<li><strong><?php echo $this->_var['lang']['yscs']; ?></strong><a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>"><?php echo $this->_var['goods']['goods_brand']; ?></a></li>
					<?php endif; ?>
					<?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
					<li class="end_time_wrapper"><strong class="label"><?php echo $this->_var['lang']['end_time']; ?><?php echo $this->_var['lang']['colon']; ?></strong><span class="end_time" title="<?php 
$k = array (
  'name' => 'date_format',
  'date' => $this->_var['goods']['gmt_end_time'],
  'format' => 'Y-m-d-G-i-s',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>"><?php 
$k = array (
  'name' => 'date_format',
  'date' => $this->_var['goods']['gmt_end_time'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?></span></li>
					<?php endif; ?>
					<?php if ($this->_var['cfg']['show_goodsweight']): ?>
					<li><strong><?php echo $this->_var['lang']['goods_weight']; ?></strong><?php echo $this->_var['goods']['goods_weight']; ?></li>
					<?php endif; ?>
					<?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber0']): ?>
					<li><strong><?php echo $this->_var['lang']['goods_number']; ?></strong><?php echo $this->_var['goods']['goods_number']; ?> <?php echo $this->_var['goods']['measure_unit']; ?></li>
					<?php endif; ?>
					<?php if ($this->_var['cfg']['show_addtime']): ?>
					<li><strong><?php echo $this->_var['lang']['add_time']; ?></strong><?php echo $this->_var['goods']['add_time']; ?></li>
					<?php endif; ?>
					<?php if ($this->_var['option']['goods_click_count_enabled']): ?><li><strong><?php echo $this->_var['lang']['goods_click_count']; ?></strong><?php echo $this->_var['goods']['click_count']; ?></li><?php endif; ?>
					<?php if ($this->_var['goods']['give_integral'] > 0): ?>
					<li><strong><?php echo $this->_var['lang']['goods_give_integral']; ?></strong><?php echo $this->_var['goods']['give_integral']; ?> <?php echo $this->_var['points_name']; ?></li>
					<?php endif; ?>
					<?php if ($this->_var['cfg']['use_integral']): ?>
					<li><strong><?php echo $this->_var['lang']['goods_integral']; ?></strong><?php echo $this->_var['goods']['integral']; ?> <?php echo $this->_var['points_name']; ?></li>
					<?php endif; ?>
					<?php if ($this->_var['goods']['bonus_money']): ?>
					<li><strong><?php echo $this->_var['lang']['goods_bonus']; ?></strong><?php echo $this->_var['goods']['bonus_money']; ?></li>
					<?php endif; ?>
				</ul>
				<div class="actions">
					<?php if ($this->_var['specification']): ?>
					<div class="properties">
						<?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');$this->_foreach['specification'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['specification']['total'] > 0):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
        $this->_foreach['specification']['iteration']++;
?>
						<dl class="clearfix<?php if (($this->_foreach['specification']['iteration'] <= 1)): ?> first<?php endif; ?>"<?php if ($this->_var['spec']['attr_type'] == 2): ?> title="<?php echo $this->_var['lang']['multi_choice']; ?>"<?php endif; ?>>
							<dt><?php echo $this->_var['spec']['name']; ?><?php echo $this->_var['lang']['colon']; ?></dt>
							<?php if ($this->_var['spec']['attr_type'] == 1): ?>
							<dd class="radio">
								<?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
								<label for="spec_value_<?php echo $this->_var['value']['id']; ?>" title="<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php echo $this->_var['value']['format_price']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?>">
									<input type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>"<?php if ($this->_var['key'] == 0): ?> checked="checked"<?php endif; ?> />
								<?php echo $this->_var['value']['label']; ?></label>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</dd>
							<?php else: ?>
							<dd class="checkbox">
								<?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
								<label for="spec_value_<?php echo $this->_var['value']['id']; ?>" title="<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php echo $this->_var['value']['format_price']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?>">
									<input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" />
								<?php echo $this->_var['value']['label']; ?></label>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</dd>
							<?php endif; ?>
						</dl>
						<input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					<?php endif; ?>
					<p><strong><?php echo $this->_var['lang']['number']; ?><?php echo $this->_var['lang']['colon']; ?></strong><input type="text" name="number" value="1" size="4" class="number" id="number" /><?php echo $this->_var['goods']['measure_unit']; ?><?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber']): ?><span class="stock"><?php echo $this->_var['lang']['goods_number']; ?><?php echo $this->_var['goods']['goods_number']; ?><?php echo $this->_var['goods']['measure_unit']; ?></span><?php endif; ?></p>
					<p><strong><?php echo $this->_var['lang']['amount']; ?><?php echo $this->_var['lang']['colon']; ?></strong><span class="price amount"><?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></span></p>
					<p>
					<?php if ($this->_var['goods']['goods_number'] == 0): ?>
					<a href="user.php?act=add_booking&id=<?php echo $this->_var['goods']['goods_id']; ?>" class="submit btn_special btn_booking"><span><?php echo $this->_var['lang']['btn_booking']; ?></span></a>
					<?php else: ?>
					<a href="javascript:buy(<?php echo $this->_var['goods']['goods_id']; ?>)" class="submit btn_special btn_add_to_cart"><span><?php echo $this->_var['lang']['btn_buy']; ?></span></a>
					<?php endif; ?>
					</p>
				</div>
				<p class="extra_options">
					<a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)" class="col"><?php echo $this->_var['lang']['collect']; ?></a>
					<?php if ($this->_var['affiliate']['on']): ?><a href="user.php?act=affiliate&goodsid=<?php echo $this->_var['goods']['goods_id']; ?>" class="aff"><?php echo $this->_var['lang']['recommend']; ?></a><?php endif; ?>
				</p>
				<?php 
$k = array (
  'name' => 'share_this',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>
			</form>
		</div>
		<div class="extra_details">
			<?php if ($this->_var['option']['gallery_mode'] == 'flash'): ?>
			<div class="gallery" id="gallery">
				<?php if ($this->_var['pictures']['0']['img_url']): ?><a href="gallery.php?id=<?php echo $this->_var['id']; ?>&img=<?php echo $this->_var['pictures']['0']['img_id']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" class="cover" rel="external"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>"/></a><?php else: ?><span class="cover"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"/></span><?php endif; ?>
				<?php if ($this->_var['pictures']['1']['img_url']): ?>
				<div class="thumb">
					<div class="thumb_inner">
					<ul>
						<?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['pictures'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pictures']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['pictures']['iteration']++;
?>
						<li><a href="<?php echo $this->_var['option']['static_path']; ?>gallery.php?id=<?php echo $this->_var['id']; ?>&img=<?php echo $this->_var['picture']['img_id']; ?>" title="<?php echo $this->_var['picture']['img_desc']; ?>" rel="external"><img src="<?php echo $this->_var['option']['static_path']; ?><?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['picture']['img_desc']; ?>"></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php elseif ($this->_var['option']['gallery_mode'] == 'color_box'): ?>
			<div class="gallery" id="gallery">
				<?php if ($this->_var['pictures']['0']['img_url']): ?><a href="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['pictures']['0']['img_url']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" class="cover" rel="gallery"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>"/></a><?php else: ?><span class="cover"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"/></span><?php endif; ?>
				<?php if ($this->_var['pictures']['1']['img_url']): ?>
				<div class="thumb">
					<div class="thumb_inner">
					<ul>
						<?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['pictures'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pictures']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['pictures']['iteration']++;
?>
						<li><a href="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['picture']['img_url']; ?>" title="<?php echo $this->_var['picture']['img_desc']; ?>" rel="gallery"><img src="<?php echo $this->_var['option']['static_path']; ?><?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['picture']['img_desc']; ?>"></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php elseif ($this->_var['option']['gallery_mode'] == 'cloud_zoom'): ?>
			<div class="gallery" id="gallery">
				<?php if ($this->_var['pictures']['0']['img_url']): ?><a href="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['pictures']['0']['img_url']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" class="cover cloud_zoom" id="product_img_large"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>"/></a><?php else: ?><span class="cover"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"/></span><?php endif; ?>
				<?php if ($this->_var['pictures']['1']['img_url']): ?>
				<div class="thumb">
					<div class="thumb_inner">
					<ul>
						<?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['pictures'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pictures']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['pictures']['iteration']++;
?>
						<li><a href="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['picture']['img_url']; ?>" title="<?php echo $this->_var['picture']['img_desc']; ?>" class="cloud_zoom_gallery" rel="useZoom: 'product_img_large', smallImage: '<?php echo $this->_var['option']['static_path']; ?><?php if ($this->_var['option']['gallery_thumbnails_enabled']): ?><?php echo $this->_var['picture']['thumb2']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>', title: '<?php echo $this->_var['picture']['img_desc']; ?>'"><img src="<?php echo $this->_var['option']['static_path']; ?><?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['picture']['img_desc']; ?>"></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php else: ?>
			<div class="gallery" id="gallery">
				<?php if ($this->_var['pictures']['0']['img_url']): ?><a href="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['pictures']['0']['img_url']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" class="cover" rel="external"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>"/></a><?php else: ?><span class="cover"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"/></span><?php endif; ?>
				<?php if ($this->_var['pictures']['1']['img_url']): ?>
				<div class="thumb">
					<div class="thumb_inner">
					<ul>
						<?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['pictures'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pictures']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['pictures']['iteration']++;
?>
						<li><a href="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['picture']['img_url']; ?>" title="<?php echo $this->_var['picture']['img_desc']; ?>" rel="external"><img src="<?php echo $this->_var['option']['static_path']; ?><?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['picture']['img_desc']; ?>"></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['promotion']['0']['url']): ?>
			<dl class="goods_promotion">
				<dt><?php echo $this->_var['lang']['activity']; ?></dt>
				<?php $_from = $this->_var['promotion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
				<dd><?php if ($this->_var['item']['type'] == "snatch"): ?><a href="snatch.php" class="type type_snatch"><?php echo $this->_var['lang']['snatch']; ?></a>
				<?php elseif ($this->_var['item']['type'] == "group_buy"): ?><a href="group_buy.php" class="type type_group_buy"><?php echo $this->_var['lang']['group_buy']; ?></a>
				<?php elseif ($this->_var['item']['type'] == "auction"): ?><a href="auction.php" class="type type_auction"><?php echo $this->_var['lang']['auction']; ?></a>
				<?php elseif ($this->_var['item']['type'] == "favourable"): ?><a href="activity.php" class="type type_activity"><?php echo $this->_var['lang']['favourable']; ?></a>
				<?php elseif ($this->_var['item']['type'] == "package"): ?><a href="package.php" class="type type_package"><?php echo $this->_var['lang']['remark_package']; ?></a>
				<?php endif; ?><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['act_name']; ?></a>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</dd>
			</dl>
			<?php endif; ?>
			<?php if ($this->_var['option']['tags_enabled']): ?>
			<div class="goods_tags clearfix">
				<h2><?php echo $this->_var['lang']['goods_tags']; ?></h2>
				<p id="tags" class="tags">
					<?php $_from = $this->_var['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?>
					<a href="search.php?keywords=<?php echo urlencode($this->_var['tag']['tag_words']); ?>" class="item"><?php echo htmlspecialchars($this->_var['tag']['tag_words']); ?><em><?php echo $this->_var['tag']['tag_count']; ?></em></a>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>&nbsp;
				</p>
				<form action="javascript:void(0);" onSubmit="return submitTag()" id="tag_form" class="tag_form">
					<input type="text" name="tag" class="tag_input"/>
					<input type="submit" value="<?php echo $this->_var['lang']['add']; ?>" class="btn_s1"/>
					<input type="hidden" name="goods_id" value="<?php echo $this->_var['goods']['goods_id']; ?>"/>
				</form>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>