/* Copyright (C) 2009 - 2011 Shopiy, Shopiy许可协议 (http://www.shopiy.com/license) */

$(document).ready(function() {
	$('.nav li, .category li, .all_category li').hover(function(){
		if ($(this).hasClass('parent')) {
			$(this).addClass('parent_hover');
		} else {
			$(this).addClass('hover');
		}
		if ($(this).hasClass('current')) {
			$(this).addClass('current_hover');
		}
	}, function(){
		if ($(this).hasClass('parent_hover')) {
			$(this).removeClass('parent_hover');
		} else {
			$(this).removeClass('hover');
		}
		if ($(this).hasClass('current_hover')) {
			$(this).removeClass('current_hover');
		}
	});
	$('.all_cat_wrapper').hover(function(){
		$(this).addClass('all_cat_wrapper_hover');
	}, function(){
		$(this).removeClass('all_cat_wrapper_hover');
	});
	$('.category .sub_cat_lv1').each(function(){
		var sub = $(this);
		var parent = sub.parent();
		parent.addClass('hide_sub');
		sub.prev().prepend('<a href="javascript:void(0);" class="icon">&nbsp;</a>');
		parent.find('p.level_1 .icon').click(function(){
			if (parent.hasClass('hide_sub')) {
				parent.removeClass('hide_sub');
			} else {
				parent.addClass('hide_sub');
			}
		});
	});
	$('.nav li.level_1').each(function(){
		if ($(this).find('.current').length > 0) {
			$(this).addClass('current');
		}
	});
	$('.category li.level_1').each(function(){
		if ($(this).hasClass('current') || $(this).find('.current').length > 0) {
			$(this).removeClass('hide_sub');
		}
	});
	$('#keyword').tipsy({
		trigger:'manual',gravity:'e',fade: true
	}).focusout(function() {
		$(this).tipsy('hide');
	}).keypress(function() {
		$(this).tipsy('hide');
	});
	$("#search").submit(function(){
		var k = $("#keyword").val();
		if (k.length == 0) {
			$('#keyword').focus();
			$('#keyword').tipsy('show');
			return false;
		} else {
			return true;
		}
	});
	$("#search").mouseenter(function(){
		$('#search .hot_search_wrapper').show();
	}).mouseleave(function(){
		$('#search .hot_search_wrapper').hide();
	});
	$('.quick_login').live('click',function(){
		openQuickLogin();
		return false;
	});
	if (typeof(ajax_cart_disabled) == 'undefined') loadCart();
	$('#cart').mouseenter(function(){
		$('#cart .list_wrapper').show();
	});
	$('#cart').mouseleave(function(){
		$('#cart .list_wrapper').hide();
	});
	$('a[rel="external"]').click(function(){window.open(this.href);return false;});
	$('a.zoom').colorbox();
	$('.col_main .goods_slider').mSlidiy({num:4,step:1});
	$('.col_sub .goods_slider').mSlidiy({vertical:true,num:5,step:1});
	$('.vertical_slider').mSlidiy({vertical:true,num:5,step:1});
	$('.display a[title!=""]').tipsy({gravity: $.fn.tipsy.autoSNiy,fade: true});
	$('.promo[title!=""]').tipsy({gravity: 'e',fade: true,html: true});
	$('.tip').tipsy({gravity: 's',fade: true,html: true});
	$('.more[title!=""]').tipsy({gravity: 'se'});
	$('.fittings_list li[title!=""]').tipsy({gravity: 's',fade: true});
	$('.col_main .goods_list').each(function(){
		if ($('.goods_slider', this).length < 1) {
			$(this).GoodsCleariy();
		}
	});
	$('.back_to_top').click(function(){
		$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
		$body.animate({scrollTop: $('body').offset().top}, 800);
		return false;
	});
	$('.rank_star').rating({
		focus: function(value, link){
			var tip = $('#star_tip');
			tip[0].data = tip[0].data || tip.html();
			tip.html(link.title || 'value: '+value);
		},
		blur: function(value, link){
			var tip = $('#star_tip');
			$('#star_tip').html(tip[0].data || '');
		}
	});
	$('.end_time[title!=""]').each(function(){
		var countdown = $(this);
		countdown.parent().find('.label').text(lang.remaining_time + lang.colon);
		var end_date = countdown.attr('title').split('-');
		countdown.removeAttr('title');
		var date = new Date(end_date[0],end_date[1]-1,end_date[2],end_date[3],end_date[4],end_date[5]);
		countdown.countdown({
			until: date,
			layout: '<em>{dn}</em>{dl}<em>{hn}</em>{hl}<em>{mn}</em>{ml}<em>{sn}</em>{sl}'
		});
	});
	$('.col_main .goods_list li').hover(function(){
		$(this).addClass('hover');
	}, function(){
		$(this).removeClass('hover');
	});
	if (typeof(goods_popup_menu_enabled) != 'undefined'){
		$('.col_main .goods_list li').each(function(){
			var item = $(this);
			var item_id = item.metadata({type:'attr',name:'data'}).id;
			if (item_id > 0 && item.parents('.goods_list').hasClass('display_text') == false) {
				var menu_html = '<span class="menu"><a href="' + item.find('.name').attr('href') + '" class="view">' + lang.view + '</a><a href="javascript:buy(' + item_id + ')" class="buy">' + lang.buy + '</a><a href="javascript:collect(' + item_id + ');" class="collect">' + lang.collect + '</a></span>';
				item.append(menu_html);
			}
		});
		$('.col_main .goods_list li .menu a').tipsy({gravity:'e',fade:true}).attr('original-title', function(){
			return $(this).text();
		}).click(function() {
			$(this).tipsy('hide');
		});
	}
});
