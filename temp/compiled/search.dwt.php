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
	<div class="col_main">
	<?php echo $this->_var['render']['before_col_main']; ?>
	
		<?php if ($this->_var['action'] == 'form'): ?>
		<div class="search_form_wrapper box">
			<div class="hd"><h3><?php echo $this->_var['lang']['search_goods']; ?></h3><div class="extra"></div></div>
			<div class="bd">
				<form action="search.php" method="get" name="advancedSearchForm" class="form search_form">
					<fieldset>
						<h4><?php echo $this->_var['lang']['search_form_title']; ?></h4>
						<label for="keywords"><b><?php echo $this->_var['lang']['label_keywords']; ?></b>
							<input type="text" name="keywords" maxlength="120" tabindex="1" value="<?php echo $this->_var['adv_val']['keywords']; ?>" id="keywords"/>
						</label>
						<fieldset class="radio_wrap label"><b><?php echo $this->_var['lang']['label_sc_ds']; ?></b>
							<fieldset>
							<label for="sc_ds1"><input type="radio" name="sc_ds" value="1" <?php if ($this->_var['scck']): ?>checked="checked"<?php endif; ?> tabindex="3" class="radio" id="sc_ds1"/><?php echo $this->_var['lang']['yes']; ?></label>
							<label for="sc_ds0"><input type="radio" name="sc_ds" value="0" <?php if (! $this->_var['scck']): ?>checked="checked"<?php endif; ?> tabindex="2" class="radio" id="sc_ds0"/><?php echo $this->_var['lang']['no']; ?></label>
							</fieldset>
						</fieldset>
						<label for="cat_select"><b><?php echo $this->_var['lang']['label_category']; ?></b>
							<select name="category" id="cat_select"><option value="0"><?php echo $this->_var['lang']['all_category_select']; ?></option><?php echo $this->_var['cat_list']; ?></select>
						</label>
						<label for="brand_select"><b><?php echo $this->_var['lang']['label_brand']; ?></b>
							<select name="brand" id="brand_select">
								<option value="0"><?php echo $this->_var['lang']['all_brand']; ?></option>
								<?php echo $this->html_options(array('options'=>$this->_var['brand_list'],'selected'=>$this->_var['adv_val']['brand'])); ?>
							</select>
						</label>
						<label for="min_price"><b><?php echo $this->_var['lang']['label_price']; ?></b>
							<input name="min_price" type="text" value="<?php echo $this->_var['adv_val']['min_price']; ?>" size="5" maxlength="8" class="price_input" id="min_price"/>
							<span class="to">-</span><input name="max_price" type="text" value="<?php echo $this->_var['adv_val']['max_price']; ?>" size="5" maxlength="8" class="price_input" id="max_price"/>
						</label>
						<?php if ($this->_var['goods_type_list']): ?>
						<label for="goods_type"><b><?php echo $this->_var['lang']['label_extension']; ?></b>
							<select name="goods_type" id="goods_type" onchange="this.form.submit()">
								<option value="0"><?php echo $this->_var['lang']['all_option']; ?></option>
								<?php echo $this->html_options(array('options'=>$this->_var['goods_type_list'],'selected'=>$this->_var['goods_type_selected'])); ?>
							</select>
						</label>
						<?php endif; ?>
						<?php if ($this->_var['goods_type_selected'] > 0): ?>
							<?php $_from = $this->_var['goods_attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
							<?php if ($this->_var['item']['type'] == 1): ?>
						<label for="attr_<?php echo $this->_var['item']['id']; ?>"><b><?php echo $this->_var['item']['attr']; ?><?php echo $this->_var['lang']['colon']; ?></b>
							<input type="text" name="attr[<?php echo $this->_var['item']['id']; ?>]" size="20" maxlength="120" value="<?php echo $this->_var['item']['value']; ?>" id="attr_<?php echo $this->_var['item']['id']; ?>"/>
						</label>
							<?php endif; ?>
							<?php if ($this->_var['item']['type'] == 2): ?>
						<label for="attr_<?php echo $this->_var['item']['id']; ?>_from"><b><?php echo $this->_var['item']['attr']; ?><?php echo $this->_var['lang']['colon']; ?></b>
							<input type="text" name="attr[<?php echo $this->_var['item']['id']; ?>][from]" size="5" maxlength="5" value="<?php echo $this->_var['item']['value']['from']; ?>" id="attr_<?php echo $this->_var['item']['id']; ?>_from"/>
							<span class="to">-</span><input type="text" name="attr[<?php echo $this->_var['item']['id']; ?>][to]" size="5" maxlength="5" value="<?php echo $this->_var['item']['value']['to']; ?>" id="attr_<?php echo $this->_var['item']['id']; ?>_to"/>
						</label>
							<?php endif; ?>
							<?php if ($this->_var['item']['type'] == 3): ?>
						<label for="attr_<?php echo $this->_var['item']['id']; ?>"><b><?php echo $this->_var['item']['attr']; ?><?php echo $this->_var['lang']['colon']; ?></b>
							<select name="attr[<?php echo $this->_var['item']['id']; ?>]" id="attr_<?php echo $this->_var['item']['id']; ?>">
								<option value="0"><?php echo $this->_var['lang']['all_option']; ?></option>
								<?php echo $this->html_options(array('options'=>$this->_var['item']['options'],'selected'=>$this->_var['item']['value'])); ?>
							</select>
						</label>
							<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php endif; ?>
						<?php if ($this->_var['use_storage'] == 1): ?>
						<fieldset class="radio_wrap label"><b><?php echo $this->_var['lang']['label_hidden_outstock']; ?></b>
							<fieldset>
							<label for="outstock1"><input type="radio" name="outstock" value="1" <?php if ($this->_var['outstock']): ?>checked="checked"<?php endif; ?> tabindex="3" class="radio" id="outstock1"/><?php echo $this->_var['lang']['yes']; ?></label>
							<label for="outstock0"><input type="radio" name="outstock" value="0" <?php if (! $this->_var['outstock']): ?>checked="checked"<?php endif; ?> tabindex="2" class="radio" id="outstock0"/><?php echo $this->_var['lang']['no']; ?></label>
							</fieldset>
						</fieldset>
						<?php endif; ?>
						<div class="submit_wrap">
							<input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" tabindex="9" class="submit btn_special btn_search"/>
						</div>
						<input type="hidden" name="action" value="form"/>
					</fieldset>
				</form>
			</div>
		</div>
		<?php endif; ?>
		<?php echo $this->fetch('library/search_goods_list.lbi'); ?>
	
	<?php echo $this->_var['render']['after_col_main']; ?>
	</div>
	<div class="col_sub">
	<?php echo $this->_var['render']['before_col_sub']; ?>
	
	<?php echo $this->fetch('library/history.lbi'); ?>
	
	<?php echo $this->_var['render']['after_col_sub']; ?>
	</div>
</div></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/html_footer.lbi'); ?>
</body>
</html>