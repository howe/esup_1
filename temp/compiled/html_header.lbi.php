<?php echo $this->_var['render']['before_html_header']; ?>
<link type="image/x-icon" href="<?php echo $this->_var['option']['static_path']; ?>static/img/favicon.ico" rel="shortcut icon" />
<link type="text/css" href="<?php echo $this->_var['option']['static_path']; ?>static/css/style.css" rel="stylesheet" />
<?php if ($this->_var['cat_style']): ?><link type="text/css" href="<?php echo $this->_var['cat_style']; ?>" rel="stylesheet" /><?php endif; ?>
<!--[if lt IE 8]><link href="<?php echo $this->_var['option']['static_path']; ?>static/css/ie.css" rel="stylesheet" type="text/css"/><![endif]-->
<?php if ($this->_var['pname'] == 'index' || $this->_var['pname'] == 'category' || $this->_var['pname'] == 'article_cat' || $this->_var['pname'] == 'auction_cat' || $this->_var['pname'] == 'brand' || $this->_var['pname'] == 'exchange' || $this->_var['pname'] == 'group_buy' || $this->_var['pname'] == 'package' || $this->_var['pname'] == 'snatch'): ?><link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>"/><?php endif; ?>
<?php if ($this->_var['auto_redirect']): ?><meta http-equiv="refresh" content="3;url=<?php echo $this->_var['message']['back_url']; ?>" /><?php endif; ?>
<?php if ($this->_var['option']['auto_resize']): ?><script type="text/javascript">if(screen.width>=1220){document.getElementsByTagName('html')[0].className='wide';}</script><?php endif; ?>
<?php echo $this->_var['render']['after_html_header']; ?>
