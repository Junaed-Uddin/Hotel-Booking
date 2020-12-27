<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>CONTACTS</title>
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
<hr>
	
<!--header-->

<div class ="container">
<div class ="card-deck">
	<div class ="row">
		<div class="col-md-3">
			<div class="card">
				<img class="card-img-top" src="images/img/font view.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title" style ="text-align:center">Alisson Hotel</h5>
					<p class ="card-text">You need connections to visit in Alisson.<em>"We say one name all you'll need."</em></P>
				</div>
			</div>
		</div>

	
		<div class="col-md-6">
			<div class="card bg-light mb-3" style="max-width: 34rem;">
				<span class="border border-dark">
					<div class="card-header bg-dark"style ="color:#ffffff"><h4 class ="incident">More to tell you</h4></div>
						<div class="card-body">
							<h5 class="card-title">Alisson Hotel</h5>
							<p class="card-text mt-3">Address&nbsp;&nbsp; :&nbsp; 221/A Uttra,D-block,Dhaka-1209 </p>
							<p class="card-text"> Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;+855 (0) 63 766 107	</p>
							<p class "card-text">Mobile&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;+855 (0) 12 778 096	</p>
							<p class="card-text">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; Allison.fivestar@gmail.com</p>
						
						</div>	
				</span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<img class="card-img-top" src="images/img/106.1.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title" style ="text-align:center">Satellite View</h5>
					<p class ="card-text">Suitable Location.<em>"The elegance that you will miss in every trice."</em></P>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<div class ="container">
	  <div class ="card-deck">
		<div class ="row">
		 <div class ="col-md-3">

<div class="card">
    <img class="card-img-top" src="images/img/booking.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"> RESERVATIONS</h5>
      <p class="card-text">Tel&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; +1 800 395 7046 <br>
							Tel&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; +800 616 1283<br> 
							Fax&nbsp;&nbsp;:&nbsp;&nbsp; +880 2 983 4551
							Allison.fivestar@gmail.com
							
	  </p>
    </div>
 
  </div>
</div>
 <div class ="col-md-3">
<div class="card">
    <img class="card-img-top" src="images/img/phone.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">COMMUNICATIONS</h5>
      <p class="card-text">Tel&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; +880 173 008 9139<br>
	  Tel&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; +880 395 009 2574<br>
	  Fax&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;+880 2 983 4551
	  Allison.fivestar@gmail.com
	  </p>
    </div>
 
  </div>
  </div>
 <div class ="col-md-3">
<div class="card">
    <img class="card-img-top" src="images/img/manager1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">DUTY MANAGER</h5>
      <p class="card-text">Tel&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; +880 173 008 9128<br>
							Tel&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; +880 395 009 2574<br>
							Mob&nbsp;:&nbsp;&nbsp;+880 2 983 4551
							Allison.fivestar@gmail.com</p>
    </div>
  
  </div>
  </div>
   <div class ="col-md-3">
<div class="card">
    <img class="card-img-top" src="images/img/question1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">QUESTIONS</h5>
      <p class="card-text">Contact us by Phone or Email.<br>
	  Tel&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; +880 395 009 2574
	  Allison.fivestar@gmail.com</p>
    </div>
  </div>
			
</div>
</div>
</div>
</div>
<!--message-->
	<div class ="container">
		<div class="col-md-8 mt-5 offset-md-2">
			<div class="card bg-light mb-3" style="max-width: 60rem;">
				<span class="border border-dark">
					<div class="card-header bg-dark"style ="color:#ffffff"><h4 class ="incident">DROP US A MESSAGE</h4></div>
						<div class="card-body">
							<form class ="form-container"action ="" method ="post" name="sentMessage" id="contactForm">
							   
									<div class ="row">
										<div class ="col-md-6">
											<label for="name" style ="color:#9e9e9e ">Name</label>
											<input type="text" class="form-control" name ="name" id="name" required>
											<div class="form-group mt-1">
											<label for="email" style ="color:#9e9e9e">Email</label>
											<input type="email" class="form-control" name ="email" id="email" required>
										</div>
										</div>
										<div class="col-md-6">
												<label for="message"style ="color:#9e9e9e ">Your message</label>
												<textarea class ="form-control" name ="message" id ="message" rows="4" required></textarea>
										</div>
									
									</div>
									<button type="submit" name ="submit" value="Send Now" class="btn btn-dark mt-1">Send</button>
							</form>
							
							<?php


								if(isset($_POST['submit'])){
									
									$name =$_POST['name'];
									$email = $_POST['email'];
									$message =$_POST['message'];

									$query = "INSERT INTO contact (name, email, cdate, message) values ('$name','$email',CURRENT_TIMESTAMP,'$message')" ;
								
									if (mysqli_query($conn,$query))
										{
											echo "<script type='text/javascript'> alert('Message sent')</script>";
											
										}		
								}
							?>

							
						
				</span>
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