<?php
	$id = $_GET['id'];
	$rs = $db->findbyPK22('shop','typeshop','typeshop_typeshop_id','typeshop_id','shop_id',$id)->executeAssoc();
?>
<div class="col-12" style="opacity:0.8;">
	<div class="row">
		<img class="d-block w-100" height="440" src="images/testpic5.jpg">
	</div>
</div>
<div class="inner_position_top" style="padding-top:0px;">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lg7" id="introshop">
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lg7">
										<h3>ชื่อร้าน <?php echo $rs['shop_name'];?></h3>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-0 lg7">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														จำนวนปีที่เป็นสมาชิก หาเจอ : 17ปี
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
														<div class="lg7">Rate :
														<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" />
														<img src="images/star.png" width="15px" height="15px" />
														<img src="images/star.png" width="15px" height="15px" />
														<img src="images/star.png" width="15px" height="15px" />
														<img src="images/star.png" width="15px" height="15px" />
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<div class="row">
<!-- 															<div class="col-12 brd" id="map_canvas"style="background-color:#ffffff;height:300px;"></div> -->
																<div class="col-12 brd" style="background-color:#ffffff;height:300px;">
																	<div class="col-md-12">
																	<span class="text-danger">หากท่านต้องการ การนำทาง กรุณาคลิกที่ไอคอนเพื่อการนำทาง :</span>
																	</div>
																	<div class="col-md-12">
																<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $rs['shop_locationx'],',',$rs['shop_locationy'];?>"><span data-feather="navigation"></span></a>
																	</div>
																	<div class="col-md-6">
																	<span class="text-danger">ระยะทางจากท่านสู่ร้านค้า :</span>
																	</div>
																	<div class="col-md-6">
																	<p id="distance" class="text-primary"></p>
																	</div>
																</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 mb-0 lg7">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<h5>หมวดหมู่ : <?php echo $rs['typeshop_name'];?></h5>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<div class="row">
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4"></div>
															<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
																<div class="row">
																	<div id="buttonfav" class="col-md-6">
																	<?php
																		$member_id = $_SESSION['member_id'];
																$rsfav = $db->findByPK12('favorite','favorite_shop_id',$id,'favorite_member_id',$member_id)->executeAssoc();
																		if($rsfav['favorite_id'] !=''){
																	?>
																		<button id="fav" type="button" class="btn btn-success col-xl-12 col-lg-12 col-md-12 col-sm-12">
																			<img src="images/starfull.png" width="25px" height="25px">
																		</button>
																	<?php
																		}else{
																	?>
																		<button id="fav" type="button" class="btn btn-primary col-xl-12 col-lg-12 col-md-12 col-sm-12">
																			<img src="images/staricon.png" width="25px" height="25px">
																		</button>
																	<?php
																		}
																	?>
																	</div>
																	<div id="" class="col-md-6">
																		<!-- แก้๊URL ใน Data-href	เพื่อทำการแชร์-->
																		<div class="fb-share-button"
																	    data-href="URL"
																	    data-layout="button_count"
																		data-size="large">
																	</div>
																  </div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<?php
												$currenttime=date("H:i:s");
												if(($currenttime >= $rs['shop_open']) && ($currenttime <= $rs['shop_close'])){?>
												<button type="button" class="btn btn-success col-xl-3 col-lg-3 col-md-3 col-sm-3">เปิดอยู่ขณะนี้</button>
											<?php }else{?>
												<button type="button" class="btn btn-danger col-xl-3 col-lg-3 col-md-3 col-sm-3">ปิดอยู่ขณะนี้</button>
											<?php }
											?>
											<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9"></div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 lg2">
														<div class="row">
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
																<span class="mr-3" style="float:left" data-feather="home"></span><p class="lg6" style="float:left">ที่อยู่ : 456 ถนนฉลองกรุง เขตบางรัก กรุงเทพ</p>
															</div>
														</div>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
														<img class="d-block w-100" src="images/shop/<?php echo $rs['shop_pic'];?>">
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
														<div class="row">
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pr-0">
																<img class="d-block w-100" src="images/testpic3.jpg">
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pl-0 pr-0">
																<img class="d-block w-100" src="images/testpic3.jpg">
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pl-0">
																<img class="d-block w-100" src="images/testpic3.jpg">
															</div>
														</div>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 lg6">
														<div class="row">
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bb1">
																<p>Promotion</p>
															</div>
															<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
																<p>10.00-14.00 = ลด 10%</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 lg6 bgw lgb brd">
												<div class="row">
													<?php if($rs['shop_open'] != '' && $rs['shop_close'] != ''){ ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>เวลาเปิด-ปิด <?php echo $rs['shop_open'],'-',$rs['shop_close'];?>น.</p>
													</div>
													<?php }else{ }
													if($rs['shop_tel'] != ''){
													?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>เบอร์ติดต่อ <?php echo $rs['shop_tel'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_website'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>Website <?php echo $rs['shop_website'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_line'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>Line id <?php echo $rs['shop_line'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_facebook'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>Facebook/pages <?php echo $rs['shop_facebook'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_email'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>E-mail <?php echo $rs['shop_email'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_detail'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>รายละเอียด <?php echo $rs['shop_detail'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_ratepricemin'] != '' && $rs['shop_ratepricemax'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
														<p>ช่วงราคา <?php echo $rs['shop_ratepricemin'],'-',$rs['shop_ratepricemax'];?> บาท</p>
													</div><?php }else{ }
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">มีที่จอดรถ</p>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">รับบัตรเครดิต</p>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">เดลิเวอรี</p>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">แอลกอฮอล์</p>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">WiFi มี wifi ฟรี</p>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">รับส่งสินค้าทางไปรษณีย์</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
								<input type="hidden" id="id_shop" value="<?php echo $id;?>">
								<input type="hidden" id="member_id" value="<?php echo $_SESSION['member_id'];?>">
							</div>
						</div>
					</div>
				</div>
			</div>
<script>
var map, GeoMarker , mycircle ,markercircle;

      function initialize() {
	    var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
         calculateAndDisplayRoute(directionsService, directionsDisplay);

}
 function calculateAndDisplayRoute(directionsService, directionsDisplay) {
		navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
        	};
        	var startlat =  parseFloat(pos.lat);
        	var startlng =  parseFloat(pos.lng);
        	var endlat = parseFloat(<?php echo $rs['shop_locationx'];?>);
        	var endlng = parseFloat(<?php echo $rs['shop_locationy'];?>);
	        var start = new google.maps.LatLng(startlat,startlng);
			var end = new google.maps.LatLng(endlat,endlng);
	        directionsService.route({
	          origin: start,
	          destination: end,
	          travelMode: 'DRIVING',
	          provideRouteAlternatives: true,
	        }, function(response, status) {
		          if (status === 'OK') {
		            directionsDisplay.setDirections(response);
		             var distance = response.routes[0].legs[0].distance.text;
		             $('#distance').append(distance);
		             directionsDisplay.setMap(null);

		          } else {
		            window.alert('Directions request failed due to ' + status);
		          }
	        });
		});
      }
