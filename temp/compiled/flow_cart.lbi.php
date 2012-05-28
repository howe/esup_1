<div class="box thin_box full_box" id="list">
	<div class="hd"><h3><?php echo $this->_var['lang']['cart']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<div class="flow_bar"></div>
		<div class="cart_list">
			<?php if ($this->_var['goods_list']): ?>
			<form method="post" action="flow.php">
				<table class="data_table">
					<colgroup>
						<col width="500"/>
						<col width="60"/>
						<col width="50"/>
						<col width="80"/>
						<col width="50"/>
					</colgroup>
					<thead>
						<tr>
							<th><?php echo $this->_var['lang']['goods_name']; ?></th>
							<th><?php echo $this->_var['lang']['shop_prices']; ?></th>
							<th><?php echo $this->_var['lang']['number']; ?></th>
							<th><?php echo $this->_var['lang']['subtotal']; ?></th>
							<th class="last"><?php echo $this->_var['lang']['handle']; ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
						<tr class="<?php echo $this->cycle(array('values'=>'odd,even')); ?><?php if (($this->_foreach['goods_list']['iteration'] == $this->_foreach['goods_list']['total'])): ?> last<?php endif; ?>">
							<td>
								<?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
									<a href="<?php 
$k = array (
  'name' => 'goods_info',
  'id' => $this->_var['goods']['goods_id'],
  'type' => 'url',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" class="photo" rel="external"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['goods_thumb']; ?>"/></a>
									<a href="<?php 
$k = array (
  'name' => 'goods_info',
  'id' => $this->_var['goods']['goods_id'],
  'type' => 'url',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" class="name" rel="external"><?php echo $this->_var['goods']['goods_name']; ?></a>
									<span class="extra_info">
										<?php if ($this->_var['goods']['goods_attr']): ?><?php echo $this->_var['goods']['goods_attr']; ?><?php endif; ?>
										<?php if ($this->_var['goods']['is_shipping']): ?><em class="carriage_free"><?php echo $this->_var['lang']['carriage_free']; ?></em><?php endif; ?>
										<?php if ($this->_var['goods']['parent_id'] > 0): ?><em class="accessories"><?php echo $this->_var['lang']['accessories']; ?></em><?php endif; ?>
										<?php if ($this->_var['goods']['is_gift'] > 0): ?><em class="largess"><?php echo $this->_var['lang']['largess']; ?></em><?php endif; ?>
									</span>
								<?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
									<span class="name package_name"><?php echo $this->_var['goods']['goods_name']; ?></span>
									<span class="package_goods_list"><?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');$this->_foreach['package_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['package_goods_list']):
        $this->_foreach['package_goods_list']['iteration']++;
?><em><?php echo $this->_var['package_goods_list']['goods_name']; ?></em><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span>
								<?php else: ?>
									<?php echo $this->_var['goods']['goods_name']; ?>
								<?php endif; ?>
							</td>
							<td><?php echo $this->_var['goods']['goods_price']; ?></td>
							<td>
								<?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
								<input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="4" class="number" title="<?php echo $this->_var['lang']['goods_number_tip']; ?>"/>
								<?php else: ?>
								<?php echo $this->_var['goods']['goods_number']; ?>
								<?php endif; ?>
							</td>
							<td class="price subtotal"><?php echo $this->_var['goods']['subtotal']; ?></td>
							<td class="last">
								<a href="flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>" class="icon_delete tip" title="<?php echo $this->_var['lang']['drop']; ?>"><?php echo $this->_var['lang']['drop']; ?></a>
								<?php if ($_SESSION['user_id'] > 0): ?>
								<a href="flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>" class="icon_heart tip" title="<?php echo $this->_var['lang']['drop_to_collect']; ?>"><?php echo $this->_var['lang']['drop_to_collect']; ?></a>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" class="actions last">
								<p class="info"><?php if ($this->_var['discount'] > 0): ?><?php echo $this->_var['your_discount']; ?><br /><?php endif; ?><?php echo $this->_var['shopping_money']; ?></p>
								<a href="flow.php?step=clear" class="button text_button"/><span><?php echo $this->_var['lang']['clear_cart']; ?></span></a>
								<input name="submit" type="submit" value="<?php echo $this->_var['lang']['update_cart']; ?>" class="btn_s3"/>
								<input type="hidden" name="step" value="update_cart" />
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
			<p class="flow_action"><a href="flow.php?step=checkout" class="next btn_special btn_checkout_now"><span><?php echo $this->_var['lang']['checkout_now']; ?></span></a><a href="./" class="back"><?php echo $this->_var['lang']['continue_shopping']; ?></a></p>
			<?php else: ?>
			<p class="empty"><?php echo $this->_var['lang']['cart_empty']; ?></p>
			<p class="flow_action"><a href="<?php echo $this->_var['hu']; ?>" class="next btn_special btn_continue_shopping"><span><?php echo $this->_var['lang']['continue_shopping']; ?></span></a></p>
			<?php endif; ?>
		</div>
		<?php if ($this->_var['fittings_list']): ?>
		<h2 class="title"><span><?php echo $this->_var['lang']['goods_fittings']; ?></span><em class="extra"></em></h2>
		<div class="fittings_list goods_list display_grid">
			<form action="flow.php" method="post">
				<ul>
					<?php $_from = $this->_var['fittings_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'fittings');$this->_foreach['fittings_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fittings_list']['total'] > 0):
    foreach ($_from AS $this->_var['fittings']):
        $this->_foreach['fittings_list']['iteration']++;
?>
					<li title="<?php echo $this->_var['lang']['parent_name']; ?><?php echo $this->_var['fittings']['parent_short_name']; ?>"<?php if (($this->_foreach['fittings_list']['iteration'] - 1) % 5 == 0): ?> class="first_child"<?php endif; ?>>
						<span class="photo">
							<a href="<?php echo $this->_var['fittings']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['fittings']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>"/></a>
						</span>
						<span class="info">
							<a href="<?php echo $this->_var['fittings']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>" class="name"><?php echo $this->_var['fittings']['short_name']; ?></a>
							<em class="price fittings"><?php echo $this->_var['lang']['fittings_price']; ?><?php echo $this->_var['fittings']['fittings_price']; ?></em>
						</span>
						<span class="actions">
							<a href="javascript:fittings_to_flow(<?php echo $this->_var['fittings']['goods_id']; ?>,<?php echo $this->_var['fittings']['parent_id']; ?>)" class="button"><span><?php echo $this->_var['lang']['collect_to_flow']; ?></span></a>
						</span>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
			</form>
		</div>
		<?php endif; ?>
		<?php if ($_SESSION['user_id'] > 0): ?><?php 
$k = array (
  'name' => 'collection_goods',
  'number' => '6',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?><?php endif; ?>
		<?php if ($this->_var['favourable_list']): ?>
		<h2 class="title"><span><?php echo $this->_var['lang']['label_favourable']; ?></span><em class="extra"></em></h2>
		<div class="favourable_list">
			<?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
			<form action="flow.php" method="post">
				<h4><?php echo $this->_var['favourable']['act_name']; ?></h4>
				<table class="data_table">
					<colgroup>
						<col width="100"/>
						<col width="700"/>
					</colgroup>
					<tbody>
						<tr class="odd">
							<th><?php echo $this->_var['lang']['favourable_period']; ?></th>
							<td class="last"><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
						</tr>
						<tr class="even">
							<th><?php echo $this->_var['lang']['favourable_range']; ?></th>
							<td class="last"><?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br/><?php echo $this->_var['favourable']['act_range_desc']; ?></td>
						</tr>
						<tr class="odd">
							<th><?php echo $this->_var['lang']['favourable_amount']; ?></th>
							<td class="last"><?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
						</tr>
						<tr class="even last">
							<th><?php echo $this->_var['lang']['favourable_type']; ?></th>
							<td class="last">
								<span><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
								<?php if ($this->_var['favourable']['act_type'] == 0): ?>
								<?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br/>
								<input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
								<a href="<?php 
$k = array (
  'name' => 'build_uri',
  'app' => 'goods',
  'gid' => $this->_var['gift']['id'],
  'append' => $this->_var['gift']['name'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>" rel="external"><?php echo $this->_var['gift']['name']; ?></a> (<?php echo $this->_var['gift']['formated_price']; ?>)
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								<?php endif; ?>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<?php if ($this->_var['favourable']['available']): ?>
						<tr>
							<td class="last">&nbsp;</td>
							<td class="last">
								<input type="submit" value="<?php echo $this->_var['lang']['add_to_cart']; ?>" class="btn_s3"/>
								<input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>"/>
								<input type="hidden" name="step" value="add_favourable"/>
							</td>
						</tr>
						<?php endif; ?>
					</tfoot>
				</table>
			</form>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
		<?php endif; ?>
	</div>
</div>