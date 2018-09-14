<?php  ob_start();
	include 'database/db_tools.php';
	include 'connect.php';
	print_r($_POST);
	if(!empty($_POST['district_id'])){

		$data['name_in_thai'] = $_POST['district_name'];
		$data['name_in_english'] = $_POST['district_nameeng'];
		$data['province_id'] = $_POST['name_provinces'];

		$rsfix = $db->update('districts',$data,'id',$_POST['district_id']);

	}else{
	$rs = $db->insert('districts',array(
	'name_in_thai' => $_POST['district_name'],
	'name_in_english' => $_POST['district_nameeng'],
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

	if(@$rs || @$rsfix){
    	if(@$rs){
    	    echo "<div class='statusok'>เพิ่มสำเร็จ</div>";
    	}else if(@$rsfix){
            echo "<div class='statusok'>แก้ไขสำเร็จ</div>";
        }
            $link = "admin_index.php?url=show_district.php";
             header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
