<?php

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


?>