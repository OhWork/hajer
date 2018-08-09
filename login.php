<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/main.css">

 </head>
 <?php
	$form = new form();
	$text_user = new textfield('member_username','','form-control','User');
	$text_pass = new pass('member_password','form-control','Password');
	$submit = new buttonok('Login','','btn btn-lg btn-primary btn-block','');
?>
	<?php echo $form->open('form-signin','','','check_login.php',''); ?>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"></div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4" style="border:solid 1px rgba(0,0,0,0.125);border-radius: 0.25rem;margin-top:50px;padding-top:15px;padding-bottom:15px;">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<h4 class='form-signin-heading'><center>Login</center></h2>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top:15px;"><?php echo $text_user ?></div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top:15px;"><?php echo $text_pass ?></div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top:15px;">
					<div class="row">
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3"></div>
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
						<?php echo $submit ?></div>
					</div>
				</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"></div>
	</div>
</div>
<?php
	echo $form->close();
?>
