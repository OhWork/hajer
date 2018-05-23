 <?php
     error_reporting(0);
	$form = new form();
	$name = new textfield('name_th','','form-control','','');
	$lbname = new label('ชื่อจังหวัด: ');
	$id = $_GET['id'];
     $r = $db->findByPK('provinces','id',$id)->executeRow();
	$name->value = $r['name_in_thai'];
	$button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
?>
<div class='col-md-6'>
<?php echo $form->open('form_reg','frmMain','','insert_country.php',''); ?>
						<div class='row'>
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
