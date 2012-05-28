<?php
/**
* @模板   Vanity
* @版本   1.5.0
* @作者   david http://www.shopiy.com/
* @版权   Copyright (C) 2009 - 2011 Shopiy
* @许可   Shopiy许可协议 (http://www.shopiy.com/license)
*/

$_CFG['static_path'] = ''; // 静态文件路径
$_CFG['auto_resize'] = true; // 是否启用根据显示器大小自动选择宽窄风格
$_CFG['three_column'] = true; // 是否启用首页的三栏布局
$_CFG['logo'] = 'static/img/logo.gif'; // 网站Logo
$_CFG['color'] = false; // 配色方案 false为默认 blue/green/black
$_CFG['links_enabled'] = false; // 是否启用首页的友情链接
$_CFG['tags_enabled'] = false; // 是否启用商品标签功能
$_CFG['compare_enabled'] = false; // 是否启用商品对比功能
$_CFG['goods_popup_menu_enabled'] = false; // 商品列表中商品的弹出菜单
$_CFG['gallery_thumbnails_enabled'] = false; // 整合了“相册缩略图”模块才能启用此设置，在放大镜时可以使用商品图片尺寸的相册缩略图。
$_CFG['gallery_thumbnails_small_width'] = '40'; // 整合了“相册缩略图”模块才能启用此设置，最小缩略图的宽度。
$_CFG['gallery_thumbnails_small_height'] = '40'; // 整合了“相册缩略图”模块才能启用此设置，最小缩略图的高度。
$_CFG['slider_banner_height'] = false; // 首页滚动商品图片高度，设置为false取消自定义高度，如果要改为120px高，就把false改为（'120'）引号内。
$_CFG['top_navigator_number'] = '6'; // 顶部导航栏显示数量限制
$_CFG['main_navigator_number'] = '9'; // 主导航栏显示数量限制
$_CFG['bottom_navigator_number'] = '12'; // 底部导航栏显示数量限制
$_CFG['hide_category_extra'] = false; // 是否隐藏全部分类树右侧的“促销活动”和“推荐品牌”。
$_CFG['cat_promotion_number'] = '20'; // 全部分类树右侧的“促销活动”显示数量限制，但为0时隐藏。
$_CFG['cat_brands_number'] = '20'; // 全部分类树右侧的“推荐品牌”显示数量限制，但为0时隐藏。
$_CFG['gallery_mode'] = 'cloud_zoom'; // 商品相册展示模式 可选择：'default','flash','color_box','cloud_zoom'。
$_CFG['display_mode_enabled'] = true; // 是否启用商品列表的视图选择功能
$_CFG['display_list_enabled'] = false; // 是否启用商品列表的大图显示
$_CFG['display_text_enabled'] = true; // 是否启用商品列表的列表显示
$_CFG['goods_click_count_enabled'] = true; // 是否启用商品点击统计
$_CFG['no_picture'] = 'static/img/no_picture.gif'; // 商品空白图片
$_CFG['sales_ranking_number'] = '5'; // 销售排行显示数量
$_CFG['index_brands_number'] = '10'; // 首页品牌列表的显示数量
$_CFG['price_zero_format'] = sprintf($GLOBALS['_CFG']['currency_format'], '0.00'); // 价格为0时的格式化，用在某些判断价格是否为零的地方。



?>