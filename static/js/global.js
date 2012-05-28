/* Copyright (C) 2009 - 2011 Shopiy, Shopiy许可协议 (http://www.shopiy.com/license) */

$(document).ready(function() {
	$('body').append('<div id="loading_box">' + lang.process_request + '</div>');
	$('#loading_box').ajaxStart(function(){
		var loadingbox = $(this);
		var left = -(loadingbox.outerWidth() / 2);
		loadingbox.css({'marginRight': left + 'px'});
		loadingbox.delay(3000).fadeIn(400);
	});
	$('#loading_box').ajaxSuccess(function(){
		$(this).stop().stop().fadeOut(400);
	});
});
var loader = '<div class="loader">&nbsp;</div>', result = '<div class="result"></div>', status = '<div class="status"></div>', page = 'undefined', action = 'undefined';
function clearHistory() {
	$.get(
		'user.php',
		'act=clear_history',
		function(){
			$('#history').animate({height:'0',opacity:'0'}, 1000).css({visibility:'hidden'});
			$('#history .more').tipsy('hide');
		},
		'text'
	);
}

(function($) {
$.fn.GoodsCleariy = function() {
	$(this).find('li.first_child').before('<br class="clearer"/>');
};
})(jQuery);

function getRecommend(rec_type, cat_id) {
	$.post(
		'index.php?act=cat_rec',
		{rec_type: rec_type, cid: cat_id},
		function(response){
			var res = $.evalJSON(response), target = '';
			if (res.type == 1) {
				target = $('#show_best');
			} else if (res.type == 2) {
				target = $('#show_new');
			} else {
				target = $('#show_hot');
			}
			if (res.content == '') {
				res.content = '<p class="empty">' + lang.goods_empty + '</p>';
			}
			target.fadeTo(500, 0, function (){
				var target_content = $(this);
				target_content.html(res.content).GoodsCleariy();
				var children_height = target_content.children().outerHeight();
				target_content.animate({height: children_height});
				target_content.fadeTo(500, 1).find('.promo[title!=""]').tipsy({gravity: 'e',fade: true,html: true});
				if (typeof(goods_popup_menu_enabled) != 'undefined'){
					$('li', target).hover(function(){
						$(this).addClass('hover');
					}, function(){
						$(this).removeClass('hover');
					});
					$('li', target).each(function(){
						var item = $(this);
						var item_id = item.metadata({type:'attr',name:'data'}).id;
						if (item_id > 0 && item.parents('.goods_list').hasClass('display_text') == false) {
							var menu_html = '<span class="menu"><a href="' + item.find('.name').attr('href') + '" class="view">' + lang.view + '</a><a href="javascript:buy(' + item_id + ')" class="buy">' + lang.buy + '</a><a href="javascript:collect(' + item_id + ');" class="collect">' + lang.collect + '</a></span>';
							item.append(menu_html);
						}
					});
					$('li .menu a', target).tipsy({gravity:'e',fade:true}).attr('original-title', function(){
						return $(this).text();
					}).click(function() {
						$(this).tipsy('hide');
					});
				}
			});
			target.parent().find('.loader').fadeTo(1000, 0);
		},
		'text'
	);
}

function orderQuery() {
	var order_sn = order_input.val(), reg = /^[\.0-9]+/;
	if (order_sn.length < 10 || ! reg.test(order_sn)) {
		order_input.focus().tipsy('show');
		return;
	}
	else {
		var order_loader = $('#order_query .loader');
		order_loader.css({visibility:'visible'}).fadeTo(0, 1000);
		$.get(
			'user.php?act=order_query&order_sn=s',
			'order_sn=s' + order_sn,
			function(response){
				var order_result = $('#order_query .result');
				var res = $.evalJSON(response);
				if (res.message != '') {
					order_result.css({display:'block',backgroundColor:'#ff5215'});
					order_result.html(res.message);
				}
				if (res.error == 0) {
					order_result.css({display:'block',backgroundColor:'#97cf4d'});
					order_result.html(res.content);
					//$('form', order_result).attr('name', function(){return this.name+'_new'});
					//$('form a', order_result).attr('href', function(){return this.href.replace(/\'\]\.submit\(\)\;/, '_new\'].submit();')});
					$('form a', order_result).click(function(){
						$(this).parents('form').submit();
						return false;
					});
				}
				order_result.animate({backgroundColor:'#fff'}, 1000);
				order_loader.fadeTo(1000, 0);
			},
			'text'
		);
	}
}

