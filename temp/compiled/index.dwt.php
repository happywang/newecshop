<?php echo $this->fetch('header.dwt'); ?>
<div id="main">

<div  class="banner">
  <div id=myjQuery>
        <div id=myjQueryContent>
          <div><a href="" target=_blank><img src="themes/default/images/01.jpg" width="990" height="350" /></a></div>
          <div class=smask><a href="" target=_blank><img src="themes/default/images/02.JPG"  width="990" height="350"/></a></div>
          <div class=smask><a href="" target=_blank><img src="themes/default/images/03.jpg"  width="990" height="350"/></a></div>
          <div class=smask><a href="" target=_blank><img src="themes/default/images/04.jpg" width="990" height="350" /></a></div>
        </div>
        <ul id=myjQueryNav>
          <li class=current><a href="" target=_blank>2009情人节攻略三部曲</a> </li>
          <li><a href="" target=_blank>给闺蜜的礼物两件新衣80元起</a> </li>
          <li><a href="" target=_blank>09运动新品新年8折起！</a> </li>
          <li class=nbg><a href="" target=_blank>新年给家人一次奢华的享受</a> </li>
        </ul>
      </div>
</div>


<div class="Weekly_Deals">
 <div class="title"> 
   <div class="email"><input type="button" value="subscrib" class="bt" onclick="subscrib();"/> <input type="text" onclick="checkSubscrib();" value="Enter your email" class="enter" id="subscrib" />  </div>
 </div> 
 <div class="New_Arrivals">
   <ul>
   <?php $_from = $this->_var['weeklydeal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'weekly');if (count($_from)):
    foreach ($_from AS $this->_var['weekly']):
?>
     <li>
       <a href="<?php echo $this->_var['weekly']['url']; ?>" title="<?php echo $this->_var['weekly']['goods_style_name']; ?>"><img src="<?php echo $this->_var['weekly']['goods_img']; ?>" width="188" height="188" title="<?php echo $this->_var['weekly']['name']; ?>" alt="<?php echo $this->_var['weekly']['goods_style_name']; ?>" /></a>
       <div class="intro">
         <div class="goods_title"><a href="<?php echo $this->_var['weekly']['url']; ?>" title="<?php echo $this->_var['weekly']['goods_style_name']; ?>"><?php echo $this->_var['weekly']['name']; ?></a></div>
         <b>Was:<font color="#FF0033" style=" text-decoration:line-through"><?php echo $this->_var['weekly']['market_price']; ?></font></b><br />
         <b>Now:<font color="#00CC00"><?php echo $this->_var['weekly']['shop_price']; ?></font></b>
       </div>
     </li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   </ul>
 </div>
</div>

<div class="topten"> 
 <div class="title1">
   <h2>Top 10</h2>
   <div class="more"><a href="" target="_blank">more</a></div>
 </div>
   <ul>
   <?php $_from = $this->_var['top10']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'topone');if (count($_from)):
    foreach ($_from AS $this->_var['topone']):
?>
     <li>
       <a href="<?php echo $this->_var['topone']['url']; ?>" title="<?php echo $this->_var['topone']['url']; ?>"><img src="<?php echo $this->_var['topone']['goods_img']; ?>" width="188" height="188" title="<?php echo $this->_var['topone']['goods_name']; ?>" alt="tobunny" /></a>
       <div class="intro">
         <div class="goods_title"><a href="<?php echo $this->_var['topone']['url']; ?>" title="<?php echo $this->_var['topone']['goods_name']; ?>"><?php echo $this->_var['topone']['goods_name']; ?></a></div>
         <b>Was:<font color="#FF0033" style=" text-decoration:line-through"><?php echo $this->_var['topone']['market_price']; ?></font></b><br />
         <b>Now:<font color="#00CC00"><?php echo $this->_var['topone']['shop_price']; ?></font></b>
       </div>
     </li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   </ul>
</div>

<div class="Hot_Sales">
  <div class="title">
   <h2>New Arrival</h2>
   <div class="more"><a href="" target="_blank">more</a></div>
  </div> 
  <ul>
  	<?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'newgood');if (count($_from)):
    foreach ($_from AS $this->_var['newgood']):
