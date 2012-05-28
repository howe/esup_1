
<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<div class="form-div">
  <form action="javascript:searchSnatch()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    <select name = "searchType">
      <option value="card_sn"><?php echo $this->_var['lang']['lab_card_sn']; ?></option>
      <option value="order_sn"><?php echo $this->_var['lang']['lab_order_sn']; ?></option>
    </select>
    <input type="text" name="keyword" /> <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" class="button" />
  </form>
</div>

<form method="POST" action="virtual_card.php?act=batch_drop_card&goods_id=<?php echo $this->_var['goods_id']; ?>" name="listForm">
<!-- start card list -->
<div class="list-div" id="listDiv">
<?php endif; ?>

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>
        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox">
        <a href="javascript:listTable.sort('card_id'); "><?php echo $this->_var['lang']['record_id']; ?></a><?php echo $this->_var['sort_card_id']; ?>
      </th>
      <th><a href="javascript:listTable.sort('card_sn'); "><?php echo $this->_var['lang']['lab_card_sn']; ?></a><?php echo $this->_var['sort_card_sn']; ?></th>
      <th><a href="javascript:listTable.sort('card_password'); "><?php echo $this->_var['lang']['lab_card_password']; ?></a><?php echo $this->_var['sort_card_password']; ?></th>
      <th><a href="javascript:listTable.sort('end_date'); "><?php echo $this->_var['lang']['lab_end_date']; ?></a><?php echo $this->_var['sort_end_date']; ?></th>
      <th><a href="javascript:listTable.sort('is_saled'); "><?php echo $this->_var['lang']['lab_is_saled']; ?></a><?php echo $this->_var['sort_is_sold']; ?></th>
      <th><a href="javascript:listTable.sort('order_sn'); "><?php echo $this->_var['lang']['lab_order_sn']; ?></a><?php echo $this->_var['sort_order_sn']; ?></th>
      <th><?php echo $this->_var['lang']['handler']; ?></th>
    </tr>
    <?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
    <tr>
      <td><input value="<?php echo $this->_var['card']['card_id']; ?>" name="checkboxes[]" type="checkbox"><?php echo $this->_var['card']['card_id']; ?></td>
      <td><span><?php echo $this->_var['card']['card_sn']; ?></span></td>
      <td><span><?php echo $this->_var['card']['card_password']; ?></span></td>
      <td align="right"><span><?php echo $this->_var['card']['end_date']; ?></span></td>
      <td align="center"><img src="images/<?php if ($this->_var['card']['is_saled']): ?>yes<?php else: ?>no<?php endif; ?>.gif" /></span>
      </td>
      <td><?php echo $this->_var['card']['order_sn']; ?></td>
      <td align="center">
        <a href="virtual_card.php?act=edit_replenish&amp;card_id=<?php echo $this->_var['card']['card_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>"><img src="images/icon_edit.gif" border="0" height="16" width="16" /></a>
        <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['card']['card_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>', 'remove_card')" title="<?php echo $this->_var['lang']['drop']; ?>"><img src="images/icon_drop.gif" border="0" height="16" width="16" /></a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>

  <table cellpadding="4" cellspacing="0">
    <tr>
      <td><input type="submit" name="drop" id="btnSubmit" value="<?php echo $this->_var['lang']['drop']; ?>" class="button" disabled="true" /></td>
      <td align="right"><?php echo $this->fetch('page.htm'); ?></td>
    </tr>
  </table>

<?php if ($this->_var['full_page']): ?>
</div>
<!-- end card_list list -->
</form>

<script type="text/javascript" language="JavaScript">
<!--

  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;
  listTable.query = "query_card";

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


  onload = function()
  {
    document.forms['searchForm'].elements['keyword'].focus();
    startCheckOrder();
  }

/**
 * 搜索团购商品
 */
function searchSnatch()
{
  var keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
  var type = document.forms['searchForm'].elements['searchType'].value;

  if (keyword.length > 0)
  {
    listTable.filter['search_type'] = type;
    listTable.filter['keyword']     = keyword;
    listTable.loadList();
  }
  else
  {
    document.forms['searchForm'].elements['keyword'].focus();
  }
}
//-->
</script>


<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>