<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
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
	<div class ="bg1">
	<a name="new"></a>
		<div class ="row" style ="background-color:#4B515D;">
			<div class ="col-md-3 offset-md-10">
			<?php
				if(isset($_SESSION['username'])){
					
					echo '<form action="logout.inc.php" method="POST">
					<button type="submit" class="btn btn-dark" name="logout" style ="margin-left:90px;"<a href= "HOME.php"</a>Logout</button></form>';
					
				}else{
					echo '<button type="button" class="badge badge-light" data-toggle="modal" data-target="#exampleModalCenter"
					style ="margin-left:40px;">SIGN IN / JOIN NOW
					</button>';
				}

			?>
				
				
			</div>
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
	<li data-target="#carouselExampleIndicators" data-slide-to="4" ></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="5" ></li>
</ol>
<div class="carousel-inner">
     <div class="carousel-item active">
	      <img class ="Image" src="images/Hotel.jpg" alt="ALLISON HOTEL">
		  <div class="carousel-caption">
		       <h1 class="display-2">THE ART OF MEETING YOUR HIGHTEST EXPECTATIONS</h1>
			   <button type="button" class="btn btn-dark btn-lg" href ="#">START NOW</button>
			   
		  </div>
	 </div>
	 <div class="carousel-item">
	      <img class ="Image1" src="images/img/2.3.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2">MAKE YOUR VACATION COMFOTABLE</h1>
			   <a href="ROOMS.php" class="btn btn-dark btn-lg">START NOW</a>
			   
		  </div>
	 </div>
	 <div class="carousel-item">
	      <img class ="Image2" src="images/drawing.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2" >OUTDOOR & INDOOR LUXUARY</h1>
			   <a href="SERVICES.php" class="btn btn-dark btn-lg">START NOW</a>
			   
		  </div>
	 </div>
	 
	 <div class="carousel-item">
	      <img class ="Image3" src="images/pizza.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2" >INNOVATING YOUR TASTE</h1>
			   <a href="WHAT'S INCLUDE.php" class="btn btn-dark btn-lg">START NOW</a>
			  
		  </div>
	 </div>
	 
	 <div class="carousel-item">
	      <img class ="Image4" src="images/biscuit.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2" >ENJOY A FINE DINING</h1>
			   <a href="RESTAURANT.php" class="btn btn-dark btn-lg">START NOW</a>
			  
		  </div>
	 </div>
	 
	 <div class="carousel-item">
	      <img class ="Image5" src="images/img/sl-1.jpg">
		  <div class="carousel-caption">
		       <h1 class="display-2" >PLAN YOUR PERFECT TRIP</h1>
			   <a href="POOLS.php" class="btn btn-dark btn-lg">START NOW</a>
			   
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

<!--2nd portion-->
	<hr>
	<div class = "container-fluid">
		<div class ="row">
			<div class ="col-md-12">
				<h3 class ="heading"style ="text-align:center">AT A GLANCE</h3>
			</div>
		</div>
        <div class="b1">
		  <div class="container">
		  <div class="row">
		  <div class="col-md-6 rmvPdnLft">
		    <figure>
			<img class="img1 img-fluid" src="images/IN1.jpg"/> 
             <figcaption>
                 <h2 align="center"><a href="ROOMS.php">ROOMS</h2></a>
				<h3 align="center">____</h3>
				<div class="everyPera">Spacious rooms, 
				suites and bungalows boast views across the flowing green landscape to the ocean beyond, 
				beautifully groomed private gardens, private pools and generous terraces.
				The epitome of contemporary elegance.</div>
            </figcaption>
            </figure>			
             </div>		
				<div class="col-md-6 rmvPdnLft">	
					<figure>			
						<img class="img2 img-fluid" src="images/img/dish.jpg"/>
						<figcaption>
							<h2 align="center"class="mt-3"><a href="RESTAURANT.php">RESTAURANTS</h2></a>
							<h3 align="center">____</h3>
							<div class="everyPera1">Contemporary, stylish and all very tempting, Ikos Olivia promises an outstanding choice of fabulous 
								eating opportunities with 
								remarkable menus created by Michelin-starred chefs. A world of infinite culinary possibilities.
							</div>
						</figcaption>
					</figure>
				</div>
			</div>
		  </div>
		</div>
     
        <div class="b3">
		  <div class="container">
		   <div class="row">
		   <div class="col-md-6 rmvPdnLft">
		   <figure>
		    <img class="img5 img-fluid" src="images/IN8.jpg"/>
			 <figcaption>
			 <h2 align="center"><a href="OFFER.php">OFFERS</h2></a>
				<h3 align="center">____</h3>
				<div class="everyPera3">Specially equiped with Conference rooms, Seminar halls, 24-hours Internet, luxarious Swimming pool, International Guest Conference etc.To suit the corporate guest. </div>
			  </figcaption>
			</figure>
			</div>
		     <div class="col-md-6 rmvPdnLft">
			  <figure>
			   <img class="img6 img-fluid" src="images/fac-1.jpg"/>
			    <figcaption>
			 <h2 align="center"><a href="OVERVIEW.php">OVERVIEW</h2></a>
				<h3 align="center">____</h3>
				 <div class="everyPera3">This is the overview of our hotel,by this you can get a clear
				 concept about the inner and outer beauty of our hotel.</div>
			  </figcaption>
			 </figure>
			 </div>
		   </div>
		   </div>
		  </div>
		  </br>
		  </br>
		  
		  <div class="container-fluid">
		   <div class="row">
		
		     <figure>
			    <figcaption>
				  <div class="p2">
					<h2 align="center">THE DESTINATION</h2>
				   </div>
				</figcaption>

					<div class ="col-md-12">
						<img class="img7 img-fluid" src="images/setallite_view.jpg"/>	
					</div>
			 </figure>
         </div> 
        </div>	
    		
	<div class="b5">
      <div class="container">
        <div class="row">	
         <div class="col-md-6 rmvPdnLft">
           <h4 align="center"><a href="#new">BACK TO TOP</h4></a>	
         </div>
		 <div class="col-md-6 rmvPdnLft">
		   <h4 align="center"><a href="WHAT'S INCLUDE.php">WHAT'S INCLUDED</h4></a>
		   </div>
     </div>	
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
    <input class="form-control mt-2" type="search" name="email" placeholder="Your email address" aria-label="Search">
	 <button class="btn btn-outline-secondary mt-2" name="subscribe" type="submit" >Subscribe</button>
  </div>
  </form>


	<div class ="container-fluid">
		<div class ="row">
			<div class ="col-md-3 mt-3">
				<a href ="#"><i class="fa fa-facebook-official fa-2x" aria-hidden="true" style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true" style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
			</div>
			
			    <h1 class ="align mt-3" style ="color:#e0f7fa"> |</h1>
				<a><i class="fa fa-phone fa-2x mt-3" aria-hidden="true"style="color:#ffffff"></i></a>
				<div class ="para mt-3"style ="color:#ffffff">TELEPHONE
				<p class ="para1 ">02-12864965</p></div>
				
			<div class ="row offset-md-1 mt-3">
				<h1 class ="align1" style ="color:#e0f7fa"> |</h1>
				<a><i class="fa fa-envelope fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
	
				<div class ="para"style ="color:#ffffff">EMAIL
				<p class ="para1">Allison.fivestar@gmail.com</p></div>
			</div>
			<div class ="row offset-md-1 mt-3">
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