?>
     <li>
       <a href="<?php echo $this->_var['newgood']['url']; ?>" title="<?php echo $this->_var['newgood']['goods_style_name']; ?>"><img src="<?php echo $this->_var['newgood']['goods_img']; ?>" width="188" height="188" title="<?php echo $this->_var['newgood']['name']; ?>" alt="tobunny" /></a>
       <div class="intro">
         <div class="goods_title"><a href="<?php echo $this->_var['newgood']['url']; ?>" title="<?php echo $this->_var['newgood']['name']; ?>"><?php echo $this->_var['newgood']['name']; ?></a></div>
         <b>Was:<font color="#FF0033" style=" text-decoration:line-through"><?php echo $this->_var['newgood']['market_price']; ?></font></b><br />
         <b>Now:<font color="#00CC00"><?php echo $this->_var['newgood']['shop_price']; ?></font></b>
       </div>
     </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   </ul>
</div>
<div class="bottom">
  <ul>
     <li>
       <h3>Company information</h3>
       <a href="" target="_blank" title="xxxx">About Us</a><BR />
       <a href="" target="_blank" title="xxxx">Contact Us </a><BR />
       <a href="" target="_blank" title="xxxx">dfdfgdfg</a><BR />
       <a href="" target="_blank" title="xxxx">Customer Service </a><BR />
       <a href="" target="_blank" title="xxxx">Privacy Policies</a>
     </li>
     <li>
       <h3>Customer Service</h3>
       <a href="" target="_blank" title="xxxx">Warranty and Return </a><BR />
       <a href="" target="_blank" title="xxxx">Payment Methods </a><BR />
       <a href="" target="_blank" title="xxxx">Terms and Conditions </a><BR />
       <a href="" target="_blank" title="xxxx">Shipping & Handling</a><BR />
     </li>
     <li>
       <h3>My account</h3>
       <a href="" target="_blank" title="xxxx" style=" padding-left:23px">Login/Register </a><BR />
       <a href="" target="_blank" title="xxxx" style=" padding-left:23px">Order History</a><BR />
       <a href="" target="_blank" title="xxxx" style=" padding-left:23px">My Favorites </a><BR />
       <a href="" target="_blank" title="xxxx" style=" padding-left:23px">FAQ</a>
     </li>
     <li>
       <h3>We are social</h3>
       <a href="" target="_blank" title="xxxx" class="fb"></a><BR />
       <a href="" target="_blank" title="xxxx" class="tw"></a><BR />
       <a href="" target="_blank" title="xxxx"  class="tb"></a><BR />
     </li>
     <li class="track_orders">
        <h3>Track orders</h3>
        <div class="track"><input type="button" value="" class="bt" /> <input type="text" value="Order Number" class="enter" /></div>
        <h3>Newsletter</h3>
        <div class="track"><input type="button" value="" class="bt" /> <input type="text" value="Enter your email" class="enter" /></div>
     </li>
   </ul>
   <div class="bt_nav">
     <a href="" target="_blank">11111111</a> | <a href="" target="_blank">22222222</a> | <a href="" target="_blank">33333333</a> | <a href="" target="_blank">44444444</a> | <a href="" target="_blank">55555555</a> | <a href="" target="_blank">66666666</a> | <a href="" target="_blank">77777777</a> | <a href="" target="_blank">888888</a> | <a href="" target="_blank">99999</a> | <a href="" target="_blank">000000</a>
   </div> 
   
   <div class="cooperation">
     <!--<img src="themes/default/images/paypal.JPG" width="150" height="60" /><img src="themes/default/images/paypal.JPG" width="150" height="60" /><img src="themes/default/images/paypal.JPG" width="150" height="60" /><img src="themes/default/images/paypal.JPG" width="150" height="60" /><img src="themes/default/images/paypal.JPG" width="150" height="60" /><img src="themes/default/images/paypal.JPG" width="150" height="60" />-->
     <img src="themes/default/images/paypal.gif" width="768" height="55" />
   </div>
</div>

</div>
</body>
</html>
