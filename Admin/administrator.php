<?php  
session_start();
require 'includes/index.php';  


ob_start();
?> 

<!doctype html>
<html lang="en">
	<head>
		<title>ADMINISTRATOR</title>
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
			  <a class="" href ="admin.php" style = "font-family:Times New Roman; text-decoration:none;"><h1><font color ="white">MAIN MENU</font></h1></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			   <div class="collapse navbar-collapse offset-md-8" id="navbarNavDropdown">
				<ul class="navbar-nav">
				 
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
					<i class="fa fa-user fa-2x" aria-hidden="true"></i>&nbsp;</a>
					
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
							
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><h5><font color="white"> <i class="fa fa-dashboard"></i> &nbsp;&nbsp;User Dashboard</font></h5></a>
				  
				</div>
			</div>
			
			  <div class="col-10">
				<div class="tab-content" id="v-pills-tabContent">
				
		<!--Status Room Booking-->
				
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<br><br>
						<div class ="container">
							<h1 class="page-header">
								ADMINISTRATOR <small>accounts </small>
							</h1>
							<hr>
							<br><br>
							
						<?php
						
							$sql = "SELECT * FROM login";
							$record = mysqli_query($conn,$sql);
						?>
						
							<div class="card text-center"> 
							  <div class="card-body">
								<div class="tab-content" id="nav-tabContent">
								  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<table class="table table-striped table-bordered table-hover">
									  <thead>
										<tr class="">
											<th>User ID</th>
											<th>User Name</th>
                                            <th>Password</th>
                                            <th>Update</th>
											<th>Remove</th>
										</tr>
									  </thead>
									  <tbody>
									  
									<?php
									
										while($row = mysqli_fetch_array($record))
										{
											$id = $row['id'];
											$us = $row['username'];
											$ps = $row['password'];
											
											if($id % 2 ==0 )
											{
												echo"<tr class='gradeC'>
													<td>".$id."</td>
													<td>".$us."</td>
													<td>".$ps."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#exampleModal'>Update </button></td>
													<td><a href=deleteadmin.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$id."</td>
													<td>".$us."</td>
													<td>".$ps."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#exampleModal'>Update </button></td>
													<td><a href=deleteadmin.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
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
							<br><br>
							
							<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal1">
							  Add New Admin
							</button>

						<!-- Modal -->
							<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel1">Add the Username & Password</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label><strong>Add New User Name</strong></label>
                                            <input name="newusername"  class="form-control" placeholder="Enter User Name">
											</div>
                                            <div class="form-group">
                                            <label><strong>New Password</strong></label>
                                            <input name="newpassword"  class="form-control" placeholder="Enter Password">
											</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">CLOSE</button>
                                            <input type="submit" name="in" value="ADD" class="btn btn-dark">
										</div>
								</form>
										
							  </div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		
					<?php
						
						if(isset($_POST['in']))
						{
							$newusername = $_POST['newusername'];
							$newpassword = $_POST['newpassword'];
							
							$newsql = "select * from login WHERE username='$newusername'";
							$query_run = mysqli_query($conn,$newsql);
						
							if(mysqli_num_rows($query_run)>0){
								
								echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
								
							 }
							if(mysqli_num_rows($query_run)<=0)
								{
									$newsql ="insert into login (username,password) values('$newusername','$newpassword')";
									$query_run = mysqli_query($conn,$newsql);
									if($query_run)
									{
										echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
									}
								}
							header("Location: administrator.php");
							
						}
					?>

						<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Change the Username & Password</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								 	<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change User Name</label>
                                            <input name="usname" value="<?php echo $us; ?>" class="form-control" placeholder="Enter User name">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Password</label>
                                            <input name="pasd" value="<?php echo $ps; ?>" class="form-control" placeholder="Enter Password">
											</div>
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           <input type="submit" name="up" value="Update" class="btn btn-primary"> 
										</div>
									</form>
										
							  </div>
							</div>
						</div>
						
			     <?php 
				 
					if(isset($_POST['up']))
					{
						$usname = $_POST['usname'];
						$passwr = $_POST['pasd'];
						
						$upsql = "UPDATE login SET username='$usname',password='$passwr' WHERE id = '$id'";
						if(mysqli_query($conn,$upsql))
						{
							echo' <script language="javascript" type="text/javascript"> alert("User name and password update") </script>';

						}
						header("Location: administrator.php");
					}
					ob_end_flush();
			?>
			
		</div>
	</div>
						
	</body>
</html>