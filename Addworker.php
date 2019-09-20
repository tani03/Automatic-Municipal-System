<?php

/**$dbservername="localhost";
$dbusername  ="root";
$dbpassword  ="";
$dbname      ="testing";

$conn= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" . "<br>";*/
include('connection.php');
		//error_reporting(0);
		error_reporting(E_ALL ^ E_NOTICE);
if($_POST['submit'])
{
$nam=$_POST['name'];
$ph1=$_POST['phonenumber1'];
$ph2=$_POST['phonenumber2'];
$add=$_POST['homeaddress'];
$lic=$_POST['licencenumber'];
$pan=$_POST['pannumber'];
$free=$_POST['free'];
$join=$_POST['joining'];
$works=$_POST['works'];
$wim=$_POST['worksinmonth'];
$dep=$_POST['depart'];

echo "$nam,$ph1,$ph2,$add,$lic,$pan,$free,$join,$works,$wim";
$sql="INSERT INTO $dep(name,phone1,phone2,address,lisence,pan_number,free,joining_yr,no_of_works,work_completed_in_month) values ('$nam',$ph1,$ph2,'$add','$lic','$pan','$free',$join,$works,$wim);";
if(mysqli_query($conn,$sql)){
	print("Added Successfully");
}
}
//header("Location: addworker.php?submit=success");


?>
