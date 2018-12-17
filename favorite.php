<?php

    include 'village/database/db_tools.php';
	include 'village/connect.php';

	$shop_id = $_POST['shop_id'];
  	$member_id = $_POST['member_id'];
	$rs = $db->findByPK12('favorite','favorite_shop_id',$shop_id,'favorite_member_id',$member_id)->executeAssoc();
	if($rs['favorite_id'] == ''){
		@$rs = $db->insert('favorite',array(
			'favorite_shop_id' => $shop_id,
			'favorite_member_id' => $member_id
		));
		if($rs){
			echo 'เพิ่ม';
		}
	}else{
		$rsdel = $db->delete2('favorite','favorite_shop_id',$shop_id,'favorite_member_id',$member_id);
		if($rsdel){
			echo "ลบ";
		}
	}
?>
