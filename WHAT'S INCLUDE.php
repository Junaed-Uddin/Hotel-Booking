<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>WHAT'S Include</title>
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
	      <img class ="Image" src="images/img/926.jpg" alt="ALLISON HOTEL">
		  <div class="carousel-caption">
		       <h1 class="display-2">THE ART OF MEETING YOUR HIGHTEST EXPECTATIONS</h1>
			   <button type="button" class="btn btn-outline-dark btn-lg" href ="#">START NOW</button>
			   
		  </div>
	 </div>
	 <div class="carousel-item">
	      <img class ="Image1" src="images/img/925.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2">MAKE YOUR VACATION COMFOTABLE</h1>
			   <button type="button" class="btn btn-outline-light btn-lg" href ="#">START NOW</button>
			   
		  </div>
	 </div>
	 <div class="carousel-item">
	      <img class ="Image2" src="images/img/927.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2" >OUTDOOR & INDOOR LUXUARY</h1>
			   <button type="button" class="btn btn-outline-light btn-lg" href ="#">START NOW</button>
			   
		  </div>
	 </div>
	 
	 <div class="carousel-item">
	      <img class ="Image3" src="images/img/928.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2" >INNOVATING YOUR TASTE</h1>
			   <button type="button" class="btn btn-outline-light btn-lg" href ="#">START NOW</button>
			  
		  </div>
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

<!--headings-->

<div class ="container">
	
		<h1 class ="z2 mt-5"style="text-align:center">What's Include</h1>
		<h6 style ="text-align:center">_______</h6>
		<p class =" mt-4 col-md-9 col-xl-12 col-sm-4"style ="font-family:Helvetica">From the magnificent Halkidiki peninsula to the verdant coastline of Corfu, award-winning Allison Resorts are reimagining the luxury holiday.</p>
		<p class ="mt-4 col-md-9 col-xl-12 col-sm-4"style ="font-family:Helvetica">At every Ikos Resort, guests are invited to savour such pleasures as Michelin-starred menus, beauty products from Anne Sémonin Paris, 24-hour room service and many, many more. And what makes it so very special, is that it’s all included as part of your stay.</p>

</div>
<div class ="container">
	<div class ="row">
		<div class ="mt-5 col-md-12">
			<p class ="ph1"style ="color:#3949ab"><em>TASTE</em></p>
			<p class ="ph2 "style ="color:#3949ab">Unique Dining experiences:</p>
			<p class ="ph3 "style ="color:#3949ab">Most Alisson menus in the a la carte restaurants are signed by Michelin starred Chefs</p>
			<p class ="ph4 "style ="color:#757575">Breakfast, lunch and dinner served in: Flavors (Mediterranean buffet restaurant), Fresco (Italian a la carte), Ouzo (Greek a la carte), Kerkyra (Local Corfu a la carte) [Ikos Dassia only]</p>
			<p class ="ph5 "style ="color:#757575">Dinner at: Anaya (Asian a la carte), Provence (French Provençal a la carte), Ergon (Greek a la carte) [Ikos Dassia only]. Reservation required.</p>
			<p class ="ph6 "style ="color:#757575"><em>*Please note: Operating dates and times are subject to change</em></p>
			<p class ="ph7 "style ="color:#757575"><em>** Dinner Reservation required</em></p>
			<p class ="ph8 "style ="color:#3949ab">Dine Out Service:  Sample the local cuisine at designated local restaurants at no extra charge (reservation required)</p>
			<p class ="ph9 "style ="color:#757575">Sommelier service and selection of 300 international and local wine labels from Ikos wine cellar matched to our a la carte menus</p>
			<h6 class ="ph10 "style ="color:#3949ab">International branded spirits, beers, soft drinks, juices, tea and coffee varieties, and cocktails prepared by award winning mixologists–<p class ="ph31"style ="color:#757575"> all served in several bars </p></h6>
			<p class ="ph11 "style ="color:#757575">Indigo Main bar Operating Hours*: 09.00 – 02.00</p>
			<p class ="ph12 "style ="color:#757575">Almyra Beach bar Operating Hours*: 10.00 – 18.00</p>
			<p class ="ph13 "style ="color:#757575">Aqua Pool bar Operating Hours*: 10.00 – 18:00</p>
			<p class ="ph14 "style ="color:#757575">Lounge Deluxe Collection bar Operating Hours*: 10.00 – 18:00</p>
			<p class ="ph15 "style ="color:#757575">Helios Bar (Ikos Oceania) Operating Hours*: 20.30 – 24.00 (adults only)</p>
			<p class ="ph16 "style ="color:#757575">Helios Bar Operating Hours*: 10.00 – 24.00</p>
			<p class ="ph17 "style ="color:#757575">Astra Club (Ikos Oceania): Operating Hours*: 23:00 – 02:00 (except Thursdays)</p>
			<p class ="ph18 "style ="color:#757575">Teatro Bar (Ikos Olivia): Operating Hours*: 20.30 – 24.00</p>
			<p class ="ph19 "style ="color:#757575">24 hour room service: Extensive selection of Breakfast, Day & Night dining options</p>
			<p class ="ph20 "style ="color:#757575">Fully stocked mini bar with branded spirits, beers, mineral water, wine, and soft drinks- daily replenished</p>
			<p class ="ph21 "style ="color:#757575"><em>*Please note: Operating dates and times are subject to change</em></p>
			<p class ="ph22 mt-5 "style ="color:#0d47a1 "><strong><em>EXPERIENCE</em></strong></p>
			<p class ="ph23 "style ="color:#3949ab">Sports & Entertainment activities: Table tennis, aqua aerobics, beach volley, basketball courts, tennis court (reservation required); mountain bikes, non-motorized watersports and more. Live evening shows, daily supervised animation program and group activities. Gym-Fitness centre (16yrs and up) with varied fitness course program for all.</p>
			<p class ="ph24 "style ="color:#3949ab">Evening Entertainment: Theatrical shows and musicals, live stage performances at the Ikos Theatres, Live music entertainment, Movies, Children’s activities, parties</p>
			<p class ="ph25 "style ="color:#3949ab">Children Facilities & Activities Program, Operated by childcare experts according to strict British standards and ratios: Use of Kids Club (ages 4 years – 11 years) and Teenager Club (12 years – 17 years, high season only) operated by experienced UK childcare provider (reservation required)</p>
			<p class ="ph26 mt-5"style ="color:#0d47a1 "><strong><em>WELLNESS</em></strong></p>
			<p class ="ph27 "style ="color:#3949ab">Use of Allison Spa Indoor/Outdoor with Jacuzzi at Allison Spa (16yrs and over)</p>
			<p class ="ph28 "style ="color:#3949ab">Thermal Suite comprising of “Steam Room” & Sauna at Allison Spa (16yrs and over)</p>
			<p class ="ph29 "style ="color:#3949ab">Fitness Studio with state-of-the-art equipment & contemporary cardio-fitness facilities</p>
			<p class ="ph30 mt-5"style ="color:#757575">Disclaimer: All information provided is for general information purposes only; while we endeavor to keep this information up to date and correct,  it shall not be base of any obligation with guests and any third-party partner.</p>
		
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

