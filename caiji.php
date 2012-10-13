<?php 
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once(dirname(__FILE__) . '/includes/cls_caiji.php');
include_once(dirname(__FILE__) . '/includes/cls_dlimg.php');



$sql = "SELECT `goods_name`,`img` FROM " . $ecs->table("test") . "  ";
$result = $db->getAll($sql, true);
foreach ($result as $v)
{
	$html2 = file_get_html($v['img']);
	foreach($html2->find('#mainimg') as $el)
	{
// 		echo $el->src."<br>";
		$sql = 'UPDATE ' . $ecs->table("test") . ' SET soure_img = "'.$el->src.'" where goods_name = "'.$v['goods_name'].'"';
		$db->query($sql, true);
	}
}
exit;
// var_dump($href_arry_unique);exit;
/* $j = 0;
foreach($html->find('a') as $element)
{
	 echo $element->href . '<br>';
	$j++;
} */
// echo "图片个数".$i."<br>";
// echo "价格个数".$j."<br>"; 

?>