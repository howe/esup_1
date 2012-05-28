/* Copyright (C) 2009 - 2011 Shopiy, Shopiy许可协议 (http://www.shopiy.com/license) */

function returnToCart(orderId) {
	$.post(
		'user.php?act=return_to_cart',
		{order_id: orderId},
		function(response){
			var res = $.evalJSON(response);
			$.fn.colorbox({html:'<div class="message_box mb_info">' + res.message + '<p class="action"><a href="javascript:void(0);" class="button brighter_button" onclick="$.fn.colorbox.close(); return false;"><span>' + lang.confirm + '</span></a></p></div>'});
			loadCart();
		},
		'text'
	);
}

function validRegister() {
	$('#agr_link').click(function(){
		$.fn.colorbox({title:lang.user_agreement,height:'80%',width:'750px',href:'article.php?cat_id=-1&ajax=1',onOpen:function(){
				$('.tipsy').css({zIndex:'100'});
			},onClosed:function(){
				$('.tipsy').css({zIndex:'1000'});
			}
		});
		return false;
	});
	if ($('#user_reg .required').length > 0 && $('#sel_ques').hasClass('required')) {
		var validItem = $('#username_reg, #email_reg, #password_reg, #password_c_reg, #sel_ques, #pw_answer, #user_reg .required');
	} else if ($('#user_reg .required').length == 0 && $('#sel_ques').hasClass('required')) {
		var validItem = $('#username_reg, #email_reg, #password_reg, #password_c_reg, #sel_ques, #pw_answer');
	} else if ($('#user_reg .required').length > 0 && $('#sel_ques').length == 0) {
		var validItem = $('#username_reg, #email_reg, #password_reg, #password_c_reg, #user_reg .required');
	} else {
		var validItem = $('#username_reg, #email_reg, #password_reg, #password_c_reg');
	}
	validItem.tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
	$('#username_reg').blur(function(){
		var un = $(this);
		var unl = un.val().replace(/[^\x00-\xff]/g, 'xx').length;
		var status = $('.status',un.parent());
		if (unl < 3) { 
			un.attr('original-title', lang.error_username_short).tipsy('show');
			status.removeClass('valid');
		} else if (unl > 14) {
			un.attr('original-title', lang.error_username_long).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=is_registered',
				'username=' + encodeURI(un.val()),
				function(response){
					if (response == 'true') {
						un.tipsy('hide');
						status.addClass('valid');
					} else {
						un.attr('original-title', lang.error_username_exist).tipsy('show');
						status.removeClass('valid');
					}
				},
				'text'
			);
		}
	});
	$('#email_reg').blur(function(){
		var em = $(this);
		var email = em.val();
		var status = $('.status',em.parent());
		if (email == '') { 
			em.attr('original-title', lang.error_email_required).tipsy('show');
			status.removeClass('valid');
		} else if (!isValidEmail(email)) {
			em.attr('original-title', lang.error_email_format).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=check_email',
				'email=' + em.val(),
				function(response){
					if (response == 'ok') {
						em.tipsy('hide');
						status.addClass('valid');
					} else {
						em.attr('original-title', lang.error_email_exist).tipsy('show');
						status.removeClass('valid');
					}
				},
				'text'
			);
		}
	});
	$('#password_reg').blur(function(){
		var pw = $(this);
		var status = $('.status',pw.parent());
		if (pw.val().length < 6) {
			pw.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
		} else {
			pw.tipsy('hide');
			status.addClass('valid');
		}
	});
	$('#password_c_reg').blur(function(){
		var pwc = $(this);
		var status = $('.status',pwc.parent());
		if (pwc.val().length < 6) {
			pwc.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
		} else if (pwc.val() != $('#password_reg').val()) {
			pwc.attr('original-title', lang.error_confirm_password_invalid).tipsy('show');
			status.removeClass('valid');
		} else {
			pwc.tipsy('hide');
			status.addClass('valid');
		}
	});
	if ($('#captcha_reg').length > 0) {
		$('#captcha_reg').next().tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
		$('#captcha_reg').blur(function(){
			var cc = $(this);
			var status = $('.status',cc.parent());
			if (cc.val().length == '0') {
				cc.next().attr('original-title', lang.error_captcha_required).tipsy('show');
				status.removeClass('valid');
			} else if (cc.val().length != '4') {
				cc.next().attr('original-title', lang.error_captcha_format).tipsy('show');
				status.removeClass('valid');
			} else {
				cc.next().tipsy('hide');
				status.addClass('valid');
			}
		});
	}
	if ($('#user_reg .required').length > 0) {
		$('#user_reg .required').blur(function(){
			var req = $(this);
			var status = $('.status',req.parent());
			if (req.val().length == '0') {
				req.attr('original-title', lang.error_required).tipsy('show');
				status.removeClass('valid');
			} else {
				req.tipsy('hide');
				status.addClass('valid');
			}
		});
	}
	if ($('#sel_ques').length > 0 && $('#sel_ques').hasClass('required')) {
		$('#sel_ques').blur(function(){
			var sq = $(this);
			var status = $('.status',sq.parent());
			if (sq.val() == '0') {
				sq.attr('original-title', lang.error_sel_ques_required).tipsy('show');
				status.removeClass('valid');
			} else {
				sq.tipsy('hide');
				status.addClass('valid');
			}
		});
		$('#pw_answer').blur(function(){
			var pa = $(this);
			var status = $('.status',pa.parent());
			if (pa.val().length == '0') {
				pa.attr('original-title', lang.error_pa_answer_required).tipsy('show');
				status.removeClass('valid');
			} else {
				pa.tipsy('hide');
				status.addClass('valid');
			}
		});
	}
	$('#agreement').next().tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
	$('#agreement').blur(function(){
		var agr = $(this);
		var status = $('.status',agr.parent());
		if (agr.attr('checked') == false) {
			agr.next().attr('original-title', lang.error_agreement_required).tipsy('show');
			status.removeClass('valid');
		} else {
			agr.next().tipsy('hide');
			status.addClass('valid');
		}
	});
	$('#user_reg').submit(function(){
		var un = $('#username_reg');
		var unl = un.val().replace(/[^\x00-\xff]/g, 'xx').length;
		var status = $('.status',un.parent());
		if (unl < 3) { 
			un.attr('original-title', lang.error_username_short).tipsy('show');
			status.removeClass('valid');
		} else if (unl > 14) {
			un.attr('original-title', lang.error_username_long).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=is_registered',
				'username=' + encodeURI(un.val()),
				function(response){
					if (response == 'true') {
						un.tipsy('hide');
						status.addClass('valid');
					} else {
						un.attr('original-title', lang.error_username_exist).tipsy('show');
						status.removeClass('valid');
					}
				},
				'text'
			);
		};
		var em = $('#email_reg');
		var email = em.val();
		var status = $('.status',em.parent());
		if (email == '') { 
			em.attr('original-title', lang.error_email_required).tipsy('show');
			status.removeClass('valid');
		} else if (!isValidEmail(email)) {
			em.attr('original-title', lang.error_email_format).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=check_email',
				'email=' + em.val(),
				function(response){
					if (response == 'ok') {
						em.tipsy('hide');
						status.addClass('valid');
					} else {
						em.attr('original-title', lang.error_email_exist).tipsy('show');
						status.removeClass('valid');
					}
				},
				'text'
			);
		};
		var pw = $('#password_reg');
		var status = $('.status',pw.parent());
		if (pw.val().length < 6) {
			pw.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
		} else {
			pw.tipsy('hide');
			status.addClass('valid');
		};
		var pwc = $('#password_c_reg');
		var status = $('.status',pwc.parent());
		if (pwc.val().length < 6) {
			pwc.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
		} else if (pwc.val() != $('#password_reg').val()) {
			pwc.attr('original-title', lang.error_confirm_password_invalid).tipsy('show');
			status.removeClass('valid');
		} else {
			pwc.tipsy('hide');
			status.addClass('valid');
		};
		if ($('#captcha_reg').length > 0) {
			var cc = $('#captcha_reg');
			cc.next().tipsy({gravity: 'w', fade: true, trigger: 'manual'});
			var status = $('.status',cc.parent());
			if (cc.val().length == '0') {
				cc.next().attr('original-title', lang.error_captcha_required).tipsy('show');
				status.removeClass('valid');
			} else if (cc.val().length != '4') {
				cc.next().attr('original-title', lang.error_captcha_format).tipsy('show');
				status.removeClass('valid');
			} else {
				cc.next().tipsy('hide');
				status.addClass('valid');
			};
		};
		if ($('#user_reg .required').length > 0) {
			$('#user_reg .required').each(function(){
				var req = $(this);
				var status = $('.status',req.parent());
				if (req.val() == '') {
					req.attr('original-title', lang.error_required).tipsy('show');
					status.removeClass('valid');
				} else {
					req.tipsy('hide');
					status.addClass('valid');
				}
			});
		};
		if ($('#sel_ques').length > 0 && $('#sel_ques').hasClass('required')) {
			var sq = $('#sel_ques');
			var status = $('.status',sq.parent());
			if (sq.val() == '0') {
				sq.attr('original-title', lang.error_sel_ques_required).tipsy('show');
				status.removeClass('valid');
			} else {
				sq.tipsy('hide');
				status.addClass('valid');
			};
			var pa = $('#pw_answer');
			var status = $('.status',pa.parent());
			if (pa.val().length == '0') {
				pa.attr('original-title', lang.error_pa_answer_required).tipsy('show');
				status.removeClass('valid');
			} else {
				pa.tipsy('hide');
				status.addClass('valid');
			};
		};
		var agr = $('#agreement');
		agr.next().tipsy({gravity: 'w', fade: true, trigger: 'manual'});
		var status = $('.status',agr.parent());
		if (agr.attr('checked') == false) {
			agr.next().attr('original-title', lang.error_agreement_required).tipsy('show');
			status.removeClass('valid');
		} else {
			agr.next().tipsy('hide');
			status.addClass('valid');
		};
		validItem.valid8('');
		if (validItem.isValid() == false) {
			return false;
		};
		if ($('#pw_ques').length > 0) {
			$('#sel_ques,#pw_answer').valid8('');
			if ($('#sel_ques,#pw_answer').isValid() == false) {
				return false;
			};
		}
		if ($('#captcha_reg').length > 0) {
			$('#captcha_reg').valid8('');
			if ($('#captcha_reg').isValid() == false) {
				return false;
			};
		}
		if ($('#user_reg .required').length > 0) {
			$('#user_reg .required').each(function(){
				$(this).valid8('');
				if ($(this).isValid() == false) {
					return false;
				};
			});
		}
		$('#agreement').valid8('');
		if ($('#agreement').isValid() == false) {
			return false;
		};
		return true;
	});
}

