 <?php
     error_reporting(0);
     $id = $_GET['id'];
	$form = new form();
	$typeshop = new textfield('typeshop_name','','form-control','','');
	$lbtypeshop = new label('ประเภทร้านค้า: ');
	$lbpictype = new label('รูปไอคอนประเภทร้านค้า: ');
	$filepic = new inputFile('typepic','','');
	$button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
?>
<div class='col-md-6'>
	<h2>เพิ่มข้อมูลรายละเอียด</h2>
<?php echo $form->open('form_reg','frmMain','','insert_typeshop.php',''); ?>
						<div class='row'>
							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbtypeshop; ?></div>
									<div class='col-md-8'><?php echo $typeshop; ?></div>
								</div>
							</div>
							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbpictype; ?></div>
									<div class='col-md-8'><?php echo $filepic; ?></div>
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
										<a href="admin_index.php?url=typeshop_status.php&id=<?php echo $id;?>"><button type="button" class="btn btn-danger col-md-12" data-dismiss="modal">ยกเลิก</button></a>
									</div>
								</div>
							</div>
						<input type="hidden" value="<?php echo $_GET['id'];?>">
</div>
