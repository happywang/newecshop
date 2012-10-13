<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="wholesale fashion clothing, wholesale lots of low price clothing" />
<meta name="description" content="We are professional and reliable China wholesaler, who provide all kinds of high quality wholesale fashion clothing, wholesale lots of low price clothing... " />
<title>tobunny</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.min.js,index.js,slide.js,transport.js,utils.js')); ?>
</head>


<body>
<div class="top">
 <div class="welcome">Cheap clothing online </div>
 <div class="login">
  <?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
 </div>
 
</div>

<div class="head">
 <div class="m_head">
  <div class="logo"><a href="index.php"><img src="themes/default/images/logo.png"  width="242" height="80" border="0" /></a></div>
  <div class="search">
    <input type="text" value="Please enter your key words" class="enter" id="search_input" onclick="ec_search();" /> <input type="button" value="" class="bt" id="search_bt" onclick="do_search();" /> 
  </div>  
  <div class="cart">
    <div class="goods">
      <?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    </div>
    <!--<input type="button" value="" class="bt1" /> -->
    <a href="flow.php?step=checkout" class="bt1">Checkout</a>
  </div>
 </div> 
</div>
<div id="menu">
<ul id="nav">
	<li class="mainlevel"><a href="index.php" >Home</a></li>
<?php $_from = $this->_var['cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
 <li class="mainlevel" id="mainlevel_0<?php echo ($this->_foreach['cat']['iteration'] - 1); ?>"><a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo $this->_var['cat']['name']; ?></a>
    <ul id="sub_0<?php echo ($this->_foreach['cat']['iteration'] - 1); ?>">
    <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
    <li><a href="<?php echo $this->_var['child']['url']; ?>"><?php echo $this->_var['child']['name']; ?></a></li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </ul>
  </li>
 
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    <div class="clear"></div>

</ul>
</div>
