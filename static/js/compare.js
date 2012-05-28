/* Copyright (C) 2009 - 2011 Shopiy, Shopiy许可协议 (http://www.shopiy.com/license) */

$(document).ready(function(){
	compare.init();
});

var compare = new Object();
var compareHtml = '<div id="compare_box" class="compare_box" style="display:none"><p class="title">' + lang.compare_goods + '</p><p class="arrows"><a href="javascript:void(0);" class="left">&larr;</a><a href="javascript:void(0);" class="right">&rarr;</a></p><div class="compare_inner"><div id="compare_list" class="compare_list"></div><p class="actions"><a href="javascript:void(0);" id="compare_button" class="button brighter_button"><span>' + lang.compare + '</span></a></p></div></div>';
compare = {
	add : function(goodsId, goodsName, type, goodsUrl, goodsThumb) {
		var count = 0;
		for (var k in this.data) {
			if (typeof(this.data[k]) == 'function') continue;
			if (this.data[k].t != type) {
				cAlert(lang.compare_type_different.replace('%s', goodsName));
			return;
			}
			count++;
		}
		if (this.data[goodsId]) {
			cAlert(lang.compare_exist.replace('%s',goodsName));
			return;
		} else {
			this.data[goodsId] = {n:goodsName,t:type,l:goodsUrl,i:goodsThumb};
		}
		this.save();
		this.init();
	},
	init : function(){
		this.data = new Object();
		var cookieValue = document.getCookie('compareItems');
		if (cookieValue != null) {
			this.data = $.evalJSON(cookieValue);
		}
		if ($('#compare_box').length < 1) {
			$('body').append(compareHtml);
		}
		var compareBox = $('#compare_box');
		var compareList = $('#compare_list');
		var self = this;
		for (var key in this.data) {
			if(typeof(this.data[key]) == 'function') continue;
			if ($('#compare_item_' + key).length < 1) {
				var item = '<p id="compare_item_' + key + '" class="item clearfix"><span class="photo"><a href="' + this.data[key].l + '"><img src="' + this.data[key].i + '" /></a></span><span class="name">' + this.data[key].n + '</span><a href="javascript:void(0);" class="remove">' + lang.remove + '</a></p>';
				compareList.append(item);
			}
		}
		if (compareList.find('.item').length > 0) {
			if (compareBox.css('display') != 'block') {
				compareBox.css({top:'200px'});
			}
			compareBox.css({display:'block',position:'absolute',right:'10px',zIndex:'100'});
			var cbpos_original = compareBox.offset().top;
			var cbpos = compareBox.offset().top;
			var windowpos = $(window).scrollTop();
			var finaldestination = windowpos;
			if(windowpos+10 < cbpos_original) {
				finaldestination = cbpos_original;
				compareBox.stop().animate({'top':140},800);
			} else {
				compareBox.stop().animate({'top':windowpos+10},800);
			}
			$(window).scroll(function(){
				var cbpos = compareBox.offset().top;
				var windowpos = $(window).scrollTop();
				var finaldestination = windowpos;
				if(windowpos+10 < cbpos_original) {
					finaldestination = cbpos_original;
					compareBox.stop().animate({'top':140},800);
				} else {
					compareBox.stop().animate({'top':windowpos+10},800);
				}
			});
			$('#compare_button').click(function(){
				var cookieValue = document.getCookie('compareItems');
				var obj = $.evalJSON(cookieValue);
				var url = document.location.href;
				url = url.substring(0,url.lastIndexOf('/')+1) + 'compare.php';
				var i = 0;
				for(var k in obj) {
					if(typeof(obj[k])=='function') continue;
					if(i==0)
						url += '?goods[]=' + k;
					else
						url += '&goods[]=' + k;
						i++;
				}
				if(i<2) {
					cAlert(lang.compare_no_goods);
					return false;
				}
				document.location.href = url;
			});
			$('#compare_list .remove').click(function(){
				var key = $(this).parent().attr('id').replace('compare_item_', '');
				$(this).parent().remove();
				delete compare.data[key];
				compare.save();
				compare.init();
			});
			$('#compare_list .item').hover(function(){
				$(this).addClass('hover');
			},function(){
				$(this).removeClass('hover');
			});
			$('#compare_box').hover(function(){
				$('#compare_box .arrows').show();
			},function(){
				$('#compare_box .arrows').hide();
			});
			$('#compare_box .arrows .left').click(function(){
				if (compareBox.css('right') != 'auto') {
					var offset = compareBox.offset();
					compareBox.css({right:'auto',left:offset.left}).animate({left:'10px'},800);
				}
			});
			$('#compare_box .arrows .right').click(function(){
				if (compareBox.css('left') != 'auto') {
					var offset = compareBox.offset();
					compareBox.css({left:'auto',right:$(window).width()-206-offset.left}).animate({right:'10px'},800);
				}
			});
		} else {
			compareBox.hide();
			window.clearInterval(this.timer);
			this.timer = 0;
		}
	},
	save : function() {
		var date = new Date();
		date.setTime(date.getTime() + 99999999);
		document.setCookie('compareItems', $.toJSON(this.data));
	}
}

document.getCookie = function(sName) {
	var aCookie = document.cookie.split("; ");
	for (var i=0; i < aCookie.length; i++) {
		var aCrumb = aCookie[i].split("=");
		if (sName == aCrumb[0]) return decodeURIComponent(aCrumb[1]);
	}
	return null;
}

document.setCookie = function(sName, sValue, sExpires) {
	var sCookie = sName + "=" + encodeURIComponent(sValue);
	if (sExpires != null) {
		sCookie += "; expires=" + sExpires;
	}
	document.cookie = sCookie;
}

document.removeCookie = function(sName,sValue) {
	document.cookie = sName + "=; expires=Fri, 31 Dec 1999 23:59:59 GMT;";
}


function compareRemove(id, url) {
	if (document.getCookie('compareItems') != null) {
		var obj = $.evalJSON(document.getCookie('compareItems'));
		delete obj[id];
		var date = new Date();
		date.setTime(date.getTime() + 99999999);
		document.setCookie('compareItems', $.toJSON(obj));
	}
}