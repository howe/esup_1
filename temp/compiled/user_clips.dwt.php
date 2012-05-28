<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php if ($this->_var['description']): ?><meta name="description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<?php if ($this->_var['keywords']): ?><meta name="keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<title><?php if ($this->_var['action'] == 'default'): ?><?php echo $this->_var['lang']['dashboard']; ?>
<?php elseif ($this->_var['action'] == 'profile'): ?><?php echo $this->_var['lang']['label_profile']; ?>
<?php elseif ($this->_var['action'] == 'order_list' || $this->_var['action'] == 'order_detail'): ?><?php echo $this->_var['lang']['label_order']; ?>
<?php elseif ($this->_var['action'] == 'address_list'): ?><?php echo $this->_var['lang']['label_address']; ?>
<?php elseif ($this->_var['action'] == 'collection_list'): ?><?php echo $this->_var['lang']['label_collection']; ?>
<?php elseif ($this->_var['action'] == 'message_list'): ?><?php echo $this->_var['lang']['label_message']; ?>
<?php elseif ($this->_var['action'] == 'tag_list'): ?><?php echo $this->_var['lang']['label_tag']; ?>
<?php elseif ($this->_var['action'] == 'booking_list'): ?><?php echo $this->_var['lang']['label_booking']; ?>
<?php elseif ($this->_var['action'] == 'add_booking'): ?><?php echo $this->_var['lang']['label_booking']; ?>
<?php elseif ($this->_var['action'] == 'bonus'): ?><?php echo $this->_var['lang']['label_bonus']; ?>
<?php elseif ($this->_var['action'] == 'affiliate'): ?><?php echo $this->_var['lang']['label_affiliate']; ?>
<?php elseif ($this->_var['action'] == 'comment_list'): ?><?php echo $this->_var['lang']['label_comment']; ?>
<?php elseif ($this->_var['action'] == 'track_packages'): ?><?php echo $this->_var['lang']['label_track_packages']; ?>
<?php elseif ($this->_var['action'] == 'account_log' || $this->_var['action'] == 'account_deposit' || $this->_var['action'] == 'account_raply' || $this->_var['action'] == 'account_detail' || $this->_var['action'] == 'act_account' || $this->_var['action'] == 'pay'): ?><?php echo $this->_var['lang']['label_user_surplus']; ?>
<?php elseif ($this->_var['action'] == 'transform_points'): ?><?php echo $this->_var['lang']['label_transform_points']; ?><?php endif; ?> - <?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>" class="user_cp">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	<div class="col_main">
	<?php echo $this->_var['render']['before_col_main']; ?>
		
		<?php if ($this->_var['action'] == 'default'): ?><?php echo $this->fetch('library/user_default.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['action'] == 'message_list'): ?><?php echo $this->fetch('library/user_message_list.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['action'] == 'comment_list'): ?><?php echo $this->fetch('library/user_comment_list.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['action'] == 'tag_list'): ?><?php echo $this->fetch('library/user_tag_list.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['action'] == 'collection_list'): ?><?php echo $this->fetch('library/user_collection_list.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['action'] == 'booking_list'): ?><?php echo $this->fetch('library/user_booking_list.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['action'] == 'add_booking'): ?><?php echo $this->fetch('library/user_add_booking.lbi'); ?><?php endif; ?>
		<?php if ($this->_var['affiliate']['on'] == 1): ?><?php if ($this->_var['action'] == 'affiliate'): ?><?php echo $this->fetch('library/user_affiliate.lbi'); ?><?php endif; ?><?php endif; ?>
		
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
		
		<?php echo $this->fetch('library/user_nav.lbi'); ?>
		
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
<script type="text/javascript" src="<?php echo $this->_var['option']['static_path']; ?>static/js/user.js"></script>
</body>
</html>