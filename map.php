<div class="col-12" id="map_canvas"style="background-color:#ffffff;height:300px;"></div>
<script>
var map, GeoMarker , mycircle ,markercircle;

      function initialize() {
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

       var infoWindow = new google.maps.InfoWindow;
	   // Change this depending on the name of your PHP or XML file
	   downloadUrl('maker.php', function(data) {
	   console.log(data);
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
