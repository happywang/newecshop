<?php 
/**
 * 推荐商品管理
 */
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . '/' . ADMIN_PATH . '/includes/lib_goods.php');
include_once(ROOT_PATH . '/includes/cls_image.php');
$image = new cls_image($_CFG['bgcolor']);
$exc = new exchange($ecs->table('goods'), $db, 'goods_id', 'goods_name');
$smarty->assign('ur_here', '首页推荐商品');
$action_link = array('href' => 'recommend_goods.php?act=add', 'text' => '添加推荐商品');
$smarty->assign('action_link',  $action_link);
if ($_REQUEST['act'] == 'list')
{
	$sql = "select r.`goods_id` as goods_id,g.`cat_id` as cat_id,g.goods_sn` as goods_sn,g.`goods_name` as goods_name,r.`remark` as recommended_mark,
	r.`recommended_img` as recommended_img,r.`sort` as sort,r.`description` as description，r.`subject_url` as subject_url from " . $ecs->table('goods') ." as g," . $ecs->table('goods_recommend') ." as r where g.`goods_id` = r.`goods_id`
			and r.`status` = '1' order by r.`sort` desc";
	$goods_info = $db->getAll($sql);
// 	var_dump($goods_info);exit;
	$smarty->assign('goods_info',  $goods_info);
	$smarty->display('recommend_goods_list.htm');
}elseif($_REQUEST['act'] == 'add')
{
	$smarty->display('recommend_goods_add.htm');
}
elseif($_REQUEST['act'] == 'info')
{
	$goods_id = isset($_REQUEST['goods_id']) ? trim($_REQUEST['goods_id']) : '';
	if(!$goods_id)
		return false;
	$sql = "select r.`goods_id` as goods_id,g.`cat_id` as cat_id,g.goods_sn` as goods_sn,g.`goods_name` as goods_name,r.`remark` as recommended_mark,
	r.`recommended_img` as recommended_img,r.`sort` as sort,r.`description` as description from " . $ecs->table('goods') ." as g," . $ecs->table('goods_recommend') ." as r where g.`goods_id` = r.`goods_id`
	and r.`status` = '1' and r.`goods_id`='$goods_id' limit 1";
	
	$goods_info = $db->getRow($sql);
	$smarty->assign('goods_id',  $goods_info['goods_id']);
	$smarty->assign('sort',  $goods_info['sort']);
	$smarty->assign('description',  $goods_info['description']);
	$smarty->assign('goods_name',  $goods_info['goods_name']);
	$smarty->assign('recommended_mark',  $goods_info['recommended_mark']);
	$smarty->display('recommend_goods_info.htm');
}
elseif($_REQUEST['act'] == 'del')
{
	$goods_id = isset($_REQUEST['goods_id']) ? trim($_REQUEST['goods_id']) : '';
	$sql = "UPDATE " . $ecs->table('goods_recommend') . " SET status = '0' where goods_id = '$goods_id' limit 1";
	$db->query($sql);
	echo json_encode(array('Ret'=>1));
	
}elseif($_REQUEST['act'] == 'insert')
{
	$goods_id = isset($_POST['goods_id']) ? trim($_POST['goods_id']) : '';
	$subject_url = isset($_POST['subject_url']) ? trim($_POST['subject_url']) : '';
	$description = isset($_POST['description']) ? trim($_POST['description']) : '';
	$status = isset($_POST['status']) ? trim($_POST['status']) : '';
	$sort = isset($_POST['sort']) ? trim($_POST['sort']) : '';
	$goods_name = isset($_POST['goods_name']) ? trim($_POST['goods_name']) : '';
	$recommended_mark = isset($_POST['recommended_mark']) ? trim($_POST['recommended_mark']) : '';
	$is_insert = isset($_POST['is_insert']) ? trim($_POST['is_insert']) : '';
	if(!$goods_id || !$goods_name)
	{
		return false;
	}
	/* 检查图片：如果有错误，检查尺寸是否超过最大值；否则，检查文件类型 */
	if (isset($_FILES['recommend_img']['error'])) // php 4.2 版本才支持 error
	{
		// 最大上传文件大小
		$php_maxsize = ini_get('upload_max_filesize');
		$htm_maxsize = '2M';
	
		// 商品图片
		if ($_FILES['recommend_img']['error'] == 0)
		{
			if (!$image->check_img_type($_FILES['recommend_img']['type']))
			{
				sys_msg($_LANG['invalid_goods_img'], 1, array(), false);
			}
		}
		elseif ($_FILES['recommend_img']['error'] == 1)
		{
			sys_msg(sprintf($_LANG['goods_img_too_big'], $php_maxsize), 1, array(), false);
		}
		elseif ($_FILES['recommend_img']['error'] == 2)
		{
			sys_msg(sprintf($_LANG['goods_img_too_big'], $htm_maxsize), 1, array(), false);
		}
	}else
	{
		// 商品图片
		if ($_FILES['recommend_img']['tmp_name'] != 'none')
		{
			if (!$image->check_img_type($_FILES['recommend_img']['type']))
			{
		
				sys_msg($_LANG['invalid_goods_img'], 1, array(), false);
			}
		}
	}
	if (($_FILES['recommend_img']['tmp_name'] != '' && $_FILES['recommend_img']['tmp_name'] != 'none'))
	{
		$original_img   = $image->upload_image($_FILES['recommend_img']); // 原始图片
		$original_img = reformat_image_name('goods', $goods_id.'_R', $original_img, 'source');
	}
	$link = array(array('href'=>'recommend_goods.php?act=list'));
	if($is_insert)
	{
		$sql = "INSERT INTO ". $ecs->table('goods_recommend') . " (`id` ,`goods_id` ,`subject_url` ,`recommended_img` ,`description` ,`remark` ,`sort` ,`status` )
				VALUES ('' , '$goods_id', '$subject_url', '$original_img', '$description', '$recommended_mark', '$sort', '$status')";
		
	}else
	{
		if($original_img)
		{
			$sql = "UPDATE " . $ecs->table('goods_recommend') . " SET `status`='$status',`description` = '$description',`subject_url` = '$subject_url',recommended_img = '$original_img',sort = '$sort',remark = '$recommended_mark' where goods_id = '$goods_id' limit 1";
		}else {
			
			$sql = "UPDATE " . $ecs->table('goods_recommend') . " SET `status`='$status',`description` = '$description',`subject_url` = '$subject_url',sort = '$sort',remark = '$recommended_mark' where goods_id = '$goods_id' limit 1";
		}
		
	}
	$sql = "UPDATE " . $ecs->table('goods') . " SET recommended_img = '$original_img',is_recommend = '1',recommended_mark = '$recommended_mark' where goods_id = '$goods_id' limit 1";
	$db->query($sql);
	sys_msg($is_insert ? '添加推荐成功' : '更新推荐成功', 0, $link);
}
?>