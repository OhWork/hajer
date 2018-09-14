<?php  ob_start();
    include 'database/db_tools.php';
	include 'connect.php';

	if(!empty($_POST['subdistricts_id'])){

		$data['name_in_thai'] = $_POST['subdistricts_name'];
		$data['name_in_english'] = $_POST['subdistricts_nameeng'];
		$data['latitude'] = $_POST['subdistricts_lat'];
		$data['longitude'] = $_POST['subdistricts_lng'];
		$data['district_id'] = $_POST['name_district'];

		$rsfix = $db->update('subdistricts',$data,'id',$_POST['subdistricts_id']);

	}else{
	$rs = $db->insert('subdistricts',array(
	'name_in_thai' => $_POST['subdistricts_name'],
	'name_in_english' => $_POST['subdistricts_nameeng'],
	'latitude' => $_POST['subdistricts_lat'],
	'longitude' => $_POST['subdistricts_lng'],
	'district_id' => $_POST['name_district']
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
            $link = "admin_index.php?url=show_subdistrict.php";
            header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
