<?php
$inactive = 1800;
	if( !isset($_SESSION['timeout']) )
	$_SESSION['timeout'] = time() + $inactive;
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive){
		session_destroy();
			header('location: ../login.php');
	}
	$_SESSION['timeout']=time();

?>
