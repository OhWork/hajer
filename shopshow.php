<?php
	print_r($_POST);
	$keyword = $_POST['keyword'];
	$cat = $_POST['cat'];
	if($keyword != ''){
		$rskey=$db->specifytable('*','shop JOIN typeshop ON shop.typeshop_typeshop_id = typeshop.typeshop_id ',"shop_name LIKE '%{$keyword}%'")->execute();
		foreach($rskey as $showkey){
			print_r($showkey);
		}
	}else{

	}
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bt1 ">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3"></div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
					<div class="col-12" id="map_canvas"style="background-color:#ffffff;height:300px;"></div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3"></div>
			</div>
		</div>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bt1 mt-3 pt-3">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 bb1" style="border-bottom:solid 2px #039BE5;">
					<div class="row">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p><b>ชื่อร้าน</b></p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p><b>เบอร์โทรติดต่อ</b></p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg2">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0" align="center">
									<p><b>ระยะทาง(กิโลเมตร)</b></p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p><b>ระดับความพึงพอใจ</b></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
			</div>
		</div>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 bb1 pb-3">
					<div class="row">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
							<div class="row">
								<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
								<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
									<img class="d-block w-100 rounded-circle" height="50" src="images/mapshow1.png">
								</div>
								<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p>Shop name</p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p>085-XXX-XXXX</p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg2">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0" align="center">
									<p id="distance"></p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p>rate : 5.0</p>
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
	    var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var mapOptions = {
          zoom: 10,
          center: new google.maps.LatLng(13.724717, 100.633072),
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
        directionsDisplay.setMap(map);
         calculateAndDisplayRoute(directionsService, directionsDisplay);

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
 function calculateAndDisplayRoute(directionsService, directionsDisplay) {
		navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
        	};
        	var latt =  parseFloat(pos.lat);
        	var lngg =  parseFloat(pos.lng);
	        var start = new google.maps.LatLng(latt,lngg);
			var end = new google.maps.LatLng(13.7764241,101.5227323);
	        directionsService.route({
	          origin: start,
	          destination: end,
	          travelMode: 'DRIVING'
	        }, function(response, status) {
	          if (status === 'OK') {
	            directionsDisplay.setDirections(response);
	             var distance = response.routes[0].legs[0].distance.text;
	             $('#distance').append(distance);
	          } else {
	            window.alert('Directions request failed due to ' + status);
	          }
	        });
		});

      }
function doNothing() {}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
