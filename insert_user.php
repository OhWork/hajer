<?php
	include 'village/database/db_tools.php';
	include 'village/connect.php';
	if(@$_POST['typeuser'] == 'googlelogin'){
		print_r($_POST);

	}
	else{
		if(@$_POST['regshop'] == 1){
			$rsshop = $db->insert('member',array(
			'member_username' => $_POST['member_username'],
			'member_password' => $_POST['member_password'],
			'member_permition'=> 2,
			'member_regshop'=> $_POST['regshop']
			));
			if(@$rsshop){
				$r = $db->findAllDESC('member','member_id')->executeAssoc();
				$id = $r['member_id'];
				$link = "regshop.php?id=$id";
		    	header( "Refresh: 5; $link" );
	    	}

		}else{
			@$rs = $db->insert('member',array(
			'member_username' => $_POST['member_username'],
			'member_password' => $_POST['member_password'],
			'member_permition'=> 2
			));
			if(@$rs){
	    	    echo "<div class='statusok'>เพิ่มสำเร็จ</div>";
	    	     $link = "index.php";
	             header( "Refresh: 2; $link" );
	    	}
		}
	}
?>
