<?php
/*
插件名称: 自定义链接生成
描    述: 创建支持重写的链接
作    者: David@Shopiy.com
版    本: 1.0
作者网站: http://www.shopiy.com/
*/

/*
参数说明:
app       category goods brand article_cat article group_buy auction snatch search exchange exchange_goods 

cid       分类id
gid       商品id
bid       品牌id
acid      拍卖活动id
aid       文章id
sid       夺宝奇兵id
gbid      团购id
auid      拍卖活动id
sort      排序方式 goods_id last_update shop_price exchange_integral
order     DESC 降序/ASC 升序

price_min
price_max
filter_attr


append    附加字串
page      页数
keywords  搜索关键词
size      每页显示数
*/

function siy_build_uri($atts) {
	$app       = $atts['app'];
	$params    = $atts;
	$append    = $atts['append'];
	$page      = $atts['page'];
	$keywords  = $atts['keywords'];
	$size      = $atts['size'];

	$uri = build_uri($app, $params, $append, $page, $keywords, $size);

	return $uri;
}

?>
