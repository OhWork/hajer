 <?php
     error_reporting(0);
	$form = new form();
	$name = new textfield('district_name','','form-control','','');
	$lbname = new label('ชื่อเขต/อำเภอ: ');
	$nameeng = new textfield('district_nameeng','','form-control','','');
	$lbnameeng = new label('ชื่อเขต/อำเภอภาษาอังกฤษ: ');
	$id = $_GET['id'];
	$r = $db->findByPK('districts','id',$id)->executeRow();
	$name->value = $r['name_in_thai'];
	$nameeng->value = $r['name_in_english'];
	$province_id = $r['province_id'];

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
					var objprovinces=document.frmMain.provinces;
					for (x=0;x<objprovinces.length;x++)
					{
						if (objprovinces.options[x].value=="<?=$strZoo?>")
						{
							objprovinces.options[x].selected = true;
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
	<h2>เพิ่มข้อมูลอำเภอ</h2>
<?php echo $form->open('form_reg','frmMain','','insert_district.php',''); ?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='row'>
									<div class="col-md-4" style="padding-right: 0;padding-left: 0;padding-top:7px;"><label>จังหวัด :</label></div>
									<div class='col-md-8 form-group has-feedback'>
                                    <select class='form-control css-require' id="provinces" name="name_provinces">
                                        <option selected value="">-----โปรดระบุ-----</option>
                							<?php
                								$rs = $db->orderASC('provinces','id')->execute();
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
						</div>
						<div class='col-md-12' style="margin-bottom: 16px;">
								<div class='row'>
									<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbnameeng; ?></div>
									<div class='col-md-8'><?php echo $nameeng; ?></div>
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
									<input type="hidden" name="district_id" value="<?php echo $_GET['id'];?>">
</div>
</form>
</div>
