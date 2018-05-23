<?php
	session_start();
	ob_start();
	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/main.css">
          <title>ระบบintranet</title>
	</head>
<?php
	include_once 'database/db_tools.php';
	include_once 'connect.php';
	$db->findByAttributes('member',array(
		'member_username =' => $_POST['member_username'],
		'member_password =' => $_POST['member_password']
		));
	$rs = $db->executeRow();
	if($rs){
    	$_SESSION['member_id'] = $rs['member_id'];
		$_SESSION['member_username'] = $rs['member_username'];
		$_SESSION['member_password'] = $rs['member_password'];
		?>
		<script>
			alert('เข้าสู่ระบบได้เรียบร้อย');
			window.location.href = 'admin_index.php';
		</script>
		<?php
		//header('location: admin_index.php');
/*
		$log_user = $_SESSION['user_name']." ".$_SESSION['user_last'];
		 //Log
		if(getenv(HTTP_X_FORWARDED_FOR)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // IP proxy
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $ipshow = gethostbyaddr($ip);
        $log = $db->insert('log',array(
    	'log_system' => 'เข้าระบบ',
    	'log_action' => 'Login',
    	'log_action_date' => $date,
    	'log_action_by' => $log_user,
    	'log_ip' => $ipshow
    	));
*/
	}else{
		?>
		<script>
			alert('ไอดีหรือรหัสผิดพลาด กรุณาลองใหม่');
			window.location.href = 'index.php';
		</script>
		<?php
		//header('location: admin_index.php');
		$login_confirm = 0;
		echo "<div class='loginwrong'>ไอดีหรือรหัสผิดพลาด กรุณาลองใหม่</div>";
	}

?>
</html>
