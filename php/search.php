<?php
include 'connection.php';

if (isset($_GET['title'])){

$sql = "SELECT * FROM `allservices` WHERE maincategory LIKE '%".$_GET['title']."%' or subcategory LIKE '%".$_GET['title']."%'  or description LIKE '%".$_GET['title']."%'";
$result = mysqli_query($conn, $sql);

$arrayval=[];

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
   

     array_push($arrayval, array("data" => $row['maincategory'],"id" => $row['id']));
           // echo  json_encode($row["maincategory"])
    }

   echo json_encode($arrayval);
} else {
    echo "0 results";
}

// mysqli_close($conn);


}


if (isset($_GET['menu_id'])){
$menud=$_GET['menu_id'];
$sql = "SELECT * FROM menu where menu_id='$menud'";
// echo $sql;
$result = mysqli_query($conn, $sql);

$arrayval=[];

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
   


   echo json_encode($row);


// mysqli_close($conn);


}
}
}



if (isset($_GET['parent_id'])){
$menud=$_GET['parent_id'];
$sql = "SELECT * FROM menu where parent_id='$menud'";
// echo $sql;
$result = mysqli_query($conn, $sql);

$arrayval=[];

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
   

array_push($arrayval, $row);



// mysqli_close($conn);


}
}

   echo json_encode($arrayval);
}

?>