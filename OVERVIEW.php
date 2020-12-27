<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>Gallary</title>
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
	
<!--header-->

<div class ="b6">
	<div class ="col-md-6 offset-md-4">
		<h1 class = "photo" style ="color:#ffb300">PHOTO GALLERY</h1>	
	</div>
	<div class ="col-md-6 offset-md-3">
		
		<p style ="padding-left:50px;">A montage of views of the tropical beauty, pleasure-filled comforts, splendid architecture,<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;
		and outstanding service that wait you at Alisson's Hotel.</p>
	
	</div>
</div>

<hr >

	 
<!--image view-->

<div class ="b7">
	<div class ="col-md-6 offset-md-3">
	<div class="shadow p-1 mb-5 bg-light rounded">

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"style ="padding-top:10px;" >
  <li class="nav-item" >
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">EXTERIOR & INTERIOR</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ACCOMMODATION</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">DINING</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="pills-settings-tab" data-toggle="pill" href="#pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false">SERVICES</a>
  </li>
</ul>

</div>
</div>
</div>

<div class ="container">
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<div class ="row">
				<div class ="col-md-3 ">
					<img src="images/img/1_1.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="col-md-3 ">
					<img src="images/img/7.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="col-md-3 ">
					<img src="images/img/3_1.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="col-md-3 ">
					<img src="images/img/8.1.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/5_5.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/9_1.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/11.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/12.jpg" alt="..." class="img-thumbnail">
				</div>
			
			</div>
  
		</div>

		<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">DELUXE DOUBLE ROOM</h4>
			</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/2_2.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/5_5.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/6_6.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/9_1.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/10_10.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/15.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			<hr>
			
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">DELUXE TWIN ROOM</h4>
			</div>
			
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/17.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/35.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/37.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/54.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/55.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/56.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			
			<hr>
			
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">DELUXE TRIPLE ROOM</h4>
			</div>
			
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/57.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/58.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/59.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/60.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/61.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/62.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			
			<hr>
			
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">INTERNATIONAL LUXURY</h4>
			</div>
			
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/63.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/64.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/65.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/66.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/67.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/68.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			
			<hr>
			
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">INTERNATIONAL POOL VIEW LUXURY</h4>
			</div>
			
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/69.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/70.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/71.jpg" alt="..." class="img-thumbnail">
				</div>
				
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/75.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/74.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/77.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
		
		</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
		<div class ="row ">
				<h4 class =""style ="padding-left:20px;">RESTAURANT</h4>
		</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/14.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/16.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/19.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/20.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/21.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/22.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/26.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/35.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/48.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/83.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/84.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/53.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			<hr>
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">BAR</h4>
		</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/38.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/40.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/103.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/88.jpg" alt="..." class="img-thumbnail">
				</div>
		
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/87.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/89.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			
	</div>
	<div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">
		<div class ="row ">
				<h4 class =""style ="padding-left:20px;">POOL</h4>
		</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/13.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/24.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/34.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/50.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/76.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/93.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/94.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			<hr>
		<div class ="row ">
				<h4 class =""style ="padding-left:20px;">BEACH</h4>
		</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/80.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/82.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/85.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/91.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/95.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3">
					<img src="images/img/92.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			<hr>
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">GYMNASIUM</h4>
		</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/81.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/90.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/96.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/86.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-4 col-md-3 ">
					<img src="images/img/97.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			<hr>
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">SPA</h4>
		</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/98.png" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/99.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/100.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/101.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			<hr>
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">WEEDING</h4>
			</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/wT-1.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/wT-2.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/wT-3.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/wT-4.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/wT-5.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/wT-6.jpg" alt="..." class="img-thumbnail">
				</div>
			</div>
			<hr>
			<div class ="row ">
				<h4 class =""style ="padding-left:20px;">LIBRARY</h4>
			</div>
			<div class ="row">
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/102.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/LIB-1.1.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/LIB-2.2.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/LIB-3.3.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/LIB-4.4.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class ="mt-3 col-md-3 ">
					<img src="images/img/LIB-5.5.jpg" alt="..." class="img-thumbnail">
				</div>
					<div class ="mt-3 col-md-3 ">
					<img src="images/img/LIB-6.6.jpg" alt="..." class="img-thumbnail">
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