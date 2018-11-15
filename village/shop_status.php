<?php
    if (!empty($_SESSION['user_name'])):
    $zoo = $_SESSION['subzoo_zoo_zoo_id'];
    date_default_timezone_set('Asia/Bangkok');
    $log_user = $_SESSION['user_name']." ".$_SESSION['user_last'];
    $form = new form();
    $lbname = new label('ชื่อ-นามสกุล');
    $lbposition = new label('ตำแหน่ง');
    $lbcertificate = new label('ชื่อหนังสือรับรอง');
    $lbdevision = new label('สังกัด');
    $lbdatework = new label('บรรจุเป็นพนักงานเมื่อวันที่');
    $button = new buttonok('เปลี่ยนสถานะ','','btn btn-success col-12','');

    if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$r = $db->findByPK32('shop','member','typeshop','shop.member_member_id','member.member_id','shop.typeshop_typeshop_id','typeshop.typeshop_id')->executeRow();
		print_r($r);
		  }
echo $form->open("form_reg","form","col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12","hrs_update_status.php","");
?>
<div class='row'>
<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8' style="border: solid 1px #eaecef;border-radius: 6px;padding-top:16px;padding-bottom:16px;">
	<div class='row'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<h4>แบบฟอร์มการแก้ไขข้อมูล และอัพเดตสถานะ</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbname ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['hrctf_name'] ?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbposition ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['hrctf_position']?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbdevision ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['zoo_name'] ?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbcertificate ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['typectf_name'] ?></label></center>
				</div>
			</div>
		</div>
		<input type='hidden' name='hrctf_status' value='W'/>
		<?php echo "<input type='hidden' name='hrctf_id' value='$_GET[id]'/>"; ?>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class='row'>
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
					<div class='row'>
						<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
						<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8'>
							<a href="admin_index.php?url=hrs_edit_certificate.php&id=<?php echo $_GET['id']; ?>" class="btn btn-warning col-12">แก้ไขข้อมูล</a>
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
<?php
     echo $form->close();
	endif;
?>
