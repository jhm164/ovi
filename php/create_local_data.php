<?php
include 'connection.php';

$sql="select * from maincategory"; 

$response = array();
$posts = array();
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)) { 
  $title=$row['cat1_id']; 
  $url=$row['name']; 

  $posts[] = array('cat1_id'=> $title, 'name'=> $url);
} 

$response['posts'] = $posts;

$fp = fopen('maincategory.json', 'w');
fwrite($fp, json_encode($posts));
fclose($fp);





$sql="select * from subcategory";

$response = array();
$posts = array();
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)) { 
  $title=$row['cat2_id']; 
  $url=$row['name']; 
  $cat1_id=$row['cat1_id']; 

  $posts[] = array('cat2_id'=> $title, 'name'=> $url,'cat1_id'=> $cat1_id);
} 

$response['posts'] = $posts;

$fp = fopen('subcategory.json', 'w');
fwrite($fp, json_encode($posts));
fclose($fp);
?>