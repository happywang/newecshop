<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />

<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<style>
	.noborder_1{border-style:none}
	.noborder_0{}
</style>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,showdiv.js,shopping_flow.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/header.lbi'); ?>

 
 <div class="block box">
 <div id="ur_here">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
 </div>
</div>


<div class="blank"></div>
<div class="block">
  <?php if ($this->_var['step'] == "cart"): ?>
  
  
  <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>
  <div class="accept"><img  src="themes/default/images/pays.gif"  width="975" height="52" /></div>
 
  <div class="flowBox">
    <h1><div class="checkout_bt"><a href="javascript:;" onclick="toCheckout();"><img src="themes/default/images/checkout.png" width="177" height="35" border="0" /></a></div><?php echo $this->_var['lang']['goods_list']; ?></h1>
    <div class="confidence">
       <h2>Shop With Confidence</h2>
       <div style="margin:0 20px; text-align:center">Shopping on tobunny.com is safe and secure - guaranteed!<BR /> 
            <a target="_blank" href="https://www.mcafeesecure.com/RatingVerify?ref=www.Tobunny.com&cb=51"><img width="94" height="54" border="0" src="themes/default/images/McAfee.gif" alt="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" oncontextmenu="alert(&#39;Copying Prohibited by Law - McAfee SECURE is a Trademark of McAfee, Inc.&#39;); return false;" style="margin:10px 0;"></a><BR /> 
            <img src="themes/default/images/McAfee.jpg" alt="" >
         </div>  
       <div class="guarntee">
         <img src="themes/default/images/guarntee.jpg" width="200" height="120" />
       </div>  
     </div>
     
     <div class="goods_list">
        <form id="formCart" name="formCart" method="post" action="flow.php">
           <table width="786" align="center" border="0" cellspacing="0"  class="tables" >
            <tr>
              <th bgcolor="#eeeeee" width="15%"><?php echo $this->_var['lang']['goods_name']; ?></th>
      <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <th bgcolor="#eeeeee"   width="40%"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <?php endif; ?>
              <th bgcolor="#eeeeee"  align="center"><?php echo $this->_var['lang']['shop_prices']; ?></th>
              <th bgcolor="#eeeeee"  align="center"><?php echo $this->_var['lang']['number']; ?></th>
              <th bgcolor="#eeeeee"  align="center"><?php echo $this->_var['lang']['subtotal']; ?></th>
              <th bgcolor="#eeeeee"  align="center"><?php echo $this->_var['lang']['handle']; ?></th>
            </tr>
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            
            <tr>
              <td>
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
                  <?php if ($this->_var['show_goods_thumb'] == 1): ?>
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a>
                  <?php elseif ($this->_var['show_goods_thumb'] == 2): ?>
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0"width="50" height="50" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a>
                  <?php else: ?>
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0"width="50" height="50" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a><br />
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                  <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['is_gift'] > 0): ?>
                  <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                  <?php endif; ?>
                <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
                  <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
                  <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
                      <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
                        <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </div>
                <?php else: ?>
                  <?php echo $this->_var['goods']['goods_name']; ?>
                <?php endif; ?>
              </td>
              <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <td><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
              <?php endif; ?>

              <td><B><span id="goods_price_<?php echo $this->_var['goods']['rec_id']; ?>"><?php echo $this->_var['goods']['goods_price']; ?></span></B></td>
              <td align="right" width="115" bgcolor="#ffffff">
              
                <a href="javascript:void(0)" onclick="qtyAction('goods_number_<?php echo $this->_var['goods']['rec_id']; ?>',-1)"  title="Minus" class="minus">-</a>
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
                 <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>"  class="inputBg" style="width:40px; height:15px; text-align:center; line-height:15px; float:left " onblur="qtyAction_v2(this)"/>
                <?php else: ?>
                <?php echo $this->_var['goods']['goods_number']; ?>
                <?php endif; ?>
                <a href="javascript:void(0);" onclick="qtyAction('goods_number_<?php echo $this->_var['goods']['rec_id']; ?>',1)" title="Plus" class="plus">+</a> <BR />
              </td>
              <td><font color="#ff0052"><b><span id="goods_subtotalprice_<?php echo $this->_var['goods']['rec_id']; ?>"><?php echo $this->_var['goods']['subtotal']; ?></span></b></font></td>
              <td>
                <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="f6"><?php echo $this->_var['lang']['drop']; ?></a>
                          </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
          <table width="786" align="center" cellpadding="0" cellspacing="0" bgcolor="#eeeeee" class="tables2">
            <tr>
              <td  height="40">
              <?php if ($this->_var['discount'] > 0): ?><?php echo $this->_var['your_discount']; ?><br /><?php endif; ?>
             <!--<font color="ff0000"><b><span id="shopping_money_total"><?php echo $this->_var['shopping_money']; ?></span></b></font> --><?php if ($this->_var['show_marketprice']): ?>，<font color="#009933"><?php echo $this->_var['market_price_desc']; ?></font><?php endif; ?>
              </td>
              <td align="right" >
              <input type="button" value="<?php echo $this->_var['lang']['clear_cart']; ?>" class="bnt_blue_1" onclick="location.href='flow.php?step=clear'" />
		<?php echo $this->_var['lang']['update_cart']; ?>
              </td>
            </tr>
          </table>
          <input type="hidden" name="step" value="update_cart" />
        
        <div class="continue_bt"><a href="."><img src="themes/default/images/continue.png"  width="177" height="35" border="0" alt="continue"></a></div>
        <div class="checkout_bt1"><a href="javascript:;" onclick="toCheckout();"><img src="themes/default/images/checkout.png" width="177" height="35" border="0" alt="checkout"/></a></div> 
        <?php echo $this->_var['lang']['update_cart']; ?>
        </form>
       
       <?php if ($_SESSION['user_id'] > 0): ?>
       <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
       <script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script>
     </div> 
  </div>
  
  



    <div class="blank"></div>
  <?php endif; ?>

  <?php if ($this->_var['collection_goods']): ?>
  <div class="flowBox">
    <h2><span><?php echo $this->_var['lang']['label_collection']; ?></span></h2>
    <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#ffd3e0">
      <?php $_from = $this->_var['collection_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <tr>
            <td bgcolor="#ffffff"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></td>
            <td bgcolor="#ffffff" align="center" width="100"><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['lang']['collect_to_flow']; ?></a></td>
          </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
      <?php endif; ?>
  </div>
    <div class="blank5"></div>
  <?php endif; ?>

  <?php if ($this->_var['fittings_list']): ?>
  <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
  <script type="text/javascript" charset="utf-8">
  function fittings_to_flow(goodsId,parentId)
  {
    var goods        = new Object();
    var spec_arr     = new Array();
    var number       = 1;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = parentId;
    Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), fittings_to_flow_response, 'POST', 'JSON');
  }
  function fittings_to_flow_response(result)
  {
    if (result.error > 0)
    {
      // 如果需要缺货登记，跳转
      if (result.error == 2)
      {
        if (confirm(result.message))
        {
          location.href = 'user.php?act=add_booking&id=' + result.goods_id;
        }
      }
      else if (result.error == 6)
      {
        openSpeDiv(result.message, result.goods_id, result.parent);
      }
      else
      {
        alert(result.message);
      }
    }
    else
    {
      location.href = 'flow.php';
    }
  }
  </script>
  <div class="block" style="display: none" >
    <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['goods_fittings']; ?></span></h6>
    <form action="flow.php" method="post">
        <div class="flowGoodsFittings clearfix">
          <?php $_from = $this->_var['fittings_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'fittings');if (count($_from)):
    foreach ($_from AS $this->_var['fittings']):
?>
            <ul class="clearfix">
              <li class="goodsimg">
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['fittings']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['fittings']['name']); ?>" class="B_blue" /></a>
              </li>
              <li>
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>" class="f6"><?php echo htmlspecialchars($this->_var['fittings']['short_name']); ?></a><br />
                <?php echo $this->_var['lang']['fittings_price']; ?><font class="f1"><?php echo $this->_var['fittings']['fittings_price']; ?></font><br />
                <?php echo $this->_var['lang']['parent_name']; ?><?php echo $this->_var['fittings']['parent_short_name']; ?><br />
                <a href="javascript:fittings_to_flow(<?php echo $this->_var['fittings']['goods_id']; ?>,<?php echo $this->_var['fittings']['parent_id']; ?>)"><img src="themes/default/images/bnt_buy.gif" alt="<?php echo $this->_var['lang']['collect_to_flow']; ?>" /></a>
              </li>
            </ul>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
    </form>
    </div>
  </div>
  <div class="blank5"></div>
  <?php endif; ?>

  <?php if ($this->_var['favourable_list']): ?>
  <div class="block" >
    <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['label_favourable']; ?></span></h6>
        <?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
        <form action="flow.php" method="post">
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_name']; ?></td>
              <td bgcolor="#ffffff"><strong><?php echo $this->_var['favourable']['act_name']; ?></strong></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_period']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_range']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br />
              <?php echo $this->_var['favourable']['act_range_desc']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_amount']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_type']; ?></td>
              <td bgcolor="#ffffff">
                <span class="STYLE1"><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
                <?php if ($this->_var['favourable']['act_type'] == 0): ?>
                <?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br />
                  <input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
                  <a href="goods.php?id=<?php echo $this->_var['gift']['id']; ?>" target="_blank" class="f6"><?php echo $this->_var['gift']['name']; ?></a> [<?php echo $this->_var['gift']['formated_price']; ?>]
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php endif; ?>          </td>
            </tr>
            <?php if ($this->_var['favourable']['available']): ?>
            <tr>
              <td align="right" bgcolor="#ffffff">&nbsp;</td>
              <td align="center" bgcolor="#ffffff"><input type="image" src="themes/default/images/bnt_cat.gif" alt="Add to cart"  border="0" /></td>
            </tr>
            <?php endif; ?>
          </table>
          <input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>" />
          <input type="hidden" name="step" value="add_favourable" />
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  </div>
  <?php endif; ?>


        <?php if ($this->_var['step'] == "consignee"): ?>
        
        <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
        <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
        
        <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
        <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
        <?php echo $this->fetch('library/consignee.lbi'); ?>
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>


        <?php if ($this->_var['step'] == "checkout"): ?>
        <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
        <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
        </script>
        <div class="flowBox">
        <h2><span><?php echo $this->_var['lang']['goods_list']; ?></span><?php if ($this->_var['allow_edit_cart']): ?><a href="flow.php" class="xg"><?php echo $this->_var['lang']['modify']; ?></a><?php endif; ?></h2>
        <table class="tabs" width="100%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#ffd3e0" >
            <tr>
              <th width="30%"><?php echo $this->_var['lang']['goods_name']; ?></th>
              <th width="30%"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <th width="15%"><?php if ($this->_var['gb_deposit']): ?><?php echo $this->_var['lang']['deposit']; ?><?php else: ?><?php echo $this->_var['lang']['shop_prices']; ?><?php endif; ?></th>
              <th width="10%"><?php echo $this->_var['lang']['number']; ?></th>
              <th width="15%" ><?php echo $this->_var['lang']['subtotal']; ?></th>
            </tr>
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <tr>
              <td>
              <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
          <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
          <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
              <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
            <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
          <?php else: ?>
          <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a>
                <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
                <?php elseif ($this->_var['goods']['is_gift']): ?>
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->_var['goods']['is_shipping']): ?>(<span style="color:#FF0000"><?php echo $this->_var['lang']['free_goods']; ?></span>)<?php endif; ?>
              </td>
              <td><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
              <td align="right"><font color="#FF0000"><?php echo $this->_var['goods']['formated_goods_price']; ?></font></td>
              <td align="center"><?php echo $this->_var['goods']['goods_number']; ?></td>
              <td align="right"><?php echo $this->_var['goods']['formated_subtotal']; ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php if (! $this->_var['gb_deposit']): ?>
            <tr>
              <td height="25px"  colspan="7" style="background:#ffeaf6"  >
             
              <font color="#FF0000" style="font-size:15px; float:right"><B><?php echo $this->_var['shopping_money']; ?></B></font> 
              </td>
            </tr>
            <?php endif; ?>
          </table>
      </div>
      <div class="blank"></div>
      <div class="flowBox" style=" border:1px solid #ffd3e0">
      <h2><span><?php echo $this->_var['lang']['consignee_info']; ?></span><a href="flow.php?step=consignee" class="xg"><?php echo $this->_var['lang']['modify']; ?></a></h2>
      <table width="60%" align="center" border="0" cellpadding="5" cellspacing="0"  style="margin:10px auto">
            <!--<tr>
              <td align="right" width="30%"><?php echo $this->_var['lang']['consignee_name']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?>" /> </td>
            </tr>-->
            
            <tr>
              <td align="right" width="30%">country:</td>
              <td>
			<select id="consigneeCountry" class="consignee consigneeCountry">
				<option value="-1">please choose your country</option>
				<?php $_from = $this->_var['countryInfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
				<option value="<?php echo $this->_var['country']['country_id']; ?>"><?php echo $this->_var['country']['country_en_name']; ?></option>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</select> 
		</td>
		<td><span></span></td>
            </tr>
	    <tr>   
              <td align="right" width="30%"><?php echo $this->_var['lang']['email_address']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee consigneeEmail" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['email']); ?>" /></td>
		<td><span></span></td>
	    </tr>
		 <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
            <tr>
              <td align="right" width="30%"><?php echo $this->_var['lang']['detailed_address']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee consigneeNot" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['address']); ?>"/> </td>
		<td><span></span></td>
            </tr>
            <tr>
              <td align="right" width="30%"><?php echo $this->_var['lang']['postalcode']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee consigneeNum" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?>"/></td>
		<td><span></span></td>
            </tr>
            <?php endif; ?>
            <tr>
              <td align="right" width="30%"><?php echo $this->_var['lang']['phone']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee consigneeNum" type="text" value="<?php echo $this->_var['consignee']['tel']; ?>"/> </td>
		<td><span></span></td>
            </tr>
            <tr>  
              <td align="right" width="30%"><?php echo $this->_var['lang']['backup_phone']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee consigneeNum" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['mobile']); ?>"</td>
		<td><span></span></td>
            </tr>
             <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
            <tr>
              <td align="right" width="30%"><?php echo $this->_var['lang']['sign_building']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee consigneeNull" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['sign_building']); ?>" </td>
		<td><span></span></td>
            </tr>
            <tr>  
              <td align="right" width="30%"><?php echo $this->_var['lang']['deliver_goods_time']; ?>:</td>
              <td><input class="noborder_<?php echo $this->_var['hasConsignee']; ?> consignee consigneeNull" type="text" value="<?php echo htmlspecialchars($this->_var['consignee']['best_time']); ?>"/></td>
		<td><span></span></td>
            </tr>
		<input type="hidden" class="consignee" value="<?php echo $this->_var['consignee']['address_id']; ?>" />
            <?php endif; ?>
          </table>
      </div>
     <div class="blank"></div>
    <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
    <div class="flowBox" style="border:1px solid #ffd3e0; color:#333">
    <h2><span><?php echo $this->_var['lang']['shipping_method']; ?></span></h2>
 
         <table id="shippingFeeTa" width="98%" align="center" border="0" cellpadding="2" cellspacing="0" >
          <tbody>
	  <tr>
             <th height="42" width="30" valign="top" >&nbsp;</th>
             <th align="left">Available Shipping Methods</th>
             <th width="33%" align="left">Shipping Cost<span class="bone">(weight:<?php echo $this->_var['cart_weight_price']['formated_weight']; ?>)</span></th>
          </tr>
	<?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
          <tr>
            <td width="3%" height="42" valign="top"><input name="shipping" type="radio" type="" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" /></td>
            <td width="72%" valign="top"><label for="shipping1"><strong><?php echo $this->_var['shipping']['shipping_name']; ?></strong> save xx%</label>..........................................................................................................................<BR />
              Delivery Estimates: 7 - 25  days to major destinations.
              <div class="d" style="display:none;position:absolute; width:550px; left:0; top:30px; background:#eee; line-height:20px; font-size:11px; padding:5px; border:1px solid #ccc"> 
		<?php echo $this->_var['shipping']['shipping_desc']; ?>
                   </div>
              </div>
               </td>
              	<td align="center" valign="top"> 
		<span class="emsFee"><?php echo $this->_var['shipping']['shipping_fee']; ?></span><strong>USD</strong></td>
           </tr>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         </tbody>
        </table>
       
        <table width="100%" align="left" cellpadding="0" cellspacing="0" style="margin-top:10px; border-top:1px dashed #ffeaf6">
            <tbody>
                      <tr>
                          <td width="40" height="30" align="center"><input type="checkbox" value="1" name="Invoice"></td>
                          <td>Need Invoice.</td>
                      </tr>
		     <tr>
			<td width="40" height="30" align="center"><input id="registrationBox" onclick="selectReg(this)" type="checkbox" value="" name="registration" /></td>
			<td>Need Registration</td>
		     </tr>
                      <tr>
                          <td  width="40" height="30" align="center">
                               <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  /> 
 </td>
                          <td width="884" >
                              <strong>Add Shipping Insurance to your order</strong>............................................................................................................. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <strong>10.45 USD</strong>

                          </td> 
                      </tr>
                      <tr>
                          <td height="30"></td>
                          <td valign="top" height="20">(We offer Shipping Insurance to protect your   package against any lost or damaged shipments. Any missing issues, please inform us. We will reship your order immediately.)</td>
                      </tr>
                      <tr>
                          <td height="50" valign="middle">
                              <img src="themes/default/images/szh.gif" alt="">
                          </td>
                          <td style="padding-left:5px; font-size:11px;">
                              What's the Total Delivery Time? (Please use this formula to determine when your order will arrive) <br>
                              <strong>Total Delivery Time = Processing Time + Packaging Time   + Shipping Time</strong>
                          </td>
                      </tr>
          </tbody>
        </table>
      </div>
   <!--  <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#ffd3e0" id="shippingTable">
           <tr>
              <th bgcolor="#ffffff" width="5%">&nbsp;</th>
              <th bgcolor="#ffffff" width="25%"><?php echo $this->_var['lang']['name']; ?></th>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['describe']; ?></th>
              <th bgcolor="#ffffff" width="15%"><?php echo $this->_var['lang']['fee']; ?></th>
              <th bgcolor="#ffffff" width="15%"><?php echo $this->_var['lang']['free_money']; ?></th>
              <th bgcolor="#ffffff" width="15%"><?php echo $this->_var['lang']['insure_fee']; ?></th>
            </tr>-->
            
            <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
            
            <!--<tr>
              <td bgcolor="#ffffff" valign="top"><input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" />
              </td>
              <td bgcolor="#ffffff" valign="top"><strong><?php echo $this->_var['shipping']['shipping_name']; ?></strong></td>
              <td bgcolor="#ffffff" valign="top"><?php echo $this->_var['shipping']['shipping_desc']; ?></td>
              <td bgcolor="#ffffff" align="right" valign="top"><?php echo $this->_var['shipping']['format_shipping_fee']; ?></td>
              <td bgcolor="#ffffff" align="right" valign="top"><?php echo $this->_var['shipping']['free_money']; ?></td>
              <td bgcolor="#ffffff" align="right" valign="top"><?php if ($this->_var['shipping']['insure'] != 0): ?><?php echo $this->_var['shipping']['insure_formated']; ?><?php else: ?><?php echo $this->_var['lang']['not_support_insure']; ?><?php endif; ?></td>
            </tr>-->
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
           <!-- <tr>
              <td colspan="6" bgcolor="#ffffff" align="right"><label for="ECS_NEEDINSURE">
                <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
                <?php echo $this->_var['lang']['need_insure']; ?> </label></td>
            </tr>
          </table>-->
 
    <div class="blank"></div>
        <?php else: ?>
        <input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>
    <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>
    <div class="flowBox" style="border:1px solid #ffd3e0; color:#333"> 
    <h2><span><?php echo $this->_var['lang']['payment_method']; ?></span></h2>
<!-- <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="paymentTable">
            <tr>
              <th width="5%" bgcolor="#ffffff">&nbsp;</th>
              <th width="20%" bgcolor="#ffffff"><?php echo $this->_var['lang']['name']; ?></th>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['describe']; ?></th>
              <th bgcolor="#ffffff" width="15%"><?php echo $this->_var['lang']['pay_fee']; ?></th>
            </tr>
            <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
            
            <tr>
              <td valign="top" bgcolor="#ffffff"><input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/></td>
              <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['payment']['pay_name']; ?></strong></td>
              <td valign="top" bgcolor="#ffffff"><?php echo $this->_var['payment']['pay_desc']; ?></td>
              <td align="right" bgcolor="#ffffff" valign="top"><?php echo $this->_var['payment']['format_pay_fee']; ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>-->
 
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" style=" margin:10px" >
              <tbody>
                 <tr>
                  <td width="20" valign="top"><input type="radio" name="payment" value="<?php echo $this->_var['paypal']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['paypal']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['paypal']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td valign="top">
                      <img src="themes/default/images/pp.jpg"> <b>The safer, easier way to pay.</b>
                  </td>
              </tr>
              <tr>
                  <td valign="top"></td>
                  <td valign="top">
                      <div class="payment_content">
                          If you have paypal account, you   can pay your order by your paypal account.If you don't have paypal   account, it doesn't matter.  You canalso pay via paypal with you   credit card or bank debit card.Payment can be submitted in any currency.<br> <img height="80" alt="Solution Graphics" src="themes/default/images/PP1.gif" width="210" border="0"><img src="themes/default/images/pp2.gif" alt="Paypal Verified" width="70" height="70" border="0"> 
                      </div>
                  </td>
              </tr>
               <tr>
                  <td width="20" valign="top"><input type="radio" name="payment" value="<?php echo $this->_var['creditCart']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['creditCart']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['creditCart']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['creditCart']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                  <td valign="top"><b> <img src="themes/default/images/credit.jpg"> Pay through credit card directly </b></td>
              </tr>
 
           </tbody>
         </table>
 
    </div>
    <?php else: ?>
        <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
    <?php endif; ?>
    <div class="blank"></div>
  
 

      
    <div class="blank"></div>
    <div class="flowBox">
    <h2><span><?php echo $this->_var['lang']['fee_total']; ?></span></h2>
          <?php echo $this->fetch('library/order_total.lbi'); ?>
           <div align="center" style="margin:8px auto; text-align:center">
            <input type="image" src="themes/default/images/order.jpg" width="180" height="32" />
            <input type="hidden" name="step" value="done" />
            </div>
    </div>
    </form>
        <?php endif; ?>


        <?php if ($this->_var['step'] == "done"): ?>
        
        <div class="flowBox" style="margin:30px auto 70px auto;">
         <h6 style="text-align:center; height:30px; line-height:30px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></h6>
          <table width="99%" align="center" border="0" cellpadding="15" cellspacing="0" bgcolor="#fff" style="border:1px solid #ddd; margin:20px auto;" >
            <tr>
              <td align="center" bgcolor="#FFFFFF">
              <?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?>: <strong><?php echo $this->_var['order']['shipping_name']; ?></strong>，<?php endif; ?><?php echo $this->_var['lang']['select_payment']; ?>: <strong><?php echo $this->_var['order']['pay_name']; ?></strong>。<?php echo $this->_var['lang']['order_amount']; ?>: <strong><?php echo $this->_var['total']['amount_formated']; ?></strong>
              </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><?php echo $this->_var['order']['pay_desc']; ?></td>
            </tr>
            <?php if ($this->_var['pay_online']): ?>
            
            <tr>
              <td align="center" bgcolor="#FFFFFF"><?php echo $this->_var['pay_online']; ?></td>
            </tr>
            <?php endif; ?>
          </table>
          <?php if ($this->_var['virtual_card']): ?>
          <div style="text-align:center;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
          <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
            <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
            <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
              <ul style="list-style:none;padding:0;margin:0;clear:both">
              <?php if ($this->_var['card']['card_sn']): ?>
              <li style="margin-right:50px;float:left;">
              <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span>
              </li><?php endif; ?>
              <?php if ($this->_var['card']['card_password']): ?>
              <li style="margin-right:50px;float:left;">
              <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span>
              </li><?php endif; ?>
              <?php if ($this->_var['card']['end_date']): ?>
              <li style="float:left;">
              <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?>
              </li><?php endif; ?>
              </ul>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
          <?php endif; ?>
          <p style="text-align:center; margin-bottom:20px;"><?php echo $this->_var['order_submit_back']; ?></p>
        </div>
        <?php endif; ?>
        <?php if ($this->_var['step'] == "login"): ?>
        <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js,user.js')); ?>
        <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        
        </script>
        
        
        
        <div class="flowBox">
        <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#ffd3e0">
          <tr>
            <td width="50%" valign="top" bgcolor="#ffffff">
            <h2><span>用户登录：</span></h2>
            <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
                <table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#ffeaf6" class="table">
                  <tr>
                    <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['username']; ?></strong></div></td>
                    <td bgcolor="#ffffff"><input name="username" type="text" class="inputBg" id="username" /></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></div></td>
                    <td bgcolor="#ffffff"><input name="password" class="inputBg" type="password" /></td>
                  </tr>
                  <?php if ($this->_var['enabled_login_captcha']): ?>
                  <tr>
                    <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></div></td>
                    <td bgcolor="#ffffff"><input type="text" size="8" name="captcha" class="inputBg" />
                    <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
                  </tr>
                  <?php endif; ?>
                  <tr>
            <td colspan="2"  bgcolor="#ffffff"><input type="checkbox" value="1" name="remember" id="remember" /><label for="remember"><?php echo $this->_var['lang']['remember']; ?></label></td>
          </tr>
                  <tr>
                    <td bgcolor="#ffffff" colspan="2" align="center"><a href="user.php?act=qpassword_name" class="f6"><?php echo $this->_var['lang']['get_password_by_question']; ?></a>&nbsp;&nbsp;&nbsp;<a href="user.php?act=get_password" class="f6"><?php echo $this->_var['lang']['get_password_by_mail']; ?></a></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" bgcolor="#ffffff"><div  style="text-align:center;">
                        <input type="submit" class="bnt_blue" name="login" value="<?php echo $this->_var['lang']['forthwith_login']; ?>" />
                        <?php if ($this->_var['anonymous_buy'] == 1): ?>
                        <input type="button" class="bnt_blue_2" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                        <?php endif; ?>
                        <input name="act" type="hidden" value="signin" />
                      </div></td>
                  </tr>
                </table>
              </form>

              </td>
            <td valign="top" bgcolor="#ffffff">
            <h2><span>用户注册：</span></h2>
            <form action="flow.php?step=login" method="post" name="formUser" id="registerForm" onsubmit="return checkSignupForm(this)">
               <table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#ffeaf6" class="table">
                  <tr>
                    <td bgcolor="#ffffff" align="right" width="25%"><strong><?php echo $this->_var['lang']['username']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="username" type="text" class="inputBg" id="username" onblur="is_registered(this.value);" /><br />
            <span id="username_notice" style="color:#FF0000"></span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['email_address']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="email" type="text" class="inputBg" id="email" onblur="checkEmail(this.value);" /><br />
            <span id="email_notice" style="color:#FF0000"></span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="password" class="inputBg" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" /><br />
            <span style="color:#FF0000" id="password_notice"></span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['confirm_password']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="confirm_password" class="inputBg" type="password" id="confirm_password" onblur="check_conform_password(this.value);" /><br />
            <span style="color:#FF0000" id="conform_password_notice"></span></td>
                  </tr>
                  <?php if ($this->_var['enabled_register_captcha']): ?>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></td>
                    <td bgcolor="#ffffff"><input type="text" size="8" name="captcha" class="inputBg" />
                    <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </td>
                  </tr>
                  <?php endif; ?>
                  <tr>
                    <td colspan="2" bgcolor="#ffffff" align="center">
                        <input type="submit" name="Submit" class="bnt_blue_1" value="<?php echo $this->_var['lang']['forthwith_register']; ?>" />
                        <input name="act" type="hidden" value="signup" />
                    </td>
                  </tr>
                </table>
              </form>
              </td>
          </tr>
          <?php if ($this->_var['need_rechoose_gift']): ?>
          <tr>
            <td colspan="2" align="center" style="border-top:1px #ccc solid; padding:5px; color:red;"><?php echo $this->_var['lang']['gift_remainder']; ?></td>
          </tr>
          <?php endif; ?>
        </table>
        </div>
        
        <?php endif; ?>
 
<div class="blank5"></div>


<!--<div class="block">
  <div class="box">
   <div class="helpTitBg clearfix">
    <?php echo $this->fetch('library/help.lbi'); ?>
   </div>
  </div>
</div>
<div class="blank"></div>-->



<?php if ($this->_var['img_links'] || $this->_var['txt_links']): ?>

<div id="bottomNav" class="box">
 <div class="box_1">
  <div class="links clearfix">
    <?php $_from = $this->_var['img_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
    <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><img src="<?php echo $this->_var['link']['logo']; ?>" alt="<?php echo $this->_var['link']['name']; ?>" border="0" /></a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php if ($this->_var['txt_links']): ?>
    <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
    [<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>]
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
  </div>
 </div>
</div>
<?php endif; ?>

<div class="blank"></div>

</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<div id="submitForm"></div>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
var consigneeCountry="<?php echo $this->_var['consignee']['country']; ?>";
var ems=parseFloat("<?php echo $this->_var['emsPrice']; ?>");
var dhl=parseFloat("<?php echo $this->_var['dhlPrice']; ?>")
var hk=parseFloat("<?php echo $this->_var['hkbagPrice']; ?>");
$('#consigneeCountry').val(consigneeCountry);
$('.consignee').dblclick(function(){
	enableEdit(this);
})
var hasConsignee="<?php echo $this->_var['hasConsignee']; ?>";
if(parseInt(hasConsignee)>0){
	$('.consignee').each(function(){
		$(this).attr('readonly','readonly')
	})
}

$('.consignee').blur(function(){
	disableEdit(this);
	var rt=checkEdit(this);
	if(rt[0]>0){
	$(this).parent().next().find('span').html('');
$('#registrationBox').val($('input[name=shipping][checked]').val());
		saveEdit();
	}else{
		$(this).parent().next().find('span').html(rt[1]);
	}
})
$('#registrationBox').val($('input[name=shipping][checked]').val());
/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['formCart']);
  var qty = document.forms['formCart'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
  }
}
</script>
</html>
