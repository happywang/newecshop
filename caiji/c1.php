<?php 
define('IN_ECS', true);

require('../includes/init.php');
include_once('../includes/cls_caiji.php');
include_once('../includes/cls_dlimg.php');

// echo file_get_html('http://www.google.com/')->plaintext;

$html2 = file_get_html("http://localhost/ecshop/caiji/tmp/health-beauty.html");
$i=0;
foreach($html2->find('a') as $el)
{
	$href = $el->href;
	if(strpos($href, 'health-beauty'))
	{
		if(substr($href, -5,5) == '.html')
		{
			if($el->title)
			{
// 				echo $href."<br>";
// 				echo $el->title."<br>";
				$i++;
				$sql = "insert into  " . $ecs->table("test") . " (goods_name,img,price,description,soure_img,dc) value ('".$el->title."','".$href."','','','','') ";
				$db->query($sql, true);
			}
			
		}
	}
}
echo $i;
exit;

?>