function submitVote()
{
	var type = $('#vote input[name="type"]').val(), vote_id = $('#vote input[name="id"]').val(), option = '';
	$('#vote input[name="option_id"]:checked').each(function() {
		var option_id = $(this).val();
		option += option_id + ',';
	});

	if (option == '') {
		$('#vote form').tipsy('show');
		return;
	} else {
		var vote_result = $('#vote .result');
		$('#vote .loader').css({visibility:'visible'}).fadeTo(0, 1000);
		$.post(
			'vote.php',
			{vote: vote_id, options: option, type: type},
			function(response){
				var res = $.evalJSON(response);
				if (res.message != '') {
					vote_result.css({display:'block',backgroundColor:'#ff5215'});
					vote_result.html(res.message);
				}
				if (res.error == 0) {
					$('#vote_inner').html(res.content);
				}
				vote_result.animate({backgroundColor:'#fff'}, 1000);
				$('#vote .loader').fadeTo(1000, 0);
			},
			'text'
		);
	}
}


function addEmailList() {
	var email = subscription_email.val();
	if (!isValidEmail(email)) {
		subscription_email.focus().tipsy('show');
		return;
	}
	else {
		$('#subscription .loader').css({visibility:'visible'}).fadeTo(0, 1000);
		$.get(
			'user.php?act=email_list&job=add',
			'email=' + email,
			function(response){
				$('#subscription .result').css({display:'block',backgroundColor:'#97cf4d'}).html(response).animate({backgroundColor:'#fff'}, 1000);
				$('#subscription .loader').fadeTo(1000, 0);
			},
			'text'
		);
	}
}
function cancelEmailList()
{
	var email = subscription_email.val();
	if (!isValidEmail(email)) {
		subscription_email.focus().tipsy('show');
		return;
	}
	else {
		var subscription_result = $('#subscription .result');
		var subscription_loader = $('#subscription .loader');
		subscription_loader.css({visibility:'visible'}).fadeTo(0, 1000);
		$.get(
			'user.php?act=email_list&job=del',
			'email=' + email,
			function(response){
				subscription_result.css({display:'block',backgroundColor:'#97cf4d'}).html(response).animate({backgroundColor:'#fff'}, 1000);
				subscription_loader.fadeTo(1000, 0);
			},
			'text'
		);
	}
}
function isValidEmail(email) {
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return filter.test(email);
}

function getAttrSiy(area) {
	var attrList = new Array();
	area.find('input[name^="spec_"]:checked, select[name^="spec_"]').each(function(i) {
		attrList[i] = $(this).val();
	});
	return attrList;
}

