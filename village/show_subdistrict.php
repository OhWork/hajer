<?php
 $form = new form();
 $lbsearch = new label('ค้นหาตำบล');
 $txtsearch = new textfield('search','','form-control css-require','','');
 $button = new buttonok('ค้นหา','','btn btn-primary col-12','submit');
?>
 <script>
            $(document).ready(function() {

                $('#table').DataTable( {
	                "ordering": false,
	                "lengthMenu": [[10, 50, 255, -1], [10, 50, 254, "ทุกหน้า"]],
	                "language": {
	                    "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
	                    "zeroRecords": "ไม่พบข้อมูล",
	                    "info": "แสดงหน้าที่ _PAGE_ ถึง _PAGES_",
	                    "infoEmpty": "ไม่พบข้อมูล",
	                    "infoFiltered": "(filtered from _MAX_ total records)"
	                }
				} );
     		} );
 </script>
<?php echo $form->open('','','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','',''); ?>
<div class="row">
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
	<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class="row">
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
					<?php echo $lbsearch; ?>
				</div>
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
					<a class="text-light" href="admin_index.php?url=add_subdistrict.php">
						<button type="button" class="btn btn-dark col-12">เพิ่มตำบล</button>
					</a>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $txtsearch; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class="row">
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'></div>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'>
					<?php echo $button; ?>
				</div>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'></div>
			</div>
		</div>
	</div>
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
</div>
<?php echo $form->close();?>
	 <div class="col-md-6">
		 	
	 	 </div>
 </div>
 <div class="col-md-12">
<?php
	if($_POST){
		$search =$_POST['search'];
	    $columns = array('name_in_thai','name_in_english','latitude','longitude');
		$rs = $db->specifytable('*','subdistricts',"name_in_thai LIKE '%{$search}%'")->execute();

				$grid = new gridView();
				$grid->pr = 'id';
				$grid->header = array('<b><center>ชื่อจังหวัดภาษาไทย</center></b>','<b><center>ชื่อจังหวัดภาษาอังกฤษ</center></b>','<b><center>ละติจูด</center></b>','<b><center>ลองติจูด</center></b>','<b><center>#</center></b>');
				$grid->width = array('20%','20%','10%','10%','10%','10%');
				$grid->name = 'table';
				$grid->edit = 'admin_index.php?url=add_subdistrict.php';
				$grid->edittxt ='แก้ไข';
				$grid->renderFromDB($columns,$rs);
	}
   ?>
 </div>
