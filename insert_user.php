<?php
	include 'village/database/db_tools.php';
	include 'village/connect.php';
	if(@$_POST['regshop'] == 1){
		$link = "regshop.php";
    	header( "Refresh: 2; $link" );

	}else{
		$rs = $db->insert('member',array(
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

?>
