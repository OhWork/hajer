<!DOCTYPE html>
<?php
	session_start();
	include_once 'inc_js.php';
    include_once 'village/database/db_tools.php';
    include_once 'village/connect.php';
    include_once 'form/main_form.php';
    include_once 'form/gridview.php';
    include_once 'clearsession.php';
    error_reporting(0);
 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <!-- You can use Open Graph tags to customize link previews.
	    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	  <meta property="og:url"           content="https://hajers.com/" />
	  <meta property="og:type"          content="website" />
	  <meta property="og:title"         content="เทสหัวข้อหน่อยจ้า" />
	  <meta property="og:description"   content="เทสรายละเอียด" />
	  <meta property="og:image"         content="images/shop/noiamge.png" />
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/animate.min.css">
        <link rel="stylesheet" href="CSS/select2.min.css">
		<link rel="stylesheet" href="CSS/main.css">
        <?php include_once 'config/gtag.php'; ?>
	</head>
	<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

    <body>
	<div style="margin-top:10%;margin-left:30%;">
		<img class="" style="margin-left:10%;" width="350px" height="300px" src="images/alert.png" />
		<h1 style="color:red;">oop!! sorry website unconstuction</h1>
	</div>
    </body>
</html>
 <script>
feather.replace();
$('#typeshop').select2({
	placeholder: "กรุณาประเภทร้านค้า",
	allowClear: true
});
  </script>
