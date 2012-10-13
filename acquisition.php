<?php 
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once(dirname(__FILE__) . '/includes/cls_caiji.php');
include_once(dirname(__FILE__) . '/includes/cls_dlimg.php');

$sql = "SELECT `goods_name`,`img` FROM " . $ecs->table("test") . " ";
$result = $db->getAll($sql, true);
foreach ($result as $v)
{
	$html2 = file_get_html($v['img']);
	foreach($html2->find('.regular-price') as $el)
	{
//  		echo $el->innertext."<br>";
		if($el->innertext)
		{
			$str = $el->innertext;
			$sql = "UPDATE " . $ecs->table("test") . " SET price = '".$str."' where goods_name = '".$v['goods_name']."'";
			$db->query($sql, true);
			
		}
	}
}
exit;

?>