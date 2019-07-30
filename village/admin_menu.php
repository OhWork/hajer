<?php if (!empty($_SESSION['member_username'])):
?>
<nav class="bg-dark" id="slidebar">
	<a class="navbar-brand brandedit" href="#" style="background-color:#343a40;box-shadow:none;">
		<h4>Hajers</h4>
	</a>
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link lgw" href="#">
				<span data-feather="home"></span> หน้าหลัก <span class="sr-only">(current)</span>
			</a>
		</li>
		<?php
			include_once 'admin_menu_manshop.php';
			include_once 'admin_menu_manweb.php';
			include_once 'admin_menu_manuser.php';
		?>
	</ul>
</nav>
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
