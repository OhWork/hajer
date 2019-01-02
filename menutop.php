<?php
	@$url = $_GET['url'];
?>
<nav class="navbar navbar-expand-lg navbar-light bgw w-100">
	<a class="navbar-brand logomn" href="index.php">
		<img height="50px;" src="images/Hajerlogo.png">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHJ" aria-controls="#navbarHJ" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarHJ">
		<ul class="navbar-nav ml-auto">
			<li class="navbar-item pt-1 pb-1 pl-2 pr-2">
				<a class="navbar-link" href="#">
					<div class="lg1" style="float:left;">หน้าแรก</div>
				</a>
			</li>
			<li class="navbar-item pt-1 pb-1 pl-2 pr-2 mr-2">
				<a class="navbar-link" href="index.php?url=aboutus.php">
					<div class="lg1" style="float:left;">เกี่ยวกับเรา</div>
				</a>
			</li>
			<?php if ($_SESSION['member_id'] == ''){?>
			<li class="navbar-item">
				<a class="navbar-link" href="login.php">
					<div class="pt-1 pb-1 pl-2 pr-2 lgb lg2" style="float:left;">เข้าสู่ระบบ</div>
				</a>
			</li>
			<?php
				}else{
			?>
			<li class="navbar-item">
				<a class="navbar-link" href="logout.php">
					<div class="pt-1 pb-1 pl-2 pr-2 lgb lg2" style="float:left;">ออกจากระบบ</div>
				</a>
			</li>
			<?php } if($url != ''){ ?>
				<li class="navbar-item">
				<form action="index.php?url=shopshow.php" method="post" class="col-xl-8 col-lg-10 col-md-8 col-sm-12" accept-charset="utf-8">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 pl-4 bgw sll br2 hrow">
							<input class="sip w-100" name="keyword" type="text" placeholder="ชื่อร้าน" />
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 bgw">
							<div class="dropdown">
								<div class="lg6" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<select class="form-control col-12" name="typeshop" id="typeshop">
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
						<button type="submit" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 bgr lg7 pl-3 pt-2 slr bts" style="border:none;">
							<span class="mt-2" style="margin-left:20%; float:left;" data-feather="search"></span>
							<p class="ml-2 mt-1" style="font-size: 20px;float:left;">ค้นหา</p>
						</button>
					</div>
				</div>
			</form>
			</li>
			<?php }else{

			}
			?>
		</ul>
	</div>
</nav>
