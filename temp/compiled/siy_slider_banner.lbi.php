<?php if ($this->_var['banner']): ?>
<div class="box thin_box">
	<div class="hd"><h3></h3><div class="extra"></div></div>
	<div class="bd">
		<div class="slider" id="slider_hp">
			<ul>
				<?php $_from = $this->_var['banner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'banner_0_77936900_1328330802');$this->_foreach['banner'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['banner']['total'] > 0):
    foreach ($_from AS $this->_var['banner_0_77936900_1328330802']):
        $this->_foreach['banner']['iteration']++;
?>
				<li><a href="<?php echo $this->_var['banner_0_77936900_1328330802']['url']; ?>"><img src="<?php echo $this->_var['banner_0_77936900_1328330802']['src']; ?>" alt="<?php echo htmlspecialchars($this->_var['banner_0_77936900_1328330802']['text']); ?>" /></a></li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
	</div>
</div>
<?php if ($this->_var['option']['slider_banner_height']): ?>
<style type="text/css">
.slider, .slider li, .slider img{height:<?php echo $this->_var['option']['slider_banner_height']; ?>px;}
.three_col .slider, .three_col .slider li, .three_col .slider img{height:<?php 
$k = array (
  'name' => 'calculate',
  'number' => $this->_var['option']['slider_banner_height'],
  'formula' => '*495/735',
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?>px;}
.wide .three_col .slider, .wide .three_col .slider li, .wide .three_col .slider img{height:<?php echo $this->_var['option']['slider_banner_height']; ?>px;}
</style>
<?php endif; ?>
<?php endif; ?>
