<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>pract</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="stylesheet" href="Bootstrap/CSS/Bootstrap.min.css" />
	<link rel="stylesheet" href="Bootstrap/CSS/Main.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<style>
		background-color:#4B515D;
	
	</style>
	
</head>
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
	<!-- Top Row-->
	<div id ="wrapper" style="background-color:#4B515D">
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
       <a class="navbar-brand" href="HOME.php" style = "color:#76ff03">Alisson</a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	        <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav">
				<li class="nav-item active"> 
			    <a class="nav-link" href="HOME.php">HOME</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ROOMS.php">ROOMS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="RESTAURANT.php">RESTAURANT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="FACILITIES.php">FACILITIES</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="OVERVIEW.php">OVERVIEW</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="SERVICES.php">SERVICES</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="CONTACTS.php">CONTACTS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="MEMBERS.php">MEMBERS</a>
				</li>
			</ul>	
			<ul class="nav button offset-md-1">
			<a href="BOOK NOW.php" class="btn btn-info navbar-btn btn-lg">BOOK NOW</a>
			</ul>
		</div>
	</div>
	</nav>	
	</div>
<!--BOOK NOW -->

<div class ="container">
	<br><br>
	<div class ="row">	
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-center no-boder bg-color-blue">
				<div class="panel-body">
					<i class="fa fa-users fa-5x"></i>
					<h3>Double Bangalu</h3>
				</div>
				<div class="panel-footer back-footer-blue">
					Quad
				</div>
			</div>
		</div>
		
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-center no-boder bg-color-blue">
				<div class="panel-body">
					<i class="fa fa-users fa-5x"></i>
					<h3>Double Bangalu</h3>
				</div>
				<div class="panel-footer back-footer-blue">
					Quad
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-center no-boder bg-color-blue">
				<div class="panel-body">
					<i class="fa fa-users fa-5x"></i>
					<h3>Double Bangalu</h3>
				</div>
				<div class="panel-footer back-footer-blue">
					Quad
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-center no-boder bg-color-blue">
				<div class="panel-body">
					<i class="fa fa-users fa-5x"></i>
					<h3>Double Bangalu</h3>
				</div>
				<div class="panel-footer back-footer-blue">
					Quad
				</div>
			</div>
		</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="panel panel-primary text-center no-boder bg-color-blue">
					<div class="panel-body">
						<i class="fa fa-users fa-5x"></i>
						<h3>Double Bangalu</h3>
					</div>
					<div class="panel-footer back-footer-blue">
						Quad
					</div>
				</div>
			</div>
		</div>
<br>
<br>

<br>

	<div class="card mb-3" style="max-width: 680px;">
		<div class="row no-gutters">
			<div class="col-md-6">
				<img src="images/img/romance3.jpg" class="card-img" alt="..." style="height:100%">
			</div>
			<div class="col-md-6">
				<div class="card-body">
					<h5 class="card-title">Breakfast and more on us</h5>
						<p class="card-text "><em>Enjoy greater flexibility for your stay</em> </p>
						<ul>
							<p>
								<li>Complimentary Internet Access
								<li>Complimentary local English newspaper
								<li>A Four botles of local mineral water per day  
								<li>Full non-refundable prepayment at the time of booking is required										  
							</p> 
						</ul>
						<br><br>
						<h6 class="card-text">Price
							<p class="text" style ="font-size:25px;"><strong>USD192.78/night</strong></p>
						</h6>
						<a href="PAYMENT FOR DOUBLE DELUXE.php" class="btn btn-block mt-2"style ="background-color:#f9a825">BOOK NOW</a>
				</div>
			</div>
		</div>
	</div>
</div>

	</body>
</html>

