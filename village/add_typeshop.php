 <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="../CSS/bootstrap.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
 </head>
 <?php
	 include 'inc_js.php';
     include 'form/main_form.php';
     include 'form/gridview.php';
	 include_once 'database/db_tools.php';
     include_once 'connect.php';
     error_reporting(0);
     $id = $_GET['id'];
	$form = new form();
	$typeshop = new textfield('typeshop_name','','form-control','','');
	$lbtypeshop = new label('ประเภทร้านค้า: ');
	$button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
?>
<div class='col-md-6'>
<?php echo $form->open('form_reg','frmMain','','insert_typeshop.php',''); ?>
						<div class='row'>
							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbtypeshop; ?></div>
									<div class='col-md-8'><?php echo $typeshop; ?></div>
								</div>
							</div>
						</div>
							<div class='col-md-12'>
								<div class='row'>
									<div class='col-md-8'></div>
									<div class='col-md-2'>
										<?php echo $button; ?>
									</div>
									<div class='col-md-2'>
										<button type="button" class="btn btn-danger col-md-12" data-dismiss="modal">ยกเลิก</button>
									</div>
								</div>
							</div>
						<input type="hidden" value="<?php echo $_GET['id'];?>">
</div>