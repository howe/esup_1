<?php echo $this->_var['render']['before_footer']; ?>
<div id="footer">
	<div class="container">
		<?php echo $this->fetch('library/links.lbi'); ?>
		<div class="footer_listing box thin_box full_box">
			<div class="hd"><h3></h3><div class="extra"></div></div>
			<div class="bottom_nav_wrapper clearfix">
				<p class="bottom_nav"><?php if ($this->_var['navigator_list']['bottom']): ?><?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_0_85180600_1328330802');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav_0_85180600_1328330802']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?><a href="<?php echo $this->_var['nav_0_85180600_1328330802']['url']; ?>"<?php if ($this->_var['nav_0_85180600_1328330802']['opennew'] == 1): ?> rel="external"<?php endif; ?> class="<?php if (($this->_foreach['nav_bottom_list']['iteration'] <= 1)): ?>first<?php endif; ?><?php if (($this->_foreach['nav_bottom_list']['iteration'] - 1) >= $this->_var['option']['bottom_navigator_number']): ?> hidden<?php endif; ?>"><?php echo $this->_var['nav_0_85180600_1328330802']['name']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><?php endif; ?></p>
				<a href="#top" class="back_to_top"><?php echo $this->_var['lang']['back_to_top']; ?></a>
			</div>
			<div class="bd">
				<div class="inner clearfix">
					<div class="contact">
						<h4><?php echo $this->_var['lang']['contact_information']; ?></h4>
						<?php if ($this->_var['service_phone']): ?><p class="tel"><?php echo $this->_var['service_phone']; ?></p><?php endif; ?>
						<?php if ($this->_var['service_email']): ?><p><?php echo $this->_var['lang']['email']; ?><?php echo $this->_var['lang']['colon']; ?><a href="mailto:<?php echo $this->_var['service_email']; ?>"><?php echo $this->_var['service_email']; ?></a></p><?php endif; ?>
						<?php if ($this->_var['shop_address']): ?><p><?php echo $this->_var['shop_address']; ?></p><?php endif; ?>
						<?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');$this->_foreach['im'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['im']['total'] > 0):
    foreach ($_from AS $this->_var['im']):
        $this->_foreach['im']['iteration']++;
?>
						<?php if ($this->_var['im']): ?><?php if (($this->_foreach['im']['iteration'] <= 1)): ?><p><?php endif; ?><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['im']; ?>&site=qq&menu=yes" rel="external"><img src="http://wpa.qq.com/pa?p=3:<?php echo $this->_var['im']; ?>:42" alt="QQ" /></a><?php if (($this->_foreach['im']['iteration'] == $this->_foreach['im']['total'])): ?></p><?php endif; ?><?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');$this->_foreach['im'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['im']['total'] > 0):
    foreach ($_from AS $this->_var['im']):
        $this->_foreach['im']['iteration']++;
?>
						<?php if ($this->_var['im']): ?><?php if (($this->_foreach['im']['iteration'] <= 1)): ?><p><?php endif; ?><a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo htmlspecialchars($this->_var['im']); ?>&site=cntaobao&s=1&charset=utf-8" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo htmlspecialchars($this->_var['im']); ?>&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" /></a><?php if (($this->_foreach['im']['iteration'] == $this->_foreach['im']['total'])): ?></p><?php endif; ?><?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php $_from = $this->_var['ym']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');$this->_foreach['im'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['im']['total'] > 0):
    foreach ($_from AS $this->_var['im']):
        $this->_foreach['im']['iteration']++;
?>
						<?php if ($this->_var['im']): ?><?php if (($this->_foreach['im']['iteration'] <= 1)): ?><p><?php endif; ?><a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $this->_var['im']; ?>n&.src=pg" rel="external"><img src="static/img/icon/yahoo.gif" alt="Yahoo Messenger" /><?php echo $this->_var['im']; ?></a><?php if (($this->_foreach['im']['iteration'] == $this->_foreach['im']['total'])): ?></p><?php endif; ?><?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php $_from = $this->_var['msn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');$this->_foreach['im'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['im']['total'] > 0):
    foreach ($_from AS $this->_var['im']):
        $this->_foreach['im']['iteration']++;
