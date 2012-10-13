<?php 
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . '/' . ADMIN_PATH . '/includes/lib_goods.php');
include_once(ROOT_PATH . '/includes/cls_image.php');
$image = new cls_image($_CFG['bgcolor']);
$exc = new exchange($ecs->table('goods'), $db, 'goods_id', 'goods_name');
$sql = "SELECT * FROM " . $ecs->table("test") . " group by `description` ";
$result = $db->getAll($sql, true);
foreach ($result as $key=>$v)
{
	$goods_mark = $v['img'];
	$goods_name = $v['goods_name'];
	$goods_name = str_replace("'", "", $goods_name);
	$goods_name = str_replace('"', "", $goods_name);



/* 入库 */
		$sql = "update " . $ecs->table('goods') . " set goods_mark= '$goods_mark' where goods_name = '$goods_name'";
$db->query($sql);
}

?>