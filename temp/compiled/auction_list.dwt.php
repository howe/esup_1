<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php if ($this->_var['description']): ?><meta name="description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<?php if ($this->_var['keywords']): ?><meta name="keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<title><?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>" class="right_sidebar">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	<?php echo $this->fetch('library/ur_here.lbi'); ?>
	<div class="col_main">
	<?php echo $this->_var['render']['before_col_main']; ?>
	
		<div class="promotion_goods_list box">
			<div class="hd"><h3><?php echo $this->_var['lang']['auction_goods']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<?php if ($this->_var['auction_list']): ?>
				<?php $_from = $this->_var['auction_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'auction');$this->_foreach['auction_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['auction_list']['total'] > 0):
    foreach ($_from AS $this->_var['auction']):
        $this->_foreach['auction_list']['iteration']++;
?>
				<div class="item clearfix<?php if (($this->_foreach['auction_list']['iteration'] <= 1)): ?> first<?php endif; ?>">
					<h2 class="name"><a href="<?php echo $this->_var['auction']['url']; ?>"><?php echo htmlspecialchars($this->_var['auction']['goods_name']); ?></a></h2>
					<p class="photo_wrapper"><a href="<?php echo $this->_var['auction']['url']; ?>" class="photo"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['auction']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['auction']['goods_name']); ?>"/></a></p>
					<ul class="details">
						<li class="end_time_wrapper"><strong class="label"><?php echo $this->_var['lang']['end_time']; ?><?php echo $this->_var['lang']['colon']; ?></strong><span class="end_time" title="<?php 
$k = array (
  'name' => 'date_format',
  'date' => $this->_var['auction']['end_time'],
  'format' => 'Y-m-d-G-i-s',
  'timezone' => '0',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>"><?php echo $this->_var['auction']['end_time']; ?></span></li>
						<li><strong><?php echo $this->_var['lang']['act_status']; ?></strong><?php if ($this->_var['auction']['status_no'] == 0): ?><?php echo $this->_var['lang']['au_pre_start']; ?><?php elseif ($this->_var['auction']['status_no'] == 1): ?><?php echo $this->_var['lang']['au_under_way_1']; ?><?php else: ?><?php echo $this->_var['lang']['au_finished']; ?><?php endif; ?></li>
					</ul>
					<div class="actions">
						<p class="bright_price"><strong><?php echo $this->_var['lang']['au_start_price']; ?></strong><em class="price"><?php echo $this->_var['auction']['formated_start_price']; ?></em></p>
						<?php if ($this->_var['auction']['end_price'] > 0): ?><p><strong><?php echo $this->_var['lang']['au_end_price']; ?></strong><em class="price"><?php echo $this->_var['auction']['formated_end_price']; ?></em></p><?php endif; ?>
						<p class="button_wrapper"><a href="<?php echo $this->_var['auction']['url']; ?>" class="btn_special btn_detail"><span><?php echo $this->_var['lang']['btn_detail']; ?></span></a></p>
					</div>
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php else: ?>
				<div class="empty"><?php echo $this->_var['lang']['no_auction']; ?></div>
				<?php endif; ?>
				<?php echo $this->fetch('library/pages.lbi'); ?>
			</div>
		</div>
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
		
		<?php echo $this->fetch('library/top10.lbi'); ?>
		
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>