<?php  ob_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    include 'database/db_tools.php';
	include 'connect.php';

	if(!empty($_POST['user_id'])){
        $data['member_permition'] = $_POST['user_permition'];

		$rsfix = $db->update('member',$data,'member_id',$_POST['user_id']);

	}else{
        	echo "ไม่มี";

	    }


	if($rsfix){
            echo "<div class='statusok'>ปรับปรุงสถานะสำเร็จ</div>";
            $link = "admin_index.php?url=show_user.php";
        }

            header( "Refresh: 2; $link" );

ob_end_flush();
?>
