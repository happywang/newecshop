<?php
/**
 * 折扣券
 * @var wanghl
 */
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
$exc = new exchange($ecs->table('discount_coupons'), $db, 'coupons_code', 'coupons_rate');
if ($_REQUEST['act'] == 'list')//折扣券列表
{
	$sql = "SELECT d.coupons_id, d.coupons_code, d.coupons_rate, d.coupons_subtracting_amount, d.user_email,d.cat_id,d.goods_id,d.use_times,d.expiration_time,d.Remarks, 
	d.insert_date FROM " .$ecs->table('discount_coupons'). " as d ORDER BY coupons_id";
// 	echo $sql;exit;
	$row = $db->getAll($sql);
	$coupons_list=array();
	foreach ($row as $key=>$value)
	{
		if($value['cat_id'] && !empty($value['cat_id']))
		{
			$catSql = "SELECT `cat_name` FROM " .$ecs->table('category'). " where cat_id={$value['cat_id']} limit 1";
			$value['cat_name'] = $db->getOne($catSql);
		}
		else 
		{
			$value['cat_name'] = '--';
		}
		if($value['goods_id'] && !empty($value['goods_id']))
		{
			$goodSql = "SELECT `goods_name` FROM " .$ecs->table('goods'). " where goods_id={$value['goods_id']} limit 1";
			$value['goods_name'] = $db->getOne($goodSql);
		}
		else 
		{
			$value['goods_name'] = '--';
		}
		array_push($coupons_list,$value);
	}
	$smarty->assign('coupons_list', $coupons_list);
	$smarty->display('discount_list.htm');
}
elseif($_REQUEST['act'] == 'edit')
{
	$coupons_id = $_REQUEST['coupons_id'];
	$sql = "SELECT d.coupons_id, d.coupons_code, d.coupons_rate, d.coupons_subtracting_amount, d.user_email,d.cat_id,d.goods_id,d.use_times,d.expiration_time,d.Remarks, 
		d.insert_date FROM " .$ecs->table('discount_coupons'). " as d where coupons_id={$coupons_id} limit 1";
	$row = $db->getRow($sql);
	if($row['cat_id'] && !empty($row['cat_id']))
	{
		$catSql = "SELECT `cat_name` FROM " .$ecs->table('category'). " where cat_id={$row['cat_id']} limit 1";
		$row['cat_name'] = $db->getOne($catSql);
	}
	else 
	{
		$row['cat_name'] = '--';
	}
	if($row['goods_id'] && !empty($row['goods_id']))
	{
		$goodSql = "SELECT `goods_name` FROM " .$ecs->table('goods'). " where goods_id={$row['goods_id']} limit 1";
		$row['goods_name'] = $db->getOne($goodSql);
	}
	else 
	{
		$row['goods_name'] = '--';
	}
	$smarty->assign('coupons_code', $row['coupons_code']);
	$smarty->assign('coupons_rate', $row['coupons_rate']);
	$smarty->assign('coupons_subtracting_amount', $row['coupons_subtracting_amount']);
	$smarty->assign('user_email', $row['user_email']);
	$smarty->assign('cat_name', $row['cat_name']);
	$smarty->assign('goods_name', $row['goods_name']);
	$smarty->assign('use_times', $row['use_times']);
	$smarty->assign('expiration_time', $row['expiration_time']);
	$smarty->assign('Remarks', $row['Remarks']);
	$smarty->assign('cat_list', cat_list(0, $row['cat_id']));
	$smarty->display('discount_info.htm');
}
elseif($_REQUEST['act'] == 'update'){
// 	$coupons_code = 
}