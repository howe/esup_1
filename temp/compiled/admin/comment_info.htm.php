<!-- $Id: comment_info.htm 16854 2009-12-07 06:20:09Z sxc_shop $ -->

<?php echo $this->fetch('pageheader.htm'); ?>
<!-- comment content list -->
<div class="main-div">
  <table width="100%">
    <tr>
      <td>
      <a href="mailto:<?php echo $this->_var['msg']['email']; ?>"><b><?php if ($this->_var['msg']['user_name']): ?><?php echo $this->_var['msg']['user_name']; ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></b></a>&nbsp;<?php echo $this->_var['lang']['from']; ?>
      &nbsp;<?php echo $this->_var['msg']['add_time']; ?>&nbsp;<?php echo $this->_var['lang']['to']; ?>&nbsp;<b><?php echo $this->_var['id_value']; ?></b>&nbsp;<?php echo $this->_var['lang']['send_comment']; ?>
    </td>
    </tr>
    <tr>
      <td><hr color="#dadada" size="1"></td>
    </tr>
    <tr>
      <td>
        <div style="overflow:hidden; word-break:break-all;"><?php echo $this->_var['msg']['content']; ?></div>
        <div align="right"><b><?php echo $this->_var['lang']['comment_rank']; ?>:</b> <?php echo $this->_var['msg']['comment_rank']; ?>&nbsp;&nbsp;<b><?php echo $this->_var['lang']['ip_address']; ?></b>: <?php echo $this->_var['msg']['ip_address']; ?></div>
      </td>
    </tr>
    <tr>
      <td align="center">
        <?php if ($this->_var['msg']['status'] == "0"): ?>
        <input type="button" onclick="location.href='comment_manage.php?act=check&check=allow&id=<?php echo $this->_var['msg']['comment_id']; ?>'" value="<?php echo $this->_var['lang']['allow']; ?>" class="button" />
        <?php else: ?>
        <input type="button" onclick="location.href='comment_manage.php?act=check&check=forbid&id=<?php echo $this->_var['msg']['comment_id']; ?>'" value="<?php echo $this->_var['lang']['forbid']; ?>" class="button" />
        <?php endif; ?>
    </td>
    </tr>
  </table>
</div>

<?php if ($this->_var['reply_info']['content']): ?>
<!-- reply content list -->
<div class="main-div">
  <table width="100%">
    <tr>
      <td>
      <?php echo $this->_var['lang']['admin_user_name']; ?>&nbsp;<a href="mailto:<?php echo $this->_var['msg']['email']; ?>"><b><?php echo $this->_var['reply_info']['user_name']; ?></b></a>&nbsp;<?php echo $this->_var['lang']['from']; ?>
      &nbsp;<?php echo $this->_var['reply_info']['add_time']; ?>&nbsp;<?php echo $this->_var['lang']['reply']; ?>
    </td>
    </tr>
    <tr>
      <td><hr color="#dadada" size="1"></td>
    </tr>
    <tr>
      <td>
        <div style="overflow:hidden; word-break:break-all;"><?php echo $this->_var['reply_info']['content']; ?></div>
        <div align="right"><b><?php echo $this->_var['lang']['ip_address']; ?></b>: <?php echo $this->_var['reply_info']['ip_address']; ?></div>
      </td>
    </tr>
  </table>
</div>
<?php endif; ?>

<?php if ($this->_var['send_fail']): ?>
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
<li style="border: 1px solid #CC0000; background: #FFFFCC; padding: 10px; margin-bottom: 5px;" ><?php echo $this->_var['lang']['mail_send_fail']; ?></li>
</ul>
<?php endif; ?>

<div class="main-div">
<form method="post" action="comment_manage.php?act=action" name="theForm" onsubmit="return validate()">
<table border="0" align="center">
  <tr><th colspan="2">
  <strong><?php echo $this->_var['lang']['reply_comment']; ?></strong>
  </th></tr>
  <tr>
    <td><?php echo $this->_var['lang']['user_name']; ?>:</td>
    <td><input name="user_name" type="text" <?php if ($this->_var['reply_info']['user_name'] == ""): ?>value="<?php echo $this->_var['admin_info']['user_name']; ?>"<?php else: ?> value="<?php echo $this->_var['reply_info']['user_name']; ?>"<?php endif; ?> size="30" readonly="true" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['email']; ?>:</td>
    <td><input name="email" type="text" <?php if ($this->_var['reply_info']['email'] == ""): ?>value="<?php echo $this->_var['admin_info']['email']; ?>"<?php else: ?> value="<?php echo $this->_var['reply_info']['email']; ?>"<?php endif; ?> size="30" readonly="true" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['reply_content']; ?>:</td>
    <td><textarea name="content" cols="50" rows="4" wrap="VIRTUAL"><?php echo $this->_var['reply_info']['content']; ?></textarea></td>
  </tr>
  <?php if ($this->_var['reply_info']['content']): ?>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $this->_var['lang']['have_reply_content']; ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td></td>
    <td><input name="send_email_notice" type="checkbox" value='1'/><?php echo $this->_var['lang']['send_email_notice']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input name="submit" type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button">
      <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button">
      <?php if ($this->_var['reply_info']['content']): ?><input type="submit" name="remail" value="<?php echo $this->_var['lang']['remail']; ?>" class="button"><?php endif; ?>
      <input type="hidden" name="comment_id" value="<?php echo $this->_var['msg']['comment_id']; ?>">
      <input type="hidden" name="comment_type" value="<?php echo $this->_var['msg']['comment_type']; ?>">
      <input type="hidden" name="id_value" value="<?php echo $this->_var['msg']['id_value']; ?>">
    </td>
  </tr>
</table>
</form>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>

<script language="JavaScript">
<!--
document.forms['theForm'].elements['content'].focus();

/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("content",  no_content);
    return validator.passed();
}

onload = function() {
    // 开始检查订单
    startCheckOrder();
}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>