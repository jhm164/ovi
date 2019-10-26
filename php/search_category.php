<?php
include 'connection.php';

if(isset($_GET['menuname'])){

Call_func($conn,$_GET['menuname']);

}
if(isset($_GET['parentid'])){

submenu_func($conn,$_GET['parentid']);

}



function Call_func($conn,$menu_name){
$arr=array();
$sql = "select * from menu where `menu_name` Like '%".$menu_name."%'";
 // echo $sql;
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_assoc($result)) {
	// echo $row["parent_id"];
	//echo json_encode($row);
	$arr[]=$row;
	 // array_push($arr,array("data"=>$row["parent_id"]));
}
 	echo json_encode($arr);
 
}




function submenu_func($conn,$parent_id){
$arr=array();
$sql = "select * from menu where `parent_id`='".$parent_id."'";
  // echo $sql;
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_assoc($result)) {
	// echo $row["parent_id"];
	//echo json_encode($row);
	$arr[]=$row;
	 // array_push($arr,array("data"=>$row["parent_id"]));
}
 	echo json_encode($arr);
 
}









?>