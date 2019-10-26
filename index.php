<?php
include 'php/connection.php';
include 'php/search_category.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style type="text/css">
	ul {
  list-style-type: none;
}
</style>

<script type="text/javascript">
	$(document).ready(function(){



	$("#searchhere").keyup(function(){
		// console.log($(this).val())
	

$.get( "php/search_category.php",{menuname:$(this).val()} , function( data ) {
$("#myList").css({"visibility":"hidden"});
$('.cat li').remove();
$.each(JSON.parse(data), function (index, item) {
	// console.log(item)

	$('.cat').append("<li id='"+item.menu_id+"'' class='menu_selected'>"+item.menu_name+"<li>")
})


});
});

$(document).on('click','.menu_selected',function(){

var parentid=$(this).attr("id");
	$.get( "php/search_category.php",{parentid:parentid} , function( data ) {
$("#myList").css({"visibility":"hidden"});

var Append_GUI="<ul  class='cat'>";
 console.log(data)
$.each(JSON.parse(data), function (index, item) {
	console.log(item)

	Append_GUI=Append_GUI+"<li id='"+item.menu_id+"'' class='menu_selected'>"+item.menu_name+"<li>";
})

Append_GUI=Append_GUI+"</ul>";

$('body').append(Append_GUI);



});
})

});

</script>

</head>
<body class="container">
<input type="text" id="searchhere" name="">
<ul class="cat">
	
</ul>
</body>
</html>