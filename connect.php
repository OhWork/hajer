<?php

$db = new db_tools();
$db->db_name = "hajer";

if(!$db->connect()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
