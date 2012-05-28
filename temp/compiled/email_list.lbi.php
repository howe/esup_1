<div class="subscription box">
	<div class="hd"><h3><?php echo $this->_var['lang']['subscription']; ?></h3><div class="extra"></div></div>
	<div class="bd" id="subscription">
		<form action="javascript:void(0);">
			<input type="text" name="email" title="<?php echo $this->_var['lang']['email_invalid']; ?>" class="input"/>
			<input type="button" value="<?php echo $this->_var['lang']['email_list_ok']; ?>" onclick="addEmailList();" class="btn_s1"/>
			<input type="button" value="<?php echo $this->_var['lang']['email_list_cancel']; ?>" onclick="cancelEmailList();" class="btn_s1"/>
		</form>
	</div>
</div>