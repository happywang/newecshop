<?php 
define('IN_ECS', true);

require('../includes/init.php');
include_once('../includes/cls_caiji.php');
include_once('../includes/cls_dlimg.php');

$sql = "SELECT `goods_name`,`soure_img` FROM " . $ecs->table("test") . "  WHERE `goods_name`!=''";
$result = $db->getAll($sql, true);
$i=0;
foreach ($result as $v)
{
	
	$id = date("YmdHis")."_c_".$i;
	$filename = "images/caiji/goods_img/".getImage($id,$v['soure_img']);
	$sql = 'UPDATE ' . $ecs->table("test") . ' SET description  = "'.$filename.'" where goods_name = "'.$v['goods_name'].'"';
	$db->query($sql, true);
	$i++;
}

?>