function validGetpw() {
	var validItem = $('#username_gpw, #email_gpw');
	validItem.tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
	$('#username_gpw').blur(function(){
		var un = $(this);
		var unl = un.val().replace(/[^\x00-\xff]/g, 'xx').length;
		var status = $('.status',un.parent());
		if (unl < 3) { 
			un.attr('original-title', lang.error_username_short).tipsy('show');
			status.removeClass('valid');
		} else if (unl > 14) {
			un.attr('original-title', lang.error_username_long).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=is_registered',
				'username=' + encodeURI(un.val()),
				function(response){
					if (response == 'true') {
						un.attr('original-title', lang.error_username_not_exist).tipsy('show');
						status.removeClass('valid');
					} else {
						un.tipsy('hide');
						status.addClass('valid');
					}
				},
				'text'
			);
		}
	});
	$('#email_gpw').blur(function(){
		var em = $(this);
		var email = em.val();
		var status = $('.status',em.parent());
		if (email == '') { 
			em.attr('original-title', lang.error_email_required).tipsy('show');
			status.removeClass('valid');
		} else if (!isValidEmail(email)) {
			em.attr('original-title', lang.error_email_format).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=check_email',
				'email=' + em.val(),
				function(response){
					if (response == 'ok') {
						em.attr('original-title', lang.error_email_not_exist).tipsy('show');
						status.removeClass('valid');
					} else {
						em.tipsy('hide');
						status.addClass('valid');
					}
				},
				'text'
			);
		}
	});
	$('#user_gpw').submit(function(){
		var un = $('#username_gpw');
		var unl = un.val().replace(/[^\x00-\xff]/g, 'xx').length;
		var status = $('.status',un.parent());
		if (unl < 3) { 
			un.attr('original-title', lang.error_username_short).tipsy('show');
			status.removeClass('valid');
		} else if (unl > 14) {
			un.attr('original-title', lang.error_username_long).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=is_registered',
				'username=' + encodeURI(un.val()),
				function(response){
					if (response == 'true') {
						un.attr('original-title', lang.error_username_not_exist).tipsy('show');
						status.removeClass('valid');
					} else {
						un.tipsy('hide');
						status.addClass('valid');
					}
				},
				'text'
			);
		};
		var em = $('#email_gpw');
		var email = em.val();
		var status = $('.status',em.parent());
		if (email == '') { 
			em.attr('original-title', lang.error_email_required).tipsy('show');
			status.removeClass('valid');
		} else if (!isValidEmail(email)) {
			em.attr('original-title', lang.error_email_format).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=check_email',
				'email=' + em.val(),
				function(response){
					if (response == 'ok') {
						em.attr('original-title', lang.error_email_not_exist).tipsy('show');
						status.removeClass('valid');
					} else {
						em.tipsy('hide');
						status.addClass('valid');
					}
				},
				'text'
			);
		};
		validItem.valid8('');
		if (validItem.isValid() == false) {
			return false;
		} else {
			return true;
		}
	});
}

