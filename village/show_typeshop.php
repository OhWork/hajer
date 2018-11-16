 <script>
            $(document).ready(function() {

                $('#table').DataTable( {
	                "ordering": false,
	                "lengthMenu": [[100, 200, 254, -1], [100, 200, 254, "ทุกหน้า"]],
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
  <a class="text-light" href="admin_index.php?url=add_typeshop.php"><button type="button" class="btn btn-dark mt-3 mb-3">เพิ่มข้อมูล</button></a>
 </div>
 <div class="col-md-12">
<?php
    $columns = array('typeshop_name');
    $rs = $db->findAll('typeshop')->execute();

			$grid = new gridView();
			$grid->pr = 'typeshop_id';
			$grid->header = array('<b><center>ชื่อประเภทร้านค้า</center></b>','<b><center>#</center></b>','<b><center>#</center></b>');
			$grid->width = array('90%','5%','5%');
			$grid->name = 'table';
			$grid->edit = 'admin_index.php?url=typeshop_status.php';
			$grid->edittxt ='แก้ไข';
			$grid->renderFromDB($columns,$rs);
   ?>
 </div>
