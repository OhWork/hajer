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
        <link rel="stylesheet" href="CSS/animate.min.css">
        <link rel="stylesheet" href="CSS/owl.carousel.min.css">
        <link rel="stylesheet" href="CSS/owl.theme.default.min.css">
		<link rel="stylesheet" href="CSS/main.css">
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
	      .item{
		      height: 100px;
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
		<?php include "menutop.php" ?>
		<?php include "content.php" ?>
		</div>
		</div>
		</div>
		<!--
						<div class="col-12" style="background-color:#ffffff;height:250px;color: #0097A7;">
							<div class="row">
								<div class="col-12" style="padding-top:8px;">
									<p>Promotion</p>
									<button type="button" class="btn btn-dark"><a class="text-white" href="promotion.php">เลือกราคาโปรโมชั่น</a></button>
								</div>
							</div>
						</div>
						<div class="col-12" style="background-color:#B0E0E6;height:200px;color:#ffffff;">
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
						<div class="col-12" id="map_canvas"style="background-color:#ffffff;height:300px;">
						</div>
						<div class="col-12" style="background-color:#B0E0E6;height:200px;color:#ffffff;">
							<div class="row">
								<div class="col-3"></div>
								<div class="col-6">
									<center><p style="margin-bottom:0;">Site MAP (want a moment)</p></center>
								</div>
								<div class="col-3"></div>
							</div>
						</div>-->
    </body>
	<footer>
		<?php include "footer.php" ?>
	</footer>
</html>
 <script>
feather.replace();
var owl = $('.owl-carousel');
owl.owlCarousel({
    animateOut: 'fadeOutLeft',
    animateIn: 'fadeInRight',
    loop:true,
    margin:48,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    autoWidth:true,
    dots: true,
    responsive:{
       0:{
            items:1
        },
        600:{
            items:3
        },
        960:{
            items:5
        },
        1200:{
            items:6
        }
    }
});
$('.img-responsive').addClass('ics');
  </script>
