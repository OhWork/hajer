<!DOCTYPE html>
<?php
	session_start();
	include_once 'inc_js.php';
    include_once 'village/database/db_tools.php';
    include_once 'village/connect.php';
    include_once 'form/main_form.php';
    include_once 'form/gridview.php';

	if(empty($_SESSION['member_username'])){
		include_once 'login.php';
	}
	else{
	$selectprovinces = new selectFromDB();
	$selectprovinces->name = 'provinces_name';
	$selectprovinces->idtf = 'provinces';
	$selectdistricts = new selectFromDB();
	$selectdistricts->name = 'districts_name';
	$selectdistricts->idtf = 'districts';
	$selectsubdistricts = new selectFromDB();
	$selectsubdistricts->name = 'subdistricts_name';
	$selectsubdistricts->idtf = 'subdistricts';
 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="CSS/select2.min.css">
		<style>
		   /* Always set the map height explicitly to define the size of the div
	       * element that contains the map. */
	      #map {
	        height: 1000px;
	      }
	      /* Optional: Makes the sample page fill the window. */
	      html, body {
	        height: 100%;
	        margin: 0;
	        padding: 0;
	      }
      </style>
      <script type="text/javascript">
         // Specify a function to execute when the DOM is fully loaded.
        $(function(){
        	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
        	var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
        	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
        	$('#selProvince').change(function() {
        		$("#selDistrict").html(defaultOption);
        		$("#selSubdistrict").html(defaultOption);
        		// Perform an asynchronous HTTP (Ajax) request.
        		$.ajax({
        			// A string containing the URL to which the request is sent.
        			url: "jsonAction.php",
        			// Data to be sent to the server.
        			data: ({ nextList : 'district', provinceID: $('#selProvince').val() }),
        			// The type of data that you're expecting back from the server.
        			dataType: "json",
        			// beforeSend is called before the request is sent
        			beforeSend: function() {
        				$("#waitDistrict").html(loadingImage);
        			},
        			// success is called if the request succeeds.
        			success: function(json){
        				$("#waitDistrict").html("");
        				console.log(json);
        				// Iterate over a jQuery object, executing a function for each matched element.
        				$.each(json, function(index, value) {
        					// Insert content, specified by the parameter, to the end of each element
        					// in the set of matched elements.

        					 $("#selDistrict").append('<option value="' + value.id +
        											'">' + value.name_in_thai + '</option>');
        				});
        			}
        		});
        	});

        	$('#selDistrict').change(function() {
        		$("#selSubdistrict").html(defaultOption);
        		$.ajax({
        			url: "jsonAction.php",
        			data: ({ nextList : 'subDistrict', districtID: $('#selDistrict').val() }),
        			dataType: "json",
        			beforeSend: function() {
        				$("#waitSubdistrict").html(loadingImage);
        			},
        			success: function(json){
        				$("#waitSubdistrict").html("");
        				$.each(json, function(index, value) {
        					 $("#selSubdistrict").append('<option value="' + value.id +
        											'">' + value.name_in_thai + '</option>');
        				});
        			}
        		});
        	});
        });
    </script>
	</head>
    <body>
        <div class="wrapper"  style="background-color:#B0BEC5;">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-12">
							<div class="row">
								<nav class="navbar navbar-expand-lg  col-12" style="border-bottom: solid 1px #0097A7; background-color : #B0E0E6;">
									<a class="navbar-brand col-10" href="#" style="margin-right:0px; "><img src="images/Hajers2.png" width="80" height="50" alt="logo_test"></a>
									<button type="button" class="btn btn-outline-primary col-2" href="#">Log in</button>
								</nav>
							</div>
						</div>
						<div class="col-12" style="background-color: #B0E0E6;color:#ffffff; height: 200px;border-bottom:1px solid #0097A7;">
							<div class="row">
								<div class="col-2"></div>
								<div id="carouselExampleIndicators" class="carousel slide col-8" data-ride="carousel">
								  <ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								  </ol>
								  <div class="carousel-inner">
									<div class="carousel-item active">
									  <img class="d-block w-100" src="images/noimage.png" height="199px" alt="First slide">
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="images/noimage.png" height="199px" alt="Second slide">
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="images/noimage.png" height="199px" alt="Third slide">
									</div>
								  </div>
								  <a class="carousel-control-prev bg-dark" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next bg-dark" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
								<div class="col-2"></div>
							</div>
						</div>
						<div class="col-12" style="color:#0097A7;background-color: #ffffff;">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-10" style="padding-top:8px;">
											<p style="margin-bottom:8px;">ร้านค้า</p>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
								<div class="col-12">
									<div class="row">
										<div class="col-2">
											<a class="carousel-control-prev" style="width:100%" href="#carouselExampleIndicatorsicon" role="button" data-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											</a>
										</div>
										<div id="carouselExampleIndicatorsicon" class="carousel slide col-8" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<img class="d-block" src="images/home.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home2.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home3.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home4.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home5.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home6.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home7.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home8.png" height="80px" width="80px" alt="First slide" style="float:left;">
												</div>
												<div class="carousel-item">
													<img class="d-block" src="images/home.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home2.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home3.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home4.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home5.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home6.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home7.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home8.png" height="80px" width="80px" alt="First slide" style="float:left;">
												</div>
												<div class="carousel-item">
													<img class="d-block" src="images/home.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home2.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home3.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home4.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home5.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home6.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home7.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/home8.png" height="80px" width="80px" alt="First slide" style="float:left;">

												</div>
											</div>
										</div>
										<div class="col-2">
											<a class="carousel-control-next bg-dark" style="width:100%" href="#carouselExampleIndicatorsicon" role="button" data-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											</a>
										</div>
									</div>
								</div>
								<!--<div class="col-12 mt-1">
									<div class="row">
										<div class="col-3" style="height:30px; margin-top:10px;"></div>
										<span class="col-2 showname" id="1"></span>
										<span class="col-2 showname" id="2"></span>
										<span class="col-2 showname" id="3"></span>
										<div class="col-3"></div>
									</div>
									<div class="col-12 mt-1">
										 <div id="map"></div>
										</div>
										</div>-->
							</div>
						</div>
						<div class="col-12" style="color:#0097A7;background-color: #ffffff;">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-10" style="padding-top:8px;">
											<p style="margin-bottom:8px;">ส่วนโปรโมชั่น</p>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
								<div class="col-12">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-10" style="padding-top:8px;">
											<div class="btn-group btn-group-toggle" data-toggle="buttons">
												<label class="btn btn-secondary active">
												    <input type="radio" class="rangepro" name="options" id="option1" autocomplete="off" value="1" checked> 50 บาท
												  </label>
												  <label class="btn btn-secondary">
												    <input type="radio" class="rangepro" name="options" id="option2" autocomplete="off" value="2"> 100 บาท
												  </label>
												  <label class="btn btn-secondary">
												    <input type="radio"class="rangepro"  name="options" id="option3" autocomplete="off" value="3"> 300 บาท
												  </label>
											</div>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12" id="map_canvas"style="background-color:#ffffff;height:500px;">
						</div>
						<div class="col-12" style="background-color:#B0E0E6;height:200px;color:#ffffff;">
							<div class="row">
								<div class="col-3"></div>
								<div class="col-6">
									<center><p style="margin-bottom:0;">Site MAP (want a moment)</p></center>
								</div>
								<div class="col-3"></div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div> <!--end container-->
        </div> <!--end wrapper-->
    </body>
