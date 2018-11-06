<?php
	$id = $_GET['id'];
	$rs = $db->findbyPK22('shop','typeshop','typeshop_typeshop_id','typeshop_id','shop_id',$id)->executeAssoc();
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bt1 ">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lg6">
							<h3>ชื่อร้าน <?php echo $rs['shop_name'];?></h3>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-0 lg6">
							หมวดหมู่ : <?php echo $rs['typeshop_name'];?>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
							<div class="lg6">Rate :
							<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" />
							<img src="images/star.png" width="15px" height="15px" />
							<img src="images/star.png" width="15px" height="15px" />
							<img src="images/star.png" width="15px" height="15px" />
							<img src="images/star.png" width="15px" height="15px" />
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="col-12" id="map_canvas"style="background-color:#ffffff;height:300px;"></div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 lg2">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<span class="mr-3" style="float:left" data-feather="home"></span><p class="lg6" style="float:left">ที่อยู่ : 456 ถนนฉลองกรุง เขตบางรัก กรุงเทพ</p>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
											<img class="d-block w-100" src="images/shop/<?php echo $rs['shop_pic'];?>.jpg">
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
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 lg6">
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bb1">
											<p>เวลาเปิด-ปิด <?php echo $rs['shop_oc'];?></p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>เบอร์ติดต่อ</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>Website</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>Line id</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>Facebook/pages</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>E-mail</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>รายละเอียด <?php echo $rs['shop_detail'];?></p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>ช่วงราคา <?php echo $rs['shop_ratepricemin'],'-',$rs['shop_ratepricemax'];?></p>
										</div>
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
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
			</div>
		</div>
	</div>
</div>
<script>
var map, GeoMarker , mycircle ,markercircle;

      function initialize() {
        var mapOptions = {
          zoom: 12,
          center: new google.maps.LatLng(<?php echo $rs['shop_locationx'];?>, <?php echo $rs['shop_locationy'];?>),
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
       var infoWindow = new google.maps.InfoWindow;
	   // Change this depending on the name of your PHP or XML file
	   downloadUrl('maker.php', function(data) {
	   var xml = data.responseXML;
	   var markers = xml.documentElement.getElementsByTagName('marker');
	   Array.prototype.forEach.call(markers, function(markerElem) {
	   var id = markerElem.getAttribute('id');
	   var shopname = markerElem.getAttribute('shopname');
	   var detailshop = markerElem.getAttribute('detailshop');
	   var ocshop = markerElem.getAttribute('ocshop');
	   var priceshop = markerElem.getAttribute('priceshop');
	   var placeshop = markerElem.getAttribute('placeshop');
	   var typeshop = markerElem.getAttribute('typeshop');
	   var icon = markerElem.getAttribute('icon');
	   var point = new google.maps.LatLng(
	  	 parseFloat(markerElem.getAttribute('lat')),
	  	 parseFloat(markerElem.getAttribute('lng'))
	   );
	   var infowincontent = document.createElement('div');
	   // เรียกตัวแปร infowincontent เพื่อ set ID ให้กับ DIV เป็น Div1
	   infowincontent.setAttribute("id", "Div1");
	   // เรียกตัวแปร infowincontent เพื่อ set classname ของ div
	   infowincontent.className = "aClassName";
	   // สิ้นสุด
	   var strong = document.createElement('strong');
	   strong.textContent = shopname
	   infowincontent.appendChild(strong);
	   infowincontent.appendChild(document.createElement('br'));
	   var text = document.createElement('text');
	   text.textContent = 'รายละเอียดร้านค้า : ' + detailshop
	   infowincontent.appendChild(text);
	   infowincontent.appendChild(document.createElement('br'));
	   var text2 = document.createElement('text');
	   text2.textContent ='เวลาเปิดปิดร้านค้า : ' + ocshop
	   infowincontent.appendChild(text2);
	   infowincontent.appendChild(document.createElement('br'));
	   var text3 = document.createElement('text');
	   text3.textContent ='เรทราคาของร้านค้า : ' + priceshop
	   infowincontent.appendChild(text3);
	   infowincontent.appendChild(document.createElement('br'));
	   var text4 = document.createElement('text');
	   text4.textContent ='สถานที่ตั้งของร้านค้า : ' + placeshop
	   infowincontent.appendChild(text4);
	   infowincontent.appendChild(document.createElement('br'));
	   var marker = new google.maps.Marker({
		   map: map,
		   position: point,
		   icon:icon
		   });
	   marker.addListener('click', function() {
		   infoWindow.setContent(infowincontent);
		   infoWindow.open(map, marker);
		   });
		});
	});
}
function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest;
	request.onreadystatechange = function() {
		 if (request.readyState == 4) {
			 request.onreadystatechange = doNothing;
			 callback(request, request.status);
		 }
	};
	request.open('GET', url, true);
	request.send(null);
}
function doNothing() {}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
