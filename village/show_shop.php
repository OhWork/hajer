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
 	<a class="text-light" href="admin_index.php?url=add_shop.php"><button type="button" class="btn btn-dark mt-3 mb-3">เพิ่มข้อมูล</button></a>
 </div>
 <div class="col-md-12">
<?php
    $columns = array('shop_name','shop_detail','shop_oc','shop_rateprice','chop_place','member_member_id');
    $rs = $db->findByPK2('shop','member','shop.member_member_id','member.member_id')->execute();

			$grid = new gridView();
			$grid->pr = 'shop_id';
			$grid->header = array('<b><center>ชื่อร้านค้า</center></b>','<b><center>รายละเอียดร้าน</center></b>','<b><center>เวลาเปิด-ปิด</center></b>','<b><center>เรทราคาของร้าน</center></b>','<b><center>สถานที่ตั้งของร้าน</center></b>','<b><center>ชื่อเจ้าของร้าน</center></b>','<b><center>#</center></b>');
			$grid->width = array('20%','10%','20%','10%','10%','10%','5%','5%');
			$grid->name = 'table';
			$grid->edit = 'admin_index.php?url=add_shop.php';
			$grid->edittxt ='แก้ไข';
			$grid->renderFromDB($columns,$rs);
   ?>
<?php
include_once 'showmodel.php';
?>
 </div>
