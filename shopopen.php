<?php
	$id = $_GET['id'];
	$rs = $db->findbyPK22('shop','typeshop','typeshop_typeshop_id','typeshop_id','shop_id',$id)->executeAssoc();
	$rsselect= $db->specifytable("SUM(review_rate),COUNT(member_member_id)","review","review_shop_id = $id")->executeAssoc();
?>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bt1">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 bgw brd">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lg6" id="introshop">
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
										<h5 style="float:left;">หมวดหมู่ : <?php echo $rs['typeshop_name'];?> > <?php echo $rs['shop_name'];?></h5>
										<?php
											$member_id = $_SESSION['member_id'];
											$rsfav = $db->findByPK12('favorite','favorite_shop_id',$id,'favorite_member_id',$member_id)->executeAssoc();
											if($rsfav['favorite_id'] !=''){
											?>
											<a style="float:right;" id="fav"><i class="material-icons2">favorite</i></a>
											<?php
											}else{
											?>
											<a style="float:right;" id="fav"><i class="material-icons2">favorite_border</i></a>
											<?php
											}
										?>
										<a class="mr-2" style="float:right;" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $rs['shop_locationx'],',',$rs['shop_locationy'];?>"><span data-feather="map-pin"></span></a>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-0">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lg6">
												<div class="row">
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
														<?php
															  $rate = $rsselect['SUM(review_rate)'];
															  $memberrate = $rsselect['COUNT(member_member_id)'];
															  $avgrate = ($rate/$memberrate); ?>
													    <div class="col-md-10 lg6" id="rate" class="starrate">
														    <input type="hidden" id="shop_id" value="<?php echo $id;?>">
															<input type="hidden" id="avg_rating" value="<?php echo $avgrate;?>">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
										<div class="row">
											<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<?php
															if($rs['shop_pic'] != ''){
														?>
																<img class="w-100 pop"  src="images/shop/<?php echo $rs['shop_pic'];?>">

														<?php
															}else{
																?>
																<img class="pop w-100" src="images/noimage.png"/>
														<?php
															}
														?>

													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
														<div class="row">
															<img class="d-block w-100 col-xl-4 col-lg-4 col-md-4 col-sm-4 pr-0" height="100px" src="images/testpic3.jpg"/>
															<img class="d-block w-100 col-xl-4 col-lg-4 col-md-4 col-sm-4" height="100px" src="images/testpic3.jpg"/>
															<img class="d-block w-100 col-xl-4 col-lg-4 col-md-4 col-sm-4 pl-0" height="100px" src="images/testpic3.jpg"/>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 lg6">
												<div class="row">
													<?php if($rs['shop_open'] != '' && $rs['shop_close'] != ''){ ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p style="float:left;"><b>เวลาเปิด-ปิด</b> <?php echo $rs['shop_open'],'-',$rs['shop_close'];?>น.</p>
															<?php
																$currenttime=date("H:i:s");
																if(($currenttime >= $rs['shop_open']) && ($currenttime <= $rs['shop_close'])){?>
																<button type="button" class="btn btn-success col-xl-2 col-lg-2 col-md-2 col-sm-2" style="float:right;">เปิด</button>
															<?php }else{?>
																<button type="button" class="btn btn-danger col-xl-2 col-lg-2 col-md-2 col-sm-2" style="float:right;">ปิด</button>
															<?php }
															?>
													</div>
													<?php }else{ }
													if($rs['shop_address'] != ''){
													?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p class="lg6">ที่อยู่ : 456 ถนนฉลองกรุง เขตบางรัก กรุงเทพ</p>
													</div>
													<?php }else{ }
													if($rs['shop_tel'] != ''){
													?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p><b>เบอร์ติดต่อ</b> <?php echo $rs['shop_tel'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_website'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p><b>Website</b> <?php echo $rs['shop_website'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_line'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p><b>Line id</b> <?php echo $rs['shop_line'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_facebook'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p><b>Facebook/pages</b> <?php echo $rs['shop_facebook'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_email'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p><b>E-mail</b> <?php echo $rs['shop_email'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_detail'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p><b>รายละเอียด</b> <?php echo $rs['shop_detail'];?></p>
													</div>
													<?php }else{ }
													 if($rs['shop_ratepricemin'] != '' && $rs['shop_ratepricemax'] != ''){
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<p><b>ช่วงราคา</b> <?php echo $rs['shop_ratepricemin'],'-',$rs['shop_ratepricemax'];?> บาท</p>
													</div><?php }else{ }
													 ?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-5 pr-5">
														<div class="col-12 bgr" height="2px"></div>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span> มีที่จอดรถ
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span> รับบัตรเครดิต
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span> เดลิเวอรี
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span> แอลกอฮอล์
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span> ไวไฟฟรี
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span> รับส่งสินค้าทางไปรษณีย์
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-5 pr-5 mt-3">
														<div class="col-12 bgr" height="2px"></div>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 lg8">
														<p>Promotion</p><p>10.00-14.00 = ลด 10%</p>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lg6">
														<span>ระยะทางที่จะถึง :</span><p id="distance" class="text-primary"></p>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<div class="row">
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4"></div>
															<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
																<div class="row">
																	<div id="" class="col-md-6">
																		<!-- แก้๊URL ใน Data-href	เพื่อทำการแชร์ -->
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
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
								<input type="hidden" id="id_shop" value="<?php echo $id;?>">
								<input type="hidden" id="member_id" value="<?php echo $_SESSION['member_id'];?>">
							</div>
						</div>
					</div>
				</div>
			</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<img src="" class="imagepreview" style="width: 100%; height:100%;">
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
 			   $('#buttonfav').html('<a id="fav"><i class="material-icons2">favorite</i></a>');
 			   window.location.reload();
               }
               else if(data == 'เกิน10'){
			   alert('ผู้ใช้กดถูกใจร้านค้าเกิน 10 ร้านค้าแล้วครับ');
               }
               else if(data == 'Login'){
			   	alert('กรุณา Login เข้าสู่ระบบก่อนถึงจะสามารถใช้งานระบบ Favorite ได้ครับ');
			   	 window.location.href = 'login.php';
               }
               else{
 	             $('#buttonfav').html('<a id="fav"><i class="material-icons2">favorite_border</i></a>');
 	             window.location.reload();

               }
            }
    });
});
var avg_rating = $('#rate').children('#avg_rating').val();
$('#rate').addRating({
    selectedRatings:avg_rating
})
$('#rate').on('click',function(){
	var shop_id = $(this).children().val();
	var shop_idshow = this ;
	$.ajax({
		url: "rate.php",
		data: {rating : $('#rating').val() ,member_id : $('#member_id').val() ,shop_id : shop_id
		},
		type: "POST",
		success: function(data) {
			if(data == 'Nologin'){
				alert('กรุณาล็อคอินก่อนทำการให้คะแนนร้านค่ะ');
			}else{
				window.location.reload();
				$('#rate').addRating({selectedRatings:avg_rating})
			}
		}
	})
});
$('.pop').on('click', function() {
    $('.imagepreview').attr('src', $(this).attr('src'));
    $('#imagemodal').modal('show');
});
</script>
