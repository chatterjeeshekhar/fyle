<?php
include 'connect.php';
$q = $_REQUEST['q'];
$offset = 0;
if($_REQUEST["offset"]!=""){
	$offset = $_REQUEST["offset"];
}
$limit = 3;
if($_REQUEST["limit"]!=""){
	$limit = $_REQUEST["limit"];
}
$sql = "SELECT ifsc, bank_id, branch, address, city, district, state from branches WHERE branch like '%$q%' ORDER BY ifsc LIMIT $offset,$limit";
	//echo $sql;
	$result = mysqli_query($con, $sql);
	$jsonData = array();
	if(mysqli_num_rows($result) > 0){
	while ($array = mysqli_fetch_assoc($result)) {
	    $jsonData[] = $array;
	}
	$jsonData = array('branches' => $jsonData);
	echo (json_encode($jsonData));
}