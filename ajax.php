<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

include('includes/cls_json.php');

$json   = new JSON;
$res    = array('err_msg' => '', 'result' => '');
if (!empty($_REQUEST['act']) && $_REQUEST['act'] == 'subscrib')
{
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	do {
		if(!$email)
		{
			$res['err_msg'] = "email is empty!";
			$res['err_no']  = -1;
			break;
		}
		if(checkSubscrib($email) > 0)
		{
			$res['err_msg'] = "email is been subscribed!";
			$res['err_no']  = 0;
			break;
		}
		if(subscrib($email))
		{
			$res['err_msg'] = "email subscrib sucess!";
			$res['err_no']  = 2;
			break;
		}
	}while (0);
	die($json->encode($res));
}

function checkSubscrib($email)
{
	if(!$email) return false;
	$sql = "select `id` from " . $GLOBALS['ecs']->table("subscrib") . " where `email`='".$email."' limit 1";
	return $GLOBALS['db']->getOne($sql);
}

function subscrib($email)
{
	if(!$email) return false;
	$ip = real_ip();
	$date = date("Y-m-d H:i:s");
	$sql = "insert into " . $GLOBALS['ecs']->table("subscrib") . " (`email`,`ip`,`stat`,`sub_date`) values ('".$email."','".$ip."','0','".$date."')";
	return $GLOBALS['db']->query($sql);
}
