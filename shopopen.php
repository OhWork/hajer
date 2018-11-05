<?php
	$id = $_GET['id'];
	$rs = $db->findbyPK22('shop','typeshop','typeshop_typeshop_id','typeshop_id','shop_id',$id)->executeAssoc();
	print_r($rs);
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bt1 ">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 lg6">
							<h3>ชื่อร้าน <?php echo $rs['shop_name'];?></h3>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-0 lg6">
							หมวดหมู่ : <?php echo $rs['typeshop_name'];?>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
							<div class="lg6">Rate :
							<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" />
							<img src="images/star.png" width="15px" height="15px" />
							<img src="images/star.png" width="15px" height="15px" />
							<img src="images/star.png" width="15px" height="15px" />
							<img src="images/star.png" width="15px" height="15px" />
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<img class="d-block w-100" src="images/mapshow1.png">
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													ที่อยู่
												</div>
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													456 ถนนฉลองกรุง เขตบางรัก กรุงเทพฯ 10500
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
											<img class="d-block w-100" src="images/shop/<?php echo $rs['shop_pic'];?>.jpg">
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
											<div class="row">
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pr-0">
													<img class="d-block w-100" src="images/testpic3.jpg">
												</div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pl-0 pr-0">
													<img class="d-block w-100" src="images/testpic3.jpg">
												</div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 pl-0">
													<img class="d-block w-100" src="images/testpic3.jpg">
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bb1">
													<p>Promotion</p>
												</div>
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<p>10.00-14.00 = ลด 10%</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 lg6">
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bb1">
											<p>เวลาเปิด-ปิด <?php echo $rs['shop_oc'];?></p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>เบอร์ติดต่อ</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>Website</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>Line id</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>Facebook/pages</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>E-mail</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>รายละเอียด <?php echo $rs['shop_detail'];?></p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 bb1">
											<p>ช่วงราคา <?php echo $rs['shop_ratepricemin'],'-',$rs['shop_ratepricemax'];?></p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
											<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">มีที่จอดรถ</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">รับบัตรเครดิต</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">เดลิเวอรี</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">แอลกอฮอล์</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">WiFi มี wifi ฟรี</p>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<span class="mr-3 lg9" style="float:left" data-feather="check-square"></span><p style="float:left">รับส่งสินค้าทางไปรษณีย์</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
			</div>
		</div>
	</div>
</div>
