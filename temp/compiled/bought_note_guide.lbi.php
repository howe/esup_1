<div class="bought_box box" id="bought">
	<div class="hd"><h3><?php echo $this->_var['lang']['bought_notes']; ?></h3><div class="extra"><?php echo $this->_var['lang']['later_bought_amounts']; ?><em><?php 
$k = array (
  'name' => 'bought_count',
  'id' => $this->_var['id'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?></em></div></div>
	<div class="bd">
		<div id="bought_wrap"><?php 
$k = array (
  'name' => 'bought_notes',
  'id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
	</div>
</div>