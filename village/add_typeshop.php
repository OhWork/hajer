 <?php
     error_reporting(0);
     $id = $_GET['id'];
	$form = new form();
	$typeshop = new textfield('typeshop_name','','form-control','','');
	$lbtypeshop = new label('ประเภทร้านค้า: ');
	$lbpictype = new label('รูปไอคอนประเภทร้านค้า: ');
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
									<div class='col-md-6 upload-btn'><center><span data-feather="eye"></span></center><input type="file" id="typepic" name="typepic" /></div>
									<?php
									if(!empty($id)){
									?>
										<div class='col-md-2 text-danger'><img src='../images/shop/<?php echo $r['shop_pic'];?>' width='100px' height='100px'></div>
									<?php
									}else{
									?>
										<div class='col-md-2 text-danger'><img id="preimg" class="preimg" src="images/noimage.png" width="100px" height="100px"></div>
									<?php
									}
									?>
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
