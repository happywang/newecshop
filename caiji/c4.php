<?php 
define('IN_ECS', true);

require('../includes/init.php');
include_once('../includes/cls_caiji.php');
include_once('../includes/cls_dlimg.php');

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
?>