 <!DOCTYPE html>
 <html>
 <head>
 	<title></title><head>
<style>
body {background-color:rgba(0,255,255,0.6) ;}
h1   {color: blue;}
h4   {color:black;}
p    {color: red;}
</style>
<title>
  welcome to complain zone
</title>
</head>

<body>
<p></p>
<center><BLOCKQUOTE><b><marquee><font size="100" color="forest-green"> Welcome to Complain Zone</font></marquee></b><BLOCKQUOTE></center><hr>
	<font color="teal"  face="arial"><h3><a href="#">About </a>&nbsp;<a href="./mtmlmunici%20(1).html">Home </a><br><br>
 
 
 	<center><form action="present_status.php" method="POST">
 		Enter Complain ID: <input type="number" name="i">
 		<input type="submit" name="submit" value="Check Details">
 	</form>
 	<br><br><br>
 	</body>

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

        		
        	echo "<h4>ID: ",$row["comp_id"]," - Worker's Name: ",$row["name"],"</h4>";
    		}
			}
		 else {
    		echo "<h4>0 Results<h4>";
		}
		$conn->close();
		?> 


 </html>