(function($) {
$.fn.ChangePriceSiy = function() {
	var area = $(this);
	loadPrice();
	area.find('input[name^="spec_"], select[name^="spec_"], input[name="number"]').change(function() {
		loadPrice();
	});
	area.find('input[name="number"]').keyup(function() {
		loadPrice();
	});
	function loadPrice() {
		var attr = getAttrSiy(area);
		var number = area.find('input[name="number"]').val();
		if (number < 1) {
			var qty = '1';
		}
		else {
			var qty = number;
		};
		$.get(
			'goods.php',
			'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty,
			function(response){
				var res = $.evalJSON(response);
				if (res.err_msg.length > 0) {
					$.fn.colorbox({html:'<div class="message_box">' + res.err_msg + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
				}
				else {
					area.find('[name="number"]').val(res.qty);
					area.find('.amount').html(res.result);
				}
			},
			'text'
		);
	};
};
})(jQuery);


function buy(id, num, parent) {
	var goods = new Object();
	var spec_arr = new Array();
	var fittings_arr = new Array();
	var number = 1;
	var form = $('#purchase_form');
	var quick = 0;

	if (form.length > 0) {
		spec_arr = getAttrSiy(form);
		var numberInput = form.find('input[name="number"]');
		if (numberInput) {
			number = numberInput.val();
		}
		quick = 1;
	}
	if (num > 0) {
		number = num;
	}

	goods.quick    = quick;
	goods.spec     = spec_arr;
	goods.goods_id = id;
	goods.number   = number;
	goods.parent   = (typeof(parent) == 'undefined') ? 0 : parseInt(parent);

	$.post(
		'flow.php?step=add_to_cart',
		{goods: $.toJSON(goods)},
		function(response){
			var res = $.evalJSON(response);
			if (res.error > 0) {
				if (res.error == 2) {
					$.fn.colorbox({html:'<div class="message_box mb_question">' + res.message + '<p class="action"><a href="user.php?act=add_booking&id=' + res.goods_id + '&spec=' + res.product_spec + '" class="button brighter_button"><span>' + lang.booking + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.continue_browsing_products + '</a></p></div>'});
				}
				else if (res.error == 6) {
					openSpeSiy(res.message, res.goods_id, number, res.parent);
				}
				else {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
				}
			}
			else {
				//$('#cart').html(res.content);
				loadCart();
				if (res.one_step_buy == '1') {
					location.href = 'flow.php?step=add_to_cart';
				}
				else {
					if ($('#page_flow').length > 0) {
						location.href = 'flow.php?step=cart';
					} else {
						$.fn.colorbox({html:'<div class="message_box mb_info">' + lang.add_to_cart_success + '<p class="action"><a href="flow.php?step=cart" class="button brighter_button"><span>' + lang.checkout_now + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.continue_browsing_products + '</a></p></div>'});
					}
				}
			}
		},
		'text'
	);
}

function openSpeSiy(message, goods_id, num, parent) 
{
	var html = '<div class="message_box" id="properties_box"><div class="properties_wrapper">';
	for (var spec = 0; spec < message.length; spec++) {
		var tips = '';
		if (message[spec]['attr_type'] == 2) {
			var tips = 'title="' + lang.multi_choice + '"';
		};
		html += '<dl class="properties clearfix" ' + tips + '><dt>' +  message[spec]['name'] + '：</dt>';
		if (message[spec]['attr_type'] == 1) {
			html += '<dd class="radio">';
			for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++) {
				var check = '';
				var title = '';
				if (val_arr == 0) {
					var check = 'checked="checked"';
				}
				if (message[spec]["values"][val_arr]["price"] != '') {
					var title = 'title="' + lang.add + message[spec]["values"][val_arr]["format_price"] + '"';
				}
				html += '<label for="spec_value_'+ message[spec]["values"][val_arr]["id"] +'" ' + title + '><input type="radio" name="spec_' + message[spec]["attr_id"] + '" value="' + message[spec]["values"][val_arr]["id"] + '" id="spec_value_' + message[spec]["values"][val_arr]["id"] + '" ' + check + ' />' + message[spec]["values"][val_arr]["label"] + '</label>';
			} 
			html += '<input type="hidden" name="spec_list" value="' + val_arr + '" /></dd>';
		}
		else {
			html += '<dd class="checkbox">';
			for (var val_arr = 0; val_arr < message[spec]["values"].length; val_arr++) {
				var title = '';
				if (message[spec]["values"][val_arr]["price"] != '') {
					var title = 'title="' + lang.add + message[spec]["values"][val_arr]["format_price"] + '"';
				}
				html += '<label for="spec_value_' + message[spec]["values"][val_arr]["id"] + '" ' + title + '><input type="checkbox" name="spec_' + message[spec]["attr_id"] + '" value="' + message[spec]["values"][val_arr]["id"] + '" id="spec_value_' + message[spec]["values"][val_arr]["id"] + '" />' + message[spec]["values"][val_arr]["label"] + '</label>';
			}
			html += '<input type="hidden" name="spec_list" value="' + val_arr + '" /></dd>';
		}
		html += "</dl>";
	}
	html += '</div><p class="action"><a href="javascript:submitSpeSiy(' + goods_id + ',' + num + ',' + parent + ')" class="buy button brighter_button"><span>' + lang.buy + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.cancel + '</a></p></div>';
	
	$.fn.colorbox({scrolling:false,html: html,title: lang.select_spe});
	$('.properties').Formiy();
	$('.properties dl').tipsy({gravity: 'e',fade: true,html:true});
	$('.properties label').tipsy({gravity: 's',fade: true,html:true});
}

function submitSpeSiy(goods_id, num, parent) 
{
	var goods = new Object();
	var spec_arr = new Array();
	var fittings_arr = new Array();
	var number = 1;
	var area = $('#properties_box');
	var quick = 1;

	if (num > 0) {
		number = num;
	}

	var spec_arr = getAttrSiy(area);

	goods.quick    = quick;
	goods.spec     = spec_arr;
	goods.goods_id = goods_id;
	goods.number   = number;
	goods.parent   = (typeof(parent) == "undefined") ? 0 : parseInt(parent);

	$.post(
		'flow.php?step=add_to_cart',
		{goods: $.toJSON(goods)},
		function(response){
			var res = $.evalJSON(response);
			if (res.error > 0) {
				if (res.error == 2) {
					$.fn.colorbox({html:'<div class="message_box mb_question">' + res.message + '<p class="action"><a href="user.php?act=add_booking&id=' + res.goods_id + '&spec=' + res.product_spec + '" class="button brighter_button"><span>' + lang.booking + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.continue_browsing_products + '</a></p></div>'});
				}
				else if (res.error == 6) {
					openSpeSiy(res.message, res.goods_id, res.parent);
				}
				else {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
				}
			}
			else {
				//$('#cart').html(res.content);
				loadCart();
				if (res.one_step_buy == '1') {
					location.href = 'flow.php?step=add_to_cart';
				}
				else {
					if ($('#page_flow').length > 0) {
						location.href = 'flow.php?step=cart';
						//window.location.reload();
					} else {
						$.fn.colorbox({html:'<div class="message_box mb_info">' + lang.add_to_cart_success + '<p class="action"><a href="flow.php?step=cart" class="button brighter_button"><span>' + lang.checkout_now + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.continue_browsing_products + '</a></p></div>'});
					};
				}
			}
		},
		'text'
	);
}

function collect(id)
{
	$.get(
		'user.php?act=collect',
		'id=' + id,
		function(response){
			var res = $.evalJSON(response);
			$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
		},
		'text'
	);
}


function addPackageToCart(id) {
	var package_info = new Object();
	var number       = 1;

	package_info.package_id = id
	package_info.number     = number;

	$.post(
		'flow.php?step=add_package_to_cart',
		{package_info: $.toJSON(package_info)},
		function(response){
			var res = $.evalJSON(response);
			if (res.error > 0) {
				if (res.error == 2) {
					$.fn.colorbox({html:'<div class="message_box mb_question">' + res.message + '<p class="action"><a href="user.php?act=add_booking&id=' + res.goods_id + '" class="button brighter_button"><span>' + lang.booking + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.cancel + '</a></p></div>'});
				}
				else {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
				}
			}
			else {
				//$('#cart').html(res.content);
				loadCart();
				if (res.one_step_buy == '1') {
					location.href = 'flow.php?step=add_to_cart';
				}
				else {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + lang.add_to_cart_success + '<p class="action"><a href="flow.php?step=cart" class="button brighter_button"><span>' + lang.checkout_now + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.continue_browsing_products + '</a></p></div>'});
				}
			}
		},
		'text'
	);
}

