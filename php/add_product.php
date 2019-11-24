<?php
include 'connection.php';

if(isset($_POST['service_id'])&&isset($_POST['desciption'])&&isset($_POST['price'])&&isset($_POST['address'])&&isset($_POST['vendor_id'])&&isset($_POST['image'])&&isset($_POST['discounted_price'])){

$service_id=$_POST['service_id'];
$desciption=$_POST['desciption'];
$price=$_POST['price'];
$address=$_POST['address'];
$vendor_id=$_POST['vendor_id'];
$image=$_POST['image'];
$discounted_price=$_POST['discounted_price'];


echo $service_id." ".$desciption." ".$price." ".$address." ".$vendor_id." ".$image." ".$discounted_price ;






}




?>