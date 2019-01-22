<?php  ob_start();
    include 'village/database/db_tools.php';
	include 'village/connect.php';
	if($_POST){
		print_r($_POST);
	$target_dir = 'images/temp/';
	$target_file = $target_dir.basename($_FILES['shop_pic']['name']);
	$img_new_name = basename($_FILES['shop_pic']['name']);
	$target_dir_save = 'images/shop/'.$img_new_name;
	move_uploaded_file($_FILES['shop_pic']['tmp_name'], $target_dir_save);


	@$rs = $db->insert('shop',array(
	'shop_name' => $_POST['shop_name'],
	'shop_detail' => $_POST['shop_detail'],
	'shop_open' => $_POST['shop_open'],
	'shop_close' => $_POST['shop_close'],
	'shop_ratepricemin' => $_POST['shop_ratemin'],
	'shop_ratepricemax' => $_POST['shop_ratemax'],
	'shop_locationx' => $_POST['lat'],
	'shop_locationy' => $_POST['lng'],
	'shop_pic' => $img_new_name,
	'chop_place' => $_POST['shop_place'],
	'member_member_id' => $_POST['mem_id'],
	'typeshop_typeshop_id' => $_POST['catshop']
	));
	if(@$rs){
		$selectrs = $db->findAllDESC('shop','shop_id')->executeAssoc();
		@$rs = $db->insert('shopdetail',array(
			'shopdetail_park' => $_POST['shopdetail_park'],
			'shopdetail_credit' => $_POST['shopdetail_credit'],
			'shopdetail_delivery' => $_POST['shopdetail_delivery'],
			'shopdetail_wifi' => $_POST['shopdetail_wifi'],
			'shopdetail_thaipost' => $_POST['shopdetail_thaipost'],
			'shopdetail_debit' => $_POST['shopdetail_debit'],
			'shop_id' => $selectrs['shop_id']

		));
	}
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
    	}
            $link = "index.php";
            header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
