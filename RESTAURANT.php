<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>RESTAURANT</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="stylesheet" href="Bootstrap/CSS/Bootstrap.min.css" />
    <link rel="stylesheet" href="Bootstrap/CSS/Main.css" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	
	
	<!-- Top Row-->
	
	<div class ="container-fluid">
		<div class ="row" style ="background-color:#4B515D;">
			<div class ="col-md-3 offset-md-10">
			<?php
				if(isset($_SESSION['username'])){
					
					echo '<form action="logout.inc.php" method="POST">
					<button type="submit" class="btn btn-dark" name="logout" style ="margin-left:90px;">Logout</button></form>';
					
				}else{
					echo '<button type="button" class="badge badge-light" data-toggle="modal" data-target="#exampleModalCenter"
					style ="margin-left:40px;">SIGN IN / JOIN NOW
					</button>';
					
				}

			?>
				
				
			</div>
		</div>
	
	</div>	
		
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class ="form-container">
						<form class="form-group" action ="" method ="POST">
							<h3 class="login">Discovery Login</h3>
							<p style ="padding-top:10px;">Login now to receive exclusive benefits for bookings on our website</p>
							<label for="exampleInput">User Name</label>
							<input type="text" name="username" class="form-control" id="exampleInput" placeholder="Enter username"required>
							<small id="emailHelp" class="form-text text-muted">We'll never share your info with anyone else.</small>
						
							<label for="exampleInputPassword1"class ="mt-1">Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"required>
						
							<button type="submit" name="login" id="" class="btn btn-primary btn-block mt-3" >Submit</button>
						
							<p class ="para2"style ="margin-top:20px;">Not a DISCOVERY Member yet?
							<a href="SIGN UP.php" class="btn btn-link" role="button">JOIN NOW</a></p>
						</form>
					
					<?php
						if(isset($_POST['login']))
						{
							$username=$_POST['username'];
							$password=$_POST['password'];
							$encrypted_password = md5($password);
							
							$query="select * from userinfo WHERE username='$username' AND password= '$encrypted_password'";
							$query_run = mysqli_query($conn,$query);
							
							if(mysqli_num_rows($query_run)>0)
							{
								//valid
								$_SESSION['username']= $username;
								header('location:HOME.php');
							}
							else
							{
								//invalid
								echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
							}
						}
						
						?>
					
				</div>
			</div>	
		</div>
	</div>
	</div>
	
	
       <!--navigation-->
  <nav class =" navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
       <a class="navbar-brand" href="HOME.php" style = "color:#76ff03;" >Alisson</a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	        <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse offset-md-1" id="navbarResponsive">
		
			<ul class="navbar-nav">
			
				<li class="nav-item active"> 
			    <a class="nav-link" href="HOME.php"><h6>HOME</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ROOMS.php"><h6>ROOMS</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="RESTAURANT.php"><h6>RESTAURANT</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="OVERVIEW.php"><h6>OVERVIEW</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="SERVICES.php"><h6>SERVICES</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="CONTACTS.php"><h6>CONTACTS</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="OFFER.php"><h6>OFFER</h6></a>
				</li>
			</ul>	
			<ul class="nav button offset-md-2" style ="padding-left:85px;">
			<a href="BOOK Trial.php" class="btn btn-info navbar-btn btn-lg">BOOK NOW</a>
			</ul>
		</div>
	</div>
	</nav>	
	
	<!--Image Slider-->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="3" ></li>
	
</ol>
<div class="carousel-inner">
     <div class="carousel-item active">
	      <img class ="Image" src="images/img/res-1.jpg" alt="ALLISON HOTEL">
		
	 </div>
	 <div class="carousel-item">
	      <img class ="Image1" src="images/img/res-2.jpg">
		 
	 </div>
	 <div class="carousel-item">
	      <img class ="Image2" src="images/img/res-3.jpg">
		
	 </div>
	 
	 <div class="carousel-item">
	      <img class ="Image3" src="images/img/res-4.jpg">
		
	 </div>
	
</div>

	<!-- Left and right controls -->
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<hr>
	

 
  
   <!--RESTAURANT-->
 
