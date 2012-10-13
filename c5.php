<?php 
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once(dirname(__FILE__) . '/includes/cls_caiji.php');
include_once(dirname(__FILE__) . '/includes/cls_dlimg.php');

// echo file_get_html('http://www.google.com/')->plaintext;

$sql = "SELECT `goods_name`,`soure_img` FROM " . $ecs->table("test") . "  WHERE `goods_name`!=''";
$result = $db->getAll($sql, true);
$i=0;
foreach ($result as $v)
{
	
	$id = date("YmdHis")."_c_".$i;
	$filename = "images/caiji/goods_img/".getImage($id,$v['soure_img']);
	$sql = 'UPDATE ' . $ecs->table("test") . ' SET description  = "'.$filename.'" where goods_name = "'.$v['goods_name'].'"';
	$db->query($sql, true);
// 	echo $element->alt . "<br>";
	$i++;
}
/* $j = 0;
foreach($html->find('.my_shop_price') as $element)
{
	if($j >= $i) break;
	echo $element->orgp . '<br>';
	$j++;
}
echo "图片个数".$i."<br>";
echo "价格个数".$j."<br>"; */

?>