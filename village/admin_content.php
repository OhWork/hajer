<!-- <div class="content"> -->


<?php
	$url = $_GET['url'];

	if(empty($_SESSION['member_username'])){
		include_once 'login.php';
	}
	else{
	if(!empty($url)){
		include_once $url;
	}
	}
//     include_once 'admin_mainmenu.php';

?>
<!-- </div> -->
