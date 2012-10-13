//menu
jQuery(document).ready(function(){
  
  jQuery('li.mainlevel').mousemove(function(){
  jQuery(this).find('ul').slideDown();//you can give it a speed
  });
  jQuery('li.mainlevel').mouseleave(function(){
  jQuery(this).find('ul').slideUp("fast");
  });
  
});

//�ֲ�js

// JavaScript Document
jQuery(function($){
	var index = 0;
	$('<div id="flow"></div>').appendTo("#myjQuery");

	//���������ı�����	
	$("#myjQueryNav li").hover(function(){
		if(MyTime){
			clearInterval(MyTime);
		}
		index  =  $("#myjQueryNav li").index(this);
		MyTime = setTimeout(function(){
		ShowjQueryFlash(index);
		$('#myjQueryContent').stop();
		} , 400);

	}, function(){
		clearInterval(MyTime);
		MyTime = setInterval(function(){
		ShowjQueryFlash(index);
		index++;
		if(index==4){index=0;}
		} , 3000);
	});
	//���� ֹͣ������������ʼ����.
	 $('#myjQueryContent').hover(function(){
			  if(MyTime){
				 clearInterval(MyTime);
			  }
	 },function(){
				MyTime = setInterval(function(){
				ShowjQueryFlash(index);
				index++;
				if(index==4){index=0;}
			  } , 3000);
	 });
	//�Զ�����
	var MyTime = setInterval(function(){
		ShowjQueryFlash(index);
		index++;
		if(index==4){index=0;}
	} , 3000);
});
function ShowjQueryFlash(i) {
jQuery("#myjQueryContent div").eq(i).animate({opacity: 1},1000).css({"z-index": "1"}).siblings().animate({opacity: 0},1000).css({"z-index": "0"});
jQuery("#flow").animate({ left: i*250+5 +"px"}, 300 ); //���黬��
jQuery("#myjQueryNav li").eq(i).addClass("current").siblings().removeClass("current");
}