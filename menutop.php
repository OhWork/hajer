<?php
	@$url = $_GET['url'];
?>
<nav class="navbar navbar-expand-lg navbar-light bgw w-100">
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
	<div class="navbar-collapse collapse mbr" id="navbarHJ">
		<ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                                <a class="nav-link bgrc" href="#" style="color:#fff;" title="หน้าแรก">
                                                    <i class="fas fa-home mr-1 ml-1 lg7"></i>
                                                </a>
                                        </li>
                                        <li class="navbar-item ml-1">
			<a class="nav-link bgrc" href="index.php?url=aboutus.php" style="color:#fff;" title="เกี่ยวกับเรา">
                                                        <i class="fas fa-chess-queen mr-1 ml-1 lg7"></i>
			</a>
                                        </li>
			<?php if ($_SESSION['member_id'] == ''){?>
                                        <li class="navbar-item ml-1">
			<a class="nav-link bgrc" href="login.php" style="color:#fff;" title="เข้าสู่ระบบ">
                                                        <i class="fas fa-sign-in-alt mr-1 ml-1 lg7"></i>
			</a>
                                        </li>
			<?php
				}else{
			?>
			<li class="navbar-item">
				<a class="nav-link btn-danger" href="logout.php" style="color:#fff;" title="ออกจากระบบ">
				<i class="fas fa-sign-out-alt mr-1 ml-1"></i>
				</a>
			</li>
			<?php
			}
			?>
		</ul>
	</div>
</nav>
