<?php
	$rs = $db->findByPK2('shop','typeshop','shop.typeshop_typeshop_id','typeshop.typeshop_id')->execute();

?>
<div class="col-12 bmd">
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
					$i = 0;
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
						<p><?php echo $showrs['shop_name'];?>
						<img src="<?php echo $showrs['typeshop_pathpic']; ?>" width="20px" height="20px" style="float: right;"/>
						</p>
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
						<div class="row">
							<div class="col-md-2 lg6">Rate:</div>
							<div class="col-md-10 lg6" id="rate<?php echo $i;?>">
							</div>
						</div>
					</div>
					<div class="col-12 mt-2">
						<a class="btn lgb w-100" href="index.php?url=shopopen.php&id=<?php echo $showrs['shop_id'];?>">ดูรายละเอียดเพิ่มเติม</a>
					</div>
					<input type="hidden" id="shop_id" value="<?php echo $showrs['shop_id'];?>">
				</div>
				<?php
					$i++;
					}
				?>

	</div>
	<input type="hidden" id="num_shop" value="<?php echo $rslastid['shop_id'];?>">
	<input type="hidden" id="member_id" value="<?php echo $_SESSION['member_id'];?>">
</div>
<script>
$(document).ready(function(){
	var num_shop = $('#num_shop').val();
	for (var j = 0 ; j < num_shop ; j++ ){
		$('#rate'+j).addRating(
			$('#rate'+j).on('click',function(){
				var shop_idshow = this ;
				$.ajax({
		            url: "rate.php",
		            data: {rating : $('#rating').val() ,member_id : $('#member_id').val() ,shop_id : $('#shop_id').val()
			         },
		            type: "POST",
		            success: function(data) {
			            if(data == 'Nologin'){
							alert('กรุณาล็อคอินก่อนทำการให้คะแนนร้านค่ะ');
			            }
			            else if(data == 1){
							shop_idshow.innerHTML = '<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" />';
			            }else if(data == 2){
							shop_idshow.innerHTML = '<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;"/><img src="images/star.png" width="15px" height="15px" />';
			            }else if(data == 3){
				            shop_idshow.innerHTML = '<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" /><img src="images/star.png" width="15px" height="15px" /><img src="images/star.png" width="15px" height="15px" />';
			            }else if(data == 4){
				           shop_idshow.innerHTML = '<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" /><img src="images/star.png" width="15px" height="15px" /><img src="images/star.png" width="15px" height="15px" /><img src="images/star.png" width="15px" height="15px" />';
			            }else if(data == 5){
				           shop_idshow.innerHTML = '<img src="images/star.png" width="15px" height="15px" style="margin-left:5px;" /><img src="images/star.png" width="15px" height="15px" /><img src="images/star.png" width="15px" height="15px" /><img src="images/star.png" width="15px" height="15px" /><img src="images/star.png" width="15px" height="15px" />';
			            }

		            }
	    		})
	    	})
		);
	}
});
</script>
