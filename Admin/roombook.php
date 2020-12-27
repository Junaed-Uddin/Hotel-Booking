<?php  
session_start();
require 'includes/index.php'; 
if(!isset($_SESSION["username"]))
{
  header("");
}

 $curdate=date("Y/m/d");

						if(!isset($_GET["rid"]))
						{
							
							 
						}
						else {
								
								$id = $_GET['rid'];
								$sql ="Select * from roombook1 where id = '$id'";
								$re = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($re))
								{
									$title = $row['Title'];
									$fname = $row['FName'];
									$lname = $row['LName'];
									$email = $row['Email'];
									$address = $row['Address'];
									$phone = $row['Phone'];
									$gender = $row['Gender'];
									$cin = $row['cin'];
									$cout = $row['cout'];
									$troom = $row['TRoom'];
									$bed = $row['Bed'];
									$nroom = $row['NRoom'];
									$nnight = $row['NNight'];
									$nadults = $row['NAdults'];
									$sta = $row['stat'];
									$days = $row['nodays'];
									
								}
							}
							if(isset($_POST['submit'])){
									
									$email = $_POST['email'];
									$subject =$_POST['subject'];
									$message =$_POST['message'];

									$query = "INSERT INTO admin_contact (subject, email, message) values ('$subject','$email','$message')" ;
									
									$check="SELECT * FROM admin_contact WHERE email ='$email'";
									$rs = mysqli_query($conn,$check);
									if(mysqli_num_rows($rs)>0){
										echo "<script type='text/javascript'> alert('Message already is sent')</script>";
										
									}
								
									else if (mysqli_query($conn,$query))
										{
											echo "<script type='text/javascript'> alert('Message sent')</script>";
											
										}		
								}
							?>
		


