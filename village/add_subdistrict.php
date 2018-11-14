 <?php
     error_reporting(0);
	$form = new form();
	$name = new textfield('subdistricts_name','','form-control','','');
	$lbname = new label('ชื่อแขวง/ตำบล: ');
	$nameeng = new textfield('subdistricts_nameeng','','form-control','','');
	$lbnameeng = new label('ชื่อแขวง/ตำบลภาษาอังกฤษ: ');
	$lat = new textfieldreadonly('subdistricts_lat','','form-control','','');
	$lblat = new label('ละติจูด: ');
	$lng = new textfieldreadonly('subdistricts_lng','','form-control','','');
	$lblng = new label('ลองติจูด: ');
	$id = $_GET['id'];
	$r = $db->findByPK('subdistricts','id',$id)->executeRow();
	$name->value = $r['name_in_thai'];
	$nameeng->value = $r['name_in_english'];
	$lat->value = $r['latitude'];
	$lng->value = $r['longitude'];
	$button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
?>
<script language = "JavaScript">

		//**** List subzoo (Start) ***//
			function setDefault()
		{
			<?php
				/*** ค่า Default ที่ได้จากการจัดเก็บ ***/
				$r2 = $db->findByPK('districts','id',$id)->executeRow();
				$strZoo = $r2['province_id'];
			?>

				<?php
				/*** Default Zoo  ***/
				if($strZoo != "")
				{
				?>
					var objdistrict=document.frmMain.district;
					for (x=0;x<objdistrict.length;x++)
					{
						if (objdistrict.options[x].value=="<?=$strZoo?>")
						{
							objdistrict.options[x].selected = true;
							break;
						}
					}
				<?php
				}
				?>
				}
			window.onload = function(){
				setDefault(<?=$strZoo?>);
			}
</script>
<div class='col-md-6'>
	<h2>เพิ่มข้อมูลตำบล</h2>
<?php echo $form->open('form_reg','frmMain','','insert_subdistrict.php',''); ?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='row'>
									<div class="col-md-4" style="padding-right: 0;padding-left: 0;padding-top:7px;"><label>อำเภอ :</label></div>
									<div class='col-md-8 form-group has-feedback'>
                                    <select class='form-control css-require' id="district" name="name_district">
                                        <option selected value="">-----โปรดระบุ-----</option>
                							<?php
                								$rs = $db->orderASC('districts','id')->execute();
                								while($objResult = mysqli_fetch_array($rs,MYSQLI_ASSOC))
                								{
                							?>
                								<option value="<?=$objResult["id"];?>"><?=$objResult["name_in_thai"];?></option>
                							<?php
												}
                								?>
        							</select>
									</div>
								</div>
							</div>

							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbname; ?></div>
									<div class='col-md-8'><?php echo $name; ?></div>
								</div>
							</div>
							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbnameeng; ?></div>
									<div class='col-md-8'><?php echo $nameeng; ?></div>
								</div>
							</div>
							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lblat; ?></div>
									<div class='col-md-8'><?php echo $lat; ?></div>
								</div>
							</div>
							<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lblng; ?></div>
									<div class='col-md-8'><?php echo $lng; ?></div>
								</div>
							</div>
						</div>
							<div class='col-md-12'>
								<div class='row'>
									<div class='col-md-8'></div>
									<div class='col-md-2'>
										<?php echo $button; ?>
									</div>
									<div class='col-md-2'>
										<button type="button" class="btn btn-danger col-md-12" data-dismiss="modal">ยกเลิก</button>
									</div>
								</div>
							</div>
						<input type="hidden" name="subdistricts_id"value="<?php echo $_GET['id'];?>">
</div>
