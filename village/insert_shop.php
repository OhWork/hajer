<?php  ob_start();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="../CSS/bootstrap.css">
        <link rel="stylesheet" href="../CSS/main.css">
	</head>
<?php
    include 'database/db_tools.php';
	include 'connect.php';

	if(!empty($_POST['shop_id'])){

		$data['locality_name'] = $_POST['locality_name'];

		$rsfix = $db->update('locality',$data,'locality_id',$_POST['locality_id']);

	}else{
	$rs = $db->insert('shop',array(
	'shop_name' => $_POST['shop_name'],
	'shop_detail' => $_POST['shop_detail'],
	'shop_oc' => $_POST['shop_oc'],
	'shop_rateprice' => $_POST['shop_rate'],
	'shop_locationx' => $_POST['lat'],
	'shop_locationy' => $_POST['lng'],
	'chop_place' => $_POST['shop_place'],
	'member_member_id' => 1
	));
/*
                //Log
		if(getenv(HTTP_X_FORWARDED_FOR)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // IP proxy
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
            $ipshow = gethostbyaddr($ip);
            $log = $db->insert('log',array(
        	'log_system' => 'insert_headncf',
        	'log_action' => 'Edit',
        	'log_action_date' => date("Y-m-d H:i"),
        	'log_action_by' => $_POST['log_user'],
        	'log_ip' => $ipshow
        	));
*/
	}

	if($rs || $rsfix){
    	if($rs){
    	    echo "<div class='statusok'>เพิ่มสำเร็จ</div>";
    	}else if($rsfix){
            echo "<div class='statusok'>แก้ไขสำเร็จ</div>";
        }
            $link = "add_shop.php";
            header( "Refresh: 2; $link" );
}
?>
</html>
<?php
ob_end_flush();
?>
