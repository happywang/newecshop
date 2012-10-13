<?php 
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once(dirname(__FILE__) . '/includes/cls_caiji.php');
include_once(dirname(__FILE__) . '/includes/cls_dlimg.php');

// echo file_get_html('http://www.google.com/')->plaintext;

/* $html2 = file_get_html("http://www.tomtop.com/toy-kids-baby/20pcs-oo-scale-1-75-painted-model-beach-people-figures.html");
foreach($html2->find('#mainimg') as $el)
{
	echo $el->src."<br>";
}
exit; */



$sql = "SELECT `goods_name`,`img` FROM " . $ecs->table("test") . " where `dc`=''";
$result = $db->getAll($sql, true);
foreach ($result as $v)
{
	$html2 = file_get_html($v['img']);
	foreach($html2->find('.product-specs') as $el)
	{
// 		echo $el->src."<br>";
		if($el->innertext)
		{
			$str = str_replace("'", '"', $el->innertext);
			$sql = "UPDATE " . $ecs->table("test") . " SET dc = '".$str."' where goods_name = '".$v['goods_name']."'";
			$db->query($sql, true);
		}
	}
}
exit;


?>