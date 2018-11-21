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
						<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p><b>GoogleMap</b></p>
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
						<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 pt-3 lg6 lg2">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p><b>ดูรายละเอียดเพิ่มเคิม</b></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
			</div>
		</div>
<?php
	$keyword = $_POST['keyword'];
	$typeshop = $_POST['typeshop'];
	if($keyword != ''){
		$rskey=$db->specifytable('*','shop JOIN typeshop ON shop.typeshop_typeshop_id = typeshop.typeshop_id ',"shop_name LIKE '%{$keyword}%'")->execute();
		$i = 0;
		foreach($rskey as $showkey){
		?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 bb1 pb-3">
					<div class="row">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
							<div class="row">
								<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
								<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
									<img class="d-block w-100 rounded-circle" height="50" src="images/shop/<?php echo $showkey['shop_pic']; ?>">
								</div>
								<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
								<p><?php echo $showkey['shop_name'];?></p>
								</div>
							</div>
						</div>
						<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $showkey['shop_locationx'],',',$showkey['shop_locationy'];?>"><span data-feather="navigation"></span></a>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg2">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0" align="center">
									<p class="distance<?php echo $i;?>"></p>
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
						<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 pt-3 lg2">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<a href="index.php?url=shopopen.php&id=<?php echo $showkey['shop_id'];?>"><span data-feather="eye"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
					<input type="hidden" id="keyword" value="<?php echo $keyword?>">
					<input type="hidden" id="lat<?php echo $i;?>" class="endlat" value="<?php echo $showtype['shop_locationx'];?>">
					<input type="hidden" id="lng<?php echo $i;?>" class="endlng" value="<?php echo $showtype['shop_locationy'];?>">
				</div>
			</div>
		</div>
	</div>
</div>
		<?php
			$i++;
		}
	}else{
		$rstype=$db->specifytable('*','shop JOIN typeshop ON shop.typeshop_typeshop_id = typeshop.typeshop_id ',"typeshop_typeshop_id = '$typeshop'")->execute();
		 $i =0 ;
		foreach($rstype as $showtype){
		?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 bb1 pb-3">
					<div class="row">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
							<div class="row">
								<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
								<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
									<img class="d-block w-100 rounded-circle" height="50" src="images/shop/<?php echo $showtype['shop_pic']; ?>">
								</div>
								<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<p><?php echo $showtype['shop_name'];?></p>
								</div>
							</div>
						</div>
						<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 pt-3 lg6">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $showtype['shop_locationx'],',',$showtype['shop_locationy'];?>"><span data-feather="navigation"></span></a>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pt-3 lg2">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0" align="center">
									<p class="distance<?php echo $i;?>"></p>
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
						<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 pt-3 lg2">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
									<a href="index.php?url=shopopen.php&id=<?php echo $showtype['shop_id'];?>"><span data-feather="eye"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
					<input type="hidden" id="typeshop" value="<?php echo $typeshop?>">
					<input type="hidden" id="lat<?php echo $i;?>" class="endlat" value="<?php echo $showtype['shop_locationx'];?>">
					<input type="hidden" id="lng<?php echo $i;?>" class="endlng" value="<?php echo $showtype['shop_locationy'];?>">

				</div>
			</div>
		</div>
	</div>
</div>
		<?php
			$i++;
		}
	}
?>

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
	    $.ajax({
            url: "maker.php",
            data: {keyword : $('#keyword').val() , typeshop : $('#typeshop').val()},
            type: "POST",
            success: function(data) {
			   var xml = data;
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
			}
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
        	var numshop = $('.endlat').length;
        	var j = 0 ;
        	for (var i = 0 ; i<numshop; i++){
        	var startlat =  parseFloat(pos.lat);
        	var startlng =  parseFloat(pos.lng);
        	var endlat = parseFloat($('#lat'+i).val());
        	var endlng = parseFloat($('#lng'+i).val());
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
		             console.log(i);
		             $('.distance'+j).append(distance);
		             j++;
		          } else {
		            window.alert('Directions request failed due to ' + status);
		          }
	        });
 	        }
		});

      }
function doNothing() {}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
