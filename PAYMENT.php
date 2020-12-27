<?php
session_start();
require 'includes/index.php';
$curdate=date("Y/m/d");
							if(isset($_POST['submit']))
							{
									$title =$_POST['title'];
									$_SESSION['title'] = $title;
									$fname = $_POST['fname'];
									$_SESSION['fname'] = $fname;
									$lname =$_POST['lname'];
									$_SESSION['lname'] = $lname;
									$email =$_POST['email'];
									$address = $_POST['address'];
									$phone =$_POST['phone'];
									$gender =$_POST['gender'];
									$_SESSION['gender'] = $gender;
									$cin = $_POST['cin'];
									$cout = $_POST['cout'];
									$troom = $_POST['troom'];
									$_SESSION['troom'] = $troom;
									$bed = $_POST['bed'];
									$_SESSION['bed'] = $bed;
									$nroom =$_POST['nroom'];
									$_SESSION['nroom'] = $nroom;
									$nnight =$_POST['nnight'];
									$nadults = $_POST['nadults'];
									$days = 4;//intval(date_create('{$cout}'),date_create('{$cin}'));
									$_SESSION['days'] = $days;
									$new ="Not Confirm";
									$query = "INSERT INTO roombook1 (Title, FName, LName, Email, Address, Phone, Gender, cin, cout, TRoom, Bed, NRoom, NNight, NAdults, stat, nodays)
									values('$title','$fname','$lname','$email','$address','$phone','$gender',
									'$cin','$cout','$troom','$bed','$nroom','$nnight','$nadults','$new',datediff('$_POST[cout]','$_POST[cin]'))" ;
									
									$check="SELECT * FROM roombook1 WHERE email ='$email'";
									$rs = mysqli_query($conn,$check);
									
									if(mysqli_num_rows($rs)>0){
										echo "<script type='text/javascript'> alert('User Already in Exists')</script>";
										
										while($row= mysqli_query($conn,$query)){
											$_SESSION['id'] = $row['id'];
										
											
						
										}
									}
									

									else
									{	
								
										
										if (mysqli_query($conn,$query))
										{
											$_SESSION['id'] = mysqli_insert_id($conn);
											echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
											echo '<script>window.location.href = "PAYMENT.php";</script>';
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error adding user in database')</script>";	
										}
									}
									
									
									$type_of_room = 0;       
										if($troom=="Deluxe Room")
											{
												$type_of_room = 420;			
											}
										else if($troom=="Double bunglow")
											{
												$type_of_room = 520;
											}
										else if($troom=="Suite Pool")
											{
												$type_of_room = 680;
											}
										else if($troom=="Twin Pool")
											{
												$type_of_room = 780;
											}
											
										if($bed=="Single")
											{
												$type_of_bed = $type_of_room * 1/100;
											}
										else if($bed=="Double")
											{
												$type_of_bed = $type_of_room * 2/100;
											}
										else if($bed=="Triple")
											{
												$type_of_bed = $type_of_room * 3/100;
											}

										$ttot = $type_of_room * $days * $nroom;
										$btot = $type_of_bed * $days;
										$fintot = $ttot + $btot;
										$tax = $fintot * 20/100;
										$total = $fintot + $tax;
										$_SESSION['fintot'] = $fintot;
										$_SESSION['tax'] = $tax;
										$_SESSION['total'] = $total;

									
							}
							else {
													
										$id = $_SESSION['id'];
										$title =$_SESSION['title'];
										$fname =$_SESSION['fname'];
										$lname =$_SESSION['lname'];
										$gender =$_SESSION['gender'];
										$troom =$_SESSION['troom'];
										$bed = $_SESSION['bed'];
										$days =$_SESSION['days'];
										$nroom =$_SESSION['nroom'];
										$ttot = 0;
										$btot = 0;														
										$fintot = $_SESSION['fintot'];
										$tax = $_SESSION['tax'];
										$total = $_SESSION['total'];
								}

							
							if(isset($_POST['payment_submit']))
							{
								
								$code1=$_POST['code1'];
								$code=$_POST['code']; 
								if($code1!="$code")
								{
									echo "<script type='text/javascript'> alert('Invalid Code')</script>";
								}
								else
								{ 
									
									$paidby =$_POST['paidby'];
									$record =$_POST['record'];
									$amount = $_POST['amount'];
									
									if($total == $amount)
									{
										
										$query = "INSERT INTO payment(id, Title, FName, LName, Gender, TRoom, Bed, NRoom, Paidby, Record, Amount)
										values('$id','$title','$fname','$lname','$gender','$troom','$bed','$nroom','$paidby','$record','$amount')";		
										if(mysqli_query($conn,$query))
										{
											
											echo "<script type='text/javascript'> alert('Payment Successfully Completed')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error Try Again')</script>";
												
										}
									
									}
									else {
											echo "<script type='text/javascript'> alert('Insufficient Amount..!!')</script>";
										 }	
								
								}
							
							}
										
	?>


