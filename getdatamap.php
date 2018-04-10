<?php
    include_once 'village/database/db_tools.php';
    include_once 'village/connect.php';

  	$subdistricts = $_POST['subdistricts'];
  	
  	$rs=$db->findByPK('subdistricts','id',$subdistricts)->executeAssoc();
  	
      print_r($rs);
//   	print_r($rs);
?>
