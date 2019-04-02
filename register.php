<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <?php    include 'inc_js.php';
              include 'form/main_form.php';
              include 'form/gridview.php';
              include 'village/database/db_tools.php';
              include 'village/connect.php';
      ?>

    <title>สมัครสมาชิก</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/floating-labels.css">
    <link rel="stylesheet" href="CSS/sticky-footer.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="CSS/jquery-ui.css">
    <link rel="stylesheet" href="CSS/main.css">

  </head>

  <body>
   <?php
	$form = new form();
	$text_user = new textfield('member_username','inputUser','form-control','ชื่อผู้ใช้');
	$text_name = new textfield('member_name','inputName','form-control','ชื่อ-นามสกุล');
	$text_email = new textfield('member_email','inputemail','form-control','Email address');
	$text_pass = new pass('member_password','form-control','','inputPass');
	$text_passcon = new pass('member_passwordcon','form-control','','inputPasscon');
	$submit = new buttonok('Login','','btn btn-lg btn-primary btn-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','');
	echo $form->open('','','col-12','insert_user.php','');
    ?>
<div class="col-12 text-center mb-4 lg2">
	<h1><p class="text-danger">ยังไม่เปิดใช้งาน</p></h1>
<!-- 	<h1 class="h3 mb-3 font-weight-normal">สมัครสมาชิกกับหาเจอร์</h1> -->
</div>
<div class="col-12">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="row">
<!--
				<div class="form-label-group col-md-12">
					<?php echo $text_user; ?>
					<label for="inputUser">ชื่อผู้ใช้</label>
				</div>
				<div class="form-label-group col-md-12">
					<?php echo $text_name; ?>
					<label for="inputName">ชื่อ-นามสกุล</label>
				</div>
				<div class="form-label-group col-md-12">
					<?php echo $text_email; ?>
					<label for="inputemail">อีเมล</label>
				</div>
				<div class="form-label-group col-md-12">
					<?php echo $text_pass; ?>
					<label for="inputPass">รหัสผ่าน</label>
				</div>
				<div class="form-label-group col-md-12">
					<?php echo $text_passcon; ?>
					<label for="inputPasscon">ยืนยันรหัสผ่าน</label>
				</div>
				<div class="col-md-1">
					<input type="checkbox" name="regshop" id="regshop" value="1">
				</div>
				<div class="col-md-9">
					<label for="regshop">หากท่านต้องการสมัครสมาชิกในส่วนของร้านค้า</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">สมัครสมาชิก</button>
-->
			</div>
		</div>
		<div class="col-3"></div>
	</div>
</div>
   <?php echo $form->close();?>
  </body>
</html>
