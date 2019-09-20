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
 
 

<?php
include('connection.php');
		//error_reporting(0);
		error_reporting(E_ALL ^ E_NOTICE);
function send($ph,$message)
{
$url="www.way2sms.com/api/v1/sendCampaign";
//$message = urlencode("Hi,this is a message from php code");// urlencode your message
//$phone=urlencode($ph);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=4JTYHLAPCB6CVRBHH9IPLJCQ0BRWL57W&secret=RRM0OOP6706BZTJO&usetype=stage&phone=$ph&senderid=&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
//echo $result;
}

print ("<h1><center><BLOCKQUOTE><b><marquee><font size=\"100\" color=\"forest-green\"> Welcome to Complain Zone</font></marquee></b><BLOCKQUOTE></center></h1><br><font color=\"teal\"  face=\"arial\"><h3><a href=\"#\">About </a>&nbsp;<a href=\"http://localhost/mytest/mtmlmunici%20(1).html\">Home </a><br>");

$sql="SELECT complain_ld,name,phone,address from user ORDER BY complain_ld DESC";
				$result = $conn->query($sql);
					
    				$row=$result->fetch_assoc();

    				$cmp=$row["complain_ld"];
    				$user_name=$row["name"];
    				$user_phone=$row["phone"];
    				$user_add=$row["address"];
    					echo "<br><br>",$user_name,"<br>";
        				echo "Your complain Id is:$cmp<br>";
        				$message = urlencode("Hi,You have successfully registered your complain.Your Complain Id is $cmp");
        				send($user_phone,$message);
$sql="SELECT phone from resp ORDER BY complain_id DESC";
			//$result = $conn->query($sql);
					
    		//$row=$result->fetch_assoc();
$worker_phone=$row["phone"];
//$worker_phone="8777066937";
$message=urlencode("Hello you have got a new work of complain id $cmp,you will have to report at $user_add");
send($worker_phone,$message);

//post


?>