function fittings_to_flow(goodsId,parentId)
{
	var goods        = new Object();
	var spec_arr     = new Array();
	var number       = 1;
	goods.spec     = spec_arr;
	goods.goods_id = goodsId;
	goods.number   = number;
	goods.parent   = parentId;

	$.post(
		'flow.php?step=add_to_cart',
		{goods: $.toJSON(goods)},
		function(response){
			var res = $.evalJSON(response);
			if (res.error > 0) {
				if (res.error == 2) {
					$.fn.colorbox({html:'<div class="message_box mb_question">' + res.message + '<p class="action"><a href="user.php?act=add_booking&id=' + res.goods_id + '&spec=' + res.product_spec + '" class="button brighter_button"><span>' + lang.booking + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.continue_browsing_products + '</a></p></div>'});
				}
				else if (res.error == 6) {
					openSpeSiy(res.message, res.goods_id, res.parent);
				}
				else {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
				}
			} else {
				location.href = 'flow.php?step=cart';
			}
		},
		'text'
	);
}


function validAndTip(obj){if(obj.isValid()){obj.tipsy('hide');}else{obj.tipsy('show');}return false;}
function validAndTipNext(obj){if(obj.isValid()){obj.next().tipsy('hide');}else{obj.next().tipsy('show');}return false;}