<div class ="container-fluid">
	<div class ="row offset-md-1">
		<div class ="mt-5 col-md-5">	
			<img src ="images/Res1.jpg"class ="img-fluid"/>
		</div>
		<div class ="mt-5 col-md-6 ">
			<div class ="mt-1 row">
				<h4 class =""style ="padding-left:13px;">RESTAURANT</h4>
			</div>
			<h6 class ="">_____</h6>
			<p class="well mt-3" style="">The restaurant at Viroth’s Hotel consists of a spacious poolside dining area with bar as well as an elegant glass enclosed space for your dining comfort and pleasure. We also provide dining services in our guest rooms. At any of these locations you may enjoy refreshments and light dishes as well as full course meals that represent both gastronomic worlds: choose from international dishes, or a seasonally inspired Khmer menu.</p>
			<h6 class ="mt-5">OPENING HOURS</h6>
			<p class ="well mt-3 ">06:30 – 10:30 &nbsp;&nbsp;&nbsp; A La Carte Breakfast <br>11:00 – 22:00 &nbsp;&nbsp;&nbsp; Lunch & Dinner</p>
			
		</div>
	</div>
	
	<div class="row offset-md-1">
		<div class ="mt-5 col-md-5 col-md-push-6">
			<div class ="mt-1 row">
				<h4 class =""style ="padding-left:15px;">BAR</h4>
			</div>
			<h6 class ="">_____</h6>
			<p class="well mt-3 " style="color:#616161">Our hotel bar, conveniently located close to the swimming pool, is the ideal space for relaxing, meeting people, and enjoying a classic cocktail expertly prepared by our specially trained staff. We are also pleased to offer our guests freshly squeezed juices, soft drinks, and a carefully chosen selection of wines and champagnes, all served to you in an ambience of both leisure and glamour.</p>
			<h6 class ="mt-5">OPENING HOURS</h6>
			<p class ="well mt-3 ">Opening From &nbsp;:&nbsp;&nbsp;&nbsp; 10.00PM - 6.00AM </p>
			  
		</div>
		<div class ="mt-5 col-md-6 col-md-pull-5">	
			<img src ="images/res4.jpg" class ="img-fluid"/>
		</div>
		
	</div>
	<div class="row offset-md-1">
		<div class ="mt-5 col-md-5">	
			<img src ="images/Res3.jpg" class ="img-fluid"/>
		</div>
		<div class ="mt-5 col-md-6">
			<div class ="mt-1 row">
				<h4 class =""style ="padding-left:13px;"> ALLISON'S RESTAURANT</h4>
			</div>
			<h6 class ="">_________</h6>
			<p class="well mt-3 " style="">The perfect place to enjoy traditional Khmer Cuisine in a chic and contemporary setting. 
			The restaurant is located on Wat Bo street, just a few hundred meters from the hotel. 
			It has been open for 12 years, and is widely known throughout Siem Reap for serving some of the finest Khmer food is town</p>
			<h6 class ="mt-5">OPENING HOURS</h6>
			<p class ="well mt-3 ">  10:00AM - 2.00PM &nbsp;&nbsp;&nbsp;&nbsp; LUNCH   <br>9:00PM – 11.00PM &nbsp;&nbsp;&nbsp;&nbsp; DINNER</p>
			
		</div>
	</div>

</div>	


<hr>
	
<!--jumbotron-->
   
<div class="jumbotron">
  <h6 class="display-4" style ="color:#ffb300">DON'T MISS OUR SECRET OFFER</h6>
  <p class="lead" style ="color:#ffffff"><strong>Only available for booking direct on the hotel website.</strong></p>
  <form class="form-inline">
	<div class ="col-md-4 offset-md-5">
    <input class="form-control" type="search" placeholder="Your email address" aria-label="Search">
	 <button class="btn btn-outline-secondary" type="submit" >Subscribe</button>
  </div>
  </form>
  <hr class="my-6">
	<div class ="container-fluid">
		<div class ="row">
			<div class ="col-md-3">
				<a href ="#"><i class="fa fa-facebook-official fa-2x" aria-hidden="true" style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true" style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
			</div>
			
			    <h1 class ="align" style ="color:#e0f7fa"> |</h1>
				<a><i class="fa fa-phone fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
				<div class ="para"style ="color:#ffffff">TELEPHONE
				<p class ="para1">02-12864965</p></div>
				
			<div class ="row offset-md-1">
				<h1 class ="align1" style ="color:#e0f7fa"> |</h1>
				<a><i class="fa fa-envelope fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
	
				<div class ="para"style ="color:#ffffff">EMAIL
				<p class ="para1">Allison.fivestar@gmail.com</p></div>
			</div>
			<div class ="row offset-md-1">
				<h1 class ="align2" style ="color:#e0f7fa"> |</h1>
				<a ><i class="fa fa-map-marker fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
				<div class ="para"style ="color:#ffffff">ADDRESS
				<p class ="para1">221/A Uttra,D-block,Dhaka-1209</p></div>
			
		</div>
	</div>
</div>
</div>
<div class="row footer-copyright  text-white py-3" style="background-color:#2E2E2E">
			   <div class="col ">Allison Hotel @ 2018. All Rights Reserved.</div>

</div>

</body>
</html>