<script>
            $(document).ready(function() {

                $('#table').DataTable( {
                "ordering": false,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "ทุกหน้า"]],
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
   if (!empty($_SESSION['member_username'])):
	include_once 'database/db_tools.php';
	include_once 'connect.php';
    date_default_timezone_set('Asia/Bangkok');
    $form = new form();
    $lbday = new label('วันที่ต้องการดู Log');
    $txtday = new textfieldcalendarreadonly('date','date-picker-1','','date-picker form-control datetimepicker','input-group-addon','date-picker-1');
	$button = new buttonok('ค้นหา','','btn btn-primary col-12','submit');
echo $form->open('','','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','',''); ?>
<div class="row">
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
	<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<h4>เลือกวันที่ต้องการดู Log</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $lbday;?>
		</div>
		<div class="date-form dayinbox col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="form-horizontal">
				<div class="control-group">
					<div class="controls">
						<div class="input-group">
							<?php echo $txtday;?>
						</div>
					</div>
				</div>
			</div>
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
<?php
	echo $form->close();
	if($_POST){
	$daytime =  $_POST['date'];
    $columns = array('log_system','log_action','log_action_date','log_action_by','log_ip');

// 			$rs2 = "user,subzoo,zoo  where ipzpo.subzoo_subzoo_id = subzoo.subzoo_id && subzoo.zoo_zoo_id = zoo.zoo_id ";
//             $rs = $db->findByPK11BETWEEN('log','log_action_date',$qua)->execute();
			$rs = $db->specifytable('*','log',"log_action LIKE '%{$daytime}%'")->execute();
?>
	<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
		<div class='row'>
			<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
			<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
				<div class='row'>
					<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
						<h4>Log การใช้งานของระบบ</h4>
					</div>
					<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
						<?php
							$grid = new gridView();
							$grid->header = array('<b><center>ระบบ</center></b>','<b><center>ทำ</center></b>','<b><center>วันที่ใช้งาน</center></b>','<b><center>ใช้งานโดย</center></b>','<b><center>IP</center></b>');
							$grid->width = array('20%','20%','20%','20%','20%');
							$grid->name = 'table';
							$grid->renderFromDB($columns,$rs);
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
		</div>
	</div>
<?php endif; ?>
<script>
 $( function() {
   	$('#date-picker-1').datetimepicker({
		 format: 'YYYY-MM-DD',
	     useCurrent: false,
	     ignoreReadonly: true,
         allowInputToggle: true,
	     locale:moment.locale('th'),
//       pickTime: false
        });
      } );
</script>
