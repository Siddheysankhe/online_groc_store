<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<div align="center">
<?php

	//echo "Hello Login supported area";
        include("config.php");
	require_once('functions.php');

	$uemail=$_POST['email1'];
	$upass=$_POST['pass1'];
	$upass=md5($upass);
	$regs="Incorrect Username or Password";
	
	//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
	
	$query="select * from users where Email='$uemail'";
	$result=mysqli_query($dbc,$query) or die(mysql_error());
	
	$no_rows=mysqli_num_rows($result);
	if($no_rows==1)
	{
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		//printf ("%s (%s)\n",$row["Firstname"],$row["DOB"]);
		$passd=$row["Password"];
		$verify=$row["Verified"];
		//echo "Your password:$passd";
		if($passd==$upass && $verify==1)
		{
			session_start();
			$_SESSION['loginUser'] = $uemail;
			$user_name=$_SESSION["loginUser"];
			//$dbc = mysqli_connect("localhost", "root", "", "online_groc") or die("Error connecting sql server");
			$query = "update cart set Username='$user_name' where Username='anon_user'";
			$result = mysqli_query($dbc, $query);
			header("location: index.php");
		}
		else
		{
			showMessage($regs);
			
		}
	}
	else
	{
		showMessage($regs);
	}

	
?>
</div>
</body>
</html>					