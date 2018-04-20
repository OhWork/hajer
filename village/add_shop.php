<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <link rel="stylesheet" href="../CSS/bootstrap.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
        <link rel="stylesheet" href="../CSS/main.css">
        <link rel="stylesheet" href="../CSS/select2.min.css">

        <style>
		   /* Always set the map height explicitly to define the size of the div
	       * element that contains the map. */
	      #map {
	        height: 400px;
	      }
	      /* Optional: Makes the sample page fill the window. */
	      html, body {
	        height: 100%;
	        margin: 0;
	        padding: 0;
	      }
      </style>
 </head>

<?php
     include_once 'inc_js.php';
            include_once 'database/db_tools.php';
            include_once 'connect.php';
            include_once 'form/main_form.php';
            include_once 'form/gridview.php';
             include_once 'clearsession.php';

     date_default_timezone_set('Asia/Bangkok');

     $form = new form();
	 $nameshop = new textfield('shop_name','','form-control','','');
	 $lbnameshop = new label('ชื่อร้านค้า : ');
	 $detailshop = new textfield('shop_detail','','form-control','','');
	 $lbdetailshop = new label('รายละเอียดของร้านค้า');
	 $picshop = new uploadPic('shop_pic');
	 $lbpicshop = new label('รายละเอัียดของร้านค้า');
	 $ocshop = new textfield('shop_oc','','form-control','','');
	 $lbocshop = new label('เวลาเปิดปิดของร้านค้า');
	 $ratepriceshop = new textfield('shop_rate','','form-control','','');
	 $lbratepriceshop = new label('เรทราคา');
	 $placeshop = new textfield('shop_place','','form-control','','');
	 $lbplaceshop = new label('สถานที่ตั้ง');
	 $lbgoogleshop = new label('เลือกตำแหน่งของร้าน');

	 $button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
	 echo $form->open('form_reg','frmMain','','insert_shop.php','');
	 ?>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbnameshop; ?></div>
			<div class='col-md-8'><?php echo $nameshop; ?></div>
		</div>
	 </div>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbdetailshop; ?></div>
			<div class='col-md-8'><?php echo $detailshop; ?></div>
		</div>
	 </div>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbocshop; ?></div>
			<div class='col-md-8'><?php echo $ocshop; ?></div>
		</div>
	 </div>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbratepriceshop; ?></div>
			<div class='col-md-8'><?php echo $ratepriceshop; ?></div>
		</div>
	 </div>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbplaceshop; ?></div>
			<div class='col-md-8'><?php echo $placeshop; ?></div>
		</div>
	 </div>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbpicshop; ?></div>
			<div class='col-md-8'><?php echo $picshop; ?></div>
		</div>
	 </div>
	 <div class="col-12" style="margin-bottom: 16px;">
		 <div class='row'>
				<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbgoogleshop; ?></div>
				<div id="map" class="col-md-8" style="padding-right: 0;padding-left: 0;padding-top:7px;"></div>
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
	<input type="hidden" id="lat" name="lat">
	<input type="hidden" id="lng" name="lng">
	<script>
	var marker;
	var i = 0;
	function DeleteMarkers() {
        //Loop through all the markers and remove

 		if(i >= 2){
 	     	marker.setMap(null);
		    console.log(i);
         }
    };

	function initMap() {
        var uluru = {lat: 13.774, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru,
        });
        map.addListener('click', function(e) {
		    placeMarker(e.latLng, map);
		    $('#lat').val(e.latLng.lat());
		    $('#lng').val(e.latLng.lng());
 		    DeleteMarkers(i++);
		});
		function placeMarker(position, map) {
		    marker = new google.maps.Marker({
		        position: position,
		        map: map
		    });
		    map.panTo(position);
		}
	}
      </script>
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX-mBBK_AjTs-t2_NsF1Nv8Ax52MWJ1yM&callback=initMap"></script>
<?php 	echo $form->close(); ?>
