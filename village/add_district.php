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
	$name = new textfield('district_name','','form-control','','');
	$lbname = new label('ชื่อเขต/อำเภอ: ');
	$button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
?>
<div class='col-md-6'>
<?php echo $form->open('form_reg','frmMain','','insert_district.php',''); ?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='row'>
									<div class="col-md-4" style="padding-right: 0;padding-left: 0;padding-top:7px;"><label>จังหวัด :</label></div>
									<div class='col-md-8 form-group has-feedback'>
                                    <select class='form-control css-require' id="amphures" name="name_provinces">
                                        <option selected value="">-----โปรดระบุ-----</option>
                							<?php
                								$rs = $db->orderASC('provinces','id')->execute();
                								while($objResult = mysqli_fetch_array($rs,MYSQLI_ASSOC))
                								{
                							?>
                								<option value="<?=$objResult["id"];?>"><?=$objResult["name_in_thai"];?></option>
                							<?php
												}
                								?>
        							</select>
									</div>
								</div>
							</div>
							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbname; ?></div>
									<div class='col-md-8'><?php echo $name; ?></div>
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
</form>
</div>
