<?php  ob_start();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="../CSS/bootstrap.css">
        <link rel="stylesheet" href="../CSS/main.css">
	</head>
<?php
    include 'database/db_tools.php';
	include '../connect.php';
	print_r($_POST);
	if(!empty($_POST['id'])){

		$data['name_th'] = $_POST['district_name'];
		$data['province_id'] = $_POST['name_amphures'];

		$rsfix = $db->update('amphures',$data,'id',$_POST['id']);

	}else{
	$rs = $db->insert('amphures',array(
	'name_th' => $_POST['district_name'],
	'province_id'=> $_POST['name_provinces']
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
            $link = "add_district.php";
            header( "Refresh: 2; $link" );
}
?>
</html>
<?php
ob_end_flush();
?>
