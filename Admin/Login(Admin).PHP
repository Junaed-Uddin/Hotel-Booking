<?php

require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
	<head>
		<title>LOGIN</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="equipment/CSS/Bootstrap.min.css" />
		<link rel="stylesheet" href="equipment/CSS/main.css" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		
		<style>
		  body, html {
		  height: 100%;
		  margin: 0;
		}
			body  {
			  background-image: url("Images/2.jpg");
			  margin: 0;
			  padding: 0;
			  background-size: cover;
			  background-position: center;
			  font-family: sans-serif;
			  background-repeat: no-repeat;

			}
			
			
		</style>
	</head>
	<body>
	

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		
	
	 <div class="login-box">
		<img src="Images/3.jpg" class="avatar">
        <h2 class ="" ><strong>ADMIN</strong></h2>
            <form class="" action ="" method ="POST">
				<h5 class ="" style= "font-family:Arial">Username</h5>
				<input type="text" name="username" required >
				<h5 class ="" style= "font-family:Arial">Password</h5>
				<input type="password" name="password" required>
				<input type="submit" name="submit" value="Login"> 
            </form>		
     </div>
	
	</body>	
</html>

<?php
   
  
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	  
	  if(isset($_POST['submit'])){
      
		  $myusername = mysqli_real_escape_string($conn,$_POST['username']);
		  $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
		  
		  $sql = "SELECT id FROM login WHERE username = '$myusername' and password = '$mypassword'";
		  $result = mysqli_query($conn,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		  $active = $row['active'];
		  
		  $count = mysqli_num_rows($result);
		  
		  // If result matched $myusername and $mypassword, table row must be 1 row
			
		  if($count == 1) {
			 
			 $_SESSION['username'] = $myusername;
			 
			 header("location: admin.php");
			 
		  }else {
			 echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
		  }
	  }
   }
   
?>
