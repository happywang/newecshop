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
	$v['price'] = trim($v['price']);
	$price_array = explode('$', $v['price']);
	$temp_price = explode('<', $price_array[1]);
	$price = $temp_price[0];
	$goods_name = $v['goods_name'];
	$goods_name = str_replace("'", "", $goods_name);
	$goods_name = str_replace('"', "", $goods_name);
	$goods_desc = str_replace("'", "", $v['dc']);
	$goods_desc = str_replace('"', "", $goods_desc);
	$goods_mark = $v['img'];

/* 检查货号是否重复 */
/* 插入还是更新的标识 */
$is_insert =  true;

/* 处理商品图片 */
$goods_img        = '';  // 初始化商品图片
$goods_thumb      = '';  // 初始化商品缩略图
$original_img     = '';  // 初始化原始图片
$old_original_img = '';  // 初始化原始图片旧图

// 如果上传了商品图片，相应处理
	

	$original_img   = $v['description'];//$image->upload_image($_FILES['goods_img']); // 原始图片

	$goods_img      = $original_img;   // 商品图片

	/* 复制一份相册图片 */
	/* 添加判断是否自动生成相册图片 */
	$img        = $original_img;   // 相册图片
	$pos        = strpos(basename($img), '.');
	$newname    = dirname($img) . '/' . $image->random_filename() . substr(basename($img), $pos);
	copy('../' . $img, '../' . $newname);
	$img        = $newname;

	$gallery_img    = $img;
	$gallery_thumb  = $img;

	// 如果系统支持GD，缩放商品图片，且给商品图片和相册图片加水印

	// 如果设置大小不为0，缩放图片
	$goods_img = $image->make_thumb('../'. $goods_img , $GLOBALS['_CFG']['image_width'],  $GLOBALS['_CFG']['image_height']);

	/* 添加判断是否自动生成相册图片 */
	$newname    = dirname($img) . '/' . $image->random_filename() . substr(basename($img), $pos);
	if (!copy('../' . $img, '../' . $newname))
	{
		//sys_msg('fail to copy file: ' . realpath('../' . $img), 1, array(), false);
	}
	$gallery_img        = $newname;


	// 相册缩略图
	/* 添加判断是否自动生成相册图片 */
	$gallery_thumb = $image->make_thumb('../' . $img, $GLOBALS['_CFG']['thumb_width'],  $GLOBALS['_CFG']['thumb_height']);


// 未上传，如果自动选择生成，且上传了商品图片，生成所略图
	// 如果设置缩略图大小不为0，生成缩略图
	if ($_CFG['thumb_width'] != 0 || $_CFG['thumb_height'] != 0)
	{
		$goods_thumb = $image->make_thumb('../' . $original_img, $GLOBALS['_CFG']['thumb_width'],  $GLOBALS['_CFG']['thumb_height']);
	}
	else
	{
		$goods_thumb = $original_img;
	}

/* 如果没有输入商品货号则自动生成一个商品货号 */
$goods_sn   = date("YmdHis").rand(100,999)."_c";//$_POST['goods_sn'];

/* 处理商品数据 */
$shop_price = $price * 6.2;
$market_price = $shop_price * 1.2;
$promote_price = 0;
$is_promote = 1;
$promote_start_date =  0;
$promote_end_date =  0;
$goods_weight = 0;
$is_best =  0;
$is_new = 1;
$is_hot = 1;
$is_on_sale =  1 ;
$is_alone_sale =  1 ;
$is_shipping =  1 ;
$goods_number =1000;
$warn_number = 1000;
$goods_type =  0;
$give_integral =  '-1';
$rank_integral = '-1';
$suppliers_id = '1';

$goods_name_style = 0;

$catgory_id = 58;
$brand_id = 1;

$goods_thumb =  $goods_img;
$goods_thumb = $goods_img;
$source_price = $v['price'] / 6;

/* 入库 */
		$sql = "INSERT INTO " . $ecs->table('goods') . " (goods_name, goods_name_style, goods_sn, " .
				"cat_id, brand_id, shop_price, market_price, is_promote, promote_price, " .
				"promote_start_date, promote_end_date, goods_img, goods_thumb, original_img, keywords, goods_brief, " .
				"seller_note, goods_weight, goods_number, warn_number, integral, give_integral, is_best, is_new, is_hot, " .
				"is_on_sale, is_alone_sale, is_shipping, goods_desc, add_time, last_update, goods_type, rank_integral, suppliers_id,source_price,goods_mark)" .
				"VALUES ('$goods_name', '$goods_name_style', '$goods_sn', '$catgory_id', " .
				"'$brand_id', '$shop_price', '$market_price', '$is_promote','$promote_price', ".
				"'$promote_start_date', '$promote_end_date', '$goods_img', '$goods_img', '$original_img', ".
				"'', '', '', '$goods_weight', '$goods_number',".
				" '$warn_number', '', '$give_integral', '$is_best', '$is_new', '$is_hot', '$is_on_sale', '$is_alone_sale', $is_shipping, ".
				" '$goods_desc', '" . gmtime() . "', '". gmtime() ."', '$goods_type', '$rank_integral', '$suppliers_id','$source_price','$goods_mark')";
$db->query($sql);

/* 商品编号 */
$goods_id =  $db->insert_id();
/* 重新格式化图片名称 */
$original_img = reformat_image_name('goods', $goods_id, $original_img, 'source');
$goods_img = reformat_image_name('goods', $goods_id, $goods_img, 'goods');
$goods_thumb = reformat_image_name('goods_thumb', $goods_id, $goods_thumb, 'thumb');
if ($goods_img !== false)
{
	$db->query("UPDATE " . $ecs->table('goods') . " SET goods_img = '$goods_img' WHERE goods_id='$goods_id'");
}

if ($original_img !== false)
{
	$db->query("UPDATE " . $ecs->table('goods') . " SET original_img = '$original_img' WHERE goods_id='$goods_id'");
}

	$db->query("UPDATE " . $ecs->table('goods') . " SET goods_thumb = '$goods_img' WHERE goods_id='$goods_id'");

/* 如果有图片，把商品图片加入图片相册 */
if (isset($img))
{
	/* 重新格式化图片名称 */
	$img = reformat_image_name('gallery', $goods_id, $img, 'source');
	$gallery_img = reformat_image_name('gallery', $goods_id, $gallery_img, 'goods');

	$gallery_thumb = reformat_image_name('gallery_thumb', $goods_id, $gallery_thumb, 'thumb');
	$sql = "INSERT INTO " . $ecs->table('goods_gallery') . " (goods_id, img_url, img_desc, thumb_url, img_original) " .
			"VALUES ('$goods_id', '$gallery_img', '', '$gallery_thumb', '$img')";
	$db->query($sql);
}
}
/* 处理相册图片 */
//handle_gallery_image($goods_id,$goods_sn, $_FILES['img_url'], "", $_POST['img_file']);

?>