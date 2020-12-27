<?php  
session_start();
require 'includes/index.php'; 
ob_start();


$paydate=date("Y/m/d");									
									
									
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Customer Details</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="equipment/CSS/Bootstrap.min.css" />
		<link rel="stylesheet" href="equipment/CSS/main.css" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
				<style>

{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 12in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }

</style>
		
	</head>
	<body>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		

	
	<?php
		
	$pid = $_GET['sid'];

	$sql ="select * from roombook1 where id = '$pid' ";
	$re = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($re))
	{
		$id = $row['id'];
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
	
									
	?>
		<header>
			<h1>Information of Customer</h1>
			<address >
				<h6>Allison HOTEL,</h6>
				<h6>221/A Uttra,D-block,<br>Dhaka-1209,<br>Bangladesh.</h6>
				<h6>Phone- 02-12864965</h6>
			</address>
			<span><img alt="" src="Images/5.1.jpg"></span>
		</header>
		<article>
			<h1></h1>
			<address >
				
				<p><br></p>
				<p>Customer Name  : -  <?php echo $title.$fname." ".$lname;?><br></p>
			</address>
			<table class="meta">
				<tr>
					<th><span >Customer ID</span></th>
					<td><span ><?php echo $id; ?></span></td>
				</tr>
				<tr>
					<th><span >Check in Date</span></th>
					<td><span ><?php echo $cin; ?> </span></td>
				</tr>
				<tr>
					<th><span >Check out Date</span></th>
					<td><span ><?php echo $cout; ?> </span></td>
				</tr>
				<tr>
					<th><span >Paydate</span></th>
					<td><span ><?php echo $paydate; ?> </span></td>
				</tr>
				
			</table>
			<table >
					<tr> 
						<td><h6>Customer phone : -  <?php echo $phone; ?></h6> </td>
						
						<td><h6>Customer email : -  <?php echo $email; ?></h6> </td>
					</tr>
					
					<tr> 
						<td><h6>Customer Address : -  <?php echo $address; ?></h6> </td>
						
						<td><h6>Gender : -  <?php echo $gender; ?></h6> </td>
					</tr>
			
				</table>
				<br>
				<br>
			<table class="inventory">
				<thead>
					<tr>
						<th><span ><h5>Item</h5></span></th>
						<th><span ><h5>No of Days</h5></span></th>
						
					</tr>
				</thead>
				<tbody>
				
					<tr>
						<td><h6><span ><?php echo $troom; ?></span></h6></td>
						<td><h6><span ><?php echo $days; ?> </span></h6></td>
						
					</tr>
					<tr>
						<td><h6><span ><?php echo $bed; ?>  Bed </span></h6></td>
						<td><h6><span ><?php echo $days; ?></span></h6></td>
						
					</tr>
				</tbody>
			</table>
			
			<table class="inventory">
				<!--<thead>
					<tr>
						<th><span ><h5>Payment</h5></span></th>
						<th><span ><h5>Details</h5></span></th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td><h6><span >Amount</span></h6></td>
						<td><h6><span ><?php echo $amount; ?></span></h6></td>
						
					</tr>
				
					<tr>
						<td><h6><span >Paidby </span></h6></td>
						<td><h6><span ><?php echo $paidby; ?> </span></h6></td>
						
					</tr>
					
				</tbody>-->
			</table>
	
		</article>
		<aside>
			<h1><span >Contact us</span></h1>
			<div >
				<h6 align="center">Email :- Allison.fivestar@gmail.com || Phone :- 02-12864965 </h6>
			</div>
		</aside>
	</body>
</html>

<?php 

ob_end_flush();

?>