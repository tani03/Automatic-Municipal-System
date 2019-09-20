<html>
<head><style>
body {background-color: rgba(144,198,149,1);}
h1   {color: green;}
p    {color: red;}
</style>
<title>
  Welcome to municipality
</title>
<link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>
<body>
<p></p>
<h1><center><marquee><BLOCKQUOTE><b><font size="50" color="green">Welcome to Member Login Page</BLOCKQUOTE></marquee></center></h1>
<!--<h1><center><BLOCKQUOTE><b><marquee><font size="300">Welcome to Municipality</font></marquee></b><BLOCKQUOTE></center>
</h1>-->
<div id="m">
    <ul id="me">
     <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
       <li class="selec"><a href="#">About</a></li>
       <li><a href="./mtmlmunici%20(1).html">Home</a></li>
    </ul>
</div><br><br><br>
<center><h2>MEMBER LOGIN PAGE</h2></center><br><br>
<!--<div id="options" style="height: 50">
	<table width="500" height="50" cellpadding="5" cellspacing="5" style="border-collapse: collapse">
		<tr>			
			<td align="center" valign="middle">			    
				<font color="teal"  face="arial"><h3><a href="#">Home </a>
			</td>		
			<td align="left" valign="middle">
				<font color="teal"  face="arial"><h3><a href="./mtmlmunici%20(1).html">User-Homepage </a></h3>
			</td>			
		</tr>
	</table>
</div>-->
	<!--<font color="teal"  face="arial"><h3><a href="#">Home </a>&nbsp;<a href="./mtmlmunici%20(1).html">User-Homepage </a></h3></font>-->
		<?php
			error_reporting(E_ALL ^ E_NOTICE);
			if($_POST['submit'])
			{
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			if($user=="manager"&&$pass=="bit123")
			{
				header("Location: member.php");
				exit();
			}
			else
				//print "<br><br><br><br><br><br>";
				print("Wrong Username or Password");
			}
		?>
<table border="1px solid black" width="300" height="200" align="center" style="background-color: white">
	<tr>
		<td  align="center" valign="middle">
			<form action="member_area" method=POST>
				Username:&nbsp<input type="text" name="user">
				<br><br>
				Password:&nbsp<input type="Password" name="pass">
				<br><br>
				<input type="submit" value="Enter" name="submit">
			</form> 
		</td>
	</tr>
</table>
<br><br><br><br><br>
<div id="foot">
    Copyright &copy; The Squad 
</div>
</body>
</html>