<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php if ($this->_var['description']): ?><meta name="description" content="<?php echo $this->_var['description']; ?>"/><?php endif; ?>
<?php if ($this->_var['keywords']): ?><meta name="keywords" content="<?php echo $this->_var['keywords']; ?>"/><?php endif; ?>
<title><?php echo $this->_var['page_title']; ?> - ESUP网游</title>
<?php echo $this->fetch('library/html_header.lbi'); ?>
</head>
<body id="page_<?php echo $this->_var['pname']; ?>">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="content"><div class="container">
	<?php echo $this->fetch('library/ur_here.lbi'); ?>
	
	<div class="myship box full_box">
		<div class="hd"><h3><?php echo $this->_var['lang']['myship']; ?></h3><div class="extra"></div></div>
		<div class="bd">
			<form action="myship.php" method="post" name="theForm" id="theForm" onsubmit="return checkForm(this)">
				<span><?php echo $this->_var['lang']['country_province']; ?>:</span>
				<select name="country" id="selCountries_<?php echo $this->_var['sn']; ?>" onchange="regionChanged(this, 1, 'selProvinces_<?php echo $this->_var['sn']; ?>')">
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?></option>
					<?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
					<option value="<?php echo $this->_var['country']['region_id']; ?>" <?php if ($this->_var['choose']['country'] == $this->_var['country']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['country']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<select name="province" id="selProvinces_<?php echo $this->_var['sn']; ?>" onchange="regionChanged(this, 2, 'selCities_<?php echo $this->_var['sn']; ?>')">
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?></option>
					<?php $_from = $this->_var['province_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
					<option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['choose']['province'] == $this->_var['province']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<select name="city" id="selCities_<?php echo $this->_var['sn']; ?>" onchange="regionChanged(this, 3, 'selDistricts_<?php echo $this->_var['sn']; ?>')">
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?></option>
					<?php $_from = $this->_var['city_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
					<option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['choose']['city'] == $this->_var['city']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<select name="district" id="selDistricts_<?php echo $this->_var['sn']; ?>" <?php if (! $this->_var['district_list'][$this->_var['sn']]): ?>style="display:none"<?php endif; ?>>
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?></option>
					<?php $_from = $this->_var['district_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
					<option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['choose']['district'] == $this->_var['district']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<input type="submit" name="Submit" value="<?php echo $this->_var['lang']['search_ship']; ?>" class="btn_s4_b"/>
				<input type="hidden" name="act" value="viewship" />
			</form>
			<table class="data_table">
				<colgroup>
					<col width="100"/>
					<col width="700"/>
					<col width="100"/>
					<col width="100"/>
				</colgroup>
				<thead>
					<tr>
						<th><?php echo $this->_var['lang']['name']; ?></th>
						<th><?php echo $this->_var['lang']['describe']; ?></th>
						<th><?php echo $this->_var['lang']['fee']; ?></th>
						<th class="last"><?php echo $this->_var['lang']['insure_fee']; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');$this->_foreach['shipping'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping']['total'] > 0):
    foreach ($_from AS $this->_var['shipping']):
        $this->_foreach['shipping']['iteration']++;
?>
					<tr class="<?php echo $this->cycle(array('values'=>'odd,even')); ?><?php if (($this->_foreach['shipping']['iteration'] == $this->_foreach['shipping']['total'])): ?> last<?php endif; ?>">
						<td ><?php echo $this->_var['shipping']['shipping_name']; ?></td>
						<td><?php echo $this->_var['shipping']['shipping_desc']; ?></td>
						<td class="price"><?php echo $this->_var['shipping']['fee']; ?></td>
						<td class="last"><?php if ($this->_var['shipping']['insure'] != 0): ?><?php echo $this->_var['shipping']['insure_formated']; ?><?php else: ?><?php echo $this->_var['lang']['not_support_insure']; ?><?php endif; ?></td>
					</tr>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</tbody>
			</table>
		</div>
	</div>
	
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
<script type="text/javascript">
<?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

onload = function(){if (!document.all){document.forms['theForm'].reset();}}
function checkForm(frm) {
	var msg = new Array();
	var err = false;
	if (frm.elements['country'].value == 0) {
		msg.push(country_not_null);
		err = true;
	}
	if (frm.elements['province'].value == 0 && frm.elements['province'].length > 1) {
		err = true;
		msg.push(province_not_null);
	}
	if (frm.elements['city'].value == 0 && frm.elements['city'].length > 1) {
		err = true;
		msg.push(city_not_null);
	}
	if (frm.elements['district'].length > 1) {
		if (frm.elements['district'].value == 0)
		{
			err = true;
			msg.push(district_not_null);
		}
	}
	if (err) {
		message = msg.join("\n");
		cAlert(message);
	}
	return ! err;
}

</script>
</body>
</html>