<!doctype html>
<html lang="en">
	<head>
		<title>Room Booking</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="equipment/CSS/Bootstrap.min.css" />
		<link rel="stylesheet" href="equipment/CSS/main.css" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>
	<body>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		
		
		
		
		<!--Navbar-->
		
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			  <a class=""style = "font-family:Times New Roman"><h1><font color ="white">ADMIN</font></h1></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse offset-md-9" id="navbarNavDropdown">
				<ul class="navbar-nav">
				 
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
					<i class="fa fa-user fa-2x" aria-hidden="true"></i>&nbsp;</a>
					
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="administrator.php">Admin Profile</a>
						<a class="dropdown-item" href="room modify.php">Room Modification</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				  </li>
				</ul>
			  </div>
		</nav>
			

		  
		  
		  <!--Vertical Navs-->
		  
		<div class="row">
			<div class="col-md-2 bg1">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><h5><font color="white"> <i class="fa fa-dashboard"></i> &nbsp;&nbsp;Status</font></h5></a>
				  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><h5><font color="white"> <i class="fa fa-comments"></i> &nbsp;&nbsp;Messages</font></h5></a>
				  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" ><h5><font color="white"><i class="fa fa-bed"></i> &nbsp;&nbsp;Room Booking</font></h5></a>
				  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" ><h5><font color="white"> <i class="fa fa-money"></i> &nbsp;&nbsp;Payments</font></h5></a>
				  <a class="nav-link" id="v-pills-profit-tab" data-toggle="pill" href="#v-pills-profit" role="tab" aria-controls="v-pills-profit" aria-selected="false" ><h5><font color="white"> <i class="fa fa-bar-chart-o"></i> &nbsp;&nbsp;Profit</font></h5></a>
				  <a class="" href="logout.php" role="tab" aria-controls="v-pills-logout" aria-selected="false" style ="padding-top:6px; text-decoration:none;"><h5><font color="white">&nbsp;&nbsp; <i class="fa fa-sign-out fa-fw"></i> &nbsp;&nbsp;Logout</font></h5></a>
				</div>
			</div>
			
			  <div class="col-10">
				<div class="tab-content" id="v-pills-tabContent">
				
		<!--Status Room Booking-->
				
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					
					<br><br>
						<div class ="container">
							<h1 class="page-header">
								Status <small>Room Booking </small>
							</h1>
							
							
					<!--Roombook-->
					<?php
					
						$sql = "select * from roombook1";
						$re = mysqli_query($conn,$sql);
						$c =0;
						while($row=mysqli_fetch_array($re) )
						{
							$new = $row['stat'];
							$cin = $row['cin'];
							$id = $row['id'];
							if($new=="Not Confirm")
							{
								$c = $c + 1;
							}
						}
						
					?>
					<!------------------------------------------------------------------------
					------------------------------------------------------------------------>
					
					<?php
								
						$rsql = "SELECT * FROM roombook1";
						$rre = mysqli_query($conn,$rsql);
						$r =0;
						while($row=mysqli_fetch_array($rre) )
							{		
								$br = $row['stat'];
								if($br=="Confirm")
									{
										$r = $r + 1;	
									}
							}
						
					?>
							<br><br>
							<!--Contact PHP info-->
								<?php
								
									$fsql = "SELECT * FROM contact";
									$fre = mysqli_query($conn,$fsql);
									$f =0;
									while($row=mysqli_fetch_array($fre) )
									{
										$f = $f + 1;
									
									}
						
								?>
								  
							
							<div class="card text-center">
							  <div class="card-header"style ="background-color:#e3f2fd">
								<nav>
								  <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h6>New Room Booking &nbsp;<span class="badge badge-dark"><?php echo $c ; ?></span></h6></a>
									<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h6>Booked Room &nbsp;<span class="badge badge-dark"><?php echo $r ; ?></span></h6></a>
									<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h6>Messages &nbsp;<span class="badge badge-dark"><?php echo $f ; ?></span></h6></a>
								  </div>
								</nav>
							  </div>
							  
							  <div class="card-body">
								<div class="tab-content" id="nav-tabContent">
								  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<table class="table table-bordered">
									  <thead>
										<tr class="">
											<th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Type of Room</th>
											<th>Bedding</th>
											<th>Room No</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Status</th>
											<th>More</th>
										</tr>
									  </thead>
									  <tbody>
                                        
								<?php
									$tsql = "select * from roombook1";
									$tre = mysqli_query($conn,$tsql);
									while($trow=mysqli_fetch_array($tre) )
									{	
										$co =$trow['stat']; 
										if($co=="Not Confirm")
										{
											echo"<tr>
												<th>".$trow['id']."</th>
												<th>".$trow['FName']." ".$trow['LName']."</th>
												<th>".$trow['Email']."</th>
												<th>".$trow['TRoom']."</th>
												<th>".$trow['Bed']."</th>
												<th>".$trow['NRoom']."</th>
												<th>".$trow['cin']."</th>
												<th>".$trow['cout']."</th>
												<th>".$trow['stat']."</th>
												<th><a href='roombook.php?rid=".$trow['id']." ' class='btn btn-primary'>Action</a></th>
												</tr>";
												
										}
																							
									
									}
								?>
                                        
                                    </tbody>
									</table>
								  
								  </div>
								  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
									
									<div class ="row">
									<?php
										$msql = "SELECT * FROM roombook1";
										$mre = mysqli_query($conn,$msql);
										
										while($mrow=mysqli_fetch_array($mre) )
										{		
											$br = $mrow['stat'];
											if($br=="Confirm")
											{
												$fid = $mrow['id'];
												 
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
												
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$mrow['FName']."</h3>
														</div>
														
														<div class='panel-footer back-footer-blue'>
														<a href=show.php?sid=".$fid ."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>Show</button></a>
														 &nbsp;	".$mrow['TRoom']."
														</div>
														
													</div>	
												</div>";
					
											}	
									
										}
										?>
								  </div>
								  </div>
							
								  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
									<table class="table table-bordered">
									  <thead>
										<tr class="">
											<th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Message Date</th>
											<th>Message</th>
										</tr>
										
									  </thead>
									  <tbody>
                                        
								<?php
									
									$csql = "select * from contact";
									$cre = mysqli_query($conn,$csql);
									while($crow=mysqli_fetch_array($cre) )
									{	
										echo"<tr>
										<th>".$crow['id']."</th>
										<th>".$crow['name']."</th>
										<th>".$crow['email']." </th>
										<th>".$crow['cdate']." </th>
										<th>".$crow['message']."</th>
										</tr>";	
									}
									
								?>   
                                    </tbody>
									</table>
								
								  </div>
								  
								</div>
							  </div>
							</div>
							
						</div>

					</div>
					
				  	  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<br><br>
						<div class ="container">
							<h1 class="page-header">
								Message <small>Details </small>
							</h1>
							
							<br><br>
							<div class="card bg-light mb-3" style="max-width: 70rem;">
							  <div class="card-header bg-dark"><h4><font color ="white">Message Box</font></h4></div>
							  <div class="card-body">
								<form class ="form-container"action ="" method ="post" name="sentMessage" id="contactForm">
									<div class ="row">
										<div class="col-md-6">
											<div class="form-group">
												<label><h6>Email</h6></label>
												<input name="email" type ="email" class="form-control" >
											</div>
										</div>
										<div class="col-md-6">
											<label><h6>Subject</h6></label>
											<select name="subject" class="form-control" required>
												<option value selected ></option>
												<option value="Room & Service">Room & Service</option>
												<option value="Problem Remedy">Problem Remedy</option>
												<option value="Offer">Offer</option>
											</select>
										</div>
									</div>
									<div class ="row">
										<div class="col-md-12">
											<label><h6>Message</h6></label>
											<textarea class ="form-control" name ="message" id ="message" rows="4" required></textarea>
										</div>
									</div>
									
									<br>
									<div class ="row offset-md-2">
										<div class ="col-md-6 offset-md-4">
											<button type="submit" name ="submit" value="Send Now" class="btn btn-primary btn-lg mt-1">Send</button>
										</div>
									</div>
								</form>
							  </div>
							</div>
						
							<br><br><br>
			
						</div>
				  </div>
				
			<!--Room booking-->		 
	
			<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
				<br><br>
				<div class ="container">
					
							<h1 class="page-header">
								Room Booking<small>   <?php echo  $curdate; ?> </small>
							</h1>
							
							<br><br>
							<div class="card text-center"> 
							 <div class="card-header bg-dark"><h4><font color="white">Booking Confirmation</font></h4></div>
							  <div class="card-body">
								<div class="tab-content" id="nav-tabContent">
								  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class ="table-responsive">	
										<table class="table table-bordered">
											<tr class ="bg-light">
												<th><h5><strong>DESCRIPTION</strong></h5></th>
												<th><h5><strong>INFORMATION</strong></h5></th>
												
											</tr>
											<tr>
												<th>Name</th>
												<th><?php echo $title. $fname." ".$lname; ?> </th>
												
											</tr>
											<tr>
												<th>Email</th>
												<th><?php echo $email; ?> </th>
												
											</tr>
											<tr>
												<th>Address </th>
												<th><?php echo $address; ?></th>
												
											</tr>
											<tr>
												<th>Phone No </th>
												<th><?php echo $phone; ?></th>
												
											</tr>
											<tr>
												<th>Gender</th>
												<th><?php echo $gender; ?></th>
												
											</tr>
											<tr>
												<th>Check-in Date </th>
												<th><?php echo $cin; ?></th>
												
											</tr>
											<tr>
												<th>Check-out Date</th>
												<th><?php echo $cout; ?></th>
												
											</tr>
											<tr>
												<th>Type Of the Room </th>
												<th><?php echo $troom; ?></th>
												
											</tr>
											<tr>
												<th>Bedding </th>
												<th><?php echo $bed; ?></th>
												
											</tr>
											<tr>
												<th>No Of the Room </th>
												<th><?php echo $nroom; ?></th>
												
											</tr>
										
											<tr>
												<th>No Of the Night </th>
												<th><?php echo $nnight; ?></th>
												
											</tr>
											
											<tr>
												<th>No Of the Adult</th>
												<th><?php echo $nadults; ?></th>
												
											</tr>

											<tr>
												<th>No of days</th>
												<th><?php echo $days; ?></th>
												
											</tr>		
											<tr>
												<th>Status Level</th>
												<th><?php echo $sta; ?></th>
												
											</tr>

										</table>
									</div>
								  </div>
								  
								</div>
							  </div>
						
							</div>
							<br><br>
							<div class="panel-footer">
								<form method="post">
									<div class="form-group">
										<label>Select the Confirmation</label>
										<select name="conf"class="form-control" required>
											<option value selected>	</option>
											<option value="Confirm">Confirm</option>	
										</select>
									</div>
									<input type="submit" name="co" value="Confirm" class="btn btn-primary" >
									
								</form>
							</div>
						</div>
					
					
					<?php
						$rsql ="select * from room";
						$rre= mysqli_query($conn,$rsql);
						$r =0 ;
						$sc =0;
						$gh = 0;
						$sr = 0;
						$dr = 0;
						while($rrow=mysqli_fetch_array($rre))
						{
							$r = $r + 1;
							$s = $rrow['type'];
							$p = $rrow['place'];
							if($s=="Deluxe Room" )
							{
								$sc = $sc+ 1;
							}
							
							if($s=="Double bunglow")
							{
								$gh = $gh + 1;
							}
							if($s=="Suite Pool" )
							{
								$sr = $sr + 1;
							}
							if($s=="Twin Pool" )
							{
								$dr = $dr + 1;
							}
						}
						?>
						
						<?php
						$csql ="select * from temporary";
						$cre= mysqli_query($conn,$csql);
						$cr =0 ;
						$csc =0;
						$cgh = 0;
						$csr = 0;
						$cdr = 0;
						while($crow=mysqli_fetch_array($cre))
						{
							$cr = $cr + 1;
							$cs = $crow['troom'];
							
							if($cs=="Deluxe Room"  )
							{
								$csc = $csc + 1;
							}
							
							if($cs=="Double bunglow" )
							{
								$cgh = $cgh + 1;
							}
							if($cs=="Suite Pool" )
							{
								$csr = $csr + 1;
							}
							if($cs=="Twin Pool" )
							{
								$cdr = $cdr + 1;
							}
						}
				
					?>
					<br><br>
					<div class="container">
						<div class ="row">
							<div class="col-md-12">
								<div class="card border-dark">
									<div class="card-header bg-dark">
										<font color="white"><h5 class ="offset-md-4" style ="padding-left:60px;">Available Room Details</h5></font>
									</div>
									<div class="card-body">
										<table class ="table table-bordered">
											<tr class ="bg-light">
												<td><h5><strong>ROOM TYPES</strong></h5></td>
												<td><h5><strong>ROOM STATUS</strong></h5></td>
											</tr>
											<tr>
												<td><b>DELUXE ROOM	 </b></td>
												<td><button type="button" class="btn btn-primary btn-circle">
												<?php  
													$f1 =$sc - $csc;
													if($f1 <=0 )
													{	
														$f1 = "NO";
														echo $f1;
													}
													else
													{
														echo $f1;
													}

												?> </button></td> 
											</tr>
											
											<tr>
												<td><b>DOUBLE BUNGALOW	</b></td>
												<td><button type="button" class="btn btn-primary btn-circle">
												<?php 
												$f2 =  $gh -$cgh;
												if($f2 <=0 )
													{	
														$f2 = "NO";
														echo $f2;
													}
													else
													{
														echo $f2;
													}

												?> </button></td> 
											</tr>
											
											<tr>
												<td><b>SUITE POOL VIEW	 </b></td>
												<td><button type="button" class="btn btn-primary btn-circle">
												<?php
												$f3 =$sr - $csr;
												if($f3 <=0 )
													{	
														$f3 = "NO";
														echo $f3;
													}
													else
													{
														echo $f3;
													}

												?> </button></td> 
											</tr>
											
											<tr>
												<td><b>TWIN POOL VIEW	</b></td>
												<td><button type="button" class="btn btn-primary btn-circle">
												<?php 
												
												$f4 =$dr - $cdr; 
												if($f4 <=0 )
													{	
														$f4 = "NO";
														echo $f4;
													}
													else
													{
														echo $f4;
													}
												?> </button></td> 
											</tr>
											
											<tr>
												<td><b>TOTAL ROOMS	</b> </td>
												<td> <button type="button" class="btn btn-danger btn-circle">
												<?php 
												
												$f5 =$r-$cr; 
												if($f5 <=0 )
													{	
														$f5 = "NO";
														echo $f5;
													}
													else
													{
														echo $f5;
													}
												 ?> </button></td> 
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		<!--Payment Details-->
		
				  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
					<br><br>
						<div class ="container">
							<h1 class="page-header">
								Payment <small>Details </small>
							</h1>
							
							<br><br>
							<div class="card text-center"> 
							  <div class="card-body">
								<div class="tab-content" id="nav-tabContent">
								  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<table class="table table-striped table-bordered table-hover">
									  <thead>
											<tr class="">
											<th>Name</th>
											<th>Gender</th>
											<th>Room Type</th>
                                            <th>Bed Type</th>
											<th>No of Rooms</th>
											<th>Paidby</th>
											<th>Record</th>
                                            <th>Total Amount(Tk)</th>
											
										</tr>
									  </thead>
									   <tbody>
                                        
									<?php
									
										$sql="select * from payment";
										$re = mysqli_query($conn,$sql);
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											if($id % 2 ==1 )
											{
												echo"<tr class='gradeC'>
												<td>".$row['FName']." ".$trow['LName']."</td>
												<td>".$row['Gender']."</td>
												<td>".$row['TRoom']."</td>
												<td>".$row['Bed']."</td>
												<td>".$row['NRoom']."</td>
												<td>".$row['Paidby']."</td>
												<td>".$row['Record']."</td>
												<td>".$row['Amount']."</td>
												
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
												<td>".$row['FName']." ".$trow['LName']."</td>
												<td>".$row['Gender']."</td>
												<td>".$row['TRoom']."</td>
												<td>".$row['Bed']."</td>
												<td>".$row['NRoom']."</td>
												<td>".$row['Paidby']."</td>
												<td>".$row['Record']."</td>
												<td>".$row['Amount']."</td>
												
												</tr>";
											}
										}
										
									?>
                                        
                                    </tbody>
									</table>
										
								  </div>
								  
								</div>
							  </div>
								<nav aria-label="Page navigation example">
									<ul class="pagination offset-md-9"style="padding-left:10px">
										<li class="page-item"><a class="page-link" href="#">Previous</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">Next</a></li>
									</ul>
								</nav>
							</div>
						</div>
				  </div>
				  
				 <!--Profit-->
				  <div class="tab-pane fade" id="v-pills-profit" role="tabpanel" aria-labelledby="v-pills-profit-tab">
						<br><br>
			<?php 
				
					$query = "SELECT * FROM payment";
					$result = mysqli_query($conn, $query);
					$chart_data = '';
					$tot = 0;
					while($row = mysqli_fetch_array($result))
					{
					 $chart_data .= "{profit:".$row["Amount"] *10/100 ."}, ";
					 $tot = $tot + $row["Amount"] *10/100;
					}
					$chart_data = substr($chart_data, 0, -2);
				
