<?php  ob_start();
    include 'database/db_tools.php';
	include '../connect.php';

	if(!empty($_POST['id'])){

		$data['name_th'] = $_POST['name_th'];
		$data['geography_id'] = $_POST['name_geo'];

		$rsfix = $db->update('provinces',$data,'id',$_POST['id']);

	}else{
	$rs = $db->insert('provinces',array(
	'name_th' => $_POST['name_th'],
	'geography_id' => $_POST['name_geo']

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
            $link = "admin_index.php?url=show_country.php";
            header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