function validLogin() {
	$('#username_login, #password_login').valid8('').tipsy({gravity: 'w', fade: true, trigger: 'manual'}).focusout(function(){validAndTip($(this));}).keyup(function(){validAndTip($(this));});
	$('#username_login').focus().attr('original-title', lang.error_username_required);
	$('#password_login').attr('original-title', lang.error_password_required);
	if ($('#captcha_login').length > 0) {
		$('#captcha_login').valid8('').next().tipsy({gravity: 'w', fade: true, trigger: 'manual'}).attr('original-title', lang.error_captcha_required);
		$('#captcha_login').focusout(function(){validAndTipNext($(this));}).keyup(function(){validAndTipNext($(this));});
	}
	$('#user_login').submit(function(){
		var unc = 0,pwc = 0,ccc = 0;
		validAndTip($('#username_login'));
		validAndTip($('#password_login'));
		if ($('#username_login').val() != '') {unc = 1};
		if ($('#password_login').val() != '') {pwc = 1};
		if ($('#captcha_login').length > 0) {
			validAndTipNext($('#captcha_login'));
			if ($('#captcha_login').val() != '') {ccc = 1};
			if(unc+pwc+ccc == 3){
				return true;
			} else {
				return false;
			}
		} else {
			if(unc+pwc+ccc == 2){
				return true;
			} else {
				return false;
			}
		};
	});
}

function openQuickLogin() {
	$.fn.colorbox({scrolling:false,href:'user.php?act=login&ajax=1',onComplete:function(){
			$('.tipsy').remove();
			validQuickLogin();
		},onCleanup:function(){
			$('.tipsy').remove();
		}
	});
}

function validAndTip2(obj){if(obj.val() != ''){obj.tipsy('hide');}else{obj.tipsy('show');}return false;}
function validAndTipNext2(obj){if(obj.val() != ''){obj.next().tipsy('hide');}else{obj.next().tipsy('show');}return false;}

function validQuickLogin() {
	$('#user_login .tip').tipsy({gravity: 's',fade: true,html: true});
	$('#username_login, #password_login').tipsy({gravity: 'w', fade: true, trigger: 'manual'}).focusout(function(){validAndTip2($(this));}).keyup(function(){validAndTip2($(this));});//
	$('#username_login').focus().attr('original-title', lang.error_username_required);
	$('#password_login').attr('original-title', lang.error_password_required);
	if ($('#captcha_login').length > 0) {
		$('#captcha_login').next().tipsy({gravity: 'w', fade: true, trigger: 'manual'}).attr('original-title', lang.error_captcha_required);
		$('#captcha_login').focusout(function(){validAndTipNext2($(this));}).keyup(function(){validAndTipNext2($(this));});//
	}
	$('#user_login').submit(function(){
		var unc = 0,pwc = 0,ccc = 0;
		validAndTip2($('#username_login'));
		validAndTip2($('#password_login'));
		if ($('#username_login').val() != '') {unc = 1};
		if ($('#password_login').val() != '') {pwc = 1};
		if ($('#captcha_login').length > 0) {
			validAndTipNext2($('#captcha_login'));
			if ($('#captcha_login').val() != '') {ccc = 1};
			if(unc+pwc+ccc == 3){
				quickLogin();
				return false;
			} else {
				return false;
			}
		} else {
			if(unc+pwc+ccc == 2){
				quickLogin();
				return false;
			} else {
				return false;
			}
		};
	});
}