?>
						<div class ="container">
							<h1 class="page-header">
								Profit <small>Details </small>
							</h1>
						
							<br><br>
							<div class="card text-center"> 
							  <div class="card-body">
								<div class="tab-content" id="nav-tabContent">
								  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<table class="table table-striped table-bordered table-hover">
									  <thead>
										<tr class="">
											<th>Name</th>
                                            <th>Room Type</th>
											<th>Bed Type</th>
											<th>Tax & Services</th>
											<th>Gr.Total</th>
											<th>Profit</th>
										</tr>
									  </thead>
									  <tbody>
                                        
									<?php
										
										$sql="select * from payment";
										$re = mysqli_query($conn,$sql);
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											
											if($id % 2 ==1 )
											{
												echo"<tr class='gradeC'>

												<td>".$row['FName']." ".$trow['LName']."</td>
												<td>".$row['TRoom']."</td>
												<td>".$row['Bed']."</td>
												<td>".$row['Amount']*20/100 ."</td>
												<td>".$row['Amount']."</td>
												<td>$".$row['Amount']*10/100 ."</td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>

												<td>".$row['FName']." ".$trow['LName']."</td>
												<td>".$row['TRoom']."</td>
												<td>".$row['Bed']."</td>
												<td>".$row['Amount']*20/100 ."</td>
												<td>".$row['Amount']."</td>
												<td>$".$row['Amount']*10/100 ."</td>
												</tr>";
												
											}
										
										}
										
									?>
                                        
                                    </tbody>
									</table>
										
								  </div>
								  
								</div>
							  </div>
								<nav aria-label="Page navigation example">
									<ul class="pagination offset-md-9"style="padding-left:10px">
										<li class="page-item"><a class="page-link" href="#">Previous</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">Next</a></li>
									</ul>
								</nav>
							</div>
						</div>
				  
				  
				  </div>
				  </div>
				  
				</div>
			  </div>
		</div>	
			<!--Row end-->
	</body>
