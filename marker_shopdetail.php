<?php
    include_once 'village/database/db_tools.php';
    include_once 'village/connect.php';

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Select all the rows in the markers table
$id = $_POST['id'];
 $rs = $db->findByPK22('shop','typeshop','shop.typeshop_typeshop_id','typeshop.typeshop_id','shop_id',$id)->execute();

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($rs)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['shop_id'] . '" ';
  echo 'shopname="' . parseToXML($row['shop_name']) . '" ';
  echo 'detailshop="' . parseToXML($row['shop_detail']) . '" ';
  echo 'ocshop="'. parseToXML($row['shop_oc']) . '" ';
  echo 'priceshopmin="'. parseToXML($row['shop_ratepricemin']) . '" ';
  echo 'priceshopmax="'. parseToXML($row['shop_ratepricemax']) . '" ';
  echo 'placeshop="'. parseToXML($row['chop_place']) . '" ';
  echo 'lat="' . $row['shop_locationx'] . '" ';
  echo 'lng="' . $row['shop_locationy'] . '" ';
  echo 'typeshop="' . $row['typeshop_typeshop_id'] . '" ';
  echo 'icon="' . $row['typeshop_pathpic'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>