google.maps.event.addDomListener(window, 'load', initialize);

$('#fav').on('click',function(){
	$.ajax({
            url: "favorite.php",
            data: {shop_id : $('#id_shop').val() ,
	               member_id : $('#member_id').val(),
	         },
            type: "POST",
            success: function(data) {
	            console.log(data);
               if(data == 'เพิ่ม'){
			    $('#buttonfav').html('<button id="fav" type="button" class="btn btn-success col-xl-12 col-lg-12 col-md-12 col-sm-12"><img src="images/starfull.png" width="25px" height="25px"></button>');
               }
               else if(data == 'เกิน10'){
			   	alert('ท่านได้กด Favorite เกิน 10 ร้านแล้ว หากต้องการกดเพิ่มกรุณากดยกเลิกร้านเก่าก่อน');
               }
               else if(data == 'Login'){
			   	alert('กรุณา Login เข้าสู่ระบบก่อนถึงจะสามารถใช้งานระบบ Favorite ได้ครับ');
			   	 window.location.href = 'login.php';
               }
               else{
	              $('#buttonfav').html('<button id="fav" type="button" class="btn btn-primary col-xl-12 col-lg-12 col-md-12 col-sm-12"><img src="images/staricon.png" width="25px" height="25px"></button>');

               }
            }
    });
});
</script>
