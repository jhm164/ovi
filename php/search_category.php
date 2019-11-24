<?php
include 'connection.php';

if(isset($_GET['menuname'])){

Call_func($conn,$_GET['menuname']);

}
if(isset($_GET['parentid'])){

submenu_func($conn,$_GET['parentid']);

}

if(isset($_GET['category_name'])&&isset($_GET['parent_id'])){

Insert_category($conn,$_GET["category_name"],$_GET['parent_id']);

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


if(isset($_GET['data'])){

$filename = $_FILES['file']['name'];

$location = "./upload/".$filename;
echo $filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);


$valid_extensions = array("jpg","jpeg","png");
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
  
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo $location;
   }else{
      echo 0;
   }
}
}



function Insert_category($conn,$categoryname,$category_parent){
$arr=array();
$sql = "Insert into menu(`menu_id`,`menu_name`,`parent_id`,`status`) values(null,'$categoryname','$category_parent','1')";
  echo $sql;


if (mysqli_query($conn,$sql)) {
	echo "success";
}else{
	echo "fail to add";
}

 	
 
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