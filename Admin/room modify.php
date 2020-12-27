<?php  
session_start();
require 'includes/index.php'; 
if(!isset($_SESSION["username"]))
{
  header("");
}
ob_start();
?>
<?php

$rsql ="select id from room";
$rre=mysqli_query($conn,$rsql);

?>

<!doctype html>
<html lang="en">
	<head>
		<title>Room Modification</title>
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
			  <a class=""  href ="admin.php" style = "font-family:Times New Roman; text-decoration:none;"><h1><font color ="white">MAIN MENU</font></h1></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse offset-md-8" id="navbarNavDropdown">
				<ul class="navbar-nav">
				 
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
					<i class="fa fa-user fa-2x" aria-hidden="true"></i>&nbsp;</a>
					
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="administrator.php">Admin Profile</a>
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
							
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><h5><font color="white"> <i class="fa fa-dashboard"></i> &nbsp;&nbsp; Room Status</font></h5></a>
				  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><h5><font color="white"> <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;&nbsp;Add Room</font></h5></a>
				  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><h5><font color="white"> <i class="fa fa-minus-circle" aria-hidden="true"></i> &nbsp;&nbsp;Delete Room</font></h5></a>
				  
				</div>
			</div>
			
			<div class="col-10">
				<div class="tab-content" id="v-pills-tabContent">
				
		<!--Available Rooms -->
				
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					
						<br><br>
						<div class ="container">
							<h1 class="page-header">
								Available <small>Rooms </small>

						</div>
						
						<?php
							
							$sql = "select * from room";
							$re = mysqli_query($conn,$sql)
						?>
						
						<div class ="container">
							<div class ="row">
							
				
									<?php
										while($row= mysqli_fetch_array($re))
										{
											$id = $row['type'];
											if($id == "Deluxe Room") 
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['type']."

														</div>
													</div>
												</div>";
											}
											else if ($id == "Double bunglow")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-green'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-green'>
															".$row['type']."

														</div>
													</div>
												</div>";
											
											}
											else if($id =="Suite Pool")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-brown'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-brown'>
															".$row['type']."

														</div>
													</div>
												</div>";
											
											}
											else if($id =="Twin Pool")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-red'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-red'>
															".$row['type']."

														</div>
													</div>
												</div>";
											
											}
										}
							?>
                    
						</div>
					</div>	
	
					</div>
  
				  
		<!--Add Room-->
			<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
				<br><br>
				<div class ="container">
					<h1 class="page-header">
						NEW ROOM 
					</h1>
			
					<br><br>
					<div class ="row">
						<div class ="col-md-4">
							<div class="card bg-light mb-3" style="max-width: 28rem;">
							  <div class="card-header bg-dark"><font color="white">ADD NEW ROOM</font></div>
								<div class="card-body">
								  <form name="form" action="" method="POST">
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
									<input type="submit" name="add" value="Add New" class="btn btn-primary">
								</form>
								<?php

								if(isset($_POST['add']))
									{
										$room = $_POST['troom'];
										$bed = $_POST['bed'];
										$place = 'Free';
										
										$check="SELECT * FROM room WHERE type = '$room' AND bedding = '$bed'";
										$rs = mysqli_query($conn,$check);
										$data = mysqli_fetch_array($rs, MYSQLI_NUM);
										if($data[0] > 1) {
											
											echo "<script type='text/javascript'> alert('Room Already in Exists')</script>";	
										}

										else
										{
											$sql ="INSERT INTO room (type, bedding, place) VALUES ('$room','$bed','$place')" ;
											if(mysqli_query($conn,$sql))
											 {
												echo '<script>alert("New Room Added") </script>' ;
												header("Location: room modify.php");
											 
											 }else {
												    echo '<script>alert("Sorry ! Check The System") </script>' ;
												   }
										}
									}
								
								?>
								
								</div>
							</div>
						</div>
						<div class ="col-md-7">
							<div class="card bg-light mb-3" style="max-width: 58rem;">
							  <div class="card-header bg-dark"><font color="white">ROOMS INFORMATION</font></div>
								<div class="card-body">
									<?php
										$sql = "select * from room limit 0,10";
										$re = mysqli_query($conn,$sql)
									?>
									<div class ="table-responsive">
										<table class="table table-bordered">
										  <thead>
											<tr class="">
												<th>Room ID</th>
												<th>Room Type</th>
												<th>Bedding</th>
											</tr>
										  </thead>
										  <tbody>
									
									<?php
										while($row= mysqli_fetch_array($re))
										{
											$id = $row['id'];
											if($id % 2 == 0) 
											{
												echo "<tr class=odd gradeX>
													<td>".$row['id']."</td>
													<td>".$row['type']."</td>
												   <th>".$row['bedding']."</th>
												</tr>";
											}
											else
											{
												echo"<tr class=even gradeC>
													<td>".$row['id']."</td>
													<td>".$row['type']."</td>
												   <th>".$row['bedding']."</th>
												</tr>";
											
											}
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
				
			</div>
				  
				  
		<!--Delete Room-->
		
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<br><br>
						<div class ="container">
							<h1 class="page-header">
								Delete <small>Rooms </small>
							</h1>
						</div>
				
				
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="card border-dark mb-3" style="max-width: 78rem;">
								<div class="card-header bg-dark"><font color="white"><h6>Delete Room</h6></font></div>
									<div class="card-body">
										<form name="form" method="post">
											<div class="form-group">
												<label>Select the Room ID *</label>
												<select name="id"  class="form-control" required>
													<option value selected ></option>
													<?php
														while($rrow=mysqli_fetch_array($rre))
															{
																$value = $rrow['id'];
																echo '<option value="'.$value.'">'.$value.'</option>';
															}
													?>       
												</select>
											</div>
											<input type="submit" name="del" value="Delete Room" class="btn btn-primary"> 
										</form>
									<?php
									
										 if(isset($_POST['del']))
										 {
											$did = $_POST['id'];
											
											
											$sql ="DELETE FROM room WHERE id = '$did'" ;
											if(mysqli_query($conn,$sql))
											{
											   echo '<script type="text/javascript">alert("Delete the Room") </script>' ;
											   header("Location: room modify.php");
											   
											}else {
												echo '<script>alert("Sorry ! Check The System") </script>' ;
											}
										 }
										
										?>
										
									</div>
							</div>
							<br><br><br>
						</div>
						
                
                  
				<?php
						
					$sql = "select * from room";
					$re = mysqli_query($conn,$sql)
				?>
				
			</div>
			
            <div class="row">

				<?php
					while($row= mysqli_fetch_array($re))
						{
							$id = $row['type'];
							if($id == "Deluxe Room") 
								{
									echo"<div class='col-md-3 col-sm-12 col-xs-12'>
											<div class='panel panel-primary text-center no-boder bg-color-blue'>
												<div class='panel-body'>
													<i class='fa fa-users fa-5x'></i>
													<h3>".$row['bedding']."</h3>
												</div>
												<div class='panel-footer back-footer-blue'>
													".$row['type']."
												</div>
											</div>
										</div>";
								}
								else if ($id == "Double bunglow")
									{
										echo"<div class='col-md-3 col-sm-12 col-xs-12'>
												<div class='panel panel-primary text-center no-boder bg-color-green'>
													<div class='panel-body'>
														<i class='fa fa-users fa-5x'></i>
														<h3>".$row['bedding']."</h3>
													</div>
													<div class='panel-footer back-footer-green'>
														".$row['type']."
													</div>
												</div>
											</div>";
									}
								else if($id =="Suite Pool")
									{
										echo"<div class='col-md-3 col-sm-12 col-xs-12'>
												<div class='panel panel-primary text-center no-boder bg-color-brown'>
													<div class='panel-body'>
														<i class='fa fa-users fa-5x'></i>
														<h3>".$row['bedding']."</h3>
													</div>
													<div class='panel-footer back-footer-brown'>
														".$row['type']."
													</div>
												</div>
											</div>";
										}
								else if($id =="Twin Pool")
									{
										echo"<div class='col-md-3 col-sm-12 col-xs-12'>
												<div class='panel panel-primary text-center no-boder bg-color-red'>
													<div class='panel-body'>
														<i class='fa fa-users fa-5x'></i>
														<h3>".$row['bedding']."</h3>
													</div>
													<div class='panel-footer back-footer-red'>
														".$row['type']."
													</div>
												</div>
											</div>";
									}
						}
				?>
                    
            </div>
			
            <?php
			
				ob_end_flush();
			?>
				  </div>

				</div>
			  </div>
		</div>	
			<!--Row end-->
		
	</body>
</html>