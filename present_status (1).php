 <!DOCTYPE html>
 <html>
 <head>
 	<title></title><head>
<style>
		body {background-color: powderblue;}
		h1   {color: blue;}
	</style>
<title>
  welcome to complain zone
</title>
<link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>

<body>
<p></p>
<h1><center><marquee><BLOCKQUOTE><b><font size="50" color="blue">Welcome to Complain Zone</font></b></BLOCKQUOTE></marquee></center></h1>
<!--<center><BLOCKQUOTE><b><marquee><font size="100" color="forest-green"> Welcome to Complain Zone</font></marquee></b><BLOCKQUOTE></center>-->
<img src="./img1.png"; width="1330"; height="300">
<div id="menubar">
    <ul id="menu">
     <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
       <li class="selected"><a href="#">About</a></li>
       <li><a href="./mtmlmunici%20(1).html">Home</a></li>
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
	<center>
		<form action="present_status.php" method="POST">
 			Enter Complain ID: <input type="number" name="i">
 			<input type="submit" name="submit" value="Check Details">
 		</form>
 	</center>
 	<br><br><br>
	<?php
		include('connection.php');
		//error_reporting(0);
		error_reporting(E_ALL ^ E_NOTICE);
		if($_POST['submit'])
		{
			$cmpid = $_POST['i'];
			$sql = "SELECT comp_id, name, date_of_visit FROM resp WHERE comp_id= $cmpid";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    	// output data of each row
				$row = $result->fetch_assoc();
    		//while($row = $result->fetch_assoc()) {
    		/**	echo "Complain ID ";
    			echo $row["comp_id"],"<br>";
    			echo "Worker's Name ";
    			echo $row["name"],"<br>";**/	
        	echo "<center><h4>ID: ",$row["comp_id"]," - Worker's Name: ",$row["name"],"</h4></center>";
    		}
			}
		 else {
    		echo "<center><h4>0 Results<h4></center>";
		}
		$conn->close();
		?> 
<br><br><br>
<div id="footer">
    Copyright &copy; The Squad 
</div>
</body>
 </html>
