<?php 
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');

if(isset($_GET['act']) && $_GET['act']=='do')
{
	$goods_name = $_GET['name'];
	if(!$goods_name)
	{
		header("Location:index.php");
		exit;
	}
	$res = get_goods_id($goods_name);
	if($res)
	{
		header("Location:goods.php?id=".$res);
		exit;
	}
	header("Location:index.php");
	exit;

}
function get_goods_id($goods_name){
	$sql = "SELECT goods_id FROM " .$GLOBALS['ecs']->table('goods'). " ".
			" WHERE goods_name = '".$goods_name."'";
	$res = $GLOBALS['db']->getOne($sql);
	return $res;
}
?>