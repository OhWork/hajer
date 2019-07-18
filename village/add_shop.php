<head>
        <style>
		   /* Always set the map height explicitly to define the size of the div
	       * element that contains the map. */
	      #map_canvas {
	        height: 400px;
	      }
	      #map_canvas2 {
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
	 $lbpicshopcover = new label('รูปภาพปกของร้านค้า');
	 $openshop = new textfield('shop_open','openshop','form-control','','');
	 $closeshop = new textfield('shop_close','closeshop','form-control','','');
	 $lbocshop = new label('เวลาเปิดปิดของร้านค้า');
	 $ratepriceshopmin = new textfield('shop_ratemin','','form-control','กรุณากรอกเป็นตัวเลข เช่น x','');
	 $lbratepriceshopmin = new label('เรทราคาต่ำสุด');
	 $ratepriceshopmax = new textfield('shop_ratemax','','form-control','กรุณากรอกเป็นตัวเลข เช่น xxx','');
	 $lbratepriceshopmax = new label('เรทราคาสูงสุด');
	 $placeshop = new textfield('shop_place','','form-control','','');
	 $filepiccover = new inputFile('shop_piccover','shop_piccover','shop_piccover');
	 $filepic = new inputFile('shop_pic','shop_pic','shop_pic');
	 $filepic2 = new inputFile('shop_pic2','shop_pic2','shop_pic2');
	 $filepic3 = new inputFile('shop_pic3','shop_pic3','shop_pic3');
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
	 $radiothaipost->name = 'shopdetail_post';
	 $radiothaipost->add('มีบริการ',1,'');
	 $radiothaipost->add('ไม่มีบริการ',0,'checked');
	 @$id = $_GET['id'];
	 if(!empty($id)){
		 $r = $db->findByPK22('shop','typeshop','typeshop_typeshop_id','typeshop_id','shop_id',$id)->executeRow();
		 $nameshop->value = $r['shop_name'];
		 $detailshop->value = $r['shop_detail'];
		 $openshop->value = $r['shop_open'];
		 $closeshop->value = $r['shop_close'];
		 $ratepriceshopmin->value = $r['shop_ratepricemin'];
		 $ratepriceshopmax->value = $r['shop_ratepricemax'];
		 $picshop->value = $r['shop_pic'];
		 $selectcatshop = $r['typeshop_typeshop_id'];
	 }
	 $button = new buttonok('บันทึก','btnSubmit','btn btn-success col-md-12','');
	 echo $form->open('form_reg','frmMain','col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','insert_shop.php','');
	 ?>
	 <script language = "JavaScript">

		//**** List subzoo (Start) ***//
		function ListSubzoo(SelectValue)
		{
			frmMain.ddlSubzoo.length = 0

			var myOption = new Option('โปรดระบุ','')
			frmMain.ddlSubzoo.options[frmMain.ddlSubzoo.length]= myOption

			<?php
			$intRows = 0;
			$rs = $db->orderASC('typeshop','typeshop_id')->execute();
			$intRows = 0;
			while($objResult = mysqli_fetch_array($rs,MYSQLI_ASSOC))
			{
			$intRows++;
			?>
				x = <?php echo $intRows;?>;
				mySubList = new Array();

				strGroup = <?php echo $objResult["typeshop_id"];?>;
				strValue = "<?php echo $objResult["typeshop_id"];?>";
				strItem = "<?php echo $objResult["typeshop_name"];?>";
				mySubList[x,0] = strItem;
				mySubList[x,1] = strGroup;
				mySubList[x,2] = strValue;
				if (mySubList[x,1] == SelectValue){
					var myOption = new Option(mySubList[x,0], mySubList[x,2])
					frmMain.ddlSubzoo.options[frmMain.ddlSubzoo.length]= myOption
				}
			<?php
			}
			?>
		}

	</script>
