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
	 $lbnameshop = new label('ชื่อร้านค้า');
	 $lbtypeshop = new label('ประเภทร้านค้า');
	 $detailshop = new textfield('shop_detail','','form-control','','');
	 $lbdetailshop = new label('รายละเอียดของร้านค้า');
	 $picshop = new uploadPic('shop_pic','');
	 $lbpicshop = new label('รูปภาพของร้านค้า');
	 $openshop = new textfield('shop_open','openshop','form-control','','');
	 $closeshop = new textfield('shop_close','closeshop','form-control','','');
	 $lbocshop = new label('เวลาเปิดปิดของร้านค้า');
	 $ratepriceshopmin = new textfield('shop_ratemin','','form-control','กรุณากรอกเป็นตัวเลข เช่น x','');
	 $lbratepriceshopmin = new label('เรทราคาต่ำสุด');
	 $ratepriceshopmax = new textfield('shop_ratemax','','form-control','กรุณากรอกเป็นตัวเลข เช่น xxx','');
	 $lbratepriceshopmax = new label('เรทราคาสูงสุด');
	 $placeshop = new textfield('shop_place','','form-control','','');
	 $filepic = new inputFile('shop_pic','shop_pic','shop_pic');
	 $lbplaceshop = new label('สถานที่ตั้ง');
	 $lbgoogleshop = new label('เลือกตำแหน่งของร้าน');
	 $selectcatshop = new selectFromDB();
	 $selectcatshop->name = 'catshop';
	 $selectcatshop->idtf = 'catshop_id';
	 $lbpark = new label('ที่จอดรถ');
     $radiopark = new radioGroup();
	 $radiopark->name = 'shopdetail_park';
	 $radiopark->add('มีบริการ',1,'');
	 $radiopark->add('ไม่มีบริการ',0,'checked');
	 $lbcredit = new label('รับบัตรเครดิต');
     $radiocredit = new radioGroup();
	 $radiocredit->name = 'shopdetail_credit';
	 $radiocredit->add('มีบริการ',1,'');
	 $radiocredit->add('ไม่มีบริการ',0,'checked');
	 $lbdelivery = new label('รับส่งเดลิเวอร์รี่');
     $radiodelivery = new radioGroup();
	 $radiodelivery->name = 'shopdetail_delivery';
	 $radiodelivery->add('มีบริการ',1,'');
	 $radiodelivery->add('ไม่มีบริการ',0,'checked');
	 $lbwifi = new label('ไวไฟาย');
     $radiowifi = new radioGroup();
	 $radiowifi->name = 'shopdetail_wifi';
	 $radiowifi->add('มีบริการ',1,'');
	 $radiowifi->add('ไม่มีบริการ',0,'checked');
	 $lbthaipost = new label('ส่งไปรษณีย์');
     $radiothaipost = new radioGroup();
	 $radiothaipost->name = 'shopdetail_thaipost';
	 $radiothaipost->add('มีบริการ',1,'');
	 $radiothaipost->add('ไม่มีบริการ',0,'checked');
	 $lbdebit = new label('รับบัตรเดบิต');
     $radiodebit = new radioGroup();
	 $radiodebit->name = 'shopdetail_debit';
	 $radiodebit->add('มีบริการ',1,'');
	 $radiodebit->add('ไม่มีบริการ',0,'checked');

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
			<?php echo $selectcatshop->selectFromTB('typeshop','typeshop_id','typeshop_name','11'); ?>
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
			<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ml-3'>
				<?php echo $filepic;?>
			</div>
			<?php
				if(!empty($id)){
			?>
			<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
				<img src='../images/shop/<?php echo $r['shop_pic'];?>' width="150px" height="150px"'>
			</div>
			<?php
				}else{
					?>
			<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
				<img id="preimg" class="preimg" src="images/noimage.png" width="150px" height="150px"'>
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
				<div class="col-md-2">
					<?php
						echo  $lbpark;
					?>
				</div>
				<div class="col-md-4">
					<?php
						echo  $radiopark;
					?>
				</div>
				<div class="col-md-2">
					<?php
						echo  $lbcredit;
					?>
				</div>
				<div class="col-md-4">
					<?php
						echo  $radiocredit;
					?>
				</div>
				<div class="col-md-2">
					<?php
						echo  $lbdelivery;
					?>
				</div>
				<div class="col-md-4">
					<?php
						echo  $radiodelivery;
					?>
				</div>
				<div class="col-md-2">
					<?php
						echo  $lbthaipost;
					?>
				</div>
				<div class="col-md-4">
					<?php
						echo  $radiothaipost;
					?>
				</div>
				<div class="col-md-2">
					<?php
						echo  $lbdebit;
					?>
				</div>
				<div class="col-md-4">
					<?php
						echo  $radiodebit;
					?>
				</div>
			</div>
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
	<input type="hidden" name= "shop_id" id="idnaja" value="<?php echo $id;?>">
	<input type="hidden" id="lat" name="lat">
	<input type="hidden" id="lng" name="lng">
	</div>
	<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3'></div>
</div>
	<script>
		var checkid = $('#idnaja').val();
 		if(checkid == ""){
var map, infoWindow;
var geocoder;
function initMap() {
  geocoder = new google.maps.Geocoder();
  map = new google.maps.Map(document.getElementById('map_canvas'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 17,
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
  infoWindow = new google.maps.InfoWindow;
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };

        var marker = new google.maps.Marker({
            position: pos,
            map: map,
            draggable: true,
            title: 'Your position'
        });
        /*infoWindow.setPosition(pos);
        infoWindow.setContent('Your position');
        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });
        infoWindow.open(map, marker);*/
        map.setCenter(pos);

      geocodePosition(pos);

      // Add dragging event listeners.

      google.maps.event.addListener(marker, 'dragend', function() {
        geocodePosition(marker.getPosition());
        map.panTo(marker.getPosition());
	  $('#lat').val(marker.getPosition().lat());
	  $('#lng').val(marker.getPosition().lng());
      });

    }, function() {
       handleLocationError(true, infoWindow, map.getCenter());
    });
} else {
  // Browser doesn't support Geolocation
  handleLocationError(false, infoWindow, map.getCenter());
}

}
function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
  });
  $('#lat').val(pos.lat);
  $('#lng').val(pos.lng);
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}
google.maps.event.addDomListener(window, 'load', initMap);
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
	 $('#openshop').datetimepicker({
        format: 'HH.mm'
     });
     $('#closeshop').datetimepicker({
        format: 'HH.mm'
     });
    </script>
<?php 	echo $form->close(); ?>
