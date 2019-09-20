<?php

/*$dbservername="localhost";
$dbusername  ="root";
$dbpassword  ="";
$dbname      ="municipality";

$conn= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);*/
include('connection.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully" . "<br>";
?>
<!DOCTYPE html>
<html>
<head>
	<style>
body {background-color: rgba(144,198,149,1);}
h1   {color: green;}
p    {color: red;}
</style>
	<title>welcome to municipality</title>
<link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>
<body>
	<h1><center><marquee><BLOCKQUOTE><b><font size="50" color="green">Check For Worker Details</BLOCKQUOTE></marquee></center></h1>
	<img src="./img1.png"; width="1330"; height="300">
	<div id="m">
    <ul id="me">
     <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
       <li class="select"><a href="./member.php">Home</a></li>
       <li><a href="./mtmlmunici%20(1).html">User-Homepage</a></li>
       <li><a href="./member_area.php">Logout</a></li>
    </ul>
	</div><br><br>
	<table border="1px solid black" align="center">
		<tr>
			<th>Emp_id</th>
			<th>Name</th>
			<th>Phone1</th>
			<th>Phone2</th>
			<th>Aadhar</th>
			<th>Address</th>
			<th>Lisence</th>
			<th>Pan_number</th>
			<th>Free</th>
			<th>Joining_yr</th>
			<th>No_of_works</th>
			<th>Work_Completed_in_Month</th>
		</tr>
		<?php
			$depart = $_POST['depart'];
			//echo "$depart";
			if($depart=="Drainage")
			{
				$sql= "SELECT * from dep_drain;";
				$result= mysqli_query($conn,$sql);
				$resultCheck= mysqli_num_rows($result);
				error_reporting(0);
				if($resultCheck > 0)
				{
					echo "<h3 align=center>$depart Department Workers</h3>";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr><td align=center>".$row['emp_id']."</td><td align=center>".$row['name']."</td><td align=center>".$row['phone1']."</td><td align=center>".$row['phone2']."</td><td align=center>".$row['aadhar']."</td><td align=center>".$row['address']."</td><td align=center>".$row['lisence']."</td><td align=center>".$row['pan_number']."</td><td align=center>".$row['free']."</td><td align=center>".$row['joining_yr']."</td><td align=center>".$row['no_of_works']."</td><td align=center>".$row['work_completed_in_month']."</td></tr>";
						echo "<br>";
					}
				}
				else
				{
					echo "<br><br>No results are present";
				}
			}
			elseif($depart=="Electricity")
			{
				$sql= "SELECT * from dep_electricity;";
				$result= mysqli_query($conn,$sql);
				$resultCheck= mysqli_num_rows($result);
				error_reporting(0);
				if($resultCheck > 0)
				{
					echo "<h3 align=center>$depart Department Workers</h3>";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr><td align=center>".$row['emp_id']."</td><td align=center>".$row['name']."</td><td align=center>".$row['phone1']."</td><td align=center>".$row['phone2']."</td><td align=center>".$row['aadhar']."</td><td align=center>".$row['address']."</td><td align=center>".$row['lisence']."</td><td align=center>".$row['pan_number']."</td><td align=center>".$row['free']."</td><td align=center>".$row['joining_yr']."</td><td align=center>".$row['no_of_works']."</td><td align=center>".$row['work_completed_in_month']."</td></tr>";
						echo "<br>";
					}
				}
				else
				{
					echo "<br><br>No results are present";
				}
			}
			elseif($depart=="Garbage")
			{
				$sql= "SELECT * from dep_garbage;";
				$result= mysqli_query($conn,$sql);
				$resultCheck= mysqli_num_rows($result);
				error_reporting(0);
				if($resultCheck > 0)
				{
					echo "<h3 align=center>$depart Department Workers</h3>";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr><td align=center>".$row['emp_id']."</td><td align=center>".$row['name']."</td><td align=center>".$row['phone1']."</td><td align=center>".$row['phone2']."</td><td align=center>".$row['aadhar']."</td><td align=center>".$row['address']."</td><td align=center>".$row['lisence']."</td><td align=center>".$row['pan_number']."</td><td align=center>".$row['free']."</td><td align=center>".$row['joining_yr']."</td><td align=center>".$row['no_of_works']."</td><td align=center>".$row['work_completed_in_month']."</td></tr>";
						echo "<br>";
					}
				}
				else
				{
					echo "<br><br>No results are present";
				}
			}
			elseif($depart=="Water")
			{
				$sql= "SELECT * from dep_water;";
				$result= mysqli_query($conn,$sql);
				$resultCheck= mysqli_num_rows($result);
				error_reporting(0);
				if($resultCheck > 0)
				{
					echo "<h3 align=center>$depart Department Workers</h3>";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr><td align=center>".$row['emp_id']."</td><td align=center>".$row['name']."</td><td align=center>".$row['phone1']."</td><td align=center>".$row['phone2']."</td><td align=center>".$row['aadhar']."</td><td align=center>".$row['address']."</td><td align=center>".$row['lisence']."</td><td align=center>".$row['pan_number']."</td><td align=center>".$row['free']."</td><td align=center>".$row['joining_yr']."</td><td align=center>".$row['no_of_works']."</td><td align=center>".$row['work_completed_in_month']."</td></tr>";
						echo "<br>";
					}
				}
				else
				{
					echo "no results are present";
				}
			}
			elseif($depart=="Mosquito")
			{
				$sql= "SELECT * from dep_mosquito;";
				$result= mysqli_query($conn,$sql);
				$resultCheck= mysqli_num_rows($result);
				error_reporting(0);
				if($resultCheck > 0)
				{
					echo "<h3 align=center>$depart Department Workers</h3>";
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr><td align=center>".$row['emp_id']."</td><td align=center>".$row['name']."</td><td align=center>".$row['phone1']."</td><td align=center>".$row['phone2']."</td><td align=center>".$row['aadhar']."</td><td align=center>".$row['address']."</td><td align=center>".$row['lisence']."</td><td align=center>".$row['pan_number']."</td><td align=center>".$row['free']."</td><td align=center>".$row['joining_yr']."</td><td align=center>".$row['no_of_works']."</td><td align=center>".$row['work_completed_in_month']."</td></tr>";
						echo "<br>";
					}
				}
				else
				{
					echo "<br><br>No results are present";
				}
			}
		?>
	</table>
	<br><br><br><br><br>
	<div id="foot">
    	Copyright &copy; The Squad 
	</div>
</body>
</html>