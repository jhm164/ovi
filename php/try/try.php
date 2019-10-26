<?php
include '../connection.php';

$id=$_GET['id'];


Call_func($conn,$id);
$arr=array();
function Call_func($conn,$id){

$sql = "select * from menu where parent_id=".$id;
// echo $sql;
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_assoc($result)) {
	// echo $row["parent_id"];
	//echo json_encode($row);
	$arr[]=$row;
	 // array_push($arr,array("data"=>$row["parent_id"]));
}

 

 if(sizeof($arr)==""){
 	echo "no subcategory";
 }else{
 	echo json_encode($arr);
 }
}










?>