function validQpn() {
	$('#username_qpn').tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
	$('#username_qpn').blur(function(){
		var un = $(this);
		var unl = un.val().replace(/[^\x00-\xff]/g, 'xx').length;
		var status = $('.status',un.parent());
		if (unl < 3) { 
			un.attr('original-title', lang.error_username_short).tipsy('show');
			status.removeClass('valid');
		} else if (unl > 14) {
			un.attr('original-title', lang.error_username_long).tipsy('show');
			status.removeClass('valid');
		} else {
			$.get(
				'user.php?act=is_registered',
				'username=' + encodeURI(un.val()),
				function(response){
					if (response == 'true') {
						un.attr('original-title', lang.error_username_not_exist).tipsy('show');
						status.removeClass('valid');
					} else {
						un.tipsy('hide');
						status.addClass('valid');
					}
				},
				'text'
			);
		}
	});
	$('#user_qpn').submit(function(){
		var un = $('#username_qpn');
		var unl = un.val().replace(/[^\x00-\xff]/g, 'xx').length;
		var status = $('.status',un.parent());
		if (unl < 3) { 
			un.attr('original-title', lang.error_username_short).tipsy('show');
			status.removeClass('valid');
			return false;
		} else if (unl > 14) {
			un.attr('original-title', lang.error_username_long).tipsy('show');
			status.removeClass('valid');
			return false;
		} else {
			$.get(
				'user.php?act=is_registered',
				'username=' + encodeURI(un.val()),
				function(response){
					if (response == 'true') {
						un.attr('original-title', lang.error_username_not_exist).tipsy('show');
						status.removeClass('valid');
						return false;
					} else {
						un.tipsy('hide');
						status.addClass('valid');
						return true;
					}
				},
				'text'
			);
		};
	});
}

