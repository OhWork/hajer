<?php  ob_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    include 'database/db_tools.php';
	include 'connect.php';

	if(!empty($_POST['shop_id'])){
		print_r($_POST);
        $data['shop_status'] = $_POST['shop_enable'];

		$rsfix = $db->update('shop',$data,'shop_id',$_POST['shop_id']);

	}else{
        	echo "ไม่มี";

	    }


	if($rsfix){
            echo "<div class='statusok'>ปรับปรุงสถานะสำเร็จ</div>";
            $link = "admin_index.php?url=hrs_show_editcertificate.php";
        }

            header( "Refresh: 2; $link" );

ob_end_flush();
?>
