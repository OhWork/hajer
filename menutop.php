<?php
	@$url = $_GET['url'];
?>
<nav class="navbar navbar-expand-lg navbar-light bgw w-100">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHJ" aria-controls="#navbarHJ" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<?php
		if($url != ''){ ?>
			<div class="col-10 ml-5">
                                                                        <div class="row">
                                                                                <form action="index_o.php?url=shopshow.php" method="post" class="col-xl-12 col-lg-12 col-md-12 col-sm-12" accept-charset="utf-8">
                                                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                                                <div class="row">
                                                                                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 pl-4 br3 sll">
                                                                                                                <input class="w-100 sip" name="keyword" type="text" placeholder="ชื่อร้าน" />
                                                                                                        </div>
                                                                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 br3" style="border-left: none;">
                                                                                                          <div class="row">
                                                                                                                <div class="form-control" style="border:none;">
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
                                                                                                        <button type="submit" class="col-xl-1 col-lg-1 col-md-12 col-sm-12 d-flex justify-content-center bgr lg7 slr" style="border:none;">
                                                                                                                                                                        <i class="fas fa-search mt-1 mr-1"></i><span class="mb-0" style="font-size: 16px;">ค้นหา</span>
                                                                                                        </button>
                                                                                                </div>
                                                                                        </div>
                                                                                </form>
                                                                        </div>
                                                                </div>
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
