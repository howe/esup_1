<?php if ($this->_var['msg_lists']): ?>
<ul class="comment_list clearfix">
	<?php $_from = $this->_var['msg_lists']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'msg');$this->_foreach['message_lists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['message_lists']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['msg']):
        $this->_foreach['message_lists']['iteration']++;
?>
	<li class="<?php echo $this->cycle(array('values'=>'odd,even')); ?><?php if (($this->_foreach['message_lists']['iteration'] <= 1)): ?> first<?php endif; ?>">
		<div class="info">
			<span class="name"><?php if ($this->_var['msg']['user_name'] == ''): ?><?php echo $this->_var['lang']['anonymous']; ?><?php else: ?><?php echo htmlspecialchars($this->_var['msg']['user_name']); ?><?php endif; ?></span>
			<span class="time"><?php echo $this->_var['msg']['msg_time']; ?></span>
		</div>
		<div class="talk">
			<p class="title"><span class="type">[<?php echo $this->_var['msg']['msg_type']; ?>]</span><?php echo $this->_var['msg']['msg_title']; ?><?php if ($this->_var['msg']['id_value'] > 0): ?><?php echo $this->_var['lang']['feed_user_comment']; ?><a href="<?php echo $this->_var['msg']['goods_url']; ?>" title="<?php echo $this->_var['msg']['goods_name']; ?>"><?php echo $this->_var['msg']['goods_name']; ?></a><?php endif; ?></p>
			<p class="text"><?php echo $this->_var['msg']['msg_content']; ?></p>
			<?php if ($this->_var['msg']['re_content']): ?>
			<blockquote class="reply"><span class="name"><?php echo $this->_var['lang']['re_name']; ?></span><span class="text"><?php echo $this->_var['msg']['re_content']; ?></span></blockquote>
			<?php endif; ?>
		</div>
	</li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php echo $this->fetch('library/pages.lbi'); ?>
<?php else: ?>
<p class="empty"><?php echo $this->_var['lang']['no_message']; ?></p>
<?php endif; ?>
<h2 class="title"><span><?php echo $this->_var['lang']['message_form_title']; ?></span><em class="extra"></em></h2>
<form action="message.php" method="post" name="formMsg" onSubmit="return submitMsgBoard(this)" class="form">
	<fieldset>
		<p class="label"><b><?php echo $this->_var['lang']['username']; ?></b>
			<em><?php if ($_SESSION['user_name']): ?><?php echo $this->_var['username']; ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></em>
		</p>
		<label for="cf_email"><b><span class="req">*</span><?php echo $this->_var['lang']['email']; ?></b>
			<input type="text" name="user_email" tabindex="1" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" id="cf_email"/>
		</label>
		<fieldset class="radio_wrap label"><b><?php echo $this->_var['lang']['message_board_type']; ?></b>
			<fieldset>
			<label for="cf_rank5"><input type="radio" name="msg_type" value="0" checked="checked" tabindex="2" class="radio" id="cf_rank5"/><?php echo $this->_var['lang']['message_type']['0']; ?></label>
			<label for="cf_rank4"><input type="radio" name="msg_type" value="1" tabindex="3" class="radio" id="cf_rank4"/><?php echo $this->_var['lang']['message_type']['1']; ?></label>
			<label for="cf_rank3"><input type="radio" name="msg_type" value="2" tabindex="4" class="radio" id="cf_rank3"/><?php echo $this->_var['lang']['message_type']['2']; ?></label>
			<label for="cf_rank2"><input type="radio" name="msg_type" value="3" tabindex="5" class="radio" id="cf_rank2"/><?php echo $this->_var['lang']['message_type']['3']; ?></label>
			<label for="cf_rank1"><input type="radio" name="msg_type" value="4" tabindex="6" class="radio" id="cf_rank1"/><?php echo $this->_var['lang']['message_type']['4']; ?></label>
			</fieldset>
		</fieldset>
		<label for="cf_title"><b><span class="req">*</span><?php echo $this->_var['lang']['message_title']; ?></b>
			<input type="text" name="msg_title" size="50" tabindex="7" id="cf_title"/>
		</label>
		<label for="cf_content"><b><span class="req">*</span><?php echo $this->_var['lang']['message_content']; ?></b>
			<textarea name="msg_content" rows="6" cols="20" tabindex="7" id="cf_content"></textarea>
		</label>
		<?php if ($this->_var['enabled_mes_captcha']): ?>
		<label for="cf_captcha"><b><span class="req">*</span><?php echo $this->_var['lang']['comment_captcha']; ?></b>
			<input type="text" name="captcha" size="6" tabindex="8" class="captcha" id="cf_captcha"/><img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>" class="captcha tip" title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?'+Math.random()">
		</label>
		<?php endif; ?>
		<div class="submit_wrap">
			<input type="submit" value="<?php echo $this->_var['lang']['post_message']; ?>" tabindex="9" class="submit btn_special btn_submit"/>
		</div>
		<input type="hidden" name="act" value="act_add_message" />
		<input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
	</fieldset>
</form>
<script type="text/javascript">
<?php $_from = $this->_var['lang']['message_board_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

function submitMsgBoard(frm)
{
	var msg = new Object;
	msg.user_email  = frm.elements['user_email'].value;
	msg.msg_title   = frm.elements['msg_title'].value;
	msg.msg_content = frm.elements['msg_content'].value;
	msg.captcha     = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
	var msg_err = '';
	if (msg.user_email.length > 0)
	{
		if (!isValidEmail(msg.user_email))
		{
			msg_err += msg_error_email + '\n';
		}
	}
	else
	{
		msg_err += msg_empty_email + '\n';
	}
	if (msg.msg_title.length == 0)
	{
		msg_err += msg_title_empty + '\n';
	}
	if (frm.elements['captcha'] && msg.captcha.length==0)
	{
		msg_err += msg_captcha_empty + '\n'
	}
	if (msg.msg_content.length == 0)
	{
		msg_err += msg_content_empty + '\n'
	}
	if (msg.msg_title.length > 200)
	{
		msg_err += msg_title_limit + '\n';
	}
	if (msg_err.length > 0)
	{
		alert(msg_err);
		return false;
	}
	else
	{
		return true;
	}
}

</script>