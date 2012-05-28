<?php
/*
插件名称: 分享到社交网络
描    述: 分享到社交网络
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
form      模板模块 默认是library/siy_share_this.lbi
*/

function siy_share_this($atts)
{
	$this_url= urlencode($hu.$_SERVER["REQUEST_URI"]);
	$GLOBALS['smarty']->assign('this_url', $this_url);
	$form = (!empty($atts['form'])) ? $atts['form'] : 'library/siy_share_this.lbi';
	$val= $GLOBALS['smarty']->fetch($form);
	return $val;
}
if ($pname == 'goods') {
$theme_regions['after_html_header'] .= '<link type="text/css" href="'.$_CFG['static_path'].'static/css/share_this.css" rel="stylesheet" />';
}

?>
