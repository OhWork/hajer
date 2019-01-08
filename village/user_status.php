<?php
    if (!empty($_SESSION['member_username'])):
    date_default_timezone_set('Asia/Bangkok');
    $log_user = $_SESSION['member_username']." ".$_SESSION['member_password'];
    $form = new form();
    $lbtypepic = new label('รูปภาพiconประเภทร้านค้า');
    $lbusername = new label('ชื่อและนามสกุล');
    $lbstatus = new label('อนุมัติการขอสมัครเป็นผู้ใช้(ร้านค้า)');
    $button = new buttonok('เปลี่ยนสถานะ','','btn btn-success col-12','');
    $radioshopenable = new radioGroup();
	$radioshopenable->name = 'user_permition';
	$radioshopenable->add('อนุญาติ',3,'');
	$radioshopenable->add('ไม่อนุญาติ',2,'checked');

    if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$r = $db->findByPK('member','member_id',$id)->executeRow();
	}
echo $form->open("form_reg","form","col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12","user_update_status.php","");
?>
<div class='row'>
<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8' style="border: solid 1px #eaecef;border-radius: 6px;padding-top:16px;padding-bottom:16px;">
	<div class='row'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<h4>แบบฟอร์มการแก้ไขข้อมูล และอัพเดตสถานะผู้ใช้</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbusername ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label>คุณ <?php echo $r['member_username'],' ',$r['member_password'] ?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbstatus; ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<?php echo $radioshopenable;?>
				</div>
			</div>
		</div>
		<?php echo "<input type='hidden' name='user_id' id='idnaja' value='$_GET[id]'/>"; ?>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class='row'>
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
					<div class='row'>
						<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
						<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8'>
<!-- 							<a href="admin_index.php?url=add_typeshop.php&id=<?php echo $_GET['id']; ?>" class="btn btn-warning col-12">แก้ไขข้อมูล</a> -->
						</div>
						<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
					</div>
				</div>
    			<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
    				<div class='row'>
    					<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
						<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8'>
							<?php echo $button ?>
						</div>
						<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
</div>
<script>
</script>
<?php
     echo $form->close();
	endif;
?>
