<!DOCTYPE html>
<html>

<head><style>
body {background-color:rgba(144,198,149,1);}
h1   {color: blue;}
h4	 {color: green;}
p    {color: red;}
#options{
	align-content: flex-end;
	width: :100%;
	height:30px;
	background-color:white;
}
input[type=text],[type=number], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
<title>
  Welcome to municipality
</title>
<link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>
<!--<h1><center><marquee><BLOCKQUOTE><b><font size="50" color="green">Welcome to Member's Area</BLOCKQUOTE></marquee></center></h1>-->
<?php
  include ('connection.php');
    //error_reporting(0);
    error_reporting(E_ALL ^ E_NOTICE);
?>

<body>
<h1><center><marquee><BLOCKQUOTE><b><font size="50" color="green">Welcome to Member's Area</BLOCKQUOTE></marquee></center></h1>
<img src="./img1.png"; width="1330"; height="300">
<div id="m">
    <ul id="me">
     <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
       <li class="select"><a href="./member.php">Home</a></li>
       <li><a href="./mtmlmunici%20(1).html">User-Homepage</a></li>
       <li><a href="./member_area.php">Logout</a></li>
    </ul>
  </div><br><br><br><br><br>
<center>
  <font face="verdana"><h1 color="Indigo">Update Complain Details</h1></font>
  <div>
    
  <form action="updateComplain.php" method="POST">
    <label for="cmpID">Complain ID</label><br>
    <input type="number" id="fname" name="cmpID"><br>

    <label for="wrkrID">Worker ID</label><br>
    <input type="number" id="wrkrID" name="wrkrID"><br>

    <label for="dep">Department</label><br>
    <select id="depart" name="depart">
      <option value="dep_drain">Drainage</option>
      <option value="dep_electricity">Electricity</option>
      <option value="dep_water">Water</option>
      <option value="dep_garbage">Garbage</option>
      <option value="dep_mosquito">Mosquito</option>
    </select><br>

     <label for="dep">Progress</label><br>
    <select id="progress" name="progress">
      <option value="">Choose</option>
      <option value="start">Just Started</option>
      <option value="less">Less</option>
      <option value="medium">Medium</option>
      <option value="almost done">Almost Done</option>
    </select>
      <br>
     <label for="days">Days Required to Complete</label><br>
      <input type="number" name="days">
        <br>
      
     <label for="complete">Completed</label> <br>
    
     <select id="complete" name="complete">
      <option value="">Choose</option>
      <option value="Y">Yes</option>
      <option value="N">No</option>
    </select><br>

  
    <input type="submit" value="Submit">
  </form>
</center>
</div>

<br><br><br><br><br>
<?php

  $cmpid=$_POST['cmpID'];
  $dep=$_POST['depart'];
  $pr=$_POST['wrkrID'];
  $complete=$_POST['complete'];
  $days=$_POST['days'];
  $wrkrid=$_POST['wrkrID'];
  $sql= "UPDATE comp_soln SET progress='$pr',complete='$complete',days_needed=$days where comp_id=$cmpid and department='$dep' and worker_id=$wrkrid;";
  if(mysqli_query($conn, $sql))
      {
        echo "Done";
      }
      else
      {
        echo "Wrong Input";
      }
      if($complete=='Y')
      {
        $sql= "UPDATE user SET resolve=1 where complain_ld=$cmpid;";
        mysqli_query($conn, $sql);
      }

?>
<div id="foot">
    Copyright &copy; The Squad 
</div>
</body>
</html>


</body>
</html>

