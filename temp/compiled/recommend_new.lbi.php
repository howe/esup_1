<?php if ($this->_var['new_goods']): ?>
<?php if ($this->_var['cat_rec_sign'] != 1): ?>
<div class="box<?php if ($this->_var['pname'] == 'index'): ?> extra_box<?php else: ?> special_box<?php endif; ?> new_goods">
	<div class="hd">
		<h3><?php echo $this->_var['lang']['new_goods']; ?></h3>
		<div class="extra">
			<?php if ($this->_var['cat_rec'] [ 2 ]): ?>
			<p class="selector" id="itemNew">
				<a href="javascript:void(0)" onclick="getRecommend(2, 0);" class="current"><span><?php echo $this->_var['lang']['all_goods']; ?></span></a>
				<?php $_from = $this->_var['cat_rec']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rec_data');if (count($_from)):
    foreach ($_from AS $this->_var['rec_data']):
?>
				<a href="javascript:void(0)" onclick="getRecommend(2, <?php echo $this->_var['rec_data']['cat_id']; ?>)"><span><?php echo $this->_var['rec_data']['cat_name']; ?></span></a>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</p>
			<?php endif; ?>
		</div>
	</div>
	<div class="bd goods_list">
		<div id="show_new">
			<?php endif; ?>
			<ul>
				<?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['new_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['new_goods']['iteration']++;
?>
				<li<?php if (($this->_foreach['new_goods']['iteration'] - 1) % 4 == 0): ?> class="first_child"<?php endif; ?> data="id:'<?php echo $this->_var['goods']['id']; ?>'">
					<span class="photo">
						<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="image"><img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"/></a>
					</span>
					<span class="info">
						<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="name"><?php echo $this->_var['goods']['short_style_name']; ?></a>
						<em class="price"><?php if ($this->_var['goods']['promote_price']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></em><?php if ($this->_var['goods']['promote_price']): ?><span class="promo" title="<?php echo htmlspecialchars($this->_var['goods']['shop_price']); ?> &gt; <?php echo htmlspecialchars($this->_var['goods']['promote_price']); ?>"><?php echo $this->_var['lang']['sale']; ?></span><?php endif; ?>
					</span>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php if ($this->_var['cat_rec_sign'] != 1): ?>
		</div>
		<a href="search.php?intro=new" title="<?php echo $this->_var['lang']['more']; ?><?php echo $this->_var['lang']['new_goods']; ?>" class="more button brighter_button"><span><?php echo $this->_var['lang']['more']; ?></span></a>
	</div>
</div>
<?php endif; ?>
<?php endif; ?>