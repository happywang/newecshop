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
	$sql = "SELECT d.coupons_id, d.coupons_code, d.coupons_rate, d.coupons_subtracting_amount, d.user_email,d.cat_id,d.goods_id,d.goods_sn,d.use_times,d.expiration_time,d.Remarks, 
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
		if($value['goods_sn'] && !empty($value['goods_sn']))
		{
			//$goodSql = "SELECT `goods_name` FROM " .$ecs->table('goods'). " where goods_id={$value['goods_id']} limit 1";
			$value['goods_sn'] = $value['goods_sn'];
		}
		else 
		{
			$value['goods_sn'] = '--';
		}
		array_push($coupons_list,$value);
	}
	$smarty->assign('ur_here', '折扣券');
	$action_link = array('href' => 'discount.php?act=add', 'text' => '添加折扣券');
	$smarty->assign('action_link',  $action_link);
	$smarty->assign('coupons_list', $coupons_list);
	$smarty->display('discount_list.htm');
}
elseif($_REQUEST['act'] == 'edit')
{
	$coupons_id = $_REQUEST['coupons_id'];
	$sql = "SELECT d.coupons_id, d.coupons_code, d.coupons_rate, d.coupons_subtracting_amount, d.user_email,d.cat_id,d.goods_id,d.goods_sn,d.use_times,d.expiration_time,d.Remarks, 
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
	if($row['goods_sn'] && !empty($row['goods_sn']))
	{
		//$goodSql = "SELECT `goods_name` FROM " .$ecs->table('goods'). " where goods_id={$row['goods_id']} limit 1";
		$row['goods_sn'] = $row['goods_sn'];//$db->getOne($goodSql);
	}
	else 
	{
		$row['goods_sn'] = '--';
	}
	$row['goods_id'] = $row['goods_id'] ? $row['goods_id'] : '';
	$smarty->assign('coupons_id', $row['coupons_id']);
	$smarty->assign('goods_id', $row['goods_id']);
	$smarty->assign('coupons_code', $row['coupons_code']);
	$smarty->assign('coupons_rate', $row['coupons_rate']);
	$smarty->assign('coupons_subtracting_amount', $row['coupons_subtracting_amount']);
	$smarty->assign('user_email', $row['user_email']);
	$smarty->assign('cat_name', $row['cat_name']);
	$smarty->assign('goods_sn', $row['goods_sn']);
	$smarty->assign('use_times', $row['use_times']);
	$smarty->assign('expiration_time', $row['expiration_time']);
	$smarty->assign('insert_date', $row['insert_date']);
	$smarty->assign('Remarks', $row['Remarks']);
	$smarty->assign('cat_list', cat_list(0, $row['cat_id']));
	$smarty->display('discount_info.htm');
}
elseif($_REQUEST['act'] == 'update'){
	$coupons_id = isset($_REQUEST['coupons_id']) ? trim($_REQUEST['coupons_id']) : '';
	$goods_id = isset($_REQUEST['goods_id']) ? trim($_REQUEST['goods_id']) : '';
	$coupons_code = isset($_REQUEST['coupons_code']) ? trim($_REQUEST['coupons_code']) : '';
	$coupons_rate = isset($_REQUEST['coupons_rate']) ? trim($_REQUEST['coupons_rate']) : '';
	$coupons_subtracting_amount = isset($_REQUEST['coupons_subtracting_amount']) ? trim($_REQUEST['coupons_subtracting_amount']) : '';
	$user_email = isset($_REQUEST['user_email']) ? trim($_REQUEST['user_email']) : '';
	$cat_id = isset($_REQUEST['cat_id']) ? trim($_REQUEST['cat_id']) : '';
	$goods_sn = isset($_REQUEST['goods_sn']) ? trim($_REQUEST['goods_sn']) : '';
	$use_times = isset($_REQUEST['use_times']) ? trim($_REQUEST['use_times']) : '';
	$expiration_time = isset($_REQUEST['expiration_time']) ? trim($_REQUEST['expiration_time']) : '';
	$Remarks = isset($_REQUEST['Remarks']) ? trim($_REQUEST['Remarks']) : '';
	$status = $use_times == 0 ? 1 : 0 ;
	if($goods_id && $cat_id)
	{
		$goodSql = "SELECT * FROM " .$ecs->table('goods'). " where goods_id={$goods_id} and `cat_id `={$cat_id} limit 1";
		$row = $db->getOne($goodSql);
		if($row)
		{
			echo json_encode(array('Ret'=>-1));
			exit;
		}
	}
	$sql = "UPDATE " . $ecs->table('discount_coupons') . " SET " .
			"coupons_code = '$coupons_code', " .
			"coupons_rate = '$coupons_rate', " .
			"coupons_subtracting_amount = '$coupons_subtracting_amount', " .
			"user_email = '$user_email', " .
			"cat_id = '$cat_id', " .
			"goods_id = '$goods_id', " .
			"goods_sn = '$goods_sn', " .
			"use_times = '$use_times', " .
			"expiration_time = '$expiration_time', " .
			"Remarks = '$Remarks', " .
			"status = '$status', " .
			"insert_date = "."date('Y-m-d H:i:s')"." WHERE `coupons_id` = '$coupons_id'";
	$result = $db->query($sql);
	if($result)
	{
		echo json_encode(array('Ret'=>1));
	}
	else
	{
		echo json_encode(array('Ret'=>-2));
	}
	exit;
}
elseif($_REQUEST['act'] == 'del'){
	$sql = "DELETE FROM {$ecs->table('discount_coupons')} WHERE `coupons_id` = {$_POST['coupons_id']} LIMIT 1";
	$result = $db->query($sql);
	if($result)
	{
		echo json_encode(array('Ret'=>1));
	}
	else
	{
		echo json_encode(array('Ret'=>-2));
	}
	exit;
}
elseif($_REQUEST['act'] == 'add'){
	$smarty->assign('cat_list', cat_list(0, ''));
	$smarty->display('discount_add.htm');
}
elseif($_REQUEST['act'] == 'insert'){
	$coupons_code = isset($_REQUEST['coupons_code']) ? trim($_REQUEST['coupons_code']) : '';
	$coupons_rate = isset($_REQUEST['coupons_rate']) ? trim($_REQUEST['coupons_rate']) : '';
	$coupons_subtracting_amount = isset($_REQUEST['coupons_subtracting_amount']) ? trim($_REQUEST['coupons_subtracting_amount']) : '';
	$user_email = isset($_REQUEST['user_email']) ? trim($_REQUEST['user_email']) : '';
	$cat_id = isset($_REQUEST['cat_id']) ? trim($_REQUEST['cat_id']) : '';
	$goods_sn = isset($_REQUEST['goods_sn']) ? trim($_REQUEST['goods_sn']) : '';
	$use_times = isset($_REQUEST['use_times']) ? trim($_REQUEST['use_times']) : '';
	$expiration_time = isset($_REQUEST['expiration_time']) ? trim($_REQUEST['expiration_time']) : '';
	$Remarks = isset($_REQUEST['Remarks']) ? trim($_REQUEST['Remarks']) : '';
	$status = $use_times == 0 ? 1 : 0 ;
	if($goods_sn)
	{
		$goodSql = "SELECT `goods_id` FROM " .$ecs->table('goods'). " where goods_sn={$goods_sn} limit 1";
		$goods_id = $db->getOne($goodSql);
	}
	else 
	{
		$goods_id = '';
	}
	$couponsSql = "SELECT `coupons_id` FROM " .$ecs->table('discount_coupons'). " where coupons_code={$coupons_code} limit 1";
	$coupons_id = $db->getOne($couponsSql);
	if($coupons_id)
	{
		echo json_encode(array('Ret'=>-1));
		exit;
	}
	$insert_time = date('Y-m-d H:i:s');
	$sql = "INSERT INTO " . $ecs->table('discount_coupons') . " (coupons_code, coupons_rate, coupons_subtracting_amount, " .
			"user_email, cat_id, goods_id, goods_sn, use_times, expiration_time, Remarks,insert_date,status) " .
			"VALUES ('$coupons_code', '$coupons_rate', '$coupons_subtracting_amount', '$user_email', " .
			"'$cat_id', '$goods_id', '$goods_sn','$use_times', '$expiration_time','$Remarks', " . "'$insert_time'".",'$status')";
	$result = $db->query($sql);
	if($result)
	{
		echo json_encode(array('Ret'=>1));
	}
	else
	{
		echo json_encode(array('Ret'=>-2));
	}
	exit;
}