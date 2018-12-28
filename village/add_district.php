 <?php
     error_reporting(0);
	$form = new form();
	$name = new textfield('district_name','','form-control','','');
	$lbname = new label('ชื่อเขต/อำเภอ');
	$nameeng = new textfield('district_nameeng','','form-control','','');
	$lbnameeng = new label('ชื่อเขต/อำเภอภาษาอังกฤษ');
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

<?php echo $form->open('form_reg','frmMain','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','insert_district.php',''); ?>
<div class="row">
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
	<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<h4>เพิ่มข้อมูลอำเภอ</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<label>จังหวัด</label>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group has-feedback'>
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
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbname; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $name; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbnameeng; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $nameeng; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class="row">
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pl-4 pr-0'>
					<?php echo $button; ?>
				</div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'>
					<button type="button" class="btn btn-danger col-12" data-dismiss="modal">ยกเลิก</button>
				</div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
			</div>
		</div>
	<input type="hidden" name="district_id" value="<?php echo $_GET['id'];?>">
	</div>
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
</div>
</form>
