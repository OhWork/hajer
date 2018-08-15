<!-- <div class="content"> -->


<?php
	$url = $_GET['url'];

	if(empty($_SESSION['member_username'])){
		include_once 'login.php';
		}
	if(!empty($url)){
		include_once $url;
}else{
//     include_once 'admin_mainmenu.php';
}

?>
<!-- </div> -->
