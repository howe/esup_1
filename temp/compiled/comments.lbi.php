<div class="comment_box box" id="comment">
	<div class="hd"><h3><?php echo $this->_var['lang']['goods_comment']; ?></h3><div class="extra"><?php echo $this->_var['lang']['comments_amounts_pre']; ?><em><?php 
$k = array (
  'name' => 'comment_count',
  'id' => $this->_var['id'],
  'type' => $this->_var['type'],
);
$plugin = 'siy_'.$k['name'];
if (function_exists($plugin)) {
	echo $plugin($k);
} else {
	echo "<!-- error: ".$k['name']." not installed -->";
}
?></em><?php echo $this->_var['lang']['comments_amounts_suf']; ?></div></div>
	<div class="bd">
		<div id="comment_wrapper"><?php 
$k = array (
  'name' => 'comments',
  'type' => $this->_var['type'],
  'id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
	</div>
</div>