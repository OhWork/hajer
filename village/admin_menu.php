<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Hajersystem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin_index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_index.php?url=show_provinces.php">provinces</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_index.php?url=show_district.php">district</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_index.php?url=show_subdistrict.php">subdistrict</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_index.php?url=show_shop.php">shop</a>
      </li>
    </ul>
    <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
  </div>
</nav>
=======
<?php if (!empty($_SESSION['member_username'])):
?>
<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2" style="height: 100%;">
	<div class="row">
		<div class="list-group" style="height: 100%;">
			<nav class="d-none d-md-block bg-light sidebar">
			  <div class="sidebar-sticky">
				<ul class="nav flex-column">
				  <li class="nav-item">
					<a class="nav-link" href="#">
					  <span data-feather="home"></span>หน้าหลัก <span class="sr-only">(current)</span>
					</a>
				  </li>
				   <?php
						  include_once 'admin_menu_manshop.php';
						  include_once 'admin_menu_manweb.php';
					?>
				</ul>
			  </div>
			</nav>
		</div>
	</div>
</div>
<?php endif; ?>
 <script>
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;
        // passes on every "a" tag
        $("ul a").each(function() {
	        var urlcheck = url.split('#');
            // checks if its the same on the address bar
            if (urlcheck == (this.href)) {
	               	$(this).parents(0).addClass("show");
				   	$(this).addClass("active");
				   	$(this).parents(0).attr("aria-expanded", true);
            }
            else if(urlcheck != (this.href)) {
				if(this.href.match("user_add_user")){
				   	$('#user').addClass("show");
				   	$('#user_show').addClass("active");
				   	$('#user').attr("aria-expanded", true);

				}
				else if(this.href.match("user_add_permission")){
					$('#user').addClass("show");
					$('#user_per').addClass("active");
					$('#user').attr("aria-expanded", true);
				}
				else if(this.href.match("user_add_division")){
					$('#user').addClass("show");
					$('#user_divi').addClass("active");
					$('#user').attr("aria-expanded", true);
				}
				else if(this.href.match("user_add_zoo")){
					$('#user').addClass("show");
					$('#user_zoo').addClass("active");
					$('#user').attr("aria-expanded", true);
				}
				else if(this.href.match("user_add_submenu")){
					$('#user').addClass("show");
					$('#user_submenu').addClass("active");
					$('#user').attr("aria-expanded", true);
				}
				else if(this.href.match("user_add_mainmenu")){
					$('#user').addClass("show");
					$('#user_mainmenu').addClass("active");
					$('#user').attr("aria-expanded", true);
				}
            }

        });
    });
</script>

>>>>>>> 717a7977bb915b375dc10c2c605b4dc8538247ee
