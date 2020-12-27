<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>Service</title>
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
	<hr>
	
	
	<!--Paragraph-->
	
	<div class ="container-fluid">
		<div class ="row offset-md-1">
			<div class ="col-md-12">
				<h3 class ="service"style ="color:#0d47a1;">HOTEL SERVICE</h3>
				<p class =""style ="margin-top:15px;">Experience impeccable services at the five-star Alisson Hotel, located near the Dhaka airport. This inviting retreat boasts resort-style amenities such as free high-speed, wireless<br> Internet access, a business center with secretarial services and a state-of-the-art fitness center. Guests in Business Class Rooms enjoy access to the Business Class Lounge, an <br> elegant location perfect for unwinding after a productive day. Dive into the shimmering outdoor pool, relax in our soothing hotel spa, or partake in a round of golf or game of <br> tennis.</p>
			</div>
		</div>
		<div class ="row offset-md-1">
			<div class ="mt-5 col-md-3">
				<img src ="images/serv1.jpg"></img>
			</div>
			<div class ="mt-5 col-md-7">
				<h4>SPA ESC</h4>
				<hr>
				<p>Discover tranquility for the body and mind at one of the city’s best spas, Spa Esc. A range of soothing holistic treatments including facial therapies,aromatherapy and reflexology helps guests achieve pure rejuvenation. Our specially designed treatment rooms provide a serene escape, where time slips by and stress dissolves away.</p>
			</div>
		</div>
		<div class ="row offset-md-1">
			<div class ="mt-5 col-md-3">
				<img src ="images/serv2.jpg"></img>
			</div>
			<div class ="mt-5 col-md-7">
				<h4>HEALTH CLUB & POOL</h4>
				<hr>
				<p>Stay on top of your fitness routine and work out some of the stress from traveling at our cutting-edge fitness center. Prefer to get your heart rate up outdoors? Book a tee time at the adjacent golf course, or meet with friends and colleagues for a round of tennis. And nothing beats diving into the pool for a refreshing swim after a long day.</p>
			
			</div>
		</div>
		<div class ="row offset-md-1">
			<div class ="mt-5 col-md-3">
				<img src ="images/serv3.jpg"></img>
			</div>
			<div class ="mt-5 col-md-7">
				<h4>GLAMOUROUS GYMNASIUM</h4>
				<hr>
				<p>Developing and sustaining a fit lifestyle is a critical of being a mordern warrior. Omega core programs guarantee the strength, endurance
					and flexibility to reach any goal.It includes 24/7 access with secuirity guard, personal training, fun and friendly, Air-conditioned, mind blowing equipment and memberships <br> to suit all. </p>
			
			
			</div>
		</div>
		<div class ="row offset-md-1">
			<div class ="mt-5 col-md-3">
				<img src ="images/serv4.jpg"></img>
			</div>
			<div class ="mt-5 col-md-7">
				<h4>FREE WIFI</h4>
				<hr>
				<p>As part of the E@syConnect Service concept, Alisson hotels offer Free Internet access. High-speed and/or wireless Internet access is now free of charge for all guests throughout the hotel.</p>
		
			</div>
		</div>
			<div class ="row offset-md-1">
				<div class ="mt-5 col-md-3">
					<img src ="images/serv5.jpg"></img>
				</div>
				<div class ="mt-5 col-md-7">
					<h4>LUXURIOUS GAMING ROOM</h4>
					<hr>
					<p>The hotel is every gamers dream. All mindblowing equipments are perfectly arranged in different ways.It includes all the functionalities of pc gaming,pools,badminton and so on.In every month, you have to perticipate our exclusive gaming contest and achieve $100 gaming rewards and each month 25+ pc games are included that are too much attractive to every soft mind gamers.</p>
			
				</div>
			</div>
	</div>
	<hr>
	</br>
	</br>

<!--At a glance-->
	<div class ="container-fluid">
		<div class ="row">
			<div class ="col-md-12 offset-md-1">
				<div class="card bg-light mb-3" style="max-width: 78rem;">
					<div class="card-header"style ="background-color:#757575"><h4 class =""style ="text-align:center">AT A GLANCE </h4></div>
						<div class="card-body"style ="background-color:#f5f5f5">
							<div class ="row">
								<div class ="col-md-5">
									<h5><i class="fa fa-wifi" aria-hidden="true"></i> &nbsp; FREE INTERNET</h5>
									<p>As part of the E@syConnect Service concept, Radisson Blu hotels offer Free Internet access. High-speed and/or wireless Internet access is now free of charge for all guests throughout the hotel.</p>
									</br>
								
									<hr>
									
									<h5><i class="fa fa-coffee" aria-hidden="true"></i>&nbsp;&nbsp; SUPER BREAKFAST</h5>
									<p>The Alisson Super Breakfast is an extensive buffet featuring a range of food items selected from the best of Continental, North European, and American cuisine.</p>
									<hr>
									
									<h5><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp; LATE CHECKOUT</h5>
									<p>Check-out from Alisson hotels as late as 6 p.m. (subject to availability) instead of the normal check-out time at no extra cost. Our aim is to accommodate the needs of our guests and offer tailor made flexible solutions.</p>
									<hr>
									
									<h5><i class="fa fa-hand-peace-o" aria-hidden="true"></i>&nbsp;&nbsp;ONE TOUCH SERVICE</h5>
									<p>All guest needs, whether it is room service, a question for the concierge or a special request, are taken care of at the touch of a button. Just press the One Touch Service button on your room telephone and let us take care of you.</p>
									
								</div>
								<div class ="vl1 col-md-1 offset-md-1"></div>
								<div class ="col-md-5">
									<h5><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;GRAB AND RUN</h5>
									<p>For our guests on the go with no time for a sit-down breakfast,<br> we offer the Grab & Run takeaway breakfast. Tea and coffee in disposable cups along with fresh fruits and energy bars are <br> available on a special table in the lobby.</p>
									<hr>
								
									<h5><i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;EXPRESS CHECKOUT</h5>
									<p>For our guests in a rush we offer Express Check-Out to save valuable time and ensure an efficient and accurate check-out, by offering the options of sending invoice by email, mail or a quick pick-up at the reception desk.</p>
									<hr>
									
									<h5><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;&nbsp;EXPRESS LAUNDRY</h5>
									<p>The average guests stays at a hotel for less than two days, which makes getting laundry done a complicated matter. But at Radisson Blu we have dispensed of this complication with 3-Hour Express Laundry. All shirts, blouses, socks, underwear, pants and other pieces of clothing, handed in before 8pm. will be returned fresh and clean that same evening.</p>
									<hr>
									
									<h5><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;100% GUEST SATISFACTION</h5>
									<p>Our goal at Radisson Blu is 100% guest satisfaction, which we guarantee. If you aren't satisfied with something, please let us know during your stay and we'll make it right or you won't pay.</p>
								</div>
							</div>
							
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