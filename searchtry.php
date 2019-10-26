<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Ovi</title>
		<meta charset="utf-8" />
		
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		
#myList ul{
	padding-left: 0px;
}

#myList li{
	background-color: white;
	margin: 0 auto;
	text-align: left;
}



	</style>
	
<script>
	

$(document).ready(function(){


$(document).click(function(){
	$("#myList").css({"visibility":"hidden"});
})




$(document).on("click",".list-group-item",function(){
	alert($(this).attr("uniqueid"))



	


})




  $("#searchbox").on("keyup", function() {

  	$("#myList").css({"visibility":"visible"});
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

$("#searchbox").on("keyup", function() {
		// console.log($(this).val())
	// $("#myList").css({"visibility":"visible"});

$.get( "php/search_category.php",{menuname:$(this).val()} , function( data ) {
$("#myList").css({"visibility":"hidden"});
$("#myList").remove();
$.each(JSON.parse(data), function (index, item) {
	// console.log(item)

	$("#myList").append("<li id='"+item.menu_id+"'' class='menu_selected'>"+item.menu_name+"<li>")
})


});
});










// $('#searchbox').keydown(function(){


// })


//  $('#searchbox').keyup(function(){
// $.get( "php/search.php",{title:$(this).val()} , function( data ) {


// $.each(JSON.parse(data), function (index, item) {
//   console.log(item);
//   $("#searchbox").append("<a href='' id="+item.id+">"+item.data+"</a>");
//  $("#myList li").filter(function() {
//  	 $(this).text("")
//       $(this).text(item.data)
//     });
 
// });

// });

// })

});


// $("#searchbox").change(function(){
// 	alert("hhere")

// $.post( "php/search.php",{title:$(this).value()} , function( data ) {
//  console.log(data)
// });
// })





</script>


	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->


					<header id="header" style="background-image: linear-gradient(-90deg,#4abbc7, #e2e2e2);">
							<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Ovi</span>
								</a>
						<div class="inner">
 <h1>Welcome to Ovi Services</h1>
							<!-- Logo -->
							

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>
 
						</div>
						  <div class="s012">

      <form>
        <fieldset>
       
        </fieldset>
        <div class="inner-form">
       
		  <div class="main-form" id="main-form" style="margin:4%">

            <div class="row">
              <div class="input-wrap"  >
                
                <div class="input-field">
                  
                  <input type="text" id="searchbox" class="form-control" placeholder="Search Service here" />
<br/>
                   <ul class="list-group" id="myList">
   
  </ul>  
                </div>
              </div>
            </div>
           
                 </div>
        </div>
      </form>
    </div>
					</header>

				
					<nav id="menu" style="background-image: linear-gradient(-90deg, #77c2cf,#327880);">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="generic.html">All Services</a></li>
							<li><a href="generic.html">About Us</a></li>
							
						</ul>
					</nav>

					<div id="main" style="background-image: linear-gradient(-90deg,#4abbc7, #e2e2e2);">
						<div class="inner">
							<header>
								<h1>Ovi Multi Services<br />





								 </h1>
							


							</header>
					
						</div>
					</div>

				<!-- Footer -->
					
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		
   
<link rel="stylesheet" href="assets/css/searchbox.css" />
	
	</body>
</html>