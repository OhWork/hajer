 <?php
     error_reporting(0);
	$form = new form();
	$name = new textfield('province_name','','form-control','','');
	$lbname = new label('ชื่อจังหวัด: ');
	$nameeng = new textfield('province_nameeng','','form-control','','');
	$lbnameeng = new label('ชื่อจังหวัดภาษาอังกฤษ: ');
	$id = $_GET['id'];
     $r = $db->findByPK('provinces','id',$id)->executeRow();
	$name->value = $r['name_in_thai'];
	$nameeng->value = $r['name_in_english'];
	$button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
?>
<?php echo $form->open('form_reg','frmMain','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','insert_provinces.php',''); ?>
<div class="row">
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
	<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<h4>เพิ่มข้อมูลจังหวัด</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbname; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $name; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbnameeng; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $nameeng; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class="row">
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pl-4 pr-0'>
					<?php echo $button; ?>
				</div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'>
					<button type="button" class="btn btn-danger col-12" data-dismiss="modal">ยกเลิก</button>
				</div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
			</div>
		</div>
		<input type="hidden" name="province_id" value="<?php echo $_GET['id'];?>">
	</div>
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
</div>
