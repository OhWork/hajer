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
		  <?php
		  include_once 'inc_js.php';
		  ?>
<?php
	include_once 'village/database/db_tools.php';
	include_once 'village/connect.php';
	$db->findByAttributes('member',array(
		'member_username =' => $_POST['member_username'],
		'member_password =' => $_POST['member_password']
		));
	$rs = $db->executeRow();
	if($rs){
    	$_SESSION['member_id'] = $rs['member_id'];
		$_SESSION['member_username'] = $rs['member_username'];
		$_SESSION['member_password'] = $rs['member_password'];
		$_SESSION['member_permition'] = $rs['member_permition'];
		if($_SESSION['member_permition'] == 1){
		?>
		<div class="modal" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal body -->
		      <div class="modal-body">
		        ยินดีต้อนรับเข้าสู่ระบบผู้ดูแล
		      </div>
		       <div class="modal-footer">
			       <div id="showcountdown"></div>
			       <a href="village/admin_index.php"><button type="button" class="btn btn-primary">Ok</button></a>
		       </div>
		    </div>
		  </div>
		</div>
		<script>


			$("#myModal").modal({backdrop: 'static', keyboard: false});

			setTimeout(function(){
				window.location.href = 'village/admin_index.php';
			}, 5000);
			var timeLeft = 4;
			var elem = document.getElementById('showcountdown');
			var timerId = setInterval(countdown, 1000);

			function countdown() {
			    if (timeLeft == -1) {
			        clearTimeout(timerId);
			    } else {
			        elem.innerHTML = timeLeft + ' seconds remaining';
			        timeLeft--;
			    }
			}
		</script>
		<?php
		}else{
		?>
		<div class="modal" id="myModal2">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal body -->
		      <div class="modal-body">
		        ยินดีต้อนรับเข้าสู่ระบบผู้ใช้
		      </div>
		       <div class="modal-footer">
			       <div id="showcountdown"></div>
			       <a href="index.php"><button type="button" class="btn btn-primary">Ok</button></a>
		       </div>
		    </div>
		  </div>
		</div>
		<script>


			$("#myModal2").modal({backdrop: 'static', keyboard: false});

			setTimeout(function(){
				window.location.href = 'index.php';
			}, 5000);
			var timeLeft = 4;
			var elem = document.getElementById('showcountdown');
			var timerId = setInterval(countdown, 1000);

			function countdown() {
			    if (timeLeft == -1) {
			        clearTimeout(timerId);
			    } else {
			        elem.innerHTML = timeLeft + ' seconds remaining';
			        timeLeft--;
			    }
			}
			</script>
		<?php
		}
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
			window.location.href = 'login.php';
		</script>
		<?php
		//header('location: admin_index.php');
		$login_confirm = 0;
		echo "<div class='loginwrong'>ไอดีหรือรหัสผิดพลาด กรุณาลองใหม่</div>";
	}

?>
</html>