function validGpq() {
	$('#pw_answer').tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
	$('#pw_answer').blur(function(){
		var pa = $(this);
		var status = $('.status',pa.parent());
		if (pa.val().length == '0') {
			pa.attr('original-title', lang.error_pa_answer_required).tipsy('show');
			status.removeClass('valid');
		} else {
			pa.tipsy('hide');
			status.addClass('valid');
		}
	});
	if ($('#captcha_gpq').length > 0) {
		$('#captcha_gpq').next().tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
		$('#captcha_gpq').blur(function(){
			var cc = $(this);
			var status = $('.status',cc.parent());
			if (cc.val().length == '0') {
				cc.next().attr('original-title', lang.error_captcha_required).tipsy('show');
				status.removeClass('valid');
			} else if (cc.val().length != '4') {
				cc.next().attr('original-title', lang.error_captcha_format).tipsy('show');
				status.removeClass('valid');
			} else {
				cc.next().tipsy('hide');
				status.addClass('valid');
			}
		});
	}
	$('#user_gpq').submit(function(){
		var pa = $('#pw_answer');
		var status = $('.status',pa.parent());
		if (pa.val().length == '0') {
			pa.attr('original-title', lang.error_pa_answer_required).tipsy('show');
			status.removeClass('valid');
		} else {
			pa.tipsy('hide');
			status.addClass('valid');
		};
		if ($('#captcha_gpq').length > 0) {
			var cc = $('#captcha_gpq');
			cc.next().tipsy({gravity: 'w', fade: true, trigger: 'manual'});
			var status = $('.status',cc.parent());
			if (cc.val().length == '0') {
				cc.next().attr('original-title', lang.error_captcha_required).tipsy('show');
				status.removeClass('valid');
				return false;
			} else if (cc.val().length != '4') {
				cc.next().attr('original-title', lang.error_captcha_format).tipsy('show');
				status.removeClass('valid');
				return false;
			} else {
				cc.next().tipsy('hide');
				status.addClass('valid');
			};
		};
		$('#pw_answer,#captcha_gpq').valid8('');
		if ($('#pw_answer,#captcha_gpq').isValid() == false) {
			return false;
		};
		return true;
	});
}