function quickLogin() {
	var userArea = $('#user_area');
	var username = $('#username_login').val();
	var password = $('#password_login').val();
	var remember = '';
	var captcha = '';
	if ($('#captcha_login').length > 0) {
		var captcha = $('#captcha_login').val();
	}
	if ($('#remember_login:checked').length > 0) {
		$.post(
			'user.php?act=signin',
			{username: username, password: encodeURIComponent(password), captcha: captcha, remember: 1},
			function(response){
				var res = $.evalJSON(response);
				if (res.error > 0) {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + res.content + '<p class="action"><a href="user.php?act=login" class="button brighter_button quick_login"><span>' + lang.login_again + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.login_cancel + '</a></p></div>'});
					if(res.html) {
						userArea.html(res.html);
					}
				} else {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + lang.login_success + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a><a href="user.php" class="tool_link">' + lang.go_to_user_center + '</a></p></div>'});
					userArea.html(res.content);
				}
			},
			'text'
		);
	} else {
		$.post(
			'user.php?act=signin',
			{username: username, password: encodeURIComponent(password), captcha: captcha},
			function(response){
				var res = $.evalJSON(response);
				if (res.error > 0) {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + res.content + '<p class="action"><a href="user.php?act=login" class="button brighter_button quick_login"><span>' + lang.login_again + '</span></a><a href="javascript:void(0);" class="tool_link" onclick="$.fn.colorbox.close(); return false;">' + lang.login_cancel + '</a></p></div>'});
					if(res.html) {
						userArea.html(res.html);
					}
				} else {
					$.fn.colorbox({html:'<div class="message_box mb_info">' + lang.login_success + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a><a href="user.php" class="tool_link">' + lang.go_to_user_center + '</a></p></div>'});
					userArea.html(res.content);
				}
			},
			'text'
		);
	}
}

function submitComment(frm) {
	var cmt = new Object();
	cmt.email           = frm.elements['email'].value;
	cmt.content         = frm.elements['content'].value;
	cmt.type            = frm.elements['cmt_type'].value;
	cmt.id              = frm.elements['id'].value;
	cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
	cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
	cmt.rank            = 0;
	for (i = 0; i < frm.elements['comment_rank'].length; i++) {
		if (frm.elements['comment_rank'][i].checked) {
			cmt.rank = frm.elements['comment_rank'][i].value;
		}
	}
	var validItem = $('#cf_email, #cf_content, #cf_captcha');
	validItem.tipsy({gravity: 's', fade: true, trigger: 'manual'}).valid8('').focusout(function(){validAndTip($(this));}).keyup(function(){validAndTip($(this));});
	if (cmt.email.length > 0) {
		if (!isValidEmail(cmt.email)) {
			$('#cf_email').attr('original-title', lang.error_email_format).tipsy('show');
			return false;
		}
	} else {
		$('#cf_email').attr('original-title', lang.error_email_required).tipsy('show');
		return false;
	}
	if (cmt.content.length == 0) {
		$('#cf_content').attr('original-title', lang.error_comment_content_required).tipsy('show');
		return false;
	}
	if ($('#cf_captcha').length > 0 && cmt.captcha.length == 0) {
		$('#cf_captcha').attr('original-title', lang.error_captcha_required).tipsy('show');
		return false;
	}
	$.post(
		'comment.php',
		{cmt: $.toJSON(cmt)},
		function(response){
			var res = $.evalJSON(response);
			if (res.message) {
				$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
			}
			if (res.error == 0) {
				$('#comment_wrapper').html(res.content);
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
				$('.tip').tipsy({gravity: 's',fade: true,html: true});
			}
		},
		'text'
	);
	return false;
}

/* 评论的翻页 */
function gotoPage(page, id, type) {
	$.get(
		'comment.php?act=gotopage',
		'page=' + page + '&id=' + id + '&type=' + type,
		function(response){
			var res = $.evalJSON(response);
			$('#comment_wrapper').html(res.content);
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
		},
		'text'
	);
}

/* 购买记录的翻页 */
function gotoBuyPage(page, id) {
	$.get(
		'goods.php?act=gotopage',
		'page=' + page + '&id=' + id,
		function(response){
			var res = $.evalJSON(response);
			$('#bought_wrap').html(res.result);
		},
		'text'
	);
}

/* =user */
function sendHashMail() {
	$.get(
		'user.php?act=send_hash_mail',
		'',
		function(response){
			var res = $.evalJSON(response);
			$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
			$('#comment_wrapper').html(res.content);
		},
		'text'
	);
}


