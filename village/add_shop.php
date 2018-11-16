<head>
        <style>
		   /* Always set the map height explicitly to define the size of the div
	       * element that contains the map. */
	      #map_canvas {
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
     date_default_timezone_set('Asia/Bangkok');

     $form = new form();
	 $nameshop = new textfield('shop_name','','form-control','','');
	 $lbnameshop = new label('ชื่อร้านค้า : ');
	 $lbtypeshop = new label('ประเภทร้านค้า : ');
	 $detailshop = new textfield('shop_detail','','form-control','','');
	 $lbdetailshop = new label('รายละเอียดของร้านค้า');
	 $picshop = new uploadPic('shop_pic','');
	 $lbpicshop = new label('รูปภาพของร้านค้า');
	 $ocshop = new textfield('shop_oc','','form-control','','');
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
	 @$id = $_GET['id'];
	 if(!empty($id)){
		 $r = $db->findByPK22('shop','typeshop','typeshop_typeshop_id','typeshop_id','shop_id',$id)->executeRow();
		 $nameshop->value = $r['shop_name'];
		 $detailshop->value = $r['shop_detail'];
		 $ocshop->value = $r['shop_oc'];
		 $ratepriceshopmin->value = $r['shop_ratepricemin'];
		 $ratepriceshopmax->value = $r['shop_ratepricemax'];
		 $placeshop->value = $r['chop_place'];
		 $picshop->value = $r['shop_pic'];
		 $selectcatshop->value  = $r['typeshop_id'];
	 }
	 $button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
	 echo $form->open('form_reg','frmMain','','insert_shop.php','');
	 ?>
	<h2>เพิ่มข้อมูลร้านค้า</h2>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo $lbtypeshop; ?></div>
			<div class='col-md-8'><?php echo $selectcatshop->selectFromTB('typeshop','typeshop_id','typeshop_name','11'); ?></div>
		</div>
	 </div>
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
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbratepriceshopmin; ?></div>
			<div class='col-md-8'><?php echo $ratepriceshopmin; ?></div>
		</div>
	 </div>
	 <div class='col-md-12' style="margin-bottom: 16px;">
		<div class='row'>
			<div class='col-md-4' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbratepriceshopmax; ?></div>
			<div class='col-md-8'><?php echo $ratepriceshopmax; ?></div>
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
			<div class='col-md-6 upload-btn'><center><span data-feather="eye"></span></center><input type="file" id="shop_pic" name="shop_pic" /></div>
			<?php
				if(!empty($id)){
			?>
			<div class='col-md-2 text-danger'><img src='../images/shop/<?php echo $r['shop_pic'];?>' width='100px' height='100px'></div>
			<?php
				}else{
					?>
					<div class='col-md-2 text-danger'><img id="preimg" class="preimg" src="images/noimage.png" width="100px" height="100px"></div>
				<?php
				}
			?>
		</div>
	 </div>
	 <div class="col-12" style="margin-bottom: 16px;">
		 <div class='row'>
				<div class='col-md-' style="padding-right: 0;padding-left: 0;padding-top:7px;"><?php echo  $lbgoogleshop; ?></div>
				<div id="map_canvas" class="col-md-8" style="padding-right: 0;padding-left: 0;padding-top:7px;"></div>
		 </div>
	</div>
	 <div class='col-md-12'>
		<div class='row'>
			<div class='col-md-2'>
				<input type="hidden" name="mem_id" value="<?php echo $_SESSION['member_id'];?>">
			</div>
			<div class='col-md-5'>
				<?php echo $button; ?>
			</div>
			<div class='col-md-5'>
				<button type="button" class="btn btn-danger col-md-12" data-dismiss="modal">ยกเลิก</button>
			</div>
		</div>
	</div>
	<input type="hidden" id="idnaja" value="<?php echo $id;?>">
	<input type="hidden" id="lat" name="lat">
	<input type="hidden" id="lng" name="lng">
	<script>
 		if(checkid == ""){
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
      }

      else{
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
			}
		  	$.ajax({
	            type: "POST",
	            url: "getmarker.php",
	            data: {checkid : $('#idnaja').val()},
	            dataType: "json",
	            success: function(data) {
					var latt =  parseFloat(data.shop_locationx);
					var lngg =  parseFloat(data.shop_locationy);
					console.log(data);
					var uluru = {lat: latt, lng: lngg};
		            initMap(uluru);
	            }
	        });
      }
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
