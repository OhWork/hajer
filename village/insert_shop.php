<?php
	ob_start();
    include 'database/db_tools.php';
	include 'connect.php';
	include_once('lib/ImgCompressor.class.php');
	$setting = array(
		'directory' => '../images/shop/compressed', // directory file compressed output
		'file_type' => array( // file format allowed
						'image/jpeg',
						'image/png',
						'image/gif'
		)
	);
		if(!empty($_POST['shop_id'])){
		$target_dir = '../images/temp/';
		$target_file = $target_dir.basename($_FILES['shop_piccover']['name']);
		$img_new_name = basename($_FILES['shop_piccover']['name']);
		$target_dir_savec = '../images/shop/'.$img_new_name;
		move_uploaded_file($_FILES['shop_piccover']['tmp_name'], $target_dir_savec);
		$data['shop_name'] = $_POST['shop_name'];
		$data['shop_detail'] = $_POST['shop_detail'];
		$data['shop_open'] = $_POST['shop_open'];
		$data['shop_close'] = $_POST['shop_close'];
		$data['shop_ratepricemin'] = $_POST['shop_ratemin'];
		$data['shop_ratepricemax'] = $_POST['shop_ratemax'];
		$data['shop_locationx'] = $_POST['lat'];
		$data['shop_locationy'] = $_POST['lng'];
		$data['shop_park'] = $_POST['shopdetail_park'];
		$data['shop_credit'] = $_POST['shopdetail_credit'];
		$data['shop_delivery'] = $_POST['shopdetail_delivery'];
		$data['shop_wifi'] = $_POST['shopdetail_wifi'];
		$data['shop_post'] = $_POST['shopdetail_post'];
		$data['shop_pic'] = $img_new_name;
		@$rsfix = $db->update('shop',$data,'shop_id',$_POST['shop_id']);
		if(@$rsfix){
			$rs = $db-> findByPK12('shopimg','shopimg_position',1,'shopimg_shop_id',$_POST['shop_id'])->executeAssoc();
			$rs2 = $db-> findByPK12('shopimg','shopimg_position',2,'shopimg_shop_id',$_POST['shop_id'])->executeAssoc();
			$rs3 = $db-> findByPK12('shopimg','shopimg_position',3,'shopimg_shop_id',$_POST['shop_id'])->executeAssoc();
		}

	}else{
		$target_dir = '../images/temp/';
		$target_file = $target_dir.basename($_FILES['shop_piccover']['name']);
		$img_new_name = basename($_FILES['shop_piccover']['name']);
		$target_dir_savec = '../images/shop/'.$img_new_name;
		move_uploaded_file($_FILES['shop_piccover']['tmp_name'], $target_dir_savec);
		@$rs = $db->insert('shop',array(
			'shop_name' => $_POST['shop_name'],
			'shop_detail' => $_POST['shop_detail'],
			'shop_open' => $_POST['shop_open'],
			'shop_close' => $_POST['shop_close'],
			'shop_ratepricemin' => $_POST['shop_ratemin'],
			'shop_ratepricemax' => $_POST['shop_ratemax'],
			'shop_locationx' => $_POST['lat'],
			'shop_locationy' => $_POST['lng'],
			'shop_park' => $_POST['shopdetail_park'],
			'shop_credit' => $_POST['shopdetail_credit'],
			'shop_delivery' => $_POST['shopdetail_delivery'],
			'shop_wifi' => $_POST['shopdetail_wifi'],
			'shop_post' => $_POST['shopdetail_post'],
			'shop_pic' => $img_new_name,
			'member_member_id' => $_POST['mem_id'],
			'typeshop_typeshop_id' => $_POST['catshop']
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
        	}
*/
	if(@$rs || @$rsfix){
	    	if(@$rs){
// 		    	if(@$rspic && @$rspic2 && $rspic3){
	    	    	echo "<div class='statusok'>เพิ่มสำเร็จ</div>";
// 	    	    }
	    	}else if(@$rsfix){
// 		    	 	if(@$rseditpic && @$rseditpic2 && $rseditpic3){
	            echo "<div class='statusok'>แก้ไขสำเร็จ</div>";
// 	            }
	    }
            $link = "admin_index.php?url=show_shop.php";
//             header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
