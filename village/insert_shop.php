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
		$target_dir_save = '../images/shop/'.$img_new_name;
		move_uploaded_file($_FILES['shop_piccover']['tmp_name'], $target_dir_save);

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
			if(!empty($rs['shopimg_id'])){
				$target_dir = 'temp/';
				$target_file = $target_dir.basename($_FILES['shop_pic']['name']);
				$path = '../images/shop/';
				$target_dir_save = $path.basename($_FILES['shop_pic']['name']);
				move_uploaded_file($_FILES['shop_pic']['tmp_name'], $target_dir_save);
				$ImgCompressor = new ImgCompressor($setting);
				$result = $ImgCompressor->run($target_dir_save,'png', 9);
				$nameimgnew = $result['data']['compressed']['name'];
				$datapic['shopimg_name'] = basename($_FILES['shop_pic']['name']);
				$rseditpic = $db->update2con('shopimg',$datapic,'shopimg_position',1,'shopimg_shop_id',$_POST['shop_id']);
			}
			if(!empty($rs2['shopimg_id'])){
					$target_dir = 'temp/';
					$target_file = $target_dir.basename($_FILES['shop_pic2']['name']);
					$path = '../images/shop/';
					$target_dir_save2 = $path.basename($_FILES['shop_pic2']['name']);
					move_uploaded_file($_FILES['shop_pic2']['tmp_name'], $target_dir_save2);
					$ImgCompressor = new ImgCompressor($setting);
					$result = $ImgCompressor->run($target_dir_save2,'png', 9);
					$nameimgnew = $result['data']['compressed']['name'];

					$datapic2['shopimg_name'] = basename($_FILES['shop_pic2']['name']);
					$rseditpic2 = $db->update2con('shopimg',$datapic2,'shopimg_position',2,'shopimg_shop_id',$_POST['shop_id']);

			}
			if(!empty($rs3['shopimg_id'])){
					$target_dir = 'temp/';
					$target_file = $target_dir.basename($_FILES['shop_pic3']['name']);
					$path = '../images/shop/';
					$target_dir_save3 = $path.basename($_FILES['shop_pic3']['name']);
					move_uploaded_file($_FILES['shop_pic3']['tmp_name'], $target_dir_save3);
					$ImgCompressor = new ImgCompressor($setting);
					$result = $ImgCompressor->run($target_dir_save3,'png', 9);
					$nameimgnew = $result['data']['compressed']['name'];
					$datapic3['shopimg_name'] = basename($_FILES['shop_pic3']['name']);
					$rseditpic3 = $db->update2con('shopimg',$datapic3,'shopimg_position',3,'shopimg_shop_id',$_POST['shop_id']);
			}
		}

	}else{
		$target_dir = '../images/temp/';
		$target_file = $target_dir.basename($_FILES['shop_piccover']['name']);
		$img_new_name = basename($_FILES['shop_piccover']['name']);
		$target_dir_save = '../images/shop/'.$img_new_name;
		move_uploaded_file($_FILES['shop_piccover']['tmp_name'], $target_dir_save);

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
	if(@$rs){
		$rsselectid = $db->findAllDESC('shop','shop_id')->executeAssoc();
		if(!empty($_FILES['shop_pic'])){
				$image = basename($_FILES['shop_pic']['name']);
				$target_dir = 'temp/';
				$target_file = $target_dir.$image;
				$path = '../images/shop/';
				$target_dir_save = $path.$image; // example level = 2 same quality 80%, level = 7 same quality 30% etc
				move_uploaded_file($_FILES['shop_pic']['tmp_name'], $target_dir_save);
				$ImgCompressor = new ImgCompressor($setting);
				$result = $ImgCompressor->run($target_dir_save,'png', 9);
				$nameimgnew = $result['data']['compressed']['name'];
					$rspic = $db->insert('shopimg',array(
						'shopimg_name' => $nameimgnew,
						'shopimg_position' => 1,
						'shopimg_shop_id' => $rsselectid['shop_id']
					));
			}
			if(!empty($_FILES['shop_pic2'])){
					$target_dir = 'temp/';
					$target_file = $target_dir.basename($_FILES['shop_pic2']['name']);
					$path = '../images/shop/';
					$target_dir_save2 = $path.basename($_FILES['shop_pic2']['name']);
					move_uploaded_file($_FILES['shop_pic2']['tmp_name'], $target_dir_save2);
					$ImgCompressor = new ImgCompressor($setting);
					$result = $ImgCompressor->run($target_dir_save2,'png', 9);
					$nameimgnew = $result['data']['compressed']['name'];
						$rspic2 = $db->insert('shopimg',array(
							'shopimg_name' => basename($_FILES['shop_pic2']['name']),
							'shopimg_position' => 2,
							'shopimg_shop_id' => $rsselectid['shop_id']
						));
			}
			if(!empty($_FILES['shop_pic3'])){
					$target_dir = 'temp/';
					$target_file = $target_dir.basename($_FILES['shop_pic3']['name']);
					$path = '../images/shop/';
					$target_dir_save3 = $path.basename($_FILES['shop_pic3']['name']);
					move_uploaded_file($_FILES['shop_pic3']['tmp_name'], $target_dir_save3);
					$ImgCompressor = new ImgCompressor($setting);
					$result = $ImgCompressor->run($target_dir_save3,'png', 9);
					$nameimgnew = $result['data']['compressed']['name'];
						$rspic3 = $db->insert('shopimg',array(
							'shopimg_name' => basename($_FILES['shop_pic3']['name']),
							'shopimg_position' => 3,
							'shopimg_shop_id' => $rsselectid['shop_id']
						));
			}
		}
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
            header( "Refresh: 2; $link" );
}
ob_end_flush();
?>
