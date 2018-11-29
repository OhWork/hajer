<?php
	$rs = $db->findByPK2('shop','typeshop','shop.typeshop_typeshop_id','typeshop.typeshop_id')->execute();

?>
<div class="col-12 bmd" style="margin-top:650px">
	<div class="row">
		<div class="col-12 svtop">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 lg5">
					<b><h4>ร้านค้าที่หาเจอแนะนำ</h4></b>
					<p class="lg6">
					<?php
						$rslastid = $db->findAllDESC('shop','shop_id')->executeAssoc();
						echo 'มากกว่า ',$rslastid['shop_id'],' ร้านที่หาเจอ...';
					?>
					</p>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 svbd"></div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"></div>
			</div>
		</div>
		<div class="col-12 mt-4">
			<div class="row">
				<?php
					foreach($rs as $showrs){
				?>
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 svbb pb-3">
					<div class="col-12 pl-0 pr-0 mt-3">
						<?php
							if($showrs['shop_pic'] != ''){
						?>
								<img src="images/shop/<?php echo $showrs['shop_pic'];?>" width="100%" height="200" style="border-radius:20px;" />
						<?php
							}else{
								?>
								<img src="images/noimage.png" width="100%" height="200" style="border-radius:20px;" />
						<?php
							}
						?>
					</div>
					<div class="col-12 lg5 svbd mt-3">
						<?php echo $showrs['shop_name'];?>
						<img src="<?php echo $showrs['typeshop_pathpic']; ?>" width="20px" height="20px" style="float: right;"/>

					</div>
					<div class="col-12 lg5">
						ช่วงราคา : <?php echo $showrs['shop_ratepricemin'],' - ',$showrs['shop_ratepricemax'],' บาท';?>
					</div>
					<div class="col-12 lg6 mt-3">
						<div class="row">
							<div class="col-4">นำทาง : </div>
							<div class="col-1 lg2">
								<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $showrs['shop_locationx'],',',$showrs['shop_locationy'];?>"><span data-feather="navigation"></span></a>
							</div>
							<div class="col-6 pl-2 pr-0 svadr">
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="lg6">Rate:
						<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" />
						<img src="images/star.png" width="15px" height="15px" />
						<img src="images/star.png" width="15px" height="15px" />
						<img src="images/star.png" width="15px" height="15px" />
						<img src="images/star.png" width="15px" height="15px" />
						</div>
					</div>
					<div class="col-12 mt-2">
						<div class="btn lg6 lgb w-100"><a href="index.php?url=shopopen.php&id=<?php echo $showrs['shop_id'];?>">ดูรายละเอียดเพิ่มเติม</a></div>
					</div>
				</div>
				<?php
					}
				?>
	</div>
</div>
