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
	<?php
		if($url != ''){ ?>
			<form action="index.php?url=shopshow.php" method="post" class="col-xl-8 col-lg-6 col-md-8 dpn2" accept-charset="utf-8">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pds">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 br3 bdrl">
						<input class="sip w-100" style="margin-top:9px;" name="keyword" type="text" placeholder="ชื่อร้าน" />
					</div>
					<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 br3 pt-2">
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
					<button type="submit" class="col-xl-1 col-lg-2 col-md-12 col-sm-12 btn bgr lg7 pt-2">
						<span data-feather="search"></span>
					</button>
				</div>
			</div>
			</form>
	<?php } ?>
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
			<?php
			}
			?>
		</ul>
	</div>
</nav>
