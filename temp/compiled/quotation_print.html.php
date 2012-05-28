<html>
<head>
<title><?php echo $this->_var['lang']['quotation']; ?> - <?php echo $this->_var['shop_name']; ?></title>

<style type="text/css" media="all">
   body,td,th {text-align:left;font-size:13px; padding:2px;}
   table{border-top:1px solid #000;border-left:1px solid #000;}
   table td,table th{border-right:1px solid #000;border-bottom:1px solid #000;}
</style>
<style type="text/css" media="print">
    .print_btn{display:none;}
</style>

</head>
<body>
<script type="text/javascript">
//<![CDATA[

    function calc_price(base_price, rank_price)
    {
        document.write((base_price * rank_price / 100).toFixed(2));
    }

//]]>
</script>
<h3 align="center"><?php echo $this->_var['shop_name']; ?> - <?php echo $this->_var['lang']['quotation']; ?></h3>
<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <th><?php echo $this->_var['lang']['goods_name']; ?></th>
        <th><?php echo $this->_var['lang']['specifications']; ?></th>
        <th><?php echo $this->_var['lang']['goods_category']; ?></th>
        <?php if ($this->_var['cfg']['use_storage'] && $this->_var['cfg']['show_goodsnumber']): ?>
        <th><?php echo $this->_var['lang']['goods_inventory']; ?></th>
        <?php endif; ?>
        <th><?php echo $this->_var['lang']['price']; ?></th>
        <?php $_from = $this->_var['extend_price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ext_price');if (count($_from)):
    foreach ($_from AS $this->_var['ext_price']):
?>
        <th><?php echo $this->_var['ext_price']; ?></th>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tr>
    
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <tr>
        <td><?php echo $this->_var['goods']['goods_name']; ?></td>
        <td><?php echo $this->_var['goods']['product_name']; ?></td>
        <td><?php echo $this->_var['goods']['goods_category']; ?></td>
        <?php if ($this->_var['cfg']['use_storage'] && $this->_var['cfg']['show_goodsnumber']): ?>
        <td><?php echo $this->_var['goods']['goods_number']; ?></td>
        <?php endif; ?>
        <td><?php echo $this->_var['goods']['shop_price']; ?></td>
        <?php $_from = $this->_var['extend_rank'][$this->_var['goods']['goods_key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ext_rank');if (count($_from)):
    foreach ($_from AS $this->_var['ext_rank']):
?>
        <td><?php echo $this->_var['ext_rank']['price']; ?></td>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>
<center><input type="button" class="print_btn" value="<?php echo $this->_var['lang']['print_quotation']; ?>" onClick="window.print()" /></center>

</body>
</html>