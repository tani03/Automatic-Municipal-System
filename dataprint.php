<!DOCTYPE html>
<html>
<head>
<style>
body {background-image: ./images("267_7_myImage.jpg");background-color: rgba(144,198,149,1);}
h1   {color: green; size: 200;}
p    {color: red;}
</style>
<title>
  Welcome to Municipality Service Area
</title>
<link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>
<body>
<p></p>
<h1><center><marquee><BLOCKQUOTE><b><font size="50" color="green">Welcome to Municipality</BLOCKQUOTE></marquee></center></h1>
<!--<h1><BLOCKQUOTE><b><marquee> Welcome to Municipality Services</marquee></b><BLOCKQUOTE></h1>-->
<img src="./img1.png"; width="1330"; height="300">
<div id="m">
    <ul id="me">
     <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
       <li class="select"><a href="./member.php">Home</a></li>
       <li><a href="./mtmlmunici%20(1).html">User-Homepage</a></li>
       <li><a href="./member_area.php">Logout</a></li>
    </ul>
</div><br><br><br>
<!--<div style="height: 50">	
	<table width="500" height="50" cellpadding="5" cellspacing="5" style="border-collapse: collapse">
		<tr>			
			<td align="center" valign="middle">			    
				<font color="white"  face="arial"><h3><a href="#">About</a>
			</td>		
			<td align="left" valign="middle">
				<font color="teal"  face="arial"><h3><a href="./mtmlmunici%20(1).html">Home </a></h3>
			</td>			
		</tr>
	</table>
</div>-->
<center><h2> Information About Departments</h2></center>
<!--<img src=".\images\267_7_myImage.jpg"; width="663"; height="300" ;alt="municipality" style="float:right;"/>
<img src=".\images\267_7_myImage.jpg"; width="663"; height="300" ;alt="municipality" style="float:left;"/>-->
<br><br><br><br><br><br><br><br>
<?php
/**$dbservername="localhost";
$dbusername  ="root";
$dbpassword  ="";
$dbname      ="municipality";

$conn= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);**/
include('connection.php');
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1px solid black" align="center">
		<tr>
			<th>&nbsp&nbsp&nbsp&nbspComplain_topic</th>
			<th>&nbspDepartment</th>
			<th>&nbsp&nbsp&nbsp&nbspProgress</th>
			<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComplete</th>
			<th>&nbsp&nbsp&nbsp&nbspDays_needed</th>
			<th>&nbsp&nbsp&nbsp&nbspWorker_id</th>
		</tr>

<?php
	if($_POST['submit']){
	$depart = $_POST['depart'];
	$resolve=$_POST['resolve'];
	//echo "<br><br>&nbsp&nbsp&nbsp&nbsp$depart";
	if($depart=="Drainage")
	{
		$sql= "SELECT * from comp_soln where department='dep_drain' and comp_id in (select complain_ld from user where resolve=$resolve);";
		//$result= mysqli_query($conn,$sql);
		$result=$conn->query($sql);
		$resultCheck= mysqli_num_rows($result);
		error_reporting(0);
		if($resultCheck > 0)
		{
			echo "<br><br><br><h3 align=center>$depart Department</h3>";
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr><td align=center>".$row['complain_topic']."</td><td align=center>".$row['department']."</td><td align=center>".$row['progress']."</td><td align=center>".$row['complete']."</td><td align=center>".$row['days_needed']."</td><td align=center>".$row['worker_id']."</td></tr>";
				echo "<br>";
			}
		}
		else
		{
			echo "<br><br>&nbsp&nbsp&nbsp&nbspNo results are present<br><br>";
		}
	}
	elseif($depart=="Electricity")
	{
		$sql= "SELECT * from comp_soln where department=dep_electricity and comp_id in (select complain_ld from user where resolve=$resolve);";
		error_reporting(0);
		$result= mysqli_query($conn,$sql);
		$resultCheck= mysqli_num_rows($result);
		
		if($resultCheck > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr><td align=center>".$row['complain_topic']."</td><td align=center>".$row['department']."</td><td align=center>".$row['progress']."</td><td align=center>".$row['complete']."</td><td align=center>".$row['days_needed']."</td><td align=center>".$row['worker_id']."</td></tr>";
				echo "<br>";
			}
		}
		else
		{ 	
			echo "<br>";
			echo "<br>&nbsp&nbspNo results are present<br><br>";
		}
	}
	elseif($depart=="Garbage")
	{
		$sql= "SELECT * from comp_soln where department=dep_garbage  and comp_id in (select complain_ld from user where resolve=$resolve);";
		$result= mysqli_query($conn,$sql);
		$resultCheck= mysqli_num_rows($result);
		error_reporting(0);
				if($resultCheck > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr><td align=center>".$row['complain_topic']."</td><td align=center>".$row['department']."</td><td align=center>".$row['progress']."</td><td align=center>".$row['complete']."</td><td align=center>".$row['days_needed']."</td><td align=center>".$row['worker_id']."</td></tr>";
				echo "<br>";
			}
		}
		else
		{
			echo "<br><br>&nbsp&nbspNo results are present<br><br>";
		}
	}
	elseif($depart=="Water")
	{
		$sql= "SELECT * from comp_soln where department=dep_water and comp_id in (select complain_ld from user where resolve=$resolve);";
		$result= mysqli_query($conn,$sql);
		$resultCheck= mysqli_num_rows($result);
		error_reporting(0);
		if($resultCheck > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr><td align=center>".$row['complain_topic']."</td><td align=center>".$row['department']."</td><td align=center>".$row['progress']."</td><td align=center>".$row['complete']."</td><td align=center>".$row['days_needed']."</td><td align=center>".$row['worker_id']."</td></tr>";
				echo "<br>";
			}
		}
		else
		{
			echo "<br><br>&nbsp&nbspNo results are present<br><br>";
		}
	}
	elseif($depart=="Mosquito")
	{
		$sql= "SELECT * from comp_soln where department=dep_mosquito  and comp_id in (select complain_ld from user where resolve=$resolve);";
		$result= mysqli_query($conn,$sql);
		$resultCheck= mysqli_num_rows($result);
		error_reporting(0);
		if($resultCheck > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr><td align=center>".$row['complain_topic']."</td><td align=center>".$row['department']."</td><td align=center>".$row['progress']."</td><td align=center>".$row['complete']."</td><td align=center>".$row['days_needed']."</td><td align=center>".$row['worker_id']."</td></tr>";
				echo "<br>";
			}
		}
		else
		{
			echo "<br><br>&nbsp&nbspNo results are present<br><br>";
		}
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