<div class="row">
	<div class='col-xl-3 col-lg-2 col-md-1'></div>
	<div class='col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 pb-3 br3 brd mt-3'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<h4>เพิ่มข้อมูลร้านค้า</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo $lbtypeshop; ?>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
				<select class='form-control css-require' id="ddlZoo" name="catshop" onChange = "ListSubzoo(this.value)">
					<option selected value="">-----โปรดระบุ-----</option>
					<?php
						$rs = $db->orderASC('typeshop','typeshop_id')->execute();
						while($objResult = mysqli_fetch_array($rs,MYSQLI_ASSOC))
						{
						?>
					<option value="<?=$objResult["typeshop_id"];?>"><?=$objResult["typeshop_name"];?></option>
						<?php
						}
						?>
				</select>
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
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12'>
					<div class="row">
						<div class='col-xl-3 col-lg-3 col-md-3 col-sm-2 col-2 pt-2'><p>เริ่ม</p></div>
						<div class='col-xl-6 col-lg-6 col-md-6 col-sm-8 col-8'><?php echo $openshop; ?></div>
						<div class='col-xl-3 col-lg-3 col-md-3 col-sm-2 col-2 pt-2'><p>น.</p></div>
					</div>
				</div>
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12'>
					<div class="row">
						<div class='col-xl-3 col-lg-3 col-md-3 col-sm-2 col-2 pt-2'><p>ถึง</p></div>
						<div class='col-xl-6 col-lg-6 col-md-6 col-sm-8 col-8'><?php echo $closeshop; ?></div>
						<div class='col-xl-3 col-lg-3 col-md-3 col-sm-2 col-2 pt-2'><p>น.</p></div>
					</div>
				</div>
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
		<div class="row">
			<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
				<?php echo  $lbpicshopcover; ?>
			</div>
			<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'></div>
			<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'>
				<div class="row">
				<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ml-3'>
					<?php echo $filepiccover;?>
				</div>
				<?php
					if(!empty($id)){
				?>
				<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
					<img id="preimgcover" src="../images/shop/<?php echo $r['shop_pic'];?>" width="150px" height="150px">
				</div>
				<?php
					}else{
				?>
				<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
					<img id="preimgcover" class="preimg" src="images/noimage.png" width="150px" height="150px">
				</div>
					<?php
					}
				?>
				</div>
			</div>
			<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'></div>
		</div>
	</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<?php echo  $lbgoogleshop; ?>
		</div>
		<?php if(empty($id)){ ?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="map_canvas">
		<?php
		}else{
		?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="map_canvas2">
		<?php } ?>
		</div>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 pb-3">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $lbpark;
							?>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $radiopark;
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 pb-3">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $lbcredit;
							?>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $radiocredit;
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 pb-3">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $lbdelivery;
							?>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $radiodelivery;
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 pb-3">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $lbthaipost;
							?>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $radiothaipost;
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 pb-3">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $lbwifi;
							?>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12">
							<?php
								echo  $radiowifi;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class="row">
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-4'></div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 pl-4 pr-0'>
					<input type="hidden" name="mem_id" value="<?php echo $_SESSION['member_id'];?>">
					<?php echo $button; ?>
				</div>
				<div class='col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4'>
					<a href="admin_index.php?url=shop_status.php&id=<?php echo $id;?>"><button type="button" class="btn btn-danger col-md-12" data-dismiss="modal">ยกเลิก</button></a>
				</div>
			</div>
		</div>
	<input type="hidden" name= "shop_id" id="idnaja" value="<?php echo $id;?>">
	<?php
		if(		empty($id)){
	?>
	<input type="hidden" id="lat" name="lat">
	<input type="hidden" id="lng" name="lng">
	<?php
		}else{
	?>
	<input type="hidden" id="lat" name="lat" value="<?php echo $r['shop_locationx']; ?>">
	<input type="hidden" id="lng" name="lng" value="<?php echo $r['shop_locationy']; ?>">
	<?php
		}
	?>
	</div>
	<div class='col-xl-3 col-lg-2 col-md-1'></div>
</div>
	<script>
	jQuery(document).ready(function($) {
		var checkid = $('#idnaja').val();
 		if($('#idnaja').val() == ""){
			var map, infoWindow;
			var geocoder;
			function initMap() {
			  geocoder = new google.maps.Geocoder();
			  map = new google.maps.Map(document.getElementById('map_canvas'), {
			    center: {lat: 13.776527, lng: 100.522654},
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
	}else {
	       function initMap(uluru) {
// 					var uluru = {lat: 13.773, lng: 100.516};
                    var map = new google.maps.Map(document.getElementById('map_canvas2'), {
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
	});
      function readURL(input,idimg) {
	        var nameidimg = idimg ;
	        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                	$(nameidimg).attr('src', e.target.result);

		            }

					reader.readAsDataURL(input.files[0]);
	        }
    	}
     $('#shop_piccover').on('change',function(e){
	 	readURL(this,"#preimgcover");
     });
	 $('#openshop').datetimepicker({
        format: 'HH.mm'
     });
     $('#closeshop').datetimepicker({
        format: 'HH.mm'
     });
     function checkmap() {
	      var vallat = $('#lat').val();
	     var vallng = $('#lng').val();
	    $("#btnSubmit").prop('disabled', true);
	    if(vallat != '' && vallng != ''){
			$("#btnSubmit").prop('disabled', false);
	    }
    }
setInterval(checkmap, 5000);
    </script>
<?php 	echo $form->close(); ?>
