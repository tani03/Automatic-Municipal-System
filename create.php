<!Doctype html>
<html>
<head>
<style>
body {background-color:powderblue;}
h1   {color: blue;}
p    {color: red;}
</style>
<title>
  welcome to complain zone
</title>
<link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>

<body>
<p></p>
<h1><center><BLOCKQUOTE><b><marquee><font size="100" color="forest-green"> Welcome to Complain Zone</font></marquee></b></BLOCKQUOTE></center></h1>
<img src="./img1.png"; width="100%"; height="300">
<div id="menubar">
    <ul id="menu">
     <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
       <li class="selected"><a href="#">About</a></li>
       <li><a href="./mtmlmunici%20(1).html">Home</a></li>
    </ul>
</div>
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
	<?php
		include('connection.php');
		//error_reporting(0);
		error_reporting(E_ALL ^ E_NOTICE);
		if(!$_POST['submit'])
		{
			echo "<center><h3>All fields are required</h3></center>";
		}
		else
		{
			$username = $_POST['fname'];
			$houseno  = $_POST['hnumber'];
			$useradd  = $_POST['address'];
			$ward     = $_POST['word'];
			$usercon  = $_POST['phone'];
			$depart   = $_POST['dep'];
			$comp 	  = $_POST['cmp'];

			//$complain = $_POST['complain'];
			//$date    = $_POST['dat'];

		//	print "$username,$houseno,$useradd,$ward,$usercon,$depart";
			if($comp == 'not properly supplied/light disturbed')
			{
				$diff=3;
			}
			elseif ($comp=='supply line or flow  disturb')
			{
				$diff=1;
			}
			else
			{
				$diff=2;
			}
			$sql = "INSERT into user (name,house_number,address,word_number,phone,department,complain_details, wrk_level)
			values ('$username','$houseno','$useradd','$ward','$usercon','$depart','$comp',$diff)";
			
			
			
			//unset($sql);
			//unset($username);
			//unset($useradd);
			//unset($usercon);
			if(mysqli_query($conn, $sql))
			{
				echo "You have Successfully Registered<br>";

				$sql="SELECT complain_ld,name from user ORDER BY complain_ld DESC";
				$result = $conn->query($sql);

				//if ($result->num_rows > 0) {
    				// output data of each row
    				$row=$result->fetch_assoc();
    				//while($row = $result->fetch_assoc()) {
    					echo "<br><br>",$row["name"],"<br>";

        				echo "Your complain Id is:<br>",$row["complain_ld"];
        				
   					// }
   					//}
					//else {
    				//	echo "0 results";
			  //}
			}
			else
			{
				echo "Wrong";
			}
		}
	?>
<center>
<form action="create.php" method="POST">
<table>
		<tr>
   <td>
   	Name:
   </td>
   <td>
   	<input type="text" name="fname" required>
   </td>
</tr>
<tr>
	<td>
   House No:
</td>
<td>
	<input type="text" name="hnumber" required>
</td>
</tr>
<tr>
	<td>
   Address:
	</td>
	<td>
		<input type="text" name="address" required>
	</td>
</tr>
<tr>
	<td>
   Word No: 
   </td>
   <td> <input type="text" name="word" required>
   </td>
</tr>
<tr>
   <td>Phone:</td>
   <td> <input type="text" name="phone" required></td>
</tr>
<tr>
	<td>
   Department:
</td>
<td>
	<select name ="dep">
  		<option value="dep_electricity">Electricity</option>
  		<option value="dep_drain">Drainage</option>
  		<option value="dep_mosquito">Mosquito</option>
  		<option value="dep_garbage">Garbage</option>
	</select>
</td>
</tr>
<tr>
	<td>
	Complain Details:
</td>
<td>
	<select name ="cmp">
  		<option value="supply line or flow  disturb">supply line or flow  disturb</option>
  		<option value="not properly supplied/light disturbed">not properly supplied/light disturbed</option>
  		<option value="other">other</option>
	</select>
</td>
</tr>
	<table>	
  <input type="submit" name="submit" value="Submit">
</center>
<br><br><br><br><br>
<div id="footer">
    Copyright &copy; The Squad 
</div>
</body>
</html>