var selectedShipping = null;
var selectedPayment  = null;
var selectedPack     = null;
var selectedCard     = null;
var selectedSurplus  = '';
var selectedBonus    = 0;
var selectedIntegral = 0;
var selectedOOS      = null;
var alertedSurplus   = false;

var groupBuyShipping = null;
var groupBuyPayment  = null;


/* 改变支付方式 */
function selectPayment(obj) {
	if (selectedPayment == obj) {
		return;
	} else {
		selectedPayment = obj;
	}
	$.get(
		'flow.php?step=select_payment',
		'payment=' + obj.value,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}
/* 团购购物流程 --> 改变配送方式 */
function handleGroupBuyShipping(obj) {
	if (groupBuyShipping == obj) {
		return;
	} else {
		groupBuyShipping = obj;
	}
	var supportCod = obj.attributes['supportCod'].value + 0;
	var theForm = obj.form;
	for (i = 0; i < theForm.elements.length; i ++ ) {
		if (theForm.elements[i].name == 'payment' && theForm.elements[i].attributes['isCod'].value == '1') {
			if (supportCod == 0) {
				theForm.elements[i].checked = false;
				theForm.elements[i].disabled = true;
			} else {
				theForm.elements[i].disabled = false;
			}
		}
	}

	if (obj.attributes['insure'].value + 0 == 0) {
		document.getElementById('ECS_NEEDINSURE').checked = false;
		document.getElementById('ECS_NEEDINSURE').disabled = true;
	} else {
		document.getElementById('ECS_NEEDINSURE').checked = false;
		document.getElementById('ECS_NEEDINSURE').disabled = false;
	}
	$.get(
		'group_buy.php?act=select_shipping',
		'shipping=' + obj.value,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 团购购物流程 --> 改变支付方式 */
function handleGroupBuyPayment(obj) {
	if (groupBuyPayment == obj) {
		return;
	} else {
		groupBuyPayment = obj;
	}
	$.get(
		'group_buy.php?act=select_payment',
		'payment=' + obj.value,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 改变商品包装 */
function selectPack(obj) {
	if (selectedPack == obj) {
		return;
	} else {
		selectedPack = obj;
	}
	$.get(
		'flow.php?step=select_pack',
		'pack=' + obj.value,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 改变祝福贺卡 */
function selectCard(obj) {
	if (selectedCard == obj) {
		return;
	} else {
		selectedCard = obj;
	}
	$.get(
		'flow.php?step=select_card',
		'card=' + obj.value,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 选定了配送保价 */
function selectInsure(needInsure)
{
  needInsure = needInsure ? 1 : 0;
	$.get(
		'flow.php?step=select_insure',
		'insure=' + needInsure,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 团购购物流程 --> 选定了配送保价 */
function handleGroupBuyInsure(needInsure) {
	needInsure = needInsure ? 1 : 0;
	$.get(
		'group_buy.php?act=select_insure',
		'insure=' + needInsure,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 回调函数 */
function orderSelectedResponse(res) {
	if (res.error) {
		alert(res.error);
		location.href = './';
	}
	if (typeof res == 'object') {
		$('#order_total').html(res.content);
		if (res.pay_code == 'balance') {
			$('input[name="surplus"]').attr('disabled','disabled');
		} else {
			$('input[name="surplus"]').removeAttr('disabled');
		}
	} else {
		$('#order_total').html(res);
	}
}

/* 改变余额 */
function changeSurplus(val) {
	if (selectedSurplus == val) {
		return;
	} else {
		selectedSurplus = val;
	}
	$.get(
		'flow.php?step=change_surplus',
		'surplus=' + val,
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 改变余额回调函数 */
function changeSurplusResponse(obj) {
	if (obj.error) {
		$('#ECS_SURPLUS_NOTICE').html(obj.error);
		$('#ECS_SURPLUS').val('0');
		$('#ECS_SURPLUS').focus();
	} else {
		$('#ECS_SURPLUS_NOTICE').html('');
		orderSelectedResponse(obj.content);
	}
}

/* 改变积分 */
function changeIntegral(val) {
	if (selectedIntegral == val) {
		return;
	} else {
		selectedIntegral = val;
	}
	$.get(
		'flow.php?step=change_integral',
		'points=' + val,
		function(response){
			var res = $.evalJSON(response);
			if (res.error) {
				$('#ECS_INTEGRAL_NOTICE').html(res.error);
				$('#ECS_INTEGRAL').val('0');
				$('#ECS_INTEGRAL').focus();
			} else {
				$('#ECS_INTEGRAL_NOTICE').html('');
				orderSelectedResponse(res.content);
			}
		},
		'text'
	);
}

/* 改变红包 */
function changeBonus(val) {
	if (selectedBonus == val) {
		return;
	} else {
		selectedBonus = val;
	}
	$.get(
		'flow.php?step=change_bonus',
		'bonus=' + val,
		function(response){
			var res = $.evalJSON(response);
			if (res.error) {
				alert(res.error);
				try {
					document.getElementById('ECS_BONUS').value = '0';
				} catch (ex) { }
			} else {
				orderSelectedResponse(res.content);
			}
		},
		'text'
	);
}

/* 验证红包序列号 */
function validateBonus() {
	var bonusSn = $('#bonus-sn').val();
	$.get(
		'flow.php?step=validate_bonus',
		'bonus_sn=' + bonusSn,
		function(response){
			var res = $.evalJSON(response);
			if (res.error) {
				cAlert(res.error);
			}
			orderSelectedResponse(res.content);
		},
		'text'
	);
}

/* 改变发票的方式 */
function changeNeedInv() {
	var obj        = document.getElementById('ECS_NEEDINV');
	var objType    = document.getElementById('ECS_INVTYPE');
	var objPayee   = document.getElementById('ECS_INVPAYEE');
	var objContent = document.getElementById('ECS_INVCONTENT');
	var needInv    = obj.checked ? 1 : 0;
	var invType    = obj.checked ? (objType != undefined ? objType.value : '') : '';
	var invPayee   = obj.checked ? objPayee.value : '';
	var invContent = obj.checked ? objContent.value : '';
	objType.disabled = objPayee.disabled = objContent.disabled = ! obj.checked;
	if(objType != null) {
		objType.disabled = ! obj.checked;
	}
	$.get(
		'flow.php?step=change_needinv',
		'need_inv=' + needInv + '&inv_type=' + encodeURIComponent(invType) + '&inv_payee=' + encodeURIComponent(invPayee) + '&inv_content=' + encodeURIComponent(invContent),
		function(response){
			var res = $.evalJSON(response);
			orderSelectedResponse(res);
		},
		'text'
	);
}

/* 改变发票的方式 */
function groupBuyChangeNeedInv() {
	var obj        = document.getElementById('ECS_NEEDINV');
	var objPayee   = document.getElementById('ECS_INVPAYEE');
	var objContent = document.getElementById('ECS_INVCONTENT');
	var needInv    = obj.checked ? 1 : 0;
	var invPayee   = obj.checked ? objPayee.value : '';
	var invContent = obj.checked ? objContent.value : '';
	objPayee.disabled = objContent.disabled = ! obj.checked;
	$.get(
		'group_buy.php?act=change_needinv',
		'need_idv=' + needInv + '&payee=' + invPayee + '&content=' + invContent,
		function(response){
		},
		'text'
	);
}

/* 改变缺货处理时的处理方式 */
function changeOOS(obj) {
	if (selectedOOS == obj) {
		return;
	} else {
		selectedOOS = obj;
	}
	$.get(
		'flow.php?step=change_oos',
		'oos=' + obj.value,
		function(response){
		},
		'text'
	);
}

/* 检查收货地址信息表单中填写的内容 */
function checkConsignee(frm) {
	var msg = new Array();
	var err = false;

	if (frm.elements['country'] && frm.elements['country'].value == 0) {
		msg.push(country_not_null);
		err = true;
	}
	if (frm.elements['province'] && frm.elements['province'].value == 0 && frm.elements['province'].length > 1) {
		err = true;
		msg.push(province_not_null);
	}
	if (frm.elements['city'] && frm.elements['city'].value == 0 && frm.elements['city'].length > 1) {
		err = true;
		msg.push(city_not_null);
	}
	if (frm.elements['district'] && frm.elements['district'].length > 1) {
		if (frm.elements['district'].value == 0) {
			err = true;
			msg.push(district_not_null);
		}
	}
	if (frm.elements['consignee'].value.length == 0) {
		err = true;
		msg.push(consignee_not_null);
	}
	if (!isValidEmail(frm.elements['email'].value)) {
		err = true;
		msg.push(invalid_email);
	}
	if (frm.elements['address'] && frm.elements['address'].value.length == 0) {
		err = true;
		msg.push(address_not_null);
	}
	if (frm.elements['tel'].value.length == 0) {
		err = true;
		msg.push(tele_not_null);
	}
	if (err) {
		message = msg.join("\n");
		cAlert(message);
	}
	return ! err;
}

$(document).ready(function() {
checkoutInit();
$('#checkout_form').submit(function(){
	var form = $(this);
	if (form.find('input[name="payment"]').length > 0 && form.find('input[name="payment"]:checked').length < 1) {
		cAlert(flow_no_payment);
		return false;
	}
//	if (form.find('input[name="shipping"]').length > 0 && form.find('input[name="shipping"]:checked').length < 1) {
//		cAlert(flow_no_shipping);
//		return false;
//	}
/*
	if ($('#ECS_SURPLUS').length > 0) {
		$.get(
			'flow.php?step=check_surplus',
			'surplus=' + $('#ECS_SURPLUS').val(),
			function(response){
				var res = (response.slice(0,1) == '{') ? $.evalJSON(response) : '';
				if (res.error) {
					$('#ECS_SURPLUS_NOTICE').html(res.error);
					return false;
				} else if ($('#ECS_INTEGRAL').length > 0) {
					$.get(
						'flow.php?step=check_integral',
						'integral=' + $('#ECS_INTEGRAL').val(),
						function(response){
							var res = (response.slice(0,1) == '{') ? $.evalJSON(response) : '';
							if (res.error) {
								$('#ECS_INTEGRAL_NOTICE').html(res.error);
								return false;
							} else {
								return true;
							}
						},
						'text'
					);
				} else {
					return true;
				}
			},
			'text'
		);
	} else if ($('#ECS_INTEGRAL').length > 0) {
		$.get(
			'flow.php?step=check_integral',
			'integral=' + $('#ECS_INTEGRAL').val(),
			function(response){
				var res = (response.slice(0,1) == '{') ? $.evalJSON(response) : '';
				if (res.error) {
					$('#ECS_INTEGRAL_NOTICE').html(res.error);
					return false;
				} else {
					return true;
				}
			},
			'text'
		);
	} else {
		return true;
	}
*/
});

});


function checkoutInit(){
	var area = $('.flow_wrapper .options');
	var label = $('.option_item label', area);
	var input = $('.option_item input', area);
	input.hide().after('<em class="status"></em>');
	$('.option_item .intro', area).hide();
	$('.option_inner', area).find('.option_item:last').after('<span class="current_intro" style="display:none;"></span>');
	label.has(':checked').each(function(){
		$(this).addClass('checked');
		var intro = $(this).parent().find('.intro').html();
		if (intro.length > 0) {
			$(this).parents('.option_inner').find('.current_intro').html(intro).show();
		}
	});
	label.has(':disabled').addClass('disabled');
	label.hover(function(){
		$(this).toggleClass('hover');
	});
	label.click(function(){
		if ($(this).children('input').is(':radio:enabled')) {
			$(this).addClass('checked').parent().siblings('.option_item').children('label').removeClass('checked');
			$(this).children('input').attr('checked','checked');
			$(this).parent().siblings('.option_item').children('input').removeAttr('checked');
			var intro = $(this).parent().find('.intro').html();
			if (intro.length > 0) {
				$(this).parents('.option_inner').find('.current_intro').html(intro).show();
			} else {
				$(this).parents('.option_inner').find('.current_intro').hide();
			}
		} else if ($(this).children('input').is(':checkbox:enabled')) {
			$(this).toggleClass('checked');
			if ($(this).children('input').attr('checked')) {
				$(this).children('input').removeAttr('checked');
			} else {
				$(this).children('input').attr('checked','checked');
			}
		}
	});
	var inputCod = $('input[isCod="1"]', area);
	var inputInsure = $('#ECS_NEEDINSURE');
	var inputInsureWrapper = inputInsure.parents('.insure_wrapper');
	if ($('input[id^="shipping_method_"][insure!="0"]:checked').length == '0') {
		inputInsureWrapper.addClass('insure_disabled');
	}
	$('input[id^="shipping_method_"]').parent().click(function(){
		var shippingMethod = $('input', this);
		if (selectedShipping == shippingMethod) {return;} else {selectedShipping = shippingMethod;}
		if (shippingMethod.attr('supportCod') == '1') {
			inputCod.removeAttr('disabled').parent().removeClass('disabled');
		} else {
			inputCod.attr('disabled','disabled').removeAttr('checked').parent().removeClass('checked').addClass('disabled');
		}
		if (shippingMethod.attr('insure') != '0') {
			inputInsure.removeAttr('disabled').removeAttr('checked').parent().removeClass('disabled');
			inputInsureWrapper.removeClass('insure_disabled');
		} else {
			inputInsure.attr('disabled','disabled').removeAttr('checked').parent().removeClass('checked').addClass('disabled');
			inputInsureWrapper.addClass('insure_disabled');
		}
		$.get(
			'flow.php?step=select_shipping',
			'shipping=' + shippingMethod.val(),
			function(response){
				var res = $.evalJSON(response);
				if (res.need_insure) {
					inputInsure.removeAttr('disabled').removeAttr('checked').parent().removeClass('disabled');
				}
				$('#ECS_CODFEE').html(res.cod_fee);
				orderSelectedResponse(res);
			},
			'text'
		);
	});
}
