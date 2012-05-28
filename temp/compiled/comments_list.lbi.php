<?php if ($this->_var['comments']): ?>
<ul class="comment_list clearfix">
	<?php $_from = $this->_var['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');$this->_foreach['comments'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comments']['total'] > 0):
    foreach ($_from AS $this->_var['comment']):
        $this->_foreach['comments']['iteration']++;
?>
	<li class="<?php echo $this->cycle(array('values'=>'odd,even')); ?><?php if (($this->_foreach['comments']['iteration'] <= 1)): ?> first<?php endif; ?>">
		<div class="info">
			<span class="name"><?php if ($this->_var['comment']['username']): ?><?php echo htmlspecialchars($this->_var['comment']['username']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></span>
			<span class="time"><?php echo $this->_var['comment']['add_time']; ?></span>
			<span class="rank rank_<?php echo $this->_var['comment']['rank']; ?>"><?php echo $this->_var['lang']['label_comment_rank']; ?><?php if ($this->_var['comment']['rank'] == '1'): ?><?php echo $this->_var['lang']['comment_rank_1']; ?><?php elseif ($this->_var['comment']['rank'] == '2'): ?><?php echo $this->_var['lang']['comment_rank_2']; ?><?php elseif ($this->_var['comment']['rank'] == '3'): ?><?php echo $this->_var['lang']['comment_rank_3']; ?><?php elseif ($this->_var['comment']['rank'] == '4'): ?><?php echo $this->_var['lang']['comment_rank_4']; ?><?php elseif ($this->_var['comment']['rank'] == '5'): ?><?php echo $this->_var['lang']['comment_rank_5']; ?><?php endif; ?></span>
		</div>
		<div class="talk">
			<p class="text"><?php echo $this->_var['comment']['content']; ?></p>
			<?php if ($this->_var['comment']['re_content']): ?>
			<blockquote class="reply"><span class="name"><?php echo $this->_var['lang']['re_name']; ?></span><p><?php echo $this->_var['comment']['re_content']; ?></p></blockquote>
			<?php endif; ?>
		</div>
	</li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php echo $this->fetch('library/pages.lbi'); ?>
<?php else: ?>
<p class="empty"><?php echo $this->_var['lang']['no_comments']; ?></p>
<?php endif; ?>
<h2 class="title"><span><?php echo $this->_var['lang']['comment_form_title']; ?></span><em class="extra"></em></h2>
<form action="javascript:;" onsubmit="submitComment(this)" method="post" class="form">
	<fieldset>
		<p class="label"><b><?php echo $this->_var['lang']['label_username']; ?></b>
			<em><?php if ($_SESSION['user_name']): ?><?php echo $this->_var['username']; ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></em>
		</p>
		<label for="cf_email"><b><span class="req">*</span><?php echo $this->_var['lang']['label_email']; ?></b>
			<input type="text" name="email" tabindex="1" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" id="cf_email"/>
		</label>
				<fieldset class="radio_wrap label"><b><?php echo $this->_var['lang']['label_comment_rank']; ?></b>
					<fieldset>
					<input type="radio" name="comment_rank" value="1" tabindex="6" class="radio rank_star" title="<?php echo $this->_var['lang']['comment_rank_1']; ?>"/>
					<input type="radio" name="comment_rank" value="2" tabindex="5" class="radio rank_star" title="<?php echo $this->_var['lang']['comment_rank_2']; ?>"/>
					<input type="radio" name="comment_rank" value="3" tabindex="4" class="radio rank_star" title="<?php echo $this->_var['lang']['comment_rank_3']; ?>"/>
					<input type="radio" name="comment_rank" value="4" tabindex="3" class="radio rank_star" title="<?php echo $this->_var['lang']['comment_rank_4']; ?>"/>
					<input type="radio" name="comment_rank" value="5" checked="checked" class="radio rank_star" title="<?php echo $this->_var['lang']['comment_rank_5']; ?>"/>
					<em id="star_tip"></em>
					</fieldset>
				</fieldset>
		<label for="cf_content"><b><span class="req">*</span><?php echo $this->_var['lang']['comment_content']; ?><?php echo $this->_var['lang']['colon']; ?></b>
			<textarea name="content" rows="6" cols="20" tabindex="7" id="cf_content"></textarea>
		</label>
		<?php if ($this->_var['enabled_captcha']): ?>
		<label for="cf_captcha"><b><span class="req">*</span><?php echo $this->_var['lang']['comment_captcha']; ?><?php echo $this->_var['lang']['colon']; ?></b>
			<input type="text" name="captcha" size="6" tabindex="8" class="captcha" id="cf_captcha"/>
			<img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>" class="captcha tip" title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?'+Math.random()"/>
		</label>
		<?php endif; ?>
		<div class="submit_wrap">
			<input type="submit" value="<?php echo $this->_var['lang']['submit_comment']; ?>" tabindex="9" class="submit btn_s2_b"/>
			<input type="hidden" name="cmt_type" value="<?php echo $this->_var['comment_type']; ?>" />
			<input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
		</div>
	</fieldset>
</form>