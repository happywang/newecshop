<!-- $Id: discount_list.htm 17043 2010-02-26 10:40:02Z sxc_shop $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<!-- start payment list -->
<div class="list-div" id="listDiv">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th>折扣码</th>
    <th>折扣率%(留空为不支持)</th>
    <th nowrap="true">直减价格(单位缺省，默认为人民币元，留空为不支持)</th>
    <th nowrap="true">用户注册邮箱</th>
    <th nowrap="true">商品类型</th>
    <th>商品名字</th>
    <th>使用次数(0:无数次)</th>
    <th>过期时间</th>
    <th>备注</th>
    <th>更新时间</th>
    <th>操作</th>
  </tr>
  
  <?php $_from = $this->_var['coupons_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'coupons');if (count($_from)):
    foreach ($_from AS $this->_var['coupons']):
?>
  <tr>
  	<td><?php echo $this->_var['coupons']['coupons_code']; ?></td>
  	<td><?php echo $this->_var['coupons']['coupons_rate']; ?></td>
  	<td><?php echo $this->_var['coupons']['coupons_subtracting_amount']; ?></td>
  	<td><?php echo $this->_var['coupons']['user_email']; ?></td>
  	<td><?php echo $this->_var['coupons']['cat_name']; ?></td>
  	<td><?php echo $this->_var['coupons']['goods_name']; ?></td>
  	<td><?php echo $this->_var['coupons']['use_times']; ?></td>
  	<td><?php echo $this->_var['coupons']['expiration_time']; ?></td>
  	<td><?php echo $this->_var['coupons']['Remarks']; ?></td>
  	<td><?php echo $this->_var['coupons']['insert_date']; ?></td>
  	<td><a href="?act=edit&coupons_id=<?php echo $this->_var['coupons']['coupons_id']; ?>">编辑</a>/<a href="">删除</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>
</div>
<!-- end payment list -->
<script type="Text/Javascript" language="JavaScript">
<!--

//-->
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>