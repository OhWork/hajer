<!-- <div class="content"> -->


<?php
	$url = $_GET['url'];

	if(empty($_SESSION['member_username'])){
		include_once 'login.php';
		
	if(!empty($url)){
		include_once $url;
}else{
<<<<<<< HEAD:village/content.php
    include_once 'index.php';
}
=======
//     include_once 'admin_mainmenu.php';
>>>>>>> 717a7977bb915b375dc10c2c605b4dc8538247ee:village/admin_content.php
}

?>
<!-- </div> -->
