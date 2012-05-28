<div class="user_nav_wrapper">
	<h1><?php echo $this->_var['lang']['user_center']; ?></h1>
	<ul class="user_nav">
		<li class="user_default<?php if ($this->_var['action'] == 'default'): ?> current<?php endif; ?>"><a href="user.php"><?php echo $this->_var['lang']['dashboard']; ?></a></li>
		<li class="user_profile<?php if ($this->_var['action'] == 'profile'): ?> current<?php endif; ?>"><a href="user.php?act=profile"><?php echo $this->_var['lang']['profile']; ?></a></li>
		<li class="user_order_list<?php if ($this->_var['action'] == 'order_list' || $this->_var['action'] == 'order_detail'): ?> current<?php endif; ?>"><a href="user.php?act=order_list"><?php echo $this->_var['lang']['label_order']; ?></a></li>
		<?php if ($this->_var['affiliate']['on'] == 1): ?><li class="user_affiliate<?php if ($this->_var['action'] == 'affiliate'): ?> current<?php endif; ?>"><a href="user.php?act=affiliate"><?php echo $this->_var['lang']['label_affiliate']; ?></a></li><?php endif; ?>
		<li class="user_collection_list<?php if ($this->_var['action'] == 'collection_list'): ?> current<?php endif; ?>"><a href="user.php?act=collection_list"><?php echo $this->_var['lang']['collections_and_booking']; ?></a></li>
		<?php if ($this->_var['option']['tags_enabled']): ?><li class="user_tag_list<?php if ($this->_var['action'] == 'tag_list'): ?> current<?php endif; ?>"><a href="user.php?act=tag_list"><?php echo $this->_var['lang']['label_tag']; ?></a></li><?php endif; ?>
		<li class="user_message_list<?php if ($this->_var['action'] == 'message_list'): ?> current<?php endif; ?>"><a href="user.php?act=message_list"><?php echo $this->_var['lang']['messages_and_comments']; ?></a></li>
		<?php if ($this->_var['show_transform_points']): ?><li class="<?php if ($this->_var['action'] == 'transform_points'): ?> current<?php endif; ?>"><a href="user.php?act=transform_points"><?php echo $this->_var['lang']['label_transform_points']; ?></a></li><?php endif; ?>
		<li class="user_account last<?php if ($this->_var['action'] == 'account_log' || $this->_var['action'] == 'account_deposit' || $this->_var['action'] == 'account_raply' || $this->_var['action'] == 'account_detail' || $this->_var['action'] == 'act_account' || $this->_var['action'] == 'pay'): ?> current<?php endif; ?>"><a href="user.php?act=account_detail"><?php echo $this->_var['lang']['account_and_bonus']; ?></a></li>
	</ul>
</div>
<p><a href="<?php echo $this->_var['hu']; ?>" class="btn_special btn_continue_shopping"><?php echo $this->_var['lang']['continue_shopping']; ?></a></p>