<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bt1 ">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 mb-3">
			<div class="row">
				<div class="col-xl-3 col-lg-3"></div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="col-12" id="map_canvas"style="background-color:#ffffff;height:300px;"></div>
				</div>
				<div class="col-xl-3 col-lg-3"></div>
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
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
					<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
						<?php
						if($showkey['shop_pic'] != ''){
						?>
						<img class="d-block w-100 rounded-circle" height="50" src="images/shop/<?php echo $showkey['shop_pic']; ?>">
						<?php }else{ ?>
						<img class="d-block w-100 rounded-circle" height="50" src="images/noimage.png">
						<?php
						}
						?>
					</div>
					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				<p id="shop_name<?php echo $i;?>" class="shop_name"><?php echo $showkey['shop_name'];?></p>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $showkey['shop_locationx'],',',$showkey['shop_locationy'];?>"><span data-feather="navigation"></span></a>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0" align="center">
				<p class="distance<?php echo $i;?>"></p>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				<?php
					$shop_id = $showkey['shop_id'];
					$rsselect= $db->specifytable("SUM(review_rate),COUNT(member_member_id)","review","review_shop_id =$shop_id ")->executeAssoc();
					$rate = $rsselect['SUM(review_rate)'];
					$memberrate = $rsselect['COUNT(member_member_id)'];
					$avgrate = ($rate/$memberrate); ?>
				<div class="col-md-10 lg6" id="rate<?php echo $i;?>" class="starrate">
					<input type="hidden" id="shop_id" value="<?php echo $showrs['shop_id'];?>">
					<input type="hidden" id="avg_rating" value="<?php echo $avgrate;?>">
				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				<a href="index.php?url=shopopen.php&id=<?php echo $showkey['shop_id'];?>"><span data-feather="eye"></span></a>
			</div>
			<input type="hidden" id="keyword" value="<?php echo $keyword?>">
			<input type="hidden" id="lat<?php echo $i;?>" class="endlat" value="<?php echo $showkey['shop_locationx'];?>">
			<input type="hidden" id="lng<?php echo $i;?>" class="endlng" value="<?php echo $showkey['shop_locationy'];?>">
		</div>
		<?php
			$i++;
		}
		if($i == 0){
		?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3"></div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3">
				<center><p class="text-danger">ไม่พบร้านที่คุณต้องการค้นหา</p></center>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3"></div>
				<input type="hidden" id="checkmap" value="<?php echo $i;?>">
			</div>
		</div>
		<?php
		}
	}elseif($typeshop != ''){
		$rstype=$db->specifytable('*','shop JOIN typeshop ON shop.typeshop_typeshop_id = typeshop.typeshop_id ',"typeshop_typeshop_id = '$typeshop'")->execute();
		 $i =0 ;
		foreach($rstype as $showtype){
		?>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mt-3">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				<p id="shop_name<?php echo $i;?>" class="shop_name"><?php echo $showtype['shop_name'];?></p>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-xl-1 col-lg-2 col-md-1 col-sm-1"></div>
					<div class="col-xl-7 col-lg-8 col-md-7 col-sm-7 col-3">
						<?php
						if($showtype['shop_pic'] != ''){
						?>
							<img class="d-block w-100" height="70" src="images/shop/<?php echo $showtype['shop_pic']; ?>">
						<?php }else{ ?>
							<img class="d-block w-100" height="70" src="images/noimage.png">
						<?php
						}
						?>
					</div>
					<div class="col-xl-1 col-lg-2 col-md-1 col-sm-1 col-9"></div>
				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				ตัวนำทาง --><a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $showtype['shop_locationx'],',',$showtype['shop_locationy'];?>"><span data-feather="navigation"></span></a>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0" align="center">
				ระยะห่างจากร้านค้า <p class="distance<?php echo $i;?>"></p>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				<?php
				$shop_id = $showtype['shop_id'];
				$rsselect= $db->specifytable("SUM(review_rate),COUNT(member_member_id)","review","review_shop_id =$shop_id ")->executeAssoc();
				$rate = $rsselect['SUM(review_rate)'];
				$memberrate = $rsselect['COUNT(member_member_id)'];
				$avgrate = ($rate/$memberrate); ?>
				<div class="col-md-10 lg6" id="rate<?php echo $i;?>" class="starrate">
					<input type="hidden" id="shop_id" value="<?php echo $showrs['shop_id'];?>">
					<input type="hidden" id="avg_rating" value="<?php echo $avgrate;?>">
				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
				ดูรายละเอียดร้าน <a href="index.php?url=shopopen.php&id=<?php echo $showtype['shop_id'];?>"><span data-feather="eye"></span></a>
			</div>
		<input type="hidden" id="typeshop" value="<?php echo $typeshop?>">
		<input type="hidden" id="lat<?php echo $i;?>" class="endlat" value="<?php echo $showtype['shop_locationx'];?>">
		<input type="hidden" id="lng<?php echo $i;?>" class="endlng" value="<?php echo $showtype['shop_locationy'];?>">
	</div>
		<?php
			$i++;
		}
		if($i == 0){
		?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3"></div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3">
				<center><p class="text-danger">ไม่พบร้านที่คุณต้องการค้นหา</p></center>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3"></div>
				<input type="hidden" id="checkmap" value="<?php echo $i;?>">
			</div>
	</div>
	<?php
		}
	}else{
	?>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3"></div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3">
				<center><p class="text-danger">ไม่พบร้านที่คุณต้องการค้นหา</p></center>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bb1 pb-3"></div>
				<input type="hidden" id="checkmap" value="<?php echo $i;?>">
			</div>
	</div>
	<?php
	}
?>

<script>
	var checkid = $('#checkmap').val();
	if(checkid == 0 ){
		$('#map_canvas').hide();
	}
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
		             $('.distance'+j).append(distance);
		             j++;
		             directionsDisplay.setMap(null);

		          } else {
		            window.alert('Directions request failed due to ' + status);
		          }
	        });
 	        }
		});

      }
function doNothing() {}
google.maps.event.addDomListener(window, 'load', initialize);
function truncateText(text, length) {
  if (text.length <= length) {
    return text;
  }

  return text.substr(0, length) + '\u2026'
}

for(var i = 0 ; i < $('.shop_name').length; i++){
	let truncated;
	truncated = truncateText($('#shop_name'+i).text(), 30);
	$('#shop_name'+i).text(truncated);
	console.log();
}
for (var j = 0 ; j < i ; j++ ){
		var avg_rating = $('#rate'+j).children('#avg_rating').val();
		$('#rate'+j).addRating({
            selectedRatings:avg_rating
			})
			$('#rate'+j).on('click',function(){
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
	}
</script>