function validRpw() {
	var validItem = $('#password_rpw, #password_c_rpw');
	validItem.tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
	$('#password_rpw').blur(function(){
		var pw = $(this);
		var status = $('.status',pw.parent());
		if (pw.val().length < 6) {
			pw.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
		} else {
			pw.tipsy('hide');
			status.addClass('valid');
		}
	});
	$('#password_c_rpw').blur(function(){
		var pwc = $(this);
		var status = $('.status',pwc.parent());
		if (pwc.val().length < 6) {
			pwc.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
		} else if (pwc.val() != $('#password_rpw').val()) {
			pwc.attr('original-title', lang.error_confirm_password_invalid).tipsy('show');
			status.removeClass('valid');
		} else {
			pwc.tipsy('hide');
			status.addClass('valid');
		}
	});
	$('#user_rpw').submit(function(){
		var pw = $('#password_rpw');
		var status = $('.status',pw.parent());
		if (pw.val().length < 6) {
			pw.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
		} else {
			pw.tipsy('hide');
			status.addClass('valid');
		};
		var pwc = $('#password_c_rpw');
		var status = $('.status',pwc.parent());
		if (pwc.val().length < 6) {
			pwc.attr('original-title', lang.error_password_short).tipsy('show');
			status.removeClass('valid');
			return false;
		} else if (pwc.val() != $('#password_rpw').val()) {
			pwc.attr('original-title', lang.error_confirm_password_invalid).tipsy('show');
			status.removeClass('valid');
			return false;
		} else {
			pwc.tipsy('hide');
			status.addClass('valid');
		};
	});
}

function validEditProfile() {
	if ($('#edit_profile .required').length > 0 && $('#sel_ques').hasClass('required')) {
		var validItem = $('#email_ep, #sel_ques, #pw_answer, #edit_profile .required');
	} else if ($('#edit_profile .required').length == 0 && $('#sel_ques').hasClass('required')) {
		var validItem = $('#email_ep, #sel_ques, #pw_answer');
	} else if ($('#edit_profile .required').length > 0 && $('#sel_ques').length == 0) {
		var validItem = $('#email_ep, #edit-profile .required');
	} else {
		var validItem = $('#email_ep');
	}
	validItem.tipsy({gravity: 'w', fade: true, trigger: 'manual'}).parent().append(status);
	$('#email_ep').blur(function(){
		var em = $(this);
		var email = em.val();
		var status = $('.status',em.parent());
		if (email == '') { 
			em.attr('original-title', lang.error_email_required).tipsy('show');
			status.removeClass('valid');
		} else if (!isValidEmail(email)) {
			em.attr('original-title', lang.error_email_format).tipsy('show');
			status.removeClass('valid');
		} else {
			em.tipsy('hide');
			status.addClass('valid');
		}
	});
	if ($('#edit_profile .required').length > 0) {
		$('#edit_profile .required').blur(function(){
			var req = $(this);
			var status = $('.status',req.parent());
			if (req.val().length == '0') {
				req.attr('original-title', lang.error_required).tipsy('show');
				status.removeClass('valid');
			} else {
				req.tipsy('hide');
				status.addClass('valid');
			}
		});
	}
	if ($('#sel_ques').length > 0 && $('#sel_ques').hasClass('required')) {
		$('#sel_ques').blur(function(){
			var sq = $(this);
			var status = $('.status',sq.parent());
			if (sq.val() == '0') {
				sq.attr('original-title', lang.error_sel_ques_required).tipsy('show');
				status.removeClass('valid');
			} else {
				sq.tipsy('hide');
				status.addClass('valid');
			}
		});
		$('#pw_answer').blur(function(){
			var pa = $(this);
			var status = $('.status',pa.parent());
			if (pa.val().length == '0') {
				pa.attr('original-title', lang.error_pa_answer_required).tipsy('show');
				status.removeClass('valid');
			} else {
				pa.tipsy('hide');
				status.addClass('valid');
			}
		});
	}
	$('#edit_profile').submit(function(){
		var em = $('#email_ep');
		var email = em.val();
		var status = $('.status',em.parent());
		if (email == '') { 
			em.attr('original-title', lang.error_email_required).tipsy('show');
			status.removeClass('valid');
		} else if (!isValidEmail(email)) {
			em.attr('original-title', lang.error_email_format).tipsy('show');
			status.removeClass('valid');
		} else {
			em.tipsy('hide');
			status.addClass('valid');
		};
		if ($('#edit_profile .required').length > 0) {
			$('#edit_profile .required').each(function(){
				var req = $(this);
				var status = $('.status',req.parent());
				if (req.val() == '') {
					req.attr('original-title', lang.error_required).tipsy('show');
					status.removeClass('valid');
				} else {
					req.tipsy('hide');
					status.addClass('valid');
				}
			});
		};
		if ($('#sel_ques').length > 0 && $('#sel_ques').hasClass('required')) {
			var sq = $('#sel_ques');
			var status = $('.status',sq.parent());
			if (sq.val() == '0') {
				sq.attr('original-title', lang.error_sel_ques_required).tipsy('show');
				status.removeClass('valid');
			} else {
				sq.tipsy('hide');
				status.addClass('valid');
			};
			var pa = $('#pw_answer');
			var status = $('.status',pa.parent());
			if (pa.val().length == '0') {
				pa.attr('original-title', lang.error_pa_answer_required).tipsy('show');
				status.removeClass('valid');
			} else {
				pa.tipsy('hide');
				status.addClass('valid');
			};
		};
		validItem.valid8('');
		if (validItem.isValid() == false) {
			return false;
		};
		if ($('#sel_ques').length > 0 && $('#sel_ques').hasClass('required')) {
			$('#sel_ques,#pw_answer').valid8('');
			if ($('#sel_ques,#pw_answer').isValid() == false) {
				return false;
			};
		}
		if ($('#edit_profile .required').length > 0) {
			$('#edit_profile .required').each(function(){
				$(this).valid8('');
				if ($(this).isValid() == false) {
					return false;
				};
			});
		}
		return true;
	});
}

