<?php
	session_start();
    include 'village/database/db_tools.php';
	include 'village/connect.php';

	$rate = $_POST['rating'];
	$shop_id = $_POST['shop_id'];
  	@$member_id = $_POST['member_id'];
	if(@$_SESSION['member_id'] != ''){
		@$rs = $db->insert('review',array(
			'review_rate' => $rate,
			'review_shop_id' => $shop_id,
			'member_member_id' => $member_id
		));
		if(@$rs){
			$rsselect= $db->specifytable("SUM(review_rate),COUNT(member_member_id)","review","review_shop_id = $shop_id")->executeAssoc();
			$rate = $rsselect['SUM(review_rate)'];
			$memberrate = $rsselect['COUNT(member_member_id)'];
			$avgrate = ($rate/$memberrate);
			if($avgrate < 1){
				echo 0;
			}
			else if($avgrate < 2){
				echo 1;
			}else if($avgrate < 3){
				echo 2;
			}else if($avgrate < 4){
				echo 3;
			}else if($avgrate < 5){
				echo 4;
			}else{
				echo 5;
			}
		}
	}else{
		echo "Nologin";
	}

?>
