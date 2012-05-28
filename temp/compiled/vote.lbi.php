<?php if ($this->_var['vote']): ?>
<div class="vote box">
	<div class="hd"><h3><?php echo $this->_var['lang']['vote']; ?></h3><div class="extra"></div></div>
	<div class="bd" id="vote">
		<div id="vote_inner">
		<form method="post" action="javascript:submitVote()" title="<?php $_from = $this->_var['vote']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'title');if (count($_from)):
    foreach ($_from AS $this->_var['title']):
?><?php if ($this->_var['title']['can_multi'] == 0): ?><?php echo $this->_var['lang']['vote_tip_m']; ?><?php else: ?><?php echo $this->_var['lang']['vote_tip_s']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>">
			<?php $_from = $this->_var['vote']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'title');if (count($_from)):
    foreach ($_from AS $this->_var['title']):
?>
			<h4><?php echo $this->_var['title']['vote_name']; ?></h4>
			<p class="count">(<?php echo $this->_var['lang']['vote_times']; ?><?php echo $this->_var['lang']['colon']; ?><?php echo $this->_var['title']['vote_count']; ?>)</p>
			<?php $_from = $this->_var['title']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
			<?php if ($this->_var['title']['can_multi'] == 0): ?>
			<label for="option_id_<?php echo $this->_var['item']['option_id']; ?>"><input type="checkbox" name="option_id" value="<?php echo $this->_var['item']['option_id']; ?>" id="option_id_<?php echo $this->_var['item']['option_id']; ?>"/><?php echo $this->_var['item']['option_name']; ?><em>(<?php echo $this->_var['item']['percent']; ?>%)</em></label>
			<?php else: ?>
			<label for="option_id_<?php echo $this->_var['item']['option_id']; ?>"><input type="radio" name="option_id" value="<?php echo $this->_var['item']['option_id']; ?>" id="option_id_<?php echo $this->_var['item']['option_id']; ?>"/><?php echo $this->_var['item']['option_name']; ?><em>(<?php echo $this->_var['item']['percent']; ?>%)</em></label>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<input type="hidden" name="type" value="<?php echo $this->_var['title']['can_multi']; ?>"/>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<input type="hidden" name="id" value="<?php echo $this->_var['vote_id']; ?>" />
			<div class="actions">
				<input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit_vote']; ?>" class="btn_s1"/>
				<input type="reset" value="<?php echo $this->_var['lang']['submit_reset']; ?>" class="btn_s1"/>
			</div>
		</form>
		</div>
	</div>
</div>
<?php endif; ?>