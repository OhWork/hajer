<?php
	session_start();
	ob_start();
// 	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Hajers</title>


         <?php
            include_once 'inc_js.php';
            include_once 'database/db_tools.php';
            include_once 'connect.php';
            include_once '../form/main_form.php';
            include_once '../form/main_change.php';
            include_once '../form/gridview.php';
//             include_once 'clearsession.php';
        ?>
         <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../CSS/bootstrap.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="../CSS/dashboard.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
        <link rel="stylesheet" href="../CSS/jquery.dataTables.css">
        <link rel="stylesheet" href="../CSS/jquery.mapify.css">
        <link rel="stylesheet" href="../CSS/main.css">
        </head>

<body>
    <?php include 'admin_menutop.php';?>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="row">
        <?php include 'admin_menu.php'; ?>
		<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
			<div class="row">
			<?php include 'admin_content.php';?>
			</div>
		</div>
      </div>
    </div>
    <script>
    feather.replace()
    </script>
</body>
</html>
