<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>SIGN UP</title>
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

<div class ="b5">
	<div class ="col-md-6">
		<h1 class = "sign_up" style ="padding-left:85px;">Alisson Discovery Enrolment</h1>
		<p class ="" style ="padding-left:85px;">If you have a Allison DISCOVERY Account ,<a href="url"data-toggle="modal" data-target="#exampleModalCenter">  Sign in here</a></p>
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
					<form class ="form-container">
						<div class="form-group">
							<h3 class="login">Discovery Login</h3>
							<p style ="padding-top:10px;">Login now to receive exclusive benefits for bookings on our website</p>
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary btn-block" >Submit</button>
						<div class = "form-group">
							<p class ="para2"style ="margin-top:20px;">Not a DISCOVERY Member yet?
							<a href="SIGN UP.php" class="btn btn-link" role="button">JOIN NOW</a></p>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
	
<br>
<br>
<!--sign up form-->

<div class ="container-fluid">
	<form class="signup-form" action ="SIGN UP.php" method ="POST">
	  <div class="form-row">
		<div class="col-md-4 mb-3 offset-md-1">
		  <label for="validationServer01">First name</label>
		  <input type="text" name="firstname" class="form-control is-valid" id="validationServer01" placeholder="First name"required >
		
		</div>
		<div class="col-md-4 mb-3">
		  <label for="validationServer02">Last name</label>
		  <input type="text" name="lastname" class="form-control is-valid" id="validationServer02" placeholder="Last name"required>
		 
		</div>

	  </div>
	  <div class="form-row">
		<div class="form-group col-md-8 offset-md-1">
		  <label for="inputEmail4">Email</label>
		  <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email"required>
		</div>
		 <div class="form-group col-md-8 offset-md-1">
		  <label for="inputEmail4">User Name</label>
		  <input type="text" name="username" class="form-control" id="inputEmail5" placeholder="User Name"required>
		</div>
		 <div class="col-md-4 mb-3 offset-md-1">
		  <label for="inputPassword4">Password</label>
		  <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password"required>
		</div>
		 
		  <div class="col-md-4 mb-3 ">
		  <label for="inputPassword4">Confirm Password</label>
		  <input type="password" name="cpassword" class="form-control" id="inputPassword5"required>
		</div>
	  </div>
	  <br>
	  <br>
	 
	  <div class="col-md-10">
	  <p class =""style ="padding-left:105px;">You will receive a registration confirmation e-mail with a membership number to use on future reservations. Going forward, you will receive e-mail communications regarding your account status and offers specific to your DISCOVERY membership. By submitting this registration form, you agree and consent to Global Hotel Alliance (“GHA”) and the Allison Hotels and Resorts Pte. Ltd, which includes the marketing of offers specific to your membership. You further agree and consent to the DISCOVERY Terms and Conditions.</p>
	  </div>
	  <div class="form-group offset-md-1">
		<div class="form-check">
		  <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
		  <label class="form-check-label" for="invalidCheck3">
			I have read and accept the Terms and Conditions and Privacy Policy
		  </label>
		</div>
	  </div>
	  <button class="btn btn-primary offset-md-1" type="submit" name ="submit">Submit</button>
	</form>
	
<!--sign up control by php-->
<?php
 if(isset($_POST['submit']))
 {
	$firstname = $_POST['firstname']; 
	$lastname = $_POST['lastname'];
	$email = $_POST['email']; 
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword']; 

	$query = "select * from userinfo WHERE username='$username'";
	$query_run = mysqli_query($conn,$query);
	
	// Check if input characters are valid
	if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)){
		echo '<script type ="text/javascript"> alert("The first name & last name could be valided for only Alphabetic letters")</script>';
		//header("Location: ../SIGN UP.php?SIGN UP =invalid");
		exit();
	}	
	if(mysqli_num_rows($query_run)>0){
					
		echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
	}
	
	if($password==$cpassword)
	{
		
			$encrypted_password = md5($password);
			if(mysqli_num_rows($query_run)<=0){
		
				$query= "insert into userinfo values('$username','$firstname','$lastname','$email','$encrypted_password')";
				$query_run = mysqli_query($conn,$query);
				
				if($query_run){
					
					echo '<script type="text/javascript"> alert("User Registered..") </script>';
				}
				else {
						echo '<script type="text/javascript"> alert("Error!.. try again") </script>';
					 }
			}
		
			
	}	 	else{
				   echo '<script type="text/javascript"> alert("password & confirm passowrd does not match!") </script>';
			    }
	 
		
 }
?>
</div>
<br>
<br>
<br>



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

	