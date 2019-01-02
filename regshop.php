<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <?php    include 'inc_js.php';
              include 'form/main_form.php';
              include 'form/gridview.php';
              include 'village/database/db_tools.php';
              include 'village/connect.php';
      ?>

    <title>สมัครสมาชิกร้านค้า</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/floating-labels.css">
    <link rel="stylesheet" href="CSS/sticky-footer.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="CSS/jquery-ui.css">
    <link rel="stylesheet" href="CSS/main.css">

  </head>

  <body>
   <?php
	 $form = new form();
	 $nameshop = new textfield('shop_name','','form-control','','');
	 $lbnameshop = new label('ชื่อร้านค้า');
	 $lbtypeshop = new label('ประเภทร้านค้า');
	 $detailshop = new textfield('shop_detail','','form-control','','');
	 $lbdetailshop = new label('รายละเอียดของร้านค้า');
	 $picshop = new uploadPic('shop_pic','');
	 $lbpicshop = new label('รูปภาพของร้านค้า');
	 $openshop = new textfield('shop_open','','form-control','','');
	 $closeshop = new textfield('shop_close','','form-control','','');
	 $lbocshop = new label('เวลาเปิดปิดของร้านค้า');
	 $ratepriceshopmin = new textfield('shop_ratemin','','form-control','','');
	 $lbratepriceshopmin = new label('เรทราคาต่ำสุด');
	 $ratepriceshopmax = new textfield('shop_ratemax','','form-control','','');
	 $lbratepriceshopmax = new label('เรทราคาสูงสุด');
	 $placeshop = new textfield('shop_place','','form-control','','');
	 $lbplaceshop = new label('สถานที่ตั้ง');
	 $lbgoogleshop = new label('เลือกตำแหน่งของร้าน');
	 $selectcatshop = new selectFromDB();
	 $selectcatshop->name = 'catshop';
	 $selectcatshop->idtf = 'catshop_id';
	 $button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
	 echo $form->open('form_reg','frmMain','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','insert_shop.php','');
	 ?>
<div class="row">
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
	<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<h4>เพิ่มข้อมูลร้านค้า</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbtypeshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
<!-- 			<?php echo $selectcatshop->selectFromTB('typeshop','typeshop_id','typeshop_name','11'); ?> -->
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbnameshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $nameshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo  $lbdetailshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $detailshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo  $lbocshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<div class="row">
				<div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 pt-2'><p>เริ่ม</p></div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'><?php echo $openshop; ?></div>
				<div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 pt-2'><p>น.</p></div>
				<div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 pt-2'><p>ถึง</p></div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'><?php echo $closeshop; ?></div>
				<div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 pt-2'><p>น.</p></div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo  $lbratepriceshopmin; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $ratepriceshopmin; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo  $lbratepriceshopmax; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<?php echo $ratepriceshopmax; ?>
		</div>
<!--
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbplaceshop; ?></div>
			<div class='col-md-8'><?php echo $placeshop; ?></div>
		</div>
	 </div>
-->
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo  $lbpicshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
			<div class="row">
			<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 upload-btn ml-3'><center>
				<span data-feather="eye"></span></center>
				<input type="file" id="shop_pic" name="shop_pic" />
			</div>
			<?php
				if(!empty($id)){
			?>
			<div class='col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 text-danger'>
				<img src='../images/shop/<?php echo $r['shop_pic'];?>' width='50px' height='50px'>
			</div>
			<?php
				}else{
					?>
			<div class='col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 text-danger'>
				<img id="preimg" class="preimg" src="images/noimage.png" width="50px" height="50px">
			</div>
				<?php
				}
			?>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo  $lbgoogleshop; ?>
		</div>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="map_canvas">
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class="row">
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pl-4 pr-0'>
				<input type="hidden" name="mem_id" value="<?php echo $_SESSION['member_id'];?>">
				<?php echo $button; ?>
			</div>
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'>
				<a href="admin_index.php?url=shop_status.php&id=<?php echo $id;?>"><button type="button" class="btn btn-danger col-md-12" data-dismiss="modal">ยกเลิก</button></a>
			</div>
			<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
			</div>
		</div>
	<input type="hidden" id="lat" name="lat">
	<input type="hidden" id="lng" name="lng">
	</div>
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
</div>
	<script>
	      var map, GeoMarker;

	      function initialize() {
	        var mapOptions = {
	          zoom: 17,
	          center: new google.maps.LatLng(-34.397, 150.644),
	          mapTypeId: google.maps.MapTypeId.ROADMAP,
	          streetViewControl: false,
	          disableDefaultUI: true,
	          styles: [
			  	{
					"featureType": "administrative",
					"elementType": "geometry",
					"stylers": [
						{
							"visibility": "off"
						}
					 ]
				},
				{
					"featureType": "poi",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "labels.icon",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "transit",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				}
	          ]
	        };
	        map = new google.maps.Map(document.getElementById('map_canvas'),
	            mapOptions);

	        GeoMarker = new GeolocationMarker();
	        GeoMarker.setCircleOptions({fillColor: '#808080'});

	        google.maps.event.addListenerOnce(GeoMarker, 'position_changed', function() {
	          map.setCenter(this.getPosition());
	          map.fitBounds(this.getBounds());
	          $('#lat').val(GeoMarker.position.lat());
			  $('#lng').val(GeoMarker.position.lng());
	          console.log($('#lat').val());
	          console.log($('#lng').val());
	        });

	        google.maps.event.addListener(GeoMarker, 'geolocation_error', function(e) {
	          alert('There was an error obtaining your position. Message: ' + e.message);
	        });

	        GeoMarker.setMap(map);
	      }

	      google.maps.event.addDomListener(window, 'load', initialize);

	      if(!navigator.geolocation) {
	        alert('Your browser does not support geolocation');
	      }
	       function initMap(uluru) {
// 					var uluru = {lat: 13.773, lng: 100.516};
                    var map = new google.maps.Map(document.getElementById('map_canvas'), {
                      zoom: 17,
                      center: uluru,
                      streetViewControl: false,
                      disableDefaultUI: true,
                      styles: [
						  {
						    "featureType": "administrative",
						    "elementType": "geometry",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  },
						  {
						    "featureType": "poi",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  },
						  {
						    "featureType": "road",
						    "elementType": "labels.icon",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  },
						  {
						    "featureType": "transit",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  }
                      ]
                    });
                    var marker = new google.maps.Marker({
	                    position: uluru,
	                    map: map,
	                    draggable:true,
	                });
	                var positionStart, positionStartNew;
	        google.maps.event.addListener(marker, 'dragend', function() {
			    if (confirm("Are You Sure You Want To Move this marker?")) {
			      positionStartNew = this.position;
			      var latlng = positionStartNew.toUrlValue(6);
			      var cutlatlng = latlng.split(",");
				  $('#lat').val(cutlatlng[0]);
				  $('#lng').val(cutlatlng[1]);
			      console.log(cutlatlng);
			    }
			});
			}
		  	$.ajax({
	            type: "POST",
	            url: "getmarker.php",
	            data: {checkid : $('#idnaja').val()},
	            dataType: "json",
	            success: function(data) {
					var latt =  parseFloat(data.shop_locationx);
					var lngg =  parseFloat(data.shop_locationy);
					var uluru = {lat: latt, lng: lngg};
		            initMap(uluru);
	            }
	        });
      function readURL(input) {
	        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                	$('#preimg').attr('src', e.target.result);

		            }

					reader.readAsDataURL(input.files[0]);
	        }
    	}
     $('#shop_pic').on('change',function(e){
	 	readURL(this);
     });

    </script>
<?php 	echo $form->close(); ?>
