<?php  ob_start();
    include 'database/db_tools.php';
	include '../connect.php';

	if(!empty($_POST['country_id'])){

		$data['locality_name'] = $_POST['locality_name'];

		$rsfix = $db->update('locality',$data,'locality_id',$_POST['locality_id']);

	}else{
	$rs = $db->insert('locality',array(
	'locality_name' => $_POST['locality_name']
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
            $link = "admin_index.php?url=show_subdistrict.php";
            header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
