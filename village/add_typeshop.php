 <?php
     error_reporting(0);
     $id = $_GET['id'];
	$form = new form();
	$typeshop = new textfield('typeshop_name','','form-control','','');
	$lbtypeshop = new label('ประเภทร้านค้า');
	$lbpictype = new label('รูปไอคอนประเภทร้านค้า');
	$button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
	 if(!empty($id)){
	 	$r = $db->findByPK('typeshop','typeshop_id',$id)->executeRow();
	 	$typeshop->value = $r['typeshop_name'];
	 }
?>
<?php echo $form->open('form_reg','frmMain','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','insert_typeshop.php',''); ?>
<div class="row">
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
	<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<h4>เพิ่มข้อมูลรายละเอียด</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbtypeshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $typeshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbpictype; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<div class="row">
			<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 upload-btn ml-3'><center>
				<span data-feather="eye"></span></center>
				<input type="file" id="typepic" name="typepic"></input>
			</div>
				<?php
					if(!empty($id)){
				?>
			<div class='col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 text-danger'>
				<img src='../<?php echo $r['typeshop_pathpic'];?>' width='50px' height='50px'>
			</div>
				<?php
					}else{
				?>
			<div class='col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 text-danger'>
				<img id="preimg" class="preimg" src="images/noimage.png" width="50px" height="50px">
			</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class="row">
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pl-4 pr-0'>
				<?php echo $button; ?>
			</div>
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'>
				<a href="admin_index.php?url=typeshop_status.php&id=<?php echo $id;?>"><button type="button" class="btn btn-danger col-md-12" data-dismiss="modal">ยกเลิก</button></a>
			</div>
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
			</div>
		</div>
		<input type="hidden" value="<?php echo $_GET['id'];?>">
	</div>
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
</div>
<script>
	function readURL(input) {
	        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                	$('#preimg').attr('src', e.target.result);

		            }

					reader.readAsDataURL(input.files[0]);
	        }
    	}
     $('#typepic').on('change',function(e){
	 	readURL(this);
     });

</script>
<?php echo $form->close();?>
