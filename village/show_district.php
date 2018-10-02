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
 <div class="col-md-12">
	 <div class="row">
		 <div class="col-md-6">
		 	<a class="text-light" href="admin_index.php?url=add_district.php"><button type="button" class="btn btn-dark mt-3 mb-3">เพิ่มข้อมูล</button></a>
		 </div>
  <?php
		 	 echo $form->open('','','col-md-6 mt-3','','');
	 	 ?>
	 	 	<div class="row">
		 	 <div class="col-md-2">
			 	 <?php
				 	 echo $lbsearch;
				 ?>
		 	 </div>
		 	 <div class="col-md-8">
				 <?php
				 	 echo $txtsearch;
			 	 ?>
		 	 </div>
		 	 <div class="col-md-2">
			 	  <?php
				 	 echo $button;
			 	 ?>
		 	 </div>
	 	 	</div>
	 	 	<?php echo $form->close();?>
 </div>
 <div class="col-md-12">
<?php
   if($_POST){
		$search =$_POST['search'];
	    $columns = array('name_in_thai','name_in_english');
		$rs = $db->specifytable('*','districts',"name_in_thai LIKE '%{$search}%'")->execute();
			$grid = new gridView();
			$grid->pr = 'id';
			$grid->header = array('<b><center>ชื่อจังหวัดภาษาไทย</center></b>','<b><center>ชื่อจังหวัดภาษาอังกฤษ</center></b>','<b><center>#</center></b>');
			$grid->width = array('40%','40%','20%');
			$grid->name = 'table';
			$grid->edit = 'admin_index.php?url=add_district.php';
			$grid->edittxt ='แก้ไข';
			$grid->renderFromDB($columns,$rs);
	}
   ?>
 </div>
