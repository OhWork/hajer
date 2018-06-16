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
						<div class="col-12" style="background-color: #0097A7;color:#ffffff; height: 200px;border-bottom:1px solid #0097A7;">
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
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
												</div>
												<div class="carousel-item">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
												</div>
												<div class="carousel-item">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
													<img class="d-block" src="images/noimage.png" height="80px" width="80px" alt="First slide" style="float:left;">
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
						<div class="col-12" style="background-color: #0097A7;color:#ffffff;height:250px;">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-10" style="padding-top:8px;">
											<p style="margin-bottom:8px;">ร้านค้าแนะนำ</p>
										</div>
										<div class="col-2" style="padding-top:6px;text-align:right;">
											<a href="#" style="color:#ffffff;">ดูทั้งหมด ></a>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="row">
										<div class="col-2">
											<div class="row">
												<div class="col-12">
													<img src="images/noimage.png" width="100%" height="150">
												</div>
												<div class="col-12" style="text-align:right;">
													<p style="margin:0;">Shop name</p>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;margin-left:88px;">5</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:5px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="row">
												<div class="col-12">
													<img src="images/noimage.png" width="100%" height="150">
												</div>
												<div class="col-12" style="text-align:right;">
													<p style="margin:0;">Shop name</p>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;margin-left:88px;">5</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:5px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="row">
												<div class="col-12">
													<img src="images/noimage.png" width="100%" height="150">
												</div>
												<div class="col-12" style="text-align:right;">
													<p style="margin:0;">Shop name</p>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;margin-left:88px;">5</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:5px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="row">
												<div class="col-12">
													<img src="images/noimage.png" width="100%" height="150">
												</div>
												<div class="col-12" style="text-align:right;">
													<p style="margin:0;">Shop name</p>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;margin-left:88px;">5</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:5px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="row">
												<div class="col-12">
													<img src="images/noimage.png" width="100%" height="150">
												</div>
												<div class="col-12" style="text-align:right;">
													<p style="margin:0;">Shop name</p>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;margin-left:88px;">5</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:5px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="row">
												<div class="col-12">
													<img src="images/noimage.png" width="100%" height="150">
												</div>
												<div class="col-12" style="text-align:right;">
													<p style="margin:0;">Shop name</p>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;margin-left:88px;">5</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:5px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12" style="background-color:#ffffff;height:250px;color: #0097A7;">
							<div class="row">
								<div class="col-12" style="padding-top:8px;">
									<p>Promotion</p>
								</div>
							</div>
						</div>
						<div class="col-12" style="background-color:#0097A7;height:200px;color:#ffffff;">
							<div class="row">
								<div class="col-1"></div>
								<div class="col-10">
									<div class="row">
										<div class="col-6" style="height:200px;border-right:10px solid #ffffff;">
											<div class="row">
												<div class="col-12">
													<P>REVIEW</P>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;">BEST OF SHOP</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:50px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;">BEST OF SHOP</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:50px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;">BEST OF SHOP</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:50px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;">BEST OF SHOP</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:50px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
												<div class="col-12">
												<div class="row">
													<p style="margin-bottom:0;">BEST OF SHOP</p>
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;margin-left:50px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
													<img src="images/star.png" width="15px" height="15px" style="margin-top:4px;">
												</div>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="row">
												<div class="col-12" style="margin-top:60px;margin-bottom:8px;">
													<div class="row">
														<div class="col-3"></div>
														<div class="col-8">
															<input type="password" class="form-control" placeholder="SEARCH ONLY...">
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div class="col-6"></div>
														<div class="col-2">
															<button type="button" class="btn btn-outline-light">Success</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-1"></div>
							</div>
						</div>
						<div class="col-12" id="map_canvas"style="background-color:#ffffff;height:250px;">
						</div>
						<div class="col-12" style="background-color:#0097A7;height:200px;color:#ffffff;">
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
 var map, GeoMarker;

      function initialize() {
        var mapOptions = {
          zoom: 10,
          center: new google.maps.LatLng(-34.397, 150.644),
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

        GeoMarker = new GeolocationMarker();
        GeoMarker.setCircleOptions({fillColor: '#808080'});

        google.maps.event.addListenerOnce(GeoMarker, 'position_changed', function() {
          map.setCenter(this.getPosition());
          map.fitBounds(this.getBounds());
          $('#lat').val(GeoMarker.position.lat());
		  $('#lng').val(GeoMarker.position.lng());
          console.log($('#lat').val());
          console.log($('#lng').val());
        });

        google.maps.event.addListener(GeoMarker, 'geolocation_error', function(e) {
          alert('There was an error obtaining your position. Message: ' + e.message);
        });

        GeoMarker.setMap(map);
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
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVTkcgy7zjUHk94AZacwogA2I2nRKefAc&libraries=places&callback=initMap"async defer></script>
