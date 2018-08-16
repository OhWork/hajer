<?php
    include_once 'database/db_tools.php';
    include_once 'connect.php';

	  $id = $_POST['checkid'];

	  $rs = $db->findByPK('shop','shop_id',$id)->executeAssoc();
     echo json_encode($rs);
?>
