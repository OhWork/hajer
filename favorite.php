<?php

    include 'village/database/db_tools.php';
	include 'village/connect.php';

	$shop_id = $_POST['shop_id'];
  	$member_id = $_POST['member_id'];
	$rs = $db->findByPK12('favorite','favorite_shop_id',$shop_id,'favorite_member_id',$member_id)->executeAssoc();
	if($rs['favorite_id'] == ''){
		$rsshowfav = $db->findCOUNTByPK('favorite','favorite_member_id',$member_id)->executeRow();
		if($rsshowfav['COUNT(*)'] < 10){
			@$rs = $db->insert('favorite',array(
				'favorite_shop_id' => $shop_id,
				'favorite_member_id' => $member_id
			));
			if($rs){
				echo 'เพิ่ม';
			}
		}
		else{
			echo "เกิน10";
		}
	}else{
		$rsdel = $db->delete2('favorite','favorite_shop_id',$shop_id,'favorite_member_id',$member_id);
		if($rsdel){
			echo "ลบ";
		}
	}
?>
