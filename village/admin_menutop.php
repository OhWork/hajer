<nav class="navbar navbar-expand-md navbar-dark bg-dark col-md-12">
    <a class="navbar-brand brandedit" href="#"><h4>Hajers</h4></a>
    <p class="navbar-nav px-3 text-white col"><?php echo $head; ?></p>
        <a class="" style="text-align:right;color:#ffffff;">
            <?php echo "คุณ".$_SESSION['member_username'];
            ?></a>
        <a class="nav-link" href="logout.php"><span data-feather="log-out"></span>ออกจากระบบ</a>
</nav>
