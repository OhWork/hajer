<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="../CSS/main.css">
        <link rel="stylesheet" href="../CSS/bootstrap.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
        <link rel="stylesheet" href="../CSS/jquery.dataTables.css">

 </head>
  <?php
	 include 'inc_js.php';
     include '../form/main_form.php';
     include '../form/gridview.php';
	 include_once 'database/db_tools.php';
     include_once 'connect.php';
 ?>
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
<?php
    $columns = array('shop_name','shop_detail','shop_oc','shop_rateprice','chop_place','member_member_id');
    $rs = $db->findByPK2('shop','member','shop.member_member_id','member.member_id')->execute();

			$grid = new gridView();
			$grid->pr = 'shop_id';
			$grid->header = array('<b><center>ชื่อร้านค้า</center></b>','<b><center>รายละเอียดร้าน</center></b>','<b><center>เวลาเปิด-ปิด</center></b>','<b><center>เรทราคาของร้าน</center></b>','<b><center>สถานที่ตั้งของร้าน</center></b>','<b><center>ชื่อเจ้าของร้าน</center></b>','<b><center>รูปภาพ</center></b>');
			$grid->width = array('10%','10%','20%','10%','10%','10%','5%');
			$grid->name = 'table';
			$grid->img = '#';
			$grid->imgpath ="../images/shop/";
			$grid->imgname = 'shop_pic';
			$grid->renderFromDB($columns,$rs);
   ?>
<?php
include_once 'showmodel.php';
		?>
