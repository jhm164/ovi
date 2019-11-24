<?php

// include 'connection.php';

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"ovi");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$tp=[];






// function get_menu_tree($tp,$conn,$parent_id) 
// {
// 	// global $con;
// 	$menu = "";
// 	$sqlquery = " SELECT * FROM menu where status='1' and parent_id='" .$parent_id . "' ";
// 	$res=mysqli_query($conn,$sqlquery);
//     while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
// 	{
//            $menu .="<li><a href='".$row['link']."'>".$row['menu_name']."</a>";
		   
// 		   $menu .= "<ul>".get_menu_tree($tp,$conn,$row['menu_id'])."</ul>"; //call  recursively
		   
//  		   $menu .= "</li>";
 
// if(isset($tp[$row['menu_id']])){
// 	array_push($tp[$row['menu_id']], $row['menu_name']);
// }else{
// 	array_push($tp, array($row['menu_id']=>$row['menu_name']));
// }

//     }
    
//     // print_r(json_encode($tp));
//     return $menu;
// } 


// $t1=array();
// echo get_menu_tree($t1,$conn,6) ;


























function ownlogic($t1,$conn,$parent_id) 
{
	$sql="";
	$categories=[];
	if($parent_id=="0"){
return json_encode($t1);
	}else{
$sql="select * from menu where menu_id ='".$parent_id."'";
echo $sql."<br/>";
$result=mysqli_query($conn,$sql);


while ($row=mysqli_fetch_assoc($result)) {
// if($row["parent_id"]!="0"){
array_push($t1,$row["menu_name"] );

ownlogic($t1,$conn,$row["parent_id"]) ;


 $t1[] =  $row['menu_name'];
       
    
 // echo $t1;
print_r(json_encode($t1));
// }
}

}

	
} 






$demoarr=[];

function useless($demoarr,$conn,$id){
	$sql="";
if($id==null){
$sql="select * from menu where parent_id IS null";
}else{

$sql= " SELECT * FROM menu where status='1' and parent_id='" .$id . "' ";

}
// echo $sql."<br/>";
$result=mysqli_query($conn,$sql);

$temp=[];
while ($row=mysqli_fetch_assoc($result)) {


	array_push($temp,$row['menu_name']);
// if(isset($demoarr->$id)){


// $demoarr->$id=$row['menu_name'];
// }else{
// 	$demoarr[$id]=$row['menu_name'];
// }
// array_push($demoarr[$id], $row['menu_name']);
// echo $row['menu_name'];
// useless($demoarr,$conn,$row['parent_id']);
}
if(isset($demoarr->$id)){
$demoarr->$id=$temp;
 }else{
	$demoarr[$id]=$temp;
 }

// print_r(json_encode($temp));

  return json_encode($demoarr);
}

// echo useless($demoarr,$conn,12);
// print_r(useless($demoarr,$conn,12));





// $a1=[];

// array_push($a1,array("hello"=>array("10","sdsa","30") );

 // array_push($a1,"saurabh" );
// $a1=["sda","dsa"];
// $a1[3]=["sda","dsa"];
// $a1[4]=["sda","dsa"];

// print_r(json_encode($a1));


// echo get_menu_tree($tp,$conn,null);




























function generate_menu($conn,$parent_id=null){
$menu="";
$sql="";
if(is_null($parent_id)){
	$sql="select * from `menus`  where `parent_id` IS NULL";
}else{
	$sql="select * from `menus`  where `parent_id` =".$parent_id;
}
// echo $sql;

$result=mysqli_query($conn,$sql);

while ($row =mysqli_fetch_assoc($result)) {
	# code...


   $menu .="<li><a href='".$row['title']."'>".$row['title']."</a>";
		   
		   $menu .= "<ul>".generate_menu($conn,$row['id'])."</ul>"; //call  recursively
		   
 		   $menu .= "</li>";

	// if($row['parent_id']!=null){
// $menu.='<li>'.$row['id'].$row['title'].'</li>';
	

// 	// }
// 	$menu.='<ul><li>'.generate_menu($conn,$row['id']).'</li></ul>';

}

 echo $menu;
}

 // generate_menu($conn,null);

function get_menu_tree($con,$parent_id) 
{
	
	$menu = "";
	$sqlquery = " SELECT * FROM menu where  parent_id='$parent_id'";
	// echo $sqlquery;
	$res=mysqli_query($con,$sqlquery);
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
	{
           $menu .="<li><a href='".$row['menu_name']."'>".$row['description']."</a>";
		   
		   $menu .= "<ul>".get_menu_tree($con,$row['menu_id'])."</ul>"; //call  recursively
		   
 		   $menu .= "</li>";
 
    }
    
    return $menu;
} 
echo get_menu_tree($conn,0);


// function get_menu_tree($conn,$parent_id) 
// {
	
// 	$menu = "";
// 	// $sqlquery = " SELECT * FROM menu where status='1' and parent_id='" .$parent_id . "' ";
// 	$sql="select * from `menu`  where `parent_id` =".$parent_id;
// 	// echo $sql;
// 	$res=mysqli_query($conn,$sql);
//     while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
// 	{
//            $menu .="<li><a href='".$row['menu_name']."'>"."</a>";
		   
// 		   // $menu .= "<ul>".get_menu_tree($conn,$row['parent_id'])."</ul>"; //call  recursively
// 		    $menu .= "<ul>".$row['parent_id']."</ul>";
//  		   $menu .= "</li>";
 
//     }
    
//     return $menu;
// } 

//  echo get_menu_tree($conn,0);

?>