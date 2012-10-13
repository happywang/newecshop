<?php 
set_time_limit(0);     //设置超时时间

include_once( 'Snoopy.class.php' );  //调用Snoopy类



function getImage($id,$url) {

	$filename = $id . ".jpg";

	$temp = new Snoopy; 

	$temp -> fetch($url);

	if($temp->results != "") {

		$handle = fopen(ROOT_PATH ."images/caiji/goods_img/" . $filename, "w");

		fwrite($handle, $temp->results);//写入抓得内容

		fclose($handle);

	}

	return $filename;

}

?>