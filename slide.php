<!--<div id="carouselExampleIndicators" class="carousel slide boxslide" data-ride="carousel">
	<!--<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>--
	<div class="carousel-inner picslide">
		<div class="carousel-item active">
			<img class="d-block w-100 h-100" src="images/testpic4.jpg" alt="First slide">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100 h-100" src="images/testpic2.jpg" alt="Second slide">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100 h-100" src="images/testpic3.jpg" alt="Third slide">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="sr-only">Next</span>
	</a>
</div>-->
<div class="col-12" style="opacity:0.8;">
	<div class="row">
		<img class="d-block w-100 h-100" src="images/mapss.jpg">
	</div>
</div>
<div class="inner_position_top">
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-xl-2 col-lg-1"></div>
				<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 lg7 slh">
					FIND THE BEST PLACES TO BE
				</div>
				<div class="col-xl-2 col-lg-1"></div>
			</div>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-xl-2 col-lg-1"></div>
				<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 lg7">
					<center><p>All Location - form Shop,hair cut,drugstore and more..</p></center>
				</div>
				<div class="col-xl-2 col-lg-1"></div>
			</div>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-xl-2 col-lg-1">
				</div>
				<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pl-4 bgw sll br2" style="height:59px;">
							<input class="sip" type="text" placeholder="Keywords" />
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bgw">
							<div class="dropdown">
								<div class="lg6" style="padding-top:16px;" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<p style="float:left;">All Categories</p>
									<span style="float:right;" data-feather="chevron-down"></span>
								</div>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropownMenuButton2">
									<a class="dropdown-item" href="#">
										<input class="sip" type="text" placeholder="Categories" />
									</a>
									<?php
										$rs2 = $db->specifytableNoWhere('*','typeshop','ORDER BY RAND() LIMIT 4')->execute();
										foreach ($rs2 as $showrs2){
									?>
									<a class="dropdown-item" href="#" style="color:#B0BEC5;"><?php echo $showrs2['typeshop_name'];?></a>
									<?php
									}
									?>
								</div>
							</div>
						</div>
						<button href=shopshow.php type="submit" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 bgr lg7 pl-3 pt-2 slr bts" style="border:none;">
							<span class="mt-2" style="float:left;" data-feather="search"></span>
							<p class="ml-2 mt-1" style="font-size: 20px;float:left;">SEARCH</p>
						</button>
					</div>
				</div>
				<div class="col-xl-2 col-lg-1">
				</div>
			</div>
		</div>
