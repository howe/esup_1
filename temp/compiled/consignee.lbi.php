<table class="data_table">
	<colgroup>
		<col width="100"/>
		<col width="300"/>
		<col width="100"/>
		<col width="300"/>
	</colgroup>
	<tbody>    	
		<?php if ($this->_var['real_goods_count'] > 0): ?>
         
		<tr class="odd"  style="display:none">
        
			<th><?php echo $this->_var['lang']['country_province']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td colspan="3" class="last">
				<select name="country" id="selCountries_<?php echo $this->_var['sn']; ?>" onchange="regionChanged(this, 1, 'selProvinces_<?php echo $this->_var['sn']; ?>')">
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></option>
					<?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
					<option value="<?php echo $this->_var['country']['region_id']; ?>"<?php if ($this->_var['consignee']['country'] == $this->_var['country']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['country']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<select name="province" id="selProvinces_<?php echo $this->_var['sn']; ?>" onchange="regionChanged(this, 2, 'selCities_<?php echo $this->_var['sn']; ?>')">
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
					<?php $_from = $this->_var['province_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
					<option value="<?php echo $this->_var['province']['region_id']; ?>"<?php if ('2' == $this->_var['province']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<select name="city" id="selCities_<?php echo $this->_var['sn']; ?>" onchange="regionChanged(this, 3, 'selDistricts_<?php echo $this->_var['sn']; ?>')">
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
					<?php $_from = $this->_var['city_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
					<option value="<?php echo $this->_var['city']['region_id']; ?>"<?php if ('52' == $this->_var['city']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<select name="district" id="selDistricts_<?php echo $this->_var['sn']; ?>" <?php if (! $this->_var['district_list'][$this->_var['sn']]): ?>style="display:none"<?php endif; ?>>
					<option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
					<?php $_from = $this->_var['district_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
					<option value="<?php echo $this->_var['district']['region_id']; ?>"<?php if ('500' == $this->_var['district']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<?php echo $this->_var['lang']['require_field']; ?>
			</td>
		</tr>
		<?php endif; ?>
		<?php if ($this->_var['real_goods_count'] > 0): ?>
		<tr class="odd"  style="display:none">
			<th><?php echo $this->_var['lang']['detailed_address']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td><input type="text" name="address" value="esup" id="address_<?php echo $this->_var['sn']; ?>"/><?php echo $this->_var['lang']['require_field']; ?></td>
			<th><?php echo $this->_var['lang']['postalcode']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="last"><input type="text" name="zipcode" value="<?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?>" id="zipcode_<?php echo $this->_var['sn']; ?>"/></td>
		</tr>

		<?php endif; ?>
        <tr class="even">
			<th><?php echo $this->_var['lang']['game_nickname']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input type="text" name="game_nickname" value="<?php echo htmlspecialchars($this->_var['consignee']['game_nickname']); ?>" id="tel_<?php echo $this->_var['sn']; ?>"/><?php echo $this->_var['lang']['game_wushi']; ?></td>
			<th><?php echo $this->_var['lang']['game_level']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input name="game_level" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['game_level']); ?>" id="mobile_<?php echo $this->_var['sn']; ?>"/></td>
		</tr>
        <tr class="even">
			<th><?php echo $this->_var['lang']['game_jueseid']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input type="text" name="game_jueseid" value="<?php echo htmlspecialchars($this->_var['consignee']['game_jueseid']); ?>" id="tel_<?php echo $this->_var['sn']; ?>"/></td>
			<th><?php echo $this->_var['lang']['game_zhiye']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input name="game_zhiye" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['game_zhiye']); ?>" id="mobile_<?php echo $this->_var['sn']; ?>"/></td>
		</tr>
        <tr class="even last">
			<th><?php echo $this->_var['lang']['consignee_name']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input type="text" name="consignee" value="<?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?>" id="consignee_<?php echo $this->_var['sn']; ?>"/><?php echo $this->_var['lang']['require_field']; ?></td>
			<th><?php echo $this->_var['lang']['email_address']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input name="email" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['email']); ?>" id="email_<?php echo $this->_var['sn']; ?>"/><?php echo $this->_var['lang']['require_field']; ?></td>
		</tr>
		<tr class="even last">
			<th><?php echo $this->_var['lang']['phone']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input type="text" name="tel" value="<?php echo htmlspecialchars($this->_var['consignee']['tel']); ?>" id="tel_<?php echo $this->_var['sn']; ?>"/><?php echo $this->_var['lang']['require_field']; ?></td>
			<th><?php echo $this->_var['lang']['backup_phone']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input name="mobile" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['mobile']); ?>" id="mobile_<?php echo $this->_var['sn']; ?>"/></td>
		</tr>
		<?php if ($this->_var['real_goods_count'] > 0): ?>
		<tr class="even last" style="display:none;">
			<th><?php echo $this->_var['lang']['sign_building']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input type="text" name="sign_building" value="<?php echo htmlspecialchars($this->_var['consignee']['sign_building']); ?>" id="sign_building_<?php echo $this->_var['sn']; ?>"/></td>
			<th><?php echo $this->_var['lang']['deliver_goods_time']; ?><?php echo $this->_var['lang']['colon']; ?></th>
			<td class="odd"><input type="text" name="best_time" value="<?php echo htmlspecialchars($this->_var['consignee']['best_time']); ?>" id="best_time_<?php echo $this->_var['sn']; ?>"/></td>
		</tr>
		<?php endif; ?>
	</tbody>
	<tfoot>
		<tr>
			<td class="last">&nbsp;</td>
			<td colspan="3" class="last">
				<?php if ($_SESSION['user_id'] > 0 && $this->_var['consignee']['address_id'] > 0): ?>
				<input type="submit" name="submit" value="<?php echo $this->_var['lang']['shipping_address']; ?>" class="btn_s4_b"/>
				<a href="#" onclick="if (confirm('<?php echo $this->_var['lang']['confirm_drop_address']; ?>'))location.href='user.php?act=drop_consignee&id=<?php echo $this->_var['consignee']['address_id']; ?>'" class="button text_button"/><?php echo $this->_var['lang']['drop']; ?></a>
				<?php else: ?><input type="submit" name="submit" value="<?php echo $this->_var['lang']['add_address']; ?>" class="btn_s4_b"/><?php endif; ?>
				<input type="hidden" name="step" value="consignee"/>
				<input type="hidden" name="act" value="checkout"/>
				<input type="hidden" name="address_id" value="<?php echo $this->_var['consignee']['address_id']; ?>"/>
			</td>
		</tr>
	</tfoot>
</table>