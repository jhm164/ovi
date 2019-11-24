<?php
include 'connection.php';


if(isset($_GET['parentid'])){

list_all_childs($conn,$_GET['parentid']);

}



function list_all_childs($conn,$parentid){
$arr=array();
$sql = "select menu_id from menu where `parent_id` = '$parentid'";

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

$list_parent=array();

$x=0;

function get_menu_tree($con,$parent_id,$x,$list_parent) 
{
	echo $x;
	$menu = "";
	$p=$parent_id;

	$sqlquery = " SELECT * FROM menu where status='1' and parent_id='$parent_id' ";
	// echo $sqlquery;
	$res=mysqli_query($con,$sqlquery);
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
	{
           $menu .="<li><a href='".$row['menu_name']."'>".$row['menu_name']."</a>";
		   // get_menu_tree($con,$row['menu_id'],$x+1,$list_parent);
		   // $menu .= "<ul>".get_menu_tree($con,$row['menu_id'],$x+1,$list_parent)."</ul>"; //call  recursively
		   array_push($list_parent, array("parent_id"=>get_menu_tree($con,$row['menu_id'],$x+1,$list_parent)));
 		   $menu .= "</li>";

    }
    
    return $p;
} 
 // print_r(get_menu_tree($conn,0,$x,$list_parent));
// echo json_encode(get_menu_tree($conn,0,$x,$list_parent));
// echo json_encode($list_parent);


// $demo=array();


// $v["hello"]=array('menu_id'=>"3");
// $v1["world"]=array('menu_id2'=>"3");
// // array_push($demo,array("id"=> $v));
// // $demo["x"]=array('menu_id'=>"3");
// array_push($demo, array('menu_id'=>"3"));

//  // array_push($demo,array("hell"=>array('menu_id'=>"3")));
//   // array_push($demo, $v1);
// print_r(json_encode($demo));






?>