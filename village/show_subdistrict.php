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
  <button type="button" class="btn btn-dark mt-3 mb-3"><a class="text-light" href="admin_index.php?url=add_subdistrict.php">เพิ่มข้อมูล</a></button>
 </div>
 <div class="col-md-12">
<?php
    $columns = array('name_in_thai','name_in_english','latitude','longitude');
    $rs = $db->findAll('subdistricts')->execute();

			$grid = new gridView();
			$grid->pr = 'id';
			$grid->header = array('<b><center>ชื่อจังหวัดภาษาไทย</center></b>','<b><center>ชื่อจังหวัดภาษาอังกฤษ</center></b>','<b><center>ละติจูด</center></b>','<b><center>ลองติจูด</center></b>','<b><center>#</center></b>');
			$grid->width = array('20%','20%','10%','10%','10%','10%');
			$grid->name = 'table';
			$grid->edit = 'admin_index.php?url=add_subdistrict.php';
			$grid->edittxt ='แก้ไข';
			$grid->renderFromDB($columns,$rs);
   ?>
 </div>
