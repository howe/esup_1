<div class="promotion_goods_list box">
	<div class="hd"><h3><?php echo $this->_var['lang']['group_buy_goods']; ?></h3><div class="extra"></div></div>
	<div class="bd">
		<?php if ($this->_var['gb_list']): ?>
		<?php $_from = $this->_var['gb_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group_buy');$this->_foreach['gb_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gb_list']['total'] > 0):
    foreach ($_from AS $this->_var['group_buy']):
        $this->_foreach['gb_list']['iteration']++;
?>
		<div class="item clearfix<?php if (($this->_foreach['gb_list']['iteration'] <= 1)): ?> first<?php endif; ?>">
			<h2 class="name"><a href="<?php echo $this->_var['group_buy']['url']; ?>"><?php echo htmlspecialchars($this->_var['group_buy']['goods_name']); ?></a></h2>
			<p class="photo_wrapper"><a href="<?php echo $this->_var['group_buy']['url']; ?>" class="photo"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['group_buy']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['group_buy']['goods_name']); ?>"/></a></p>
			<ul class="details">
				<li class="end_time_wrapper"><strong class="label"><?php echo $this->_var['lang']['end_time']; ?><?php echo $this->_var['lang']['colon']; ?></strong><span class="end_time" title="<?php 
$k = array (
  'name' => 'date_format',
  'date' => $this->_var['group_buy']['end_date'],
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
  'date' => $this->_var['group_buy']['end_date'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?></span></li>
				<li><strong><?php echo $this->_var['lang']['gb_start_date']; ?></strong><?php echo $this->_var['group_buy']['formated_start_date']; ?></li>
				<li><strong><?php echo $this->_var['lang']['gb_end_date']; ?></strong><?php echo $this->_var['group_buy']['formated_end_date']; ?></li>
			</ul>
			<div class="actions">
				<?php $_from = $this->_var['group_buy']['price_ladder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
				<p><strong><?php echo $this->_var['lang']['group_buy_amount_to']; ?><?php echo $this->_var['item']['amount']; ?></strong><?php echo $this->_var['lang']['discount_price']; ?><em class="price"><?php echo $this->_var['item']['formated_price']; ?></em></p>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<p class="button_wrapper"><a href="<?php echo $this->_var['group_buy']['url']; ?>" class="btn_special btn_detail"><span><?php echo $this->_var['lang']['btn_detail']; ?></span></a></p>
			</div>
		</div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		<?php else: ?>
		<div class="empty"><?php echo $this->_var['lang']['group_goods_empty']; ?></div>
		<?php endif; ?>
		<?php echo $this->fetch('library/pages.lbi'); ?>
	</div>
</div>