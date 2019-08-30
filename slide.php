<div class="inner_position_top">
<!--<div class="container">-->
	<div class="row">
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
		<div class="col-xl-8 col-lg-10 col-md-10 col-sm-10">
			<div class="col-12" align="center">
				<a class="navbar-brand logomn" href="index.php">
                                                                        <img height="150px;" src="images/Hajerlogo.png"/>
                                                                </a>
			</div>
                                                <div class="col-12 mt-5">
                                                        <div class="row">
                                                                <div class="col-1"></div>
                                                                <div class="col-10">
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
                                                                <div class="col-1"></div>
                                                        </div>
                                                </div>
                                                <div class="col-12 mt-5">
                                                        <div class="row">
                                                        <ul class="navbar-nav ml-auto mr-auto">
                                                                <div class="row">
                                                                <li class="nav-item">
                                                                        <a class="nav-link lg7" href="#" title="ร้านค้าที่อยู่ใกล้ที่สุด">
                                                                            <i class="fas fa-map-marker-alt ml-2 pl-1 pr-1 bgrc onb"></i><span class="lg onb1 slr">ร้านค้าที่อยู่ใกล้ที่สุด</span>
                                                                        </a>
                                                                </li>
                                                                <li class="navbar-item">
                                                                        <a class="nav-link lg7" href="#" title="ร้านค้าแนะนำ">
                                                                            <i class="fas fa-star ml-2 pl-1 pr-1 bgrc onb"></i><span class="lg onb1 slr">ร้านค้าแนะนำ</span>
                                                                        </a>
                                                                </li>
                                                                <li class="navbar-item">
                                                                        <a class="nav-link lg7" href="#" title="ร้านค้าที่ได้รับความนิยม">
                                                                            <i class="fas fa-heart ml-2 pl-1 pr-1 bgrc onb"></i><span class="lg onb1 slr">ร้านค้าที่ได้รับความนิยม</span>
                                                                        </a>
                                                                </li>
                                                                </div>
                                                        </ul>
                                                        </div>
                                                </div>
		</div>
		<div class="col-xl-2 col-lg-1 col-md-1 col-sm-1"></div>
