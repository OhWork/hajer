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
<div class="col-12 dpn" style="opacity:0.8;">
	<div class="row">
		<img class="d-block w-100 bgh" src="images/bg.png">
	</div>
</div>
<div class="inner_position_top bt1">
<!--<div class="container">-->
	<div class="row">
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
		<div class="col-xl-8 col-lg-10 col-md-10 col-sm-10">
			<div class="col-12">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lgw slh">
						หาเจอเราจะค้นหาสิ่งที่คุณต้องการ
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lgw">
						<center><p>สถานที่คุณจะค้นหา เช่น ร้ายขายของชำ ,ร้านตัดผม ,ร้านขายยา ,และอื่น ๆ .....</p></center>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row">
				<form action="index.php?url=shopshow.php" method="post" class="col-xl-12 col-lg-12 col-md-12 col-sm-12" accept-charset="utf-8">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 pl-4 bgw sll br2 bb3 hrow bds">
								<input class="sip w-100" name="keyword" type="text" placeholder="ชื่อร้าน" />
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 bgw bds2">
							  <div class="row">
								<div class="form-control mtn" style="border:none;">
									<select class="col-12" name="typeshop" id="typeshop">
										<option value=""> ------- เลือก ------ </option>
										<?php
										$rs2 = $db->specifytableNoWhere('*','typeshop','')->execute();
										foreach ($rs2 as $showrs2){
											echo '<option value="', $showrs2['typeshop_id'], '">',$showrs2['typeshop_name'],'</option>';
										}
										?>
									</select>
								</div>
							  </div>
							</div>
							<button type="submit" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center bgr lg7 pl-3 pt-2 slr bts" style="border:none;">
								<span class="mt-2" data-feather="search"></span>
								<p class="ml-2 mt-1" style="font-size: 20px;">ค้นหา</p>
							</button>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
