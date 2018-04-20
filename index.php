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
	</head>
    <body>
        <div class="wrapper"  style="background-color:#B0BEC5;">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="row">
						<nav class="navbar navbar-expand-lg navbar-light bg-light col-12" style="border-bottom: solid 1px #0097A7">
							<a class="navbar-brand" href="#">Navbar</a>
						</nav>
						<div class="col-12" style="background-color: #0097A7;color:#ffffff;">
							<div class="row">
								<div class="col-12">
									<div class="row">
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
											<?php echo $selectprovinces->selectFromTB('provinces','id','name_in_thai',''); ?>
										</div>
										<div class="col-1" id="baowiwfc"></div>
									</div>
								</div>
								<div class="col-12" style="margin-bottom:8px;">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-4" style="padding-right:0px;"><p style="margin-bottom:0px;padding-top:2px;">เขต/อำเภอ :</p></div>
										<div class="col-6">
											<?php echo $selectdistricts->selectFromTB('districts','id','name_in_thai',''); ?>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
								<div class="col-12" style="margin-bottom:8px;">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-4" style="padding-right:0px;"><p style="margin-bottom:0px;padding-top:2px;">แขวง/ตำบล :</p></div>
										<div class="col-6">
											<?php echo $selectsubdistricts->selectFromTB('subdistricts','id','name_in_thai',''); ?>
										</div>
										<div class="col-1"></div>
									</div>
								</div>
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
		 $('#provinces').select2({
		 	placeholder: "กรุณาเลือกจังหวัด",
		 	allowClear: true
		 });
		 $('#districts').select2({
		 	placeholder: "กรุณาเลือกอำเภอ",
		 	allowClear: true
		 });
		 $('#subdistricts').select2({
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
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
                    });
                   console.log(uluru);
                  }
$('#subdistricts').on("change",function(){
//             console.log($('#subdistricts').val());
            $.ajax({
            url: "getdatamap.php",
            data: {subdistricts : $('#subdistricts').val()},
            type: "POST",
            dataType: "json",
            success: function(data) {
 	            var uluru = {lat: parseFloat(data.latitude), lng: parseFloat(data.longitude)};
// 	            console.log(uluru);
	        	initMap(uluru);
            }
        });
    });
  </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVTkcgy7zjUHk94AZacwogA2I2nRKefAc&libraries=places&callback=initMap"async defer></script>