</html>

					<?php
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];

							if($st=="Confirm")
							{
								$urb = "UPDATE roombook1 SET stat='$st' WHERE id = '$id'";
	
								if($f1=="NO")
								{
									echo "<script type='text/javascript'> alert('Sorry! Not Available DELUXE ROOM ')</script>";
								}
								else if($f2 =="NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available DOUBLE BUNGALOW')</script>";
										
									}
								else if ($f3 == "NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available SUITE POOL VIEW')</script>";
									}
								else if($f4=="NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available TWIN POOL VIEW')</script>";
									}
										
								else if( mysqli_query($conn,$urb))
									{	
										//echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
										//echo "<script type='text/javascript'> window.location='home.php'</script>";
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
										$btot = $type_of_bed *$days;
														
										$fintot = $ttot + $btot ;
															
										//echo "<script type='text/javascript'> alert('$count_date')</script>";
										$psql = "INSERT INTO temporary(id, title, fname, lname, email, gender, cin, cout, troom, bed, nroom, nodays, ttot, btot, fintot)
										VALUES('$id','$title','$fname','$lname','$email','$gender','$cin','$cout',
										'$troom','$bed','$nroom','$days','$ttot','$btot','$fintot')";
														
										if(mysqli_query($conn,$psql))
											{	
												$notfree="NotFree";
												$rpsql = "UPDATE room SET place='$notfree',cusid='$id' where bedding ='$bed' and type='$troom' ";
												if(mysqli_query($conn,$rpsql))
													{
									
														echo "<script type='text/javascript'> alert('Booking Conform')</script>";
														echo "<script type='text/javascript'> window.location='roombook.php'</script>";
													}		
															
											}	
									}	        
							}	
					
						}
		
					?>