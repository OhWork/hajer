<?php
    if (!empty($_SESSION['member_username'])):
    date_default_timezone_set('Asia/Bangkok');
    $log_user = $_SESSION['member_username']." ".$_SESSION['member_password'];
    $form = new form();
    $lbname = new label('ชื่อ-นามสกุลเจ้าของร้าน');
    $lbnameshop = new label('ชื่อร้านค้า');
    $lbposition = new label('ตำแหน่ง');
    $lbdetail = new label('รายละเอียดร้านค้า');
    $lbrateprice = new label('เรทราคา');
    $lbgooglemap = new label('ที่ตั้งในGoogleMap');
    $lbstatus = new label('สถานะร้านค้า');
    $button = new buttonok('เปลี่ยนสถานะ','','btn btn-success col-12','');
    $radioshopenable = new radioGroup();
	$radioshopenable->name = 'shop_enable';
	$radioshopenable->add('ร้านค้ายังมีอยู่',1,'');
	$radioshopenable->add('ไม่มีร้านค้าแล้ว',0,'checked');

    if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$r = $db->findByPK32('shop','member','typeshop','shop.member_member_id','member.member_id','shop.typeshop_typeshop_id','typeshop.typeshop_id')->executeRow();
	}
echo $form->open("form_reg","form","col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12","shop_update_status.php","");
?>
<div class='row'>
<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8' style="border: solid 1px #eaecef;border-radius: 6px;padding-top:16px;padding-bottom:16px;">
	<div class='row'>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<h4>แบบฟอร์มการแก้ไขข้อมูล และอัพเดตสถานะร้านค้า</h4>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbnameshop ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['shop_name'] ?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbname ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['member_username'],$r['member_password'];?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbdetail ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['shop_detail'] ?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbrateprice ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<center><label><?php echo $r['shop_ratepricemin'],'-',$r['shop_ratepricemax']; ?></label></center>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbgooglemap; ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
				<div id="map_canvas" class="col-md-12" style="padding-right: 0;padding-left: 0;padding-top:7px; height:200px;"></div>
				</div>
			</div>
		</div>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="border-bottom: solid 1px #eaecef;">
			<div class='row'>
				<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 hrsstpad' style="border-right: solid 1px #eaecef;">
					<center><?php echo $lbstatus; ?></center>
				</div>
				<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 hrsstpad'>
					<?php echo $radioshopenable;?>
				</div>
			</div>
		</div>
		<?php echo "<input type='hidden' name='shop_id' id='idnaja' value='$_GET[id]'/>"; ?>
		<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3'>
			<div class='row'>
				<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
					<div class='row'>
						<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
						<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8'>
							<a href="admin_index.php?url=add_shop.php&id=<?php echo $_GET['id']; ?>" class="btn btn-warning col-12">แก้ไขข้อมูล</a>
						</div>
						<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
					</div>
				</div>
    			<div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
    				<div class='row'>
    					<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
						<div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8'>
							<?php echo $button ?>
						</div>
						<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class='col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2'></div>
</div>
<script>
	function initMap(uluru) {
// 					var uluru = {lat: 13.773, lng: 100.516};
                    var map = new google.maps.Map(document.getElementById('map_canvas'), {
                      zoom: 17,
                      center: uluru,
                      streetViewControl: false,
                      disableDefaultUI: true,
                      styles: [
						  {
						    "featureType": "administrative",
						    "elementType": "geometry",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  },
						  {
						    "featureType": "poi",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  },
						  {
						    "featureType": "road",
						    "elementType": "labels.icon",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  },
						  {
						    "featureType": "transit",
						    "stylers": [
						      {
						        "visibility": "off"
						      }
						    ]
						  }
                      ]
                    });
                    var marker = new google.maps.Marker({
	                    position: uluru,
	                    map: map,
	                    draggable:true,
	                });
			}
		  	$.ajax({
	            type: "POST",
	            url: "getmarker.php",
	            data: {checkid : $('#idnaja').val()},
	            dataType: "json",
	            success: function(data) {
					var latt =  parseFloat(data.shop_locationx);
					var lngg =  parseFloat(data.shop_locationy);
					console.log(data);
					var uluru = {lat: latt, lng: lngg};
		            initMap(uluru);
	            }
	        });
</script>
<?php
     echo $form->close();
	endif;
?>
