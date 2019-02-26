<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
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
<!--  	<a class="text-light" href="admin_index.php?url=add_shop.php"><button type="button" class="btn btn-dark mt-3 mb-3">เพิ่มข้อมูล</button></a> -->
 </div>
 <div class="col-md-12 mt-3">
<?php
    $columns = array('member_id','member_username','member_password');
    $rs = $db->findAll('member')->execute();

			$grid = new gridView();
			$grid->pr = 'member_id';
			$grid->header = array('<b><center>รหัสผู้ใช้</center></b>','<b><center>ชื่อ</center></b>','<b><center>นามสกุล</center></b>','<b><center>#</center></b>');
			$grid->width = array('20%','10%','20%','10%','10%','10%','5%','5%');
			$grid->name = 'table';
			$grid->edit = 'admin_index.php?url=user_status.php';
			$grid->edittxt ='ดูรายละเอียด';
			$grid->renderFromDB($columns,$rs);
   ?>
<?php
include_once 'showmodel.php';
?>
 </div>