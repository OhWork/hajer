<div class="inner_position_top">
<!--<div class="container">-->
	<div class="row">
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
		<div class="col-xl-8 col-lg-10 col-md-10 col-sm-10">
			<div class="col-12" align="center">
				<a class="navbar-brand logomn" href="index.php">
                                                                        <img height="150px;" src="images/Hajerlogo.png"/>
                                                                </a>
			</div>
			<div class="col-12 mt-5">
				<div class="row">
				<form action="index.php?url=shopshow.php" method="post" class="col-xl-12 col-lg-12 col-md-12 col-sm-12" accept-charset="utf-8">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 pl-4 bgw sll br2 bb3 hrow bds">
								<input class="sip w-100" name="keyword" type="text" placeholder="ชื่อร้าน" style="outline: none;" />
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
			<div class="col-12 mt-3">
				<h1 style="color : red;">เว็บอยู่ระหว่างการปรับปรุง และพัฒนา ระบบอาจใช้งานได้ไม่เต็ม 100% ขออภัยมา ณ ที่นี้ ด้วยครับ</h1>
			</div>
		</div>
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
