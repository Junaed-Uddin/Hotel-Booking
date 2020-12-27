<?php

	 require 'includes/index.php';
	 $id =$_GET['eid'];		
	 $newsql ="DELETE FROM login WHERE id ='$id' ";
	 if(mysqli_query($conn,$newsql))
		{
		  echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
		}
	 header("Location: administrator.php");
		
?>