?>
						<?php if ($this->_var['im']): ?><?php if (($this->_foreach['im']['iteration'] <= 1)): ?><p><?php endif; ?><a href="msnim:chat?contact=<?php echo $this->_var['im']; ?>" rel="external"><img src="static/img/icon/msn.gif" alt="MSN" /></a><?php if (($this->_foreach['im']['iteration'] == $this->_foreach['im']['total'])): ?></p><?php endif; ?><?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php $_from = $this->_var['skype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');$this->_foreach['im'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['im']['total'] > 0):
    foreach ($_from AS $this->_var['im']):
        $this->_foreach['im']['iteration']++;
?>
						<?php if ($this->_var['im']): ?><?php if (($this->_foreach['im']['iteration'] <= 1)): ?><p><?php endif; ?><a href="skype:<?php echo urlencode($this->_var['im']); ?>?call" rel="external"><img src="http://mystatus.skype.com/smallclassic/<?php echo urlencode($this->_var['im']); ?>" alt="Skype" /><?php echo $this->_var['im']; ?></a><?php if (($this->_foreach['im']['iteration'] == $this->_foreach['im']['total'])): ?></p><?php endif; ?><?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					<div class="articles">
					<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['helps'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['helps']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['helps']['iteration']++;
?>
					<?php if (($this->_foreach['helps']['iteration'] - 1) < 5): ?>
					<dl<?php if (($this->_foreach['helps']['iteration'] <= 1)): ?> class="first"<?php endif; ?>>
						<dt><a href="<?php echo $this->_var['help_cat']['cat_id']; ?>"><?php echo $this->_var['help_cat']['cat_name']; ?></a></dt>
						<?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['help_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['help_list']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['help_list']['iteration']++;
?>
						<?php if (($this->_foreach['help_list']['iteration'] - 1) < 5): ?>
						<dd><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['short_title']; ?></a></dd>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</dl>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="hd"><h3></h3><div class="extra"></div></div>
		<div class="bd">
				<div class="inner clearfix">
					<div class="contact" align="center" style="background-color:#FFF">
						<br>
                        <br>
						<a href="http://game.qq.com" target="_blank" title="腾讯游戏"><img src="themes/superfly110531/images/img/tencent_game.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.shandagames.com" target="_blank" title="盛大游戏"><img src="themes/superfly110531/images/img/sdo_game.gif"></a>&nbsp;&nbsp;&nbsp;
						<a href="http://nie.163.com/" target="_blank" title="网易游戏"><img src="themes/superfly110531/images/img/netease_game.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.ztgame.com/" target="_blank" title="巨人网络"><img src="themes/superfly110531/images/img/ztgame.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.wanmei.com" target="_blank" title="完美时空"><img src="themes/superfly110531/images/img/wanmei_game.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.changyou.com" target="_blank" title="搜狐畅游"><img src="themes/superfly110531/images/img/changyou_game.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.kingsoft.com/game/" target="_blank" title="金山在线"><img src="themes/superfly110531/images/img/kingsoft_game.gif"></a>
						<br>
                        <br>
						<a href="http://www.alipay.com" target="_blank" title="支付宝"><img src="themes/superfly110531/images/img/alipay.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.tenpay.com" target="_blank" title="财付通"><img src="themes/superfly110531/images/img/tenpay.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.chinapay.com" target="_blank" title="银联支付"><img src="themes/superfly110531/images/img/chinapay.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.99bill.com" target="_blank" title="快钱支付"><img src="themes/superfly110531/images/img/99bill.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.cmbchina.com" target="_blank" title="招商银行"><img src="themes/superfly110531/images/img/cmbchina.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.icbc.com.cn" target="_blank" title="工商银行"><img src="themes/superfly110531/images/img/icbc.gif"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.ccb.com" target="_blank" title="建设银行"><img src="themes/superfly110531/images/img/ccb.gif"></a>
						<br>
                        <br>
					</div>	
				</div>
		</div>		
        <br>
		<p class="copyright" align="right"><?php echo $this->_var['copyright']; ?><?php if ($this->_var['icp_number']): ?><a href="http://www.miibeian.gov.cn/" rel="external" style="color:#333"><?php echo $this->_var['icp_number']; ?></a><?php endif; ?>
			<script type="text/javascript">
				var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
				document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0bfd0694a5044dce7fc6b0e8f9967a8e' type='text/javascript'%3E%3C/script%3E"));
			</script>			
		</p>
	</div>
</div>
<?php echo $this->_var['render']['after_footer']; ?>