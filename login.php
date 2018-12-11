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

    <title>เข้าสู่ระบบ</title>

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
	$text_user = new textfield('member_username','inputEmail','form-control','Email address');
	$text_pass = new pass('member_password','form-control','Password','inputPassword');
	$submit = new buttonok('Login','','btn btn-lg btn-primary btn-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','');
	echo $form->open('','','col-12','check_login.php','');
    ?>
<div class="col-12 text-center mb-4 lg2">
	<h1 class="h3 mb-3 font-weight-normal">เข้าสู่ระบบ</h1>
</div>
<div class="col-12">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="row">
				<div class="col-12 mt-5">
					<button class="btn btn-primary col-12 pt-3 pb-3"><span data-feather="facebook"></span>Sign in with Facebook</button>
				</div>
				<div class="col-12 mt-3">
					<button class="btn btn-danger col-12 pt-3 pb-3">Sing in with Google</button>
				</div>
				<div class="col-12 mt-3" align="center">
					<p>หาเจอจะไม่ทำการส่งข้อความ หรืออีเมลใดเพื่อเป็นการรบกวนสมาชิก</p>
				</div>
				<div class="col-12 mt-5">
					<div class="row">
						<div class="col-6" align="center">
							<a id="loginemail" href="#">เข้าสู่ระบบด้วยอีเมล</a>
						</div>
						<div class="col-6" align="center">
							<a href="register.php">สมัครสมาชิก</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3"></div>
	</div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detialhead">
        <h3 class="modal-title  font-weight-bold mr-3" id="exampleModalLabe">ล็อคอินเข้าสู่ระบบ</h3>
      </div>
<div class="col-12" style="border-right: 1px solid #039BE5;">
			<div class="form-label-group">
				<?php echo $text_user; ?>
				<label for="inputEmail">User</label>
			</div>
			<div class="form-label-group">
				<?php echo $text_pass; ?>
				<label for="inputPassword">Password</label>
			</div>
			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</div>
    </div>
  </div>
</div>

   <?php echo $form->close();?>
  </body>
</html>
<script>
	$('#loginemail').on('click', function () {
		console.log(1234);
		$('#Modal').modal('show');
	});
</script>
