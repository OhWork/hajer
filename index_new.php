<!DOCTYPE html>
<?php
	include_once 'inc_js.php';
    include_once 'village/database/db_tools.php';
    include_once 'village/connect.php';
    include_once 'form/main_form.php';
    include_once 'form/gridview.php';

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
								<nav class="navbar navbar-expand-lg navbar-light bg-light col-12" style="border-bottom: solid 1px #0097A7">
									<a class="navbar-brand col-10" href="#" style="margin-right:0px;">LOGO</a>
									<button type="button" class="btn btn-outline-primary col-2" href="#">Log in</button>
								</nav>
							</div>
						</div>
						<div class="col-12" style="background-color: #0097A7;color:#ffffff;">
							<div class="row">
								<div class="col-12" style="height:200px;">Slide ONLY</div>	
							</div>
						</div>
						<!-- <div class="col-12" style="color:#0097A7;background-color: #ffffff;height:250px;border-bottom: solid 1px #0097A7;">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-10" style="padding-top:8px;">
											<p style="margin-bottom:8px;">ส่วนสงเสริมการขาย</p>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
							</div>
						</div> -->
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
										<div class="col-3"></div>
										<div class="col-2 iconshop" style="padding-right:0px;padding-left:0px;" value="1">
											<center>
												<img src="images/Shoes.png"width="40" height="40">
											</center>
										</div>
										<div class="col-2 iconshop" style="padding-right:0px;padding-left:0px;" value="2">
											<center>
												<img src="images/pill.png"width="40" height="40">
											</center>
										</div>
										<div class="col-2 iconshop" style="padding-right:0px;padding-left:0px;" value="3">
											<center>
												<img src="images/shop.png"width="40" height="40">
											</center>
										</div>
										<div class="col-3"></div>
									</div>
								</div>
								<div class="col-12 mt-1">
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
										</div>
								</div>
							</div>
						<div class="col-12" style="background-color: #0097A7;color:#ffffff;height:150px;">
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
	 	$(document).ready(function() {
		 $('#selProvince').select2({
		 	placeholder: "กรุณาเลือกจังหวัด",
		 	allowClear: true
		 });
		 $('#selDistrict').select2({
		 	placeholder: "กรุณาเลือกอำเภอ",
		 	allowClear: true
		 });
		 $('#selSubdistrict').select2({
		 	placeholder: "กรุณาเลือกตำบล",
		 	allowClear: true
		 });
var isshowpost = false;
	$(".iconshop").hover(function(){
		var key = $(this).attr('value');
		switch(key){
			case "1":
				if(isshowpost){
					var showname = document.getElementById("1");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("1");
					showname.innerHTML = "<center>ร้านรองเท้า</center>";
					isshowpost = true;
				}
				return isshowpost;
			case '2' :
				if(isshowpost){
					var showname = document.getElementById("2");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("2");
					showname.innerHTML = "<center>ร้ายขายยา</center>";
					isshowpost = true;
				}
				return isshowpost;
			case '3' :
				if(isshowpost){
					var showname = document.getElementById("3");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("3");
					showname.innerHTML = "<center>ร้านขายของชำ</center>";
					isshowpost = true;
				}
				return isshowpost;
				}
	});
});
function initMap(uluru) {
// 					var uluru = {lat: 13.773, lng: 100.516};
                    var map = new google.maps.Map(document.getElementById('map'), {
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
/*
                    var marker = new google.maps.Marker({
                      position: {lat: <?php echo $showdata['shop_locationx'];?>, lng: <?php echo $showdata['shop_locationy'];?>},
                      map: map,
                    });
*/
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

$('#selSubdistrict').on("change",function(){
            $.ajax({
            url: "getdatamap.php",
            data: {subdistricts : $('#selSubdistrict').val()},
            type: "POST",
            dataType: "json",
            success: function(data) {
 	            var uluru = {lat: parseFloat(data.latitude), lng: parseFloat(data.longitude)};
  	            console.log(data);
	        	initMap(uluru);
            }
        });
    });
  </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVTkcgy7zjUHk94AZacwogA2I2nRKefAc&libraries=places&callback=initMap"async defer></script>
<!--<div class="row">
										<div class="col-1"></div>
										<div class="col-10" style="padding-top:8px;">
											<p style="margin-bottom:8px;">ร้านค้าที่ต้องการค้นหา</p>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
								<div class="col-12" style="margin-bottom:8px;">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-4" style="padding-right:0px;"><p style="margin-bottom:0px;padding-top:2px;">เมือง :</p></div>
										<div class="col-6">
											<select class="form-control col-12" id="selProvince">
												<option value=""> ------- เลือก ------ </option>
												<?php
													$rs = $db->conditions2("id,name_in_thai","provinces","CONVERT(name_in_thai USING TIS620) ASC")->execute();
													while($row = mysqli_fetch_assoc($rs)){
														echo '<option value="', $row['id'], '">', $row['name_in_thai'],'</option>';
													}
												?>
											</select>
										</div>
										<div class="col-1" id="baowiwfc"></div>
									</div>
								</div>
								<div class="col-12" style="margin-bottom:8px;">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-4" style="padding-right:0px;"><p style="margin-bottom:0px;padding-top:2px;">เขต/อำเภอ :</p></div>
										<div class="col-6">
											<select class="form-control col-12" id="selDistrict">
																				<option value=""> ------- เลือก ------ </option>
																				</select><span id="waitDistrict"></span>
																				</span>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
								<div class="col-12" style="margin-bottom:8px;">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-4" style="padding-right:0px;"><p style="margin-bottom:0px;padding-top:2px;">แขวง/ตำบล :</p></div>
										<div class="col-6">
											<select class="form-control col-12" id="selSubdistrict">
																				<option value=""> ------- เลือก ------ </option>
																				</select><span id="waitSubdistrict">
																				</span>

										</div>
										<div class="col-1"></div>
									</div>
								</div>-->