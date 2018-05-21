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
    $columns = array('name_in_thai','name_in_english');
    $rs = $db->findAll('districts')->execute();

			$grid = new gridView();
			$grid->pr = 'id';
			$grid->header = array('<b><center>ชื่อจังหวัดภาษาไทย</center></b>','<b><center>ชื่อจังหวัดภาษาอังกฤษ</center></b>','<b><center>#</center></b>','<b><center>#</center></b>');
			$grid->width = array('40%','40%','10%','10%');
			$grid->name = 'table';
			$grid->delete = '#';
			$grid->deletetxt ='ลบ';
			$grid->edit = '#';
			$grid->edittxt ='แก้ไข';
			$grid->renderFromDB($columns,$rs);
   ?>
