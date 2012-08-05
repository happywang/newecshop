<!-- $Id: discount_list.htm 17043 2010-02-26 10:40:02Z sxc_shop $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js,../js/jquery.min.js,../js/common.js')); ?>
<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<!-- start payment list -->
<div class="list-div" id="listDiv">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th>折扣码</th>
    <th>折扣率%(留空为不支持)</th>
    <th nowrap="true">直减价格</th>
    <th nowrap="true">用户注册邮箱</th>
    <th nowrap="true">商品类型</th>
    <th>商品名字</th>
    <th>使用次数(0:无数次)</th>
    <th>过期时间</th>
    <th>备注</th>
  </tr>
  <tr>
  	<td><input type="text" name="coupons_code" id="coupons_code" value="<?php echo $this->_var['coupons_code']; ?>"></td>
  	<td><input type="text" name="coupons_rate" id="coupons_rate" value="<?php echo $this->_var['coupons_rate']; ?>"></td>
  	<td><input type="text" name="coupons_subtracting_amount" id="coupons_subtracting_amount" value="<?php echo $this->_var['coupons_subtracting_amount']; ?>"></td>
  	<td><input type="text" name="user_email" id="user_email" value="<?php echo $this->_var['user_email']; ?>"></td>
  	
  	<td>
  	<select name="cat_id" id="cat_id" onchange="hideCatDiv()" ><option value="0"><?php echo $this->_var['lang']['select_please']; ?></option><?php echo $this->_var['cat_list']; ?></select>
    </td>
  	<td><input type="text" name="goods_name" id="goods_name" value="<?php echo $this->_var['goods_name']; ?>" onclick="clearGoodsname();"></td>
  	<td><input type="text" name="use_times" id="use_times" value="<?php echo $this->_var['use_times']; ?>"></td>
  	<td>
  	<input name="promote_start_date" type="text" id="promote_start_date" size="12" value='<?php echo $this->_var['goods']['promote_start_date']; ?>' readonly="readonly" />
  	<input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('promote_start_date', '%Y-%m-%d', false, false, 'selbtn1');" value="<?php echo $this->_var['lang']['btn_select']; ?>" class="button"/>
  	<!-- <input type="text" name="expiration_time" id="expiration_time" value="<?php echo $this->_var['expiration_time']; ?>"> -->
  	</td>
  	<td><input type="text" name="Remarks" id="Remarks" value="<?php echo $this->_var['Remarks']; ?>"></td>
  </tr>
  <tr><td><input type="button" name="btn" id="btn" onclick="submitForm();" value="提交"></td></tr>
</table>
</div>
<!-- end payment list -->
<script type="Text/Javascript" language="JavaScript">
<!--
function clearGoodsname(){
	var goods_name = $('#goods_name').val();
	if(goods_name=='--'){
		$('#goods_name').val("");
		return true;
	}
	return true;
}
function submitForm(){
	var coupons_code = $("#coupons_code").val();
	var coupons_rate = $("#coupons_rate").val();
	var coupons_subtracting_amount = $("#coupons_subtracting_amount").val();
	var user_email = $("#user_email").val();
	var cat_id = $("#cat_id").val();
	var goods_name = $("#goods_name").val();
	var use_times = $("#use_times").val();
	var expiration_time = $("#promote_start_date").val();
	var Remarks = $("#Remarks").val();
	shopAjax('discount.php?act=update','POST',{'coupons_code':coupons_code,'coupons_rate':coupons_rate,'coupons_subtracting_amount':coupons_subtracting_amount,
		'user_email':user_email,'cat_id':cat_id,'goods_name':goods_name,'use_times':use_times,'expiration_time':expiration_time,'Remarks':Remarks
	},function(json)
			{
				if(json.Ret == 0)
				{
					if(backUrl != '')
						window.location.href = backUrl;
					else
						window.location.href = "/";
				}else{
					if(json.Ret == 1)
						regMsg.html("* Wrong email style!");
					if(json.Ret == 2)
						regMsg.html("* The re-typed password is different from the first one.");
					if(json.Ret == 3)
						regMsg.html("* This account had been registered already.");
					if(json.Ret == 4)
						regMsg.html("* Register failed, please try again later!");
					if(json.Ret == 5)
						regMsg.html("* The password is too short!");
					if(json.Ret == 6)
						regMsg.html("* The password is too long!");
				}
			});
}
//-->
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>