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
	

$(document).ready(function(){

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

var tech = getUrlParameter('menuname');
console.log(tech)
if(tech!=null){
	$.get( "php/search.php",{menu_id:tech} , function( data ) {
// alert(data);
console.log(JSON.parse(data))
console.log("ans"+JSON.parse(data).menu_name)


$("#selected_pro_name").text(JSON.parse(data).menu_name)



$.get( "php/search.php",{parent_id:JSON.parse(data).parent_id} , function( data ) {
// alert(data);
console.log(JSON.parse(data))

var Append_GUI="";

 console.log(data)
$.each(JSON.parse(data), function (index, item) {
	console.log(item)

	Append_GUI=Append_GUI+'<article class="style6" ><span class="image"><img src="images/mail/back1.jpg" alt="" /></span><a href="product_selected.php?menuname='+item.menu_id+'">	<h2>'+item.menu_name+'</h2>	<div class="content"><p>'+item.menu_name+'</p></div></a></article>';
})



$('.tiles').append(Append_GUI);





});





});




}
});






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

<div>

  <div>

      <form>
     
        <div class="inner-form">
     
            <div class="row">
              <div class="input-wrap"  >
                
                <div class="input-field">
                  
                  <input type="text" id="searchbox" class="form-control" placeholder="Search more" />
 
                </div>
              </div>
            </div>
           
         
        </div>
      </form>
    </div>


<h2 id="selected_pro_name"></h2>

</div>


							<!-- Logo -->
							<h3>Suggetions</h3>
<section class="tiles" id="tilearea1">
								
							</section>
							<br/>
							<br/>
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>
 
						</div>
					
					</header>

				
					<nav id="menu" style="background-image: linear-gradient(-90deg,#4b8c18, #27ca58);">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="generic.html">All Services</a></li>
							<li><a href="generic.html">About Us</a></li>
							
						</ul>
					</nav>

					
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