/* 会员修改密码 */
function editPassword() {
	var frm              = document.forms['formPassword'];
	var old_password     = frm.elements['old_password'].value;
	var new_password     = frm.elements['new_password'].value;
	var confirm_password = frm.elements['comfirm_password'].value;

	var msg = '';
	var reg = null;

	if (old_password.length == 0) {
		msg += old_password_empty + '<br/>';
	}

	if (new_password.length == 0) {
		msg += new_password_empty + '<br/>';
	}

	if (confirm_password.length == 0) {
		msg += confirm_password_empty + '<br/>';
	}

	if (new_password.length > 0 && confirm_password.length > 0) {
		if (new_password != confirm_password) {
			msg += both_password_error + '<br/>';
		}
	}

	if (msg.length > 0) {
		cAlert(msg);
		return false;
	} else {
		return true;
	}
}

/* 对会员的留言输入作处理 */
function submitMsg() {
	var frm         = document.forms['formMsg'];
	var msg_title   = frm.elements['msg_title'].value;
	var msg_content = frm.elements['msg_content'].value;
	var msg = '';

	if (msg_title.length == 0) {
		msg += msg_title_empty + '<br/>';
	}
	if (msg_content.length == 0) {
		msg += msg_content_empty + '<br/>'
	}
	if (msg_title.length > 200) {
		msg += msg_title_limit + '<br/>';
	}
	if (msg.length > 0) {
		cAlert(msg);
		return false;
	} else {
		return true;
	}
}


/* 处理会员提交的缺货登记 */
function addBooking() {
	var frm  = document.forms['formBooking'];
	var goods_id = frm.elements['id'].value;
	var rec_id  = frm.elements['rec_id'].value;
	var number  = frm.elements['number'].value;
	var desc  = frm.elements['desc'].value;
	var linkman  = frm.elements['linkman'].value;
	var email  = frm.elements['email'].value;
	var tel  = frm.elements['tel'].value;
	var msg = "";
	if (number.length == 0) {
		msg += booking_amount_empty + '<br/>';
	} else {
		var reg = /^[0-9]+/;
		if ( ! reg.test(number)) {
			msg += booking_amount_error + '<br/>';
		}
	}
	if (desc.length == 0) {
		msg += describe_empty + '<br/>';
	}
	if (linkman.length == 0) {
		msg += contact_username_empty + '<br/>';
	}
	if (email.length == 0) {
		msg += email_empty + '<br/>';
	} else {
		if (!isValidEmail(email)) {
			msg += email_error + '<br/>';
		}
	}
	if (tel.length == 0) {
		msg += contact_phone_empty + '<br/>';
	}
	if (msg.length > 0) {
		cAlert(msg);
		return false;
	}
	return true;
}

