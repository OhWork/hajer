<?php
include 'village/database/db_tools.php';
include 'village/connect.php';
// Set delay 1 second.
sleep(1);


$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {
	case 'district':
		$provinceID = isset($_GET['provinceID']) ? $_GET['provinceID'] : '';
        $rs = $db->conditions3("id,name_in_thai","districts","province_id = '$provinceID'","CONVERT(name_in_thai USING TIS620) ASC")->execute();
		break;
	case 'subDistrict':
		$districtID = isset($_GET['districtID']) ? $_GET['districtID'] : '';
		$rs = $db->conditions3("id,name_in_thai","subdistricts","district_id = '$districtID'","CONVERT(name_in_thai USING TIS620) ASC")->execute();
		break;
}

$data = array();
while($row = mysqli_fetch_assoc($rs)) {
	$data[] = $row;
}

// Print the JSON representation of a value
echo json_encode($data);
?>
