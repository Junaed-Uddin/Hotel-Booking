<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>BOOK Trial</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="stylesheet" href="Bootstrap/CSS/Bootstrap.min.css" />
	<link rel="stylesheet" href="Bootstrap/CSS/Main.css" >
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
	
<!--BOOK NOW -->
		
<div class ="wrap">	
	<div class ="container-fluid" style ="background-color:#ffebee ">
			<div class ="row">
				<div class ="col-md-2 offset-md-5">
					<br>
					<h1>Reservation</h1>
					<hr>
				</div>		
			</div>		
		
		<div class ="row ">
			<div class="card-body">
			   <form class ="form-container" action ="PAYMENT.php" method ="POST" style="background-image:url(images/img/925.jpg);background-repeat: no-repeat;background-size:cover;">
				<div class ="col-md-10 offset-md-1 ">
				<br><br>
					<div class="card-deck">
						<div class="card border-dark">
							<div class="card-header bg-dark text-white border-dark"><h5>Personal Information</h5></div>
							<div class="card-body">
								<div class="form-group">
											<label>Title</label>
												<select name="title" class="form-control"  >
													<option value selected ></option>
													<option value="Dr.">Dr.</option>
													<option value="Miss.">Miss.</option>
													<option value="Mr.">Mr.</option>
													<option value="Mrs.">Mrs.</option>
													<option value="Prof.">Prof.</option>
													<option value="Rev .">Rev .</option>
													<option value="Rev . Fr">Rev . Fr .</option>
												</select>		
								  </div>
								  <div class="form-group">
												<label>First Name</label>
												<input name="fname" class="form-control" >			
								  </div>
								  <div class="form-group">
                                            <label>Last Name</label>
                                            <input name="lname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
							    <div class="form-group ">
                                            <label>Present Address</label>
                                            <input name="address" type="address" class="form-control" required>
                                        </div>
							    <div class="form-group">
                                            <label>Phone</label>
                                            <input name="phone" type="phone" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" =""required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                </div>
						 
							</div>
						</div>
					   <div class="card border-dark">
						<div class="card-header bg-dark text-white border-dark"><h5>Reservation Information</h5></div>
							<div class="card-body">
							<div class="form-group">
                                            <label>Check-In</label>
                                            <input name="cin" type ="date" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Check-Out</label>
                                            <input name="cout" type ="date" class="form-control" required>
                                            
                               </div>
							  <div class="form-group">
                                            <label>Type Of Room </label>
                                            <select name="troom"  class="form-control" required>
												<option value selected ></option>
                                                <option value="Deluxe Room">DELUXE ROOM</option>
                                                <option value="Double bunglow">DOUBLE BUNGALOW</option>
												<option value="Suite Pool">SUITE POOL VIEW</option>
												<option value="Twin Pool">TWIN POOL VIEW</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Bedding Type</label>
                                            <select name="bed" class="form-control" required>
												<option value selected ></option>
                                                <option value="Single">Single</option>
                                                <option value="Double">Double</option>
												<option value="Triple">Triple</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>No.of Rooms </label>
                                            <select name="nroom" class="form-control" required>
												<option value selected ></option>
                                                <option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												
                                            </select>
                              </div>
							   <div class="form-group">
                                            <label>Nights </label>
                                            <select name="nnight" class="form-control" required>
												<option value selected ></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<!--  <option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option> -->
                                            </select>
                              </div>
							  <div class="form-group">
                                    <label>Adults </label>
                                    <select name="nadults" class="form-control" required>
										<option value selected ></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
										<option value="3">3</option>
									</select>
                              </div> 
						</div>
					  </div>
					</div>
					
				</div>
				<br>
				<br>
				<div class="container-fluid">
					<div class="row offset-md-2">
						<div class="col-md-5 offset-md-4">
							<button type="submit" class="btn btn-dark btn-lg" name="submit" style="margin-bottom:5px"><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;Confirm</button>
						</div>
					</div>
				</div>
				<!--*********php code**********-->

							<?php
							if(isset($_POST['submit']))
							{
									$title =$_POST['title'];
									$fname = $_POST['fname'];
									$lname =$_POST['lname'];
									$email =$_POST['email'];
									$address = $_POST['address'];
									$phone =$_POST['phone'];
									$gender =$_POST['gender'];
									$cin = $_POST['cin'];
									$cout =$_POST['cout'];
									$troom =$_POST['troom'];
									$bed = $_POST['bed'];
									$nroom =$_POST['nroom'];
									$nnight =$_POST['nnight'];
									$nadults = $_POST['nadults']; 
									
									$new ="Not Confirm";
									$query = "INSERT INTO roombook1 (Title, FName, LName, Email, Address, Phone, Gender, cin, cout, TRoom, Bed, NRoom, NNight, NAdults, stat, nodays)
									values('$title','$fname','$lname','$email','$address','$phone','$gender',
									'$cin','$cout','$troom','$bed','$nroom','$nnight','$nadults','$new',datediff('$_POST[cout]','$_POST[cin]'))" ;
									
									$check="SELECT * FROM roombook1 WHERE email ='$email'";
									$rs = mysqli_query($conn,$check);
									if(mysqli_num_rows($rs)>0){
										echo "<script type='text/javascript'> alert('User Already in Exists')</script>";
										
									}

									else
									{	
										if (mysqli_query($conn,$query))
										{
											echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
											echo '<script>window.location.href = "PAYMENT.php";</script>';
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error adding user in database')</script>";	
										}
									}
							}
							?>
				</form>	
			</div>	
		</div>
	</div>
</div>

	

	</body>
</html>

