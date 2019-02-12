<?php
	$rs = $db->findByPK33('shop','typeshop','member','shop.typeshop_typeshop_id','typeshop.typeshop_id','member_member_id','member_id','member_permition',3)->execute();

?>
<div class="col-12 bmd">
	<div class="row">
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
		<div class="col-xl-8 col-lg-10 col-md-10 col-sm-10">
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
						$i = 0;
						foreach($rs as $showrs){
							$shop_id = $showrs['shop_id'];
							$rsselect= $db->specifytable("SUM(review_rate),COUNT(member_member_id)","review","review_shop_id = $shop_id")->executeAssoc();
					?>
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 svbb pb-3">
						<div class="row">
							<div class="col-md-2 col-sm-3 col-3"></div>
							<div class="col-xl-12 col-lg-12 col-md-8 col-sm-6 col-6 mt-3">
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
							<div class="col-12 lg5 mt-2">
								<p class="svbd"><?php echo $showrs['shop_name'];?>
								<img src="<?php echo $showrs['typeshop_pathpic']; ?>" width="20px" height="20px" style="float: right;"/>
								</p>
							</div>
							<div class="col-12 lg5">
								ช่วงราคา : <?php echo $showrs['shop_ratepricemin'],' - ',$showrs['shop_ratepricemax'],' บาท';?>
							</div>
							<div class="col-12 lg6 mt-2">
								<div class="row">
									<div class="pl-3">นำทาง : </div>
									<div class="lg2">
										<a class="ml-1" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $showrs['shop_locationx'],',',$showrs['shop_locationy'];?>"><span data-feather="navigation"></span></a>
									</div>
									<div class="pl-2 pr-0 svadr">
									</div>
								</div>
							</div>
							<div class="col-12 mt-2">
								<div class="row">
									<div class="col-md-2 lg6">Rate:</div>
									<?php
										  $rate = $rsselect['SUM(review_rate)'];
										  $memberrate = $rsselect['COUNT(member_member_id)'];
										  $avgrate = ($rate/$memberrate); ?>
									<div class="col-md-10 lg6" id="rate<?php echo $i;?>" class="starrate">
										<input type="hidden" id="shop_id" value="<?php echo $showrs['shop_id'];?>">
										<input type="hidden" id="avg_rating" value="<?php echo $avgrate;?>">
									</div>
								</div>
							</div>
							<div class="col-12 mt-2">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-2 col-sm-3 col-3"></div>
									<div class="col-xl-12 col-lg-12 col-md-8 col-sm-6 col-6">
										<a class="btn lgb w-100" href="index.php?url=shopopen.php&id=<?php echo $showrs['shop_id'];?>">ดูรายละเอียดเพิ่มเติม</a>
									</div>
									<div class="col-md-2 col-sm-3 col-3"></div>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-2 col-sm-3 col-3"></div>
						</div>
					</div>
					<?php
						$i++;
						}
					?>

				</div>
				<input type="hidden" id="num_shop" value="<?php echo $rslastid['shop_id'];?>">
				<input type="hidden" id="member_id" value="<?php echo $_SESSION['member_id'];?>">
			</div>
		</div>
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
<script>
$(document).ready(function(){
	var num_shop = $('#num_shop').val();
	for (var j = 0 ; j < num_shop ; j++ ){
		var avg_rating = $('#rate'+j).children('#avg_rating').val();
		$('#rate'+j).addRating({
            selectedRatings:avg_rating
			})
			$('#rate'+j).on('click',function(){
					var shop_id = $(this).children().val();
					var shop_idshow = this ;
					$.ajax({
			            url: "rate.php",
			            data: {rating : $('#rating').val() ,member_id : $('#member_id').val() ,shop_id : shop_id
				         },
			            type: "POST",
			            success: function(data) {
					            if(data == 'Nologin'){
								alert('กรุณาล็อคอินก่อนทำการให้คะแนนร้านค่ะ');
				            }else{
							    window.location.reload();
					            $('#rate').addRating({selectedRatings:avg_rating})
				            }
			            }
		    		})
		    	});
	}
});
</script>