</html>
 <!-- ส่วน Google Map -->
  <?php  /*
	 var uluru คือตัวแปรเก็บค่า ละติจูด ลองติจูด
	 var map เป็นตัวแปรเรียกมาใช้ โดยดึงมาจากชืื่อ ID คือ Map
	 zoom คือการ เจาะลงไปในแผนที่
	เปลี่ยน key ของ api google map ตรง js?key=
       */
?>
 <!-- สิ้นสุด ส่วน googlemap -->
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
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
	            var pos = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            }
			    infoWindow.open(map);
	            map.setCenter(pos);
// 	            addCircle(pos);
	          }, function() {
	            handleLocationError(true, infoWindow, map.getCenter());
	          });
	        } else {
	          // Browser doesn't support Geolocation
	          handleLocationError(false, infoWindow, map.getCenter());
	        }
	        var i =0;
	        google.maps.event.addListener(map,'click', function(event) {
				 if (i ==1) {
					mycircle.setMap(null);
					markercircle.setMap(null);
					i=0;
			    }
			    else {
			       markercircle = new google.maps.Marker({
			                map: map,
			                position: event.latLng,
// 			                icon:'images/user.png',
			              });
					addCircle(event.latLng);
					i++;
					 bounds = Circle.getBounds()
			    }
			    function addCircle(location) {
					  // Add the circle for this city to the map.
					$("input[type='radio']:checked").each(function() {
					var valuebutton = $(this).val();
					  if(valuebutton == 1){
						mycircle = new google.maps.Circle({
					      strokeColor: '#FF0000',
					      strokeOpacity: 0.8,
					      strokeWeight: 2,
					      fillColor: '#FF0000',
					      fillOpacity: 0.35,
					      map: map,
					      center: location,
					      draggable:false,
					       	// หน่วยเป็น เมตร นะจ๊ะนะ
					      radius: 1000,
					    });
						}
						else if(valuebutton == 2){
						mycircle = new google.maps.Circle({
					      strokeColor: '#FF0000',
					      strokeOpacity: 0.8,
					      strokeWeight: 2,
					      fillColor: '#FF0000',
					      fillOpacity: 0.35,
					      map: map,
					      center: location,
					      draggable:false,
					       	// หน่วยเป็น เมตร นะจ๊ะนะ
					      radius: 5000,
					    });
						}
						else if(valuebutton == 3){
						mycircle = new google.maps.Circle({
					      strokeColor: '#FF0000',
					      strokeOpacity: 0.8,
					      strokeWeight: 2,
					      fillColor: '#FF0000',
					      fillOpacity: 0.35,
					      map: map,
					      center: location,
					      draggable: true,
					       	// หน่วยเป็น เมตร นะจ๊ะนะ
					      radius: 10000,
					    });
					  	}
					});
				}
  			});
  	       var infoWindow = new google.maps.InfoWindow;

			          // Change this depending on the name of your PHP or XML file
			          downloadUrl('maker.php', function(data) {
// 				          console.log(data);
			            var xml = data.responseXML;
			            var markers = xml.documentElement.getElementsByTagName('marker');
			            Array.prototype.forEach.call(markers, function(markerElem) {
			              var id = markerElem.getAttribute('id');
			              var shopname = markerElem.getAttribute('shopname');
			              var detailshop = markerElem.getAttribute('detailshop');
			              var ocshop = markerElem.getAttribute('ocshop');
			              var priceshop = markerElem.getAttribute('priceshop');
			              var placeshop = markerElem.getAttribute('placeshop');
			              var point = new google.maps.LatLng(
			                  parseFloat(markerElem.getAttribute('lat')),
			                  parseFloat(markerElem.getAttribute('lng')));

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

      if(!navigator.geolocation) {
        alert('Your browser does not support geolocation');
      }
  </script>
<?php
	}
?>
