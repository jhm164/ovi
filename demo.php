<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	

$(document).ready(function(){

$('#search').keyup(function(){
$.get( "php/search.php",{title:$(this).val()} , function( data ) {


$.each(JSON.parse(data), function (index, item) {
  console.log(item);
  $("div").append("<option class='selecteditem' id="+item.id+">"+item.data+"</option>");

 
});

});

})

});



</script>



</head>
<body class="container">

<input type="text" id="search" name="">
<select></select>
</body>
</html>
