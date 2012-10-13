<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require('includes/lib_goods.php');
if($_REQUEST['act'] == 'upload')
{

	/* 检查权限 */
	admin_priv('goods_batch');
	
	/* 将文件按行读入数组，逐行进行解析 */
	$line_number = 0;
	$arr = array();
	$goods_list = array();
	//$field_list = array_keys($_LANG['upload_goods']); // 字段列表
	$field_list = array("country_en_name","country_code","country_name","ems_lifting_price","ems_heavy_price","ems_registration_fee","dhl_lifting_price","dhl_heavy_price","dhl_registration_fee","hk_registration_fee","Remarks");
	$data = file($_FILES['file']['tmp_name']);
	
	/**********************add by wanghl*********************************/
	/*******************************************************/
        foreach ($data AS $line)
        {
            // 跳过第一行
            if ($line_number == 0)
            {
                $line_number++;
                continue;
            }

            // 转换编码
            if (($_POST['charset'] != 'UTF8') && (strpos(strtolower(EC_CHARSET), 'utf') === 0))
            {
                $line = ecs_iconv($_POST['charset'], 'UTF8', $line);
            }

            // 初始化
            $arr    = array();
            $buff   = '';
            $quote  = 0;
            $len    = strlen($line);
            for ($i = 0; $i < $len; $i++)
            {
                $char = $line[$i];

                if ('\\' == $char)
                {
                    $i++;
                    $char = $line[$i];

                    switch ($char)
                    {
                        case '"':
                            $buff .= '"';
                            break;
                        case '\'':
                            $buff .= '\'';
                            break;
                        case ',';
                            $buff .= ',';
                            break;
                        default:
                            $buff .= '\\' . $char;
                            break;
                    }
                }
                elseif ('"' == $char)
                {
                    if (0 == $quote)
                    {
                        $quote++;
                    }
                    else
                    {
                        $quote = 0;
                    }
                }
                elseif (',' == $char)
                {
                    if (0 == $quote)
                    {
                        if (!isset($field_list[count($arr)]))
                        {
                            continue;
                        }
                        $field_name = $field_list[count($arr)];
                        $arr[$field_name] = trim($buff);
                        $buff = '';
                        $quote = 0;
                    }
                    else
                    {
                        $buff .= $char;
                    }
                }
                else
                {
                    $buff .= $char;
                }

                if ($i == $len - 1)
                {
                    if (!isset($field_list[count($arr)]))
                    {
                        continue;
                    }
                    $field_name = $field_list[count($arr)];
                    $arr[$field_name] = trim($buff);
                }
            }
            /* $arr['goods_sn'] = time().$_POST['cat'].rand(1000,9999);
            $arr['market_price'] = $arr['source_price']*6.1*$result;
            $arr['shop_price'] = $arr['source_price']*6.1*$result*0.7;
            $arr['goods_volume'] = $arr['goods_volume'];
            $arr['goods_size'] = $arr['goods_size'];
            $arr['goods_color'] = $arr['goods_color']; */
//             $goods_list[] = $arr;
			$sql = "INSERT INTO `ecs_shipping_country` (
`country_id` ,
`country_code` ,
`country_name` ,
`country_en_name` ,
`country_abb_name` ,
`country_zipcode` ,
`country_delta` ,
`ems_lifting_price` ,
`ems_heavy_price` ,
`ems_registration_fee` ,
`dhl_lifting_price` ,
`dhl_heavy_price` ,
`dhl_registration_fee` ,
`hk_registration_fee` ,
`Remarks` 
)
VALUES (
NULL , '{$arr['country_code']}', '{$arr['country_name']}', '{$arr['country_en_name']}', '', '', '', 
'{$arr['ems_lifting_price']}', '{$arr['ems_heavy_price']}', '{$arr['ems_registration_fee']}', '{$arr['dhl_lifting_price']}', 
'{$arr['dhl_heavy_price']}', '{$arr['dhl_registration_fee']}', '{$arr['hk_registration_fee']}', '')";
			$result = $db->query($sql);
        }
}
else {
	$smarty->display('test.htm');
}


?>