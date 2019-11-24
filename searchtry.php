
<?php $data=file_get_contents("php/language.json");

$array = json_decode($data, true);

$lang=$_GET["lang"];

function language_translator($array,$lang,$word){
	return $array[0][$lang][$word];
}

// print_r($array[0][$lang]["home"]);

?>
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
		
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Poppins:700" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/main.css" />
	<script src="assets/js/jquery.min.js" />


	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/searchbox.css" />


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
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};




function language_translate(data,lang,word){
console.log(data[0][lang][word]);

return data[0][lang][word];
}
	
var maincategory_api_fetched_data=[];
var language="eng";
$(document).ready(function(){
language=getUrlParameter('lang');

console.log(language)




$.get( "php/language.json", function( data ) {

console.log(data)
maincategory_api_fetched_data=data;
language_translate(data,language,"home");

});






	$.get( "php/search_category.php",{parentid:0} , function( data ) {
$("#myList").css({"visibility":"hidden"});

var Append_GUI="";
$('.tiles').empty();
 // console.log(JSON.parse(data).slice(0,3))


maincategory_api_fetched_data=JSON.parse(data);
// $.each(JSON.parse(data), function (index, item) {

JSON.parse(data).slice(0,4).map((item,index)=>{

	// console.log(item)

	Append_GUI=Append_GUI+'<article class="style6" ><span class="image"><img src="'+item.image+'" alt="" /></span><a href="product_selected.php?menuname='+item.menu_id+'">	<h2>'+item.menu_name+'</h2>	<div class="content"><p>'+item.description+'</p></div></a></article>';
})



$('.tiles').append(Append_GUI);



});

$(document).on("click",".style6",function(){
	$('.modal-state').attr({"checked":"true"});
})


$("#left-circle1").click(function(){
 // alert($(this).attr("areaname"))
if($(this).attr("class")=="fa fa-chevron-circle-left"){
	$(this).removeClass("fa fa-chevron-circle-left")
	$('#'+$(this).attr("areaname")).css({"flex-wrap":"wrap"})
$('#'+$(this).attr("areaname")).css({"overflow":"visible"})
	$(this).addClass("fa fa-chevron-circle-down")
}else if($(this).attr("class")=="fa fa-chevron-circle-down"){
	$(this).removeClass("fa fa-chevron-circle-down")
	$('#'+$(this).attr("areaname")).css({"flex-wrap":"nowrap"})
$('#'+$(this).attr("areaname")).css({"overflow":"scroll"})
	$(this).addClass("fa fa-chevron-circle-left")
}

});




$(document).click(function(){
	$("#myList").css({"visibility":"hidden"});
})

$.get( "php/search.php",{title:$(this).val()} , function( data ) {
$("#myList").css({"visibility":"hidden"});

$.each(JSON.parse(data), function (index, item) {
  // console.log(item);
 //  $("#searchbox").append("<a href='' id="+item.id+">"+item.data+"</a>");
 // $("#myList li").filter(function() {
 // 	 $(this).text("")
 //      $(this).text(item.data)
 //    });

 $("#myList").append('<li style="height:40px;padding-left:3%;border:1px solid gray;" class="list-group-item" uniqueid="'+item.id+'"> '+item.data+ '</li>')
 
});

});


$(document).on("click",".list-group-item",function(){
	alert($(this).attr("uniqueid"))



	


})




  $("#searchbox").on("keyup", function() {
  	// alert("hello")
  	 $("#myList").css({"visibility":"visible"});
    // var value = $(this).val().toLowerCase();
    $.get( "php/search_category.php",{menuname:$(this).val()} , function( data ) {



$.each(JSON.parse(data), function (index, item) {
	// console.log(item)

	 $("#myList ").append("<li id='"+item.menu_id+"'' class='menu_selected'>"+item.menu_name+"<li>")
})

})
     $("#myList li").remove();

  });




$(document).on('click','.menu_selected',function(){

var parentid=$(this).attr("id");
alert(parentid)
	$.get( "php/search_category.php",{parentid:parentid} , function( data ) {
$("#myList").css({"visibility":"hidden"});

var Append_GUI="";
$('.tiles').empty();
 console.log(data)
$.each(JSON.parse(data), function (index, item) {
	console.log(item)

	Append_GUI=Append_GUI+'<article class="style6"><span class="image"><img src="'+item.image+'" alt="" /></span><a href="generic.html" style="pointer-events: none;">	<h2>'+item.menu_name+'</h2>	<div class="content"><p>'+item.description+'</p></div></a></article>';
})



$('.tiles').append(Append_GUI);

// $('.tiles').css({"flex-wrap":"wrap"});
// $('.tiles').css({"overflow-x": "scroll"})

});
})




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
	

		
			<div id="wrapper">

				<!-- Header -->


					<header id="header">
							<a href="index.html" class="logo">
									<span class="symbol" ><img src="images/logo.png" class="logo_class" alt="" /></span>
								</a>
						<div class="inner">
 <h1><?php echo language_translator($array,$lang,"welcome"); ?></h1>
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
          <header>
            <div class="travel-type-wrap" style="margin:0 auto;">
             

							



          </header>
		  <div class="main-form" id="main-form" style="margin:4%">

            <div class="row">
              <div class="input-wrap"  >
                
                <div class="input-field">
                  
                  <input type="text" id="searchbox" class="form-control" placeholder="<?php language_translate($array,$lang,'search'); ?>" />
<br/>
                   <ul class="list-group" id="myList" style="margin: -3% 0 0em 0;height: 200px;overflow-x: scroll;">
   
  </ul>  
                </div>
              </div>
            </div>
           
                 </div>
        </div>
      </form>
    </div>
					</header>

				
					<nav id="menu" style="background-image: linear-gradient(-90deg,#4b8c18, #27ca58);">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html"><?php echo language_translator($array,$lang,"home"); ?></a></li>
							<li><a href="generic.html">All Services</a></li>
							<li><a href="generic.html"><?php echo language_translator($array,$lang,"aboutus"); ?></a></li>
							
						</ul>
					</nav>

					<div id="main" >
						<div class="inner" >
							<header>
								



							</header>
							<h3>Main Services</h3>
							<section class="tiles" id="tilearea1">
								
							</section>
							<i class="fa fa-chevron-circle-left" areaname="tilearea1" id="left-circle1" style="float:right"  aria-hidden="true"></i>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer" style="background-image: linear-gradient(-90deg,#4b8c18, #27ca58);color:white;font-weight:bold;">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<ul>
												<li>Electrician</li>
												<li>Electrician</li>
												<li>Electrician</li>
												
												
																				</ul>
										</div>
										<div class="field half">
											<ul>
												<li>Electrician</li>
												<li>Electrician</li>
												<li>Electrician</li>
												
												
																				</ul>
										</div>
										
									</div>
									
								</form>
							</section>
							<section>
								<h2>Follow Us On</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
									<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>
						
						</div>
					</footer>
			


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	
   

	
	</body>
</html>