/* =snatch */
function bid()
{
	var form = $('#snatch_form');
	var id = form.find('input[name="snatch_id"]').val();
	var priceInput = form.find('input[name="price"]');
	var price = priceInput.val();
	priceInput.tipsy({gravity: 'w', fade: true, trigger: 'manual'}).focusout(function() {
		$(this).tipsy('hide');
	}).keypress(function() {
		$(this).tipsy('hide');
	});;
	if (price == '') {
		priceInput.attr('original-title', lang.error_price_required).tipsy('show');
		return;
	} else {
		var reg = /^[\.0-9]+/;
		if ( ! reg.test(price)) {
			priceInput.attr('original-title', lang.error_price).tipsy('show');
			return;
		} else {
			$.post(
				'snatch.php?act=bid',
				{id: id, price: price},
				function(response){
					var res = $.evalJSON(response);
					if (res.error == 0) {
						$('#snatch_wrapper').html(res.content);
					} else {
						$.fn.colorbox({html:'<div class="message_box mb_info">' + res.content + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
					}
				},
				'text'
			);
		}
	}
}

function newPrice(id) {
	$.get(
		'snatch.php?act=new_price_list',
		'id=' + id,
		function(response){
			$('#price_list').html(response);
			$('#price_list').find('.bd').css({backgroundColor:'#ffc'}).animate({backgroundColor:'#fff'}, 1000);
		},
		'text'
	);
}

function regionChanged(obj, type, selName) {
	var parent = obj.options[obj.selectedIndex].value;
	loadRegions(parent, type, selName);
}
function loadRegions(parent, type, target) {
	var target = $('#'+target+'');
	target.after(loader).next('.loader').css({visibility:'visible'}).fadeTo(0, 1000);
	$.get(
		'region.php',
		'type=' + type + '&target=' + target + "&parent=" + parent,
		function(response){
			var res = $.evalJSON(response);
			target.next('.loader').fadeTo(500, 0, function(){
				$(this).remove();
			});
			target.find('option[value!="0"]').remove();
			if (res.regions.length == 0) {
				target.css('display','none');
				target.nextAll('select').css('display','none');
			} else {
				target.css('display','');
				for (i = 0; i < res.regions.length; i ++ ) {
					target.append('<option value="' + res.regions[i].region_id + '">' + res.regions[i].region_name + '</option>');
				}
			};
		},
		'text'
	);
}

function loadCart(show) {
	$.post(
		'flow.php?step=cart&ajax=1',
		'',
		function(response){
			$('#cart .loader').fadeTo(1000, 0);
			$("#cart").html(response);
			if (show == 1) {
				$('#cart .list_wrapper').css({display:'block',backgroundColor:'#ffc'}).animate({backgroundColor:'#fff'}, 1000);
				//$('#cart .list_wrapper .close').css({display:'block'});
			}
		},
		'text'
	);
}

function cartDrop(id) {
	$('#cart .loader').css({visibility:'visible'}).fadeTo(0, 1000);
	$.get(
		'flow.php?step=drop_goods',
		'id=' + id,
		function(response){
			if ($('#page_flow').length > 0) {
				if (action == 'checkout') {
					location.href = 'flow.php?step=checkout';
				} else {
					location.href = 'flow.php?step=cart';
				}
			} else {
				loadCart(1);
			}
		},
		'text'
	);
}

function closeCart() {
	$('#cart .list_wrapper').hide();
}

function cAlert(content) {
	$.fn.colorbox({transition:'none',html:'<div class="message_box mb_info">' + content + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
}


function submitTag() {
	var tag = $('#tag_form input[name="tag"]').val();
	var goods_id = $('#tag_form input[name="goods_id"]').val();
	if (tag.length > 0 && parseInt(goods_id) > 0) {
		$.post(
			'user.php?act=add_tag',
			{id: goods_id, tag: tag},
			function(response){
				var res = $.evalJSON(response);
				if (res.error > 0) {
					cAlert(res.message);
				} else {
					var tags = res.content;
					var html = '';
					for (i = 0; i < tags.length; i++) {
						html += '<a href="search.php?keywords='+tags[i].word+'" class="item">' +tags[i].word + '<em>' + tags[i].count + '</em></a>';
					}
					$('#tags').html(html);
				}
			},
			'text'
		);
	}
}