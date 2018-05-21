<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    $columns = array('typeshop_name');
    $rs = $db->findAll('typeshop')->execute();

			$grid = new gridView();
			$grid->pr = 'typeshop_id';
			$grid->header = array('<b><center>ชื่อประเภทร้านค้า</center></b>','<b><center>#</center></b>','<b><center>#</center></b>');
			$grid->width = array('80%','10%','10%');
			$grid->name = 'table';
			$grid->delete = '#';
			$grid->deletetxt ='ลบ';
			$grid->edit = '#';
			$grid->edittxt ='แก้ไข';
			$grid->renderFromDB($columns,$rs);
   ?>
