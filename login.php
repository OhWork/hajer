<!doctype html>
<html lang="en">
  <head>
	  <?php //แก้ content เป็น client id ที่ config ไว้กับ google?>
	<meta name="google-signin-client_id" content="756684911740-hi7q1a4ubgiu2i8jkc1tmgj3o7j0g032.apps.googleusercontent.com">
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
<script>
// Start Facebook Login Api
	var bFbStatus = false;
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      // ล็อคอินผ่านจะให้ไปดึง function testapi สามารถแก้ได้จะให้ทำอะไร
	      testAPI();
	    } else {
	      // The person is not logged into your app or we are unable to tell.
	      // หากล็อคอินไม่ผ่านจะให้
	    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
	if(bFbStatus == false){
	     FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	     });
    }
	bFbStatus = true;
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '236799303381057',
      cookie     : true,  // enable cookies to allow the server to access
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.2' // The Graph API version to use for the call
    });
  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    // /me คือตัวเรา Fields คือ ค่าที่ต้องการจาก Facebook
    FB.api('/me', {fields: 'name,email,gender'}, function(response) {
      console.log('Successful login for: ' + response.name);
      console.log(response);
    });
  }
// End Facebook Login Api

// Start Google Login Api
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
// End Google Login Api
 </script>
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
					<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
				</div>
				<div class="col-12 mt-3">
					<div class="g-signin2" data-onsuccess="onSignIn"></div>
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
