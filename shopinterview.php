<?php
	$rs = $db->findAll('shop')->execute();

?>
<div class="col-12 bmd">
	<div class="row">
		<div class="col-12 svtop">
			<div class="row">
				<div class="col-4 lg5">
					<b><h4>Recommended stores</h4></b>
					<p class="lg6">
					<?php
						$rslastid = $db->findAllDESC('shop','shop_id')->executeAssoc();
						echo 'Over ',$rslastid['shop_id'],' store ads...';
					?>
					</p>
				</div>
				<div class="col-4 svbd"></div>
				<div class="col-4"></div>
			</div>
		</div>
		<div class="col-12 mt-4">
			<div class="row">
				<?php
					foreach($rs as $showrs){
				?>
				<div class="col-3 svbb pb-3">
					<div class="col-12 pl-0 pr-0 mt-3">
						<img src="images/shop/<?php echo $showrs['shop_pic'];?>.jpg" width="100%" height="200" style="border-radius:20px;" />
					</div>
					<div class="col-12 lg5 svbd mt-3">
						<?php echo $showrs['shop_name'];?>
					</div>
					<div class="col-12 lg5">
						<?php echo $showrs['shop_ratepricemin'],' - ',$showrs['shop_ratepricemax'],' บาท';?>
					</div>
					<div class="col-12 lg6 mt-3">
						<div class="row">
							<div class="col-2 lg2">
								<span data-feather="navigation"></span>
							</div>
							<div class="col-10 pl-2 pr-0 svadr">
								<?php echo $showrs['chop_place']?>
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
