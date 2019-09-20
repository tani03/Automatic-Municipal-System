</!DOCTYPE html>
<html>
<head><style>
body {background-color: rgba(144,198,149,1);}
h1   {color: green;}
p    {color: red;}
</style>
<title>
  welcome to municipality
</title>
  <link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>

<body>
<p></p>
<h1><center><marquee><BLOCKQUOTE><b><font size="50" color="green">Edit Employee Details</BLOCKQUOTE></marquee></center></h1>
<!--<h1><center><BLOCKQUOTE><b><marquee><font size="300">Welcome to Municipality</font></marquee></b><BLOCKQUOTE></center></h1>-->
<img src="./img1.png"; width="1330"; height="300">
<div id="m">
    <ul id="me">
     <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
       <li class="select"><a href="./member.php">Home</a></li>
       <li><a href="./mtmlmunici%20(1).html">User-Homepage</a></li>
       <li><a href="./member_area.php">Logout</a></li>
    </ul>
  </div><br><br><br><br><br>
<!--<div id="options" style="height: 50">
	<table width="500" height="50" cellpadding="5" cellspacing="5" style="border-collapse: collapse">
		<tr>			
			<td align="center" valign="middle">			    
				<font color="white"  face="arial"><h4><a href="#"><font size="5">Home </a></h4>
			</td>		
			<td align="left" valign="middle">
				<h4><font color="white" face="arial"><a href="./mtmlmunici%20(1).html"><font size="5">User-Homepage </a></h4>
			</td>			
		</tr>
	</table>
</div>-->
<center>
	<form action="emp_edit.php" method="POST">
		<table>
			<tr>
				<td>Employee ID:<input type="number" name="id"></td>
			</tr><br>
			<tr>
				Department: 
			<select name="depart">
  			<option value="dep_electricity">Electricity</option>
  			<option value="dep_drain">Drainage</option>
  			<option value="dep_mosquito">Mosquito</option>
  			<option value="dep_garbage">Garbage</option>
  			<option value="dep_water">Water</option>
			</select>
			</tr>
			<br>
			<br>
			<tr>
				<td><input type="submit" value="CHANGE NUMBER OF WORKS GIVEN" name="works"/></td>
			</tr>
			<br>
			<tr>
    			<td><input type="submit" value="CHANGE NO OF WORKS COMPLETED" name="wrk_comp"/></td>
			</tr>
		</table> 
	</form>
</center>
<?php
	include('connection.php');
		//error_reporting(0);
		error_reporting(E_ALL ^ E_NOTICE);
		if($_POST['works'])
		{
			echo "Enter the no_of_works<input type=\"number\" name=\"n\" align=center>";
			echo "<input type=\"submit\" value=\"Submit\" name=\"s\">";
			if($_POST['s'])
			{
			$n=$_POST['n'];
			echo "$n";
			$dep=$_POST['depart'];
			echo "$depart";
			$id=$_POST['id'];
			echo "$id";
			$sql = "UPDATE $dep SET no_of_works=$n WHERE emp_id= $id";
			$result = $conn->query($sql);
			print("No OF Works Changed");
			}
		}
		else if($_GET['wrk_comp'])
		{
			echo "<center>Enter the no of work completed<input type=\"number\" name=\"n\" align=center>";
			echo "<input type=\"submit\" value=\"Submit\" name=\"s\">";
			if($_GET['s']){
			$n=$_GET['n'];
			$dep=$_POST['depart'];
			$id=$_POST['id'];
			$sql = "Update $dep SET work_completed_in_month=$n WHERE emp_id= $id";
			$result = $conn->query($sql);
			print("No OF Works Completed Changed Successfully");
			}
		}
?>
<br><br><br><br><br>
<div id="foot">
    Copyright &copy; The Squad 
</div>
</body>
</html>