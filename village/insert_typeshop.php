<?php  ob_start();
    include 'database/db_tools.php';
	include 'connect.php';

	if(!empty($_POST['typeshop_id'])){

		$data['typeshop_name'] = $_POST['typeshop_name'];

		@$rsfix = $db->update('locality',$data,'typeshop_id',$_POST['typeshop_id']);

	}else{
		$target_dir = 'temp/';
			$target_file = $target_dir.basename($_FILES['typepic']['name']);
			$path = '../images/icons/';
			$target_dir_save = $path.basename($_FILES['typepic']['name']);
			move_uploaded_file($_FILES['typepic']['tmp_name'], $target_dir_save);

			@$rs = $db->insert('typeshop',array(
			'typeshop_name' => $_POST['typeshop_name'],
			'typeshop_pathpic' =>$target_dir_save
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
            @$link = "admin_index.php?url=show_typeshop.php";
            header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