<!doctype html>
<html lang="en">
<head>
	<title>Payment</title>
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
	
<!--Ensure payment process-->
	<div class ="container-fluid">
		<div class ="row" style ="padding-left:70px;">
			<div class ="col-md-4 mt-5">
					<div class="card" style="width: 30rem;">
						<img class="card-img-top" src="images/img/sb-1.jpg" alt="Card image cap">
							<div class="card-body bg-light">
								<h3 class="card-title"style ="font-family:Times and Roman">Double Deluxe</h3>
								<p><em>Room Size:&nbsp; 2800sqm (302sq-ft)</em></p>
								<hr>
								<h5>Best Available Rate</h5>
								<p>
									<li>Complimentary Internet Access
									<li>Complimentary local English newspaper
									<li>Four bottles of local mineral water per day
								</p>
								</br>
								</br>
							</div>
					</div>
			</div>
			<div class ="col-md-4 mt-5">
					<div class="card" style="width: 30rem;">
						<img class="card-img-top" src="images/img/sb-2.jpg" alt="Card image cap">
							<div class="card-body bg-light">
								<h3 class="card-title"style ="font-family:Times and Roman">Suite Pool</h3>
								<p><em>Room Size:&nbsp; 3500sqm (502sq-ft)</em></p>
								<hr>
								<h5>Best Available Rate</h5>
								<p>
									<li>Air-conditioning / heating
									<li>Electronic safety box
									<li>Four bottles of local mineral water per day
								</p>
								</br>
								</br>
							</div>
					</div>
			</div>
			<div class ="col-md-4 mt-5">
					<div class="card" style="width: 30rem;">
						<img class="card-img-top" src="images/img/sb-3.jpg" alt="Card image cap">
							<div class="card-body bg-light">
								<h3 class="card-title"style ="font-family:Times and Roman">Twin Pool</h3>
								<p><em>Room Size:&nbsp; 3800sqm (802sq-ft)</em></p>
								<hr>
								<h5>Best Available Rate</h5>
								<p>
									<li>Complimentary Internet Access
									<li>Turndown Service
									<li>Nespresso machine
								</p>
								</br>
								</br>
							</div>
					</div>
			</div>
			
			<!--<div class ="col-md-3 mt-5">
				<h3>Alisson Hotel</h3>
				<hr>
				</br>
				
				<h5>Best Available Rate</h5>
				<p>
					<li>Complimentary Internet Access
					<li>Complimentary local English newspaper
					<li>Four bottles of local mineral water per day
				</p>
			</div>-->
		</div>
	</div>
	<br>
	<hr>
	<br><br>
	<div class ="container-fluid">
		<form class ="form-container" action ="" method ="POST">
			<div class ="row offset-md-1">
				<div class ="col-md-4">
					<h3 class=""style ="font-family:Times new Roman"><strong>Grand Total</strong></h3>
					<hr>
					<p class ="mt-4"style ="font-size:18px;">Total Room Rate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php 
						
						echo $fintot;
					?></p>
					<p class =""style ="font-size:18px;">Tax and Service Charges &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
					
						echo $tax;
					?>
					</p>
					<hr>
					<p class ="mt-4"style ="font-size:20px;"><strong>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
					
						echo $total;
					?>
					
					</strong></p>
					<h5 class="mt-5"style ="font-family:Times new Roman"><Strong> Guarantee</Strong></h5>
					<p class ="mt-3">Please provide credit details to guarantee your reservation.</p>
					<h5 class=""style ="font-family:Times new Roman"><Strong>Cancellation Charges</Strong></h5>
					<p class ="mt-3">Cancel penalty of
					<?php
						echo $total;
					?> will be charged if reservation is not cancelled by 6PM on
					<?php
						echo $curdate;
					?> </p>
					<h5 class=""style ="font-family:Times new Roman"><Strong>Deposit</strong></h5>
					<p class ="mt-3">Reservation deposit will be charged at time of check-in and may vary depending on the terms and conditions of the rate booked.</p>
					<h5 class=""style ="font-family:Times new Roman"><Strong>Addtional Information</Strong></h5>
					<p class ="mt-3">Thank you for booking Allison Hotels</p>
				</div>
				<div class ="col-md-1">
				  <div class="vl offset-md-5"></div>
				</div>
				<div class ="col-md-6">
					<table class="table table-striped table-bordered table-hover">
						<thead>
						<tr class ="bg-light">
							<th><h5 class ="offset-md-4"><strong> PAYMENT DETAILS</strong></h5></th>					
						</tr>
						<tbody>
							<?php
								echo '<tr><td>'.$title.$fname.$lname.'</td></tr>';
								echo '<tr><td>'.$gender.'</td></tr>';
								echo '<tr><td>'.$troom.'</td></tr>';
								echo '<tr><td>'.$bed.'</td></tr>';
							?>
						
						</tbody>
					
						</thead>
					</table>
					<hr>
					<h3 class ="">Guarantee Your Booking</h3>
					<br>
					<div class="card border-dark">
						<div class="card-header bg-dark text-white border-dark"style ="padding-left:240px;"><h5>Payment Information</h5></div>
							<div class="card-body">
									<div class="form-row">
										<div class="form-group col-lg-12">
											<label for="inputPassword4">Paid by</label>
											<select class="form-control" name="paidby" required="">
												<option value=""></option>
												<option value="Bank">Bank</option>
												<option value="Bkash">BKash</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-6 ">
											<label for="inputAddress">Transaction/Mobile No</label>
											<input type="text" class="form-control" name="record" id="inputAddress"required>
										</div>
										<div class="form-group col-lg-6">
											<label for="inputAddress2">Amount</label>
											<input type="text" class="form-control" name="amount" id="inputAddress2"required>
										</div>
									</div> 
							</div>
					</div>	
				</div>
			</div>
			<hr class ="col-md-10">
			<br>

			<div class ="row">
				<div class ="col-md-5"style="padding-left:50px;">
					<div class="form-check offset-md-2 mt-3">
						<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						<label class="form-check-label" for="defaultCheck1">
							<h6>I would like to receive special offers and happenings via email</h6>
						</label>
					</div>
					<div class="form-check offset-md-2 mt-1">
						<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						<label class="form-check-label" for="defaultCheck1">
							<h6>I have read and accepted the terms and conditions</h6>
						</label>
					</div>
				</div>
				<div class ="col-md-6">
					<h2 class ="offset-md-1" style="font-family:Agency FB;padding-left:20px;"><strong><font color ="black">Human Verification</font></strong></h2>
					<div class=" well offset-md-1"style="padding-left:20px;">
						<h6><em><strong><font color ="black">Type Below this code</font></strong></em> <?php $Random_code=rand(); echo$Random_code; ?> </h6>
						<p><strong><font color ="black">Enter the random code</font></strong><br /></p>			
						<input  type="text" name="code1" required title="random code" />
						<input type="hidden" name="code" value="<?php echo $Random_code; ?>"/>
						<button type="submit" class="btn btn-dark btn-sm" value="payment_submit" name="payment_submit" style="margin-bottom:5px;"><strong><font color ="white">Confirm</font></strong></button>
						
						
					</div>
				</div>
			</div>
		</form>
	</div>
		
		
	</br>

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