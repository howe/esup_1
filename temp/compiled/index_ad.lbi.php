<?php if ($this->_var['index_ad'] == 'sys'): ?>
<?php 
$k = array (
  'name' => 'slider_banner',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>
<?php elseif ($this->_var['index_ad'] == 'cus'): ?>
<div class="index_ad">
	<?php if ($this->_var['ad']['ad_type'] == 0): ?>
	<a href="<?php echo $this->_var['ad']['url']; ?>" rel="external"><img src="<?php echo $this->_var['ad']['content']; ?>" width="735px" height="150px"></a>
	<?php elseif ($this->_var['ad']['ad_type'] == 1): ?>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="735" height="150">
	<param name="movie" value="<?php echo $this->_var['ad']['content']; ?>"/>
	<param name="quality" value="high"/>
	<embed src="<?php echo $this->_var['ad']['content']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="735" height="150"></embed>
	</object>
	<?php elseif ($this->_var['ad']['ad_type'] == 2): ?>
	<?php echo $this->_var['ad']['content']; ?>
	<?php elseif ($this->_var['ad']['ad_type'] == 3): ?>
	<a href="<?php echo $this->_var['ad']['url']; ?>" rel="external"><?php echo $this->_var['ad']['content']; ?></a>
	<?php endif; ?>
</div>
<?php else: ?>
<div class="index_ad">
<script type="text/javascript">
var swf_width=735;
var swf_height=150;
</script>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>data/flashdata/<?php echo $this->_var['flash_theme']; ?>/cycle_image.js"></script>
</div>
<?php endif; ?>