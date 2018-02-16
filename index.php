<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/main.css">
		<style>
		#map {
        width: 100%;
        height: 500px;
        background-color: grey;
      }
    </style>
    </head>
    <?php
	    include_once 'inc_js.php';
    ?>
 <!-- ส่วน Google Map -->
    <script>
	function initMap() {
		var uluru = {lat: 13.736717, lng: 100.523186};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 8,
			center: uluru
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map
		});
	}
	 </script>
<?php  /*
	 var uluru คือตัวแปรเก็บค่า ละติจูด ลองติจูด
	 var map เป็นตัวแปรเรียกมาใช้ โดยดึงมาจากชืื่อ ID คือ Map
	 zoom คือการ เจาะลงไปในแผนที่
	เปลี่ยน key ของ api google map ตรง js?key=
       */
?>
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVTkcgy7zjUHk94AZacwogA2I2nRKefAc&callback=initMap"></script>
 <!-- สิ้นสุด ส่วน googlemap -->
    <body>
        <div class="wrapper">
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
										<input class="form-control col-6" style="padding-top:0px;padding-bottom:0px;" type="search" placeholder="Search" aria-label="Search">
										<div class="col-1"></div>
									</div>
								</div>
								<div class="col-12" style="margin-bottom:8px;">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-4" style="padding-right:0px;"><p style="margin-bottom:0px;padding-top:2px;">เขต/อำเภอ :</p></div>
										<input class="form-control col-6" style="padding-top:0px;padding-bottom:0px;" type="search" placeholder="Search" aria-label="Search">
										<div class="col-1"></div>
									</div>
								</div>
								<div class="col-12" style="margin-bottom:8px;">
									<div class="row">
										<div class="col-1"></div>
										<div class="col-4" style="padding-right:0px;"><p style="margin-bottom:0px;padding-top:2px;">แขวง/ตำบล :</p></div>
										<input class="form-control col-6" style="padding-top:0px;padding-bottom:0px;" type="search" placeholder="Search" aria-label="Search">
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
										<!--<div class="col-1 iconshop" style="padding-right:0px;padding-left:0px;" value="4">
											<center>
												<img src="images/home5.png"width="40" height="40">
											</center>
										</div>
										<div class="col-1 iconshop" style="padding-right:0px;padding-left:0px;" value="5">
											<center>
											<img src="images/home6.png"width="40" height="40">
											</center>
										</div>
										<div class="col-1 iconshop" style="padding-right:0px;padding-left:0px;" value="6">
											<center>
											<img src="images/home7.png"width="40" height="40">
											</center>
										</div>
										<div class="col-1 iconshop" style="padding-right:0px;padding-left:0px;" value="7">
											<center>
											<img src="images/home8.png"width="40" height="40">
											</center>
										</div>
										<div class="col-1 iconshop" style="padding-right:0px;padding-left:0px;" value="8">
											<center>
												<img src="images/home.png"width="40" height="40">
											</center>
										</div>-->
										<div class="col-3"></div>
									</div>
								</div>
								<div class="col-12 mt-1">
									<div class="row">
										<div class="col-3"></div>
										<span class="col-2" id="1"></span>
										<span class="col-2" id="2"></span>
										<span class="col-2" id="3"></span>
										<!--<span class="col-md-1" id="4"></span>
										<span class="col-md-1" id="5"></span>
										<span class="col-md-1" id="6"></span>
										<span class="col-md-1" id="7"></span>
										<span class="col-md-1" id="8"></span>-->
										<div class="col-3"></div>
									</div>
								</div>
								<div class="col-12 mt-3" style="margin-bottom: 8px;">
									<div class="row">
										<div class="col-12" style="padding-right:0px;padding-left:0px;">
											<div class="row">
												<div class="col-1"></div>
												<div class="col-10" id="map" style="height:300px;"></div>
												<div class="col-1"></div>
											</div>
										</div>
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
 <script>
	 	$(document).ready(function(){1
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
					showname.innerHTML = "<center>1</center>";
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
					showname.innerHTML = "<center>2</center>";
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
					showname.innerHTML = "<center>3</center>";
					isshowpost = true;
				}
				return isshowpost;
			case '4' :
					if(isshowpost){
					var showname = document.getElementById("4");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("4");
					showname.innerHTML = "<center>4</center>";
					isshowpost = true;
				}
				return isshowpost;
			case '5' :
				if(isshowpost){
					var showname = document.getElementById("5");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("5");
					showname.innerHTML = "<center>5</center>";
					isshowpost = true;
				}
				return isshowpost;
			case '6' :
				if(isshowpost){
					var showname = document.getElementById("6");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("6");
					showname.innerHTML = "<center>6</center>";
					isshowpost = true;
				}
				return isshowpost;
			case '7' :
				if(isshowpost){
					var showname = document.getElementById("7");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("7");
					showname.innerHTML = "<center>7</center>";
					isshowpost = true;
				}
				return isshowpost;
			case '8' :
			    if(isshowpost){
					var showname = document.getElementById("8");
					showname.innerHTML = " ";
					isshowpost = false;
				}else{
					var showname = document.getElementById("8");
					showname.innerHTML = "<center>8</center>";
					isshowpost = true;
				}
				return isshowpost;
		}
});
	 });

 </script>