/* 会员登录 */
function userLogin() {
	var frm      = document.forms['formLogin'];
	var username = frm.elements['username'].value;
	var password = frm.elements['password'].value;
	var msg = '';
	if (username.length == 0) {
		msg += username_empty + '<br/>';
	}
	if (password.length == 0) {
		msg += password_empty + '<br/>';
	}
	if (msg.length > 0) {
		cAlert(msg);
		return false;
	} else {
		return true;
	}
}

function chkstr(str) {
	for (var i = 0; i < str.length; i++) {
		if (str.charCodeAt(i) < 127 && !str.substr(i,1).match(/^\w+$/ig)) {
			return false;
		}
	}
	return true;
}

/* 用户中心订单保存地址信息 */
function saveOrderAddress(id) {
	var frm           = document.forms['formAddress'];
	var consignee     = frm.elements['consignee'].value;
	var email         = frm.elements['email'].value;
	var address       = frm.elements['address'].value;
	var zipcode       = frm.elements['zipcode'].value;
	var tel           = frm.elements['tel'].value;
	var mobile        = frm.elements['mobile'].value;
	var sign_building = frm.elements['sign_building'].value;
	var best_time     = frm.elements['best_time'].value;
	if (id == 0) {
		cAlert(current_ss_not_unshipped);
		return false;
	}
	var msg = '';
	if (address.length == 0) {
		msg += address_name_not_null + "\n";
	}
	if (consignee.length == 0) {
		msg += consignee_not_null + "\n";
	}

	if (msg.length > 0) {
		cAlert(msg);
		return false;
	} else {
		return true;
	}
}

/* 会员余额申请 */
function submitSurplus() {
	var frm            = document.forms['formSurplus'];
	var surplus_type   = frm.elements['surplus_type'].value;
	var surplus_amount = frm.elements['amount'].value;
	var process_notic  = frm.elements['user_note'].value;
	var payment_id     = 0;
	var msg = '';

	if (surplus_amount.length == 0 ) {
		msg += surplus_amount_empty + "\n";
	} else {
		var reg = /^[\.0-9]+/;
		if ( ! reg.test(surplus_amount)) {
			msg += surplus_amount_error + '<br/>';
		}
	}
	if (process_notic.length == 0) {
		msg += process_desc + "\n";
	}
	if (msg.length > 0) {
		cAlert(msg);
		return false;
	}
	if (surplus_type == 0) {
		for (i = 0; i < frm.elements.length ; i ++) {
			if (frm.elements[i].name=="payment_id" && frm.elements[i].checked) {
				payment_id = frm.elements[i].value;
				break;
			}
		}
		if (payment_id == 0) {
			cAlert(payment_empty);
			return false;
		}
	}
	return true;
}

/* 处理用户添加一个红包 */
function addBonus() {
	var frm      = document.forms['addBouns'];
	var bonus_sn = frm.elements['bonus_sn'].value;
	if (bonus_sn.length == 0) {
		cAlert(bonus_sn_empty);
		return false;
	} else {
		var reg = /^[0-9]{10}$/;
		if ( ! reg.test(bonus_sn)) {
			cAlert(bonus_sn_error);
			return false;
		}
	}
	return true;
}

/* 合并订单检查 */
function mergeOrder() {
	if (!confirm(confirm_merge)) {
		return false;
	}
	var frm        = document.forms['formOrder'];
	var from_order = frm.elements['from_order'].value;
	var to_order   = frm.elements['to_order'].value;
	var msg = '';

	if (from_order == 0) {
		msg += from_order_empty + '<br/>';
	}
	if (to_order == 0) {
		msg += to_order_empty + '<br/>';
	} else if (to_order == from_order) {
		msg += order_same + '<br/>';
	}
	if (msg.length > 0) {
		cAlert(msg);
		return false;
	} else {
		return true;
	}
}
