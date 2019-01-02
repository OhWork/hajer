 <?php
     error_reporting(0);
	$form = new form();
	$name = new textfield('subdistricts_name','','form-control','','');
	$lbname = new label('ชื่อแขวง/ตำบล');
	$nameeng = new textfield('subdistricts_nameeng','','form-control','','');
	$lbnameeng = new label('ชื่อแขวง/ตำบลภาษาอังกฤษ');
	$lat = new textfieldreadonly('subdistricts_lat','','form-control','','');
	$lblat = new label('ละติจูด');
	$lng = new textfieldreadonly('subdistricts_lng','','form-control','','');
	$lblng = new label('ลองติจูด');
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
<?php echo $form->open('form_reg','frmMain','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','insert_subdistrict.php',''); ?>
<div class="row">
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
	<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<h4>เพิ่มข้อมูลตำบล</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<label>อำเภอ</label>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group has-feedback'>
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
			<?php echo $lblat; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $lat; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lblng; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $lng; ?>
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
		<input type="hidden" name="subdistricts_id"value="<?php echo $_GET['id'];?>">
	</div>
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
</div>
<?php echo $form->close();?>