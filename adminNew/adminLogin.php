<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<div align="center">
<?php
	//echo "Hello Login supported area";
	require_once('functions.php');
	include("config.php");
	$uemail=$_POST['email'];
	$upass=$_POST['password'];
	$regs="Incorrect Username or Password";
	
	//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
	
	$query="select * from admin_cred where Email='$uemail'";
	$result=mysqli_query($dbc,$query) or die(mysql_error());
	
	$no_rows=mysqli_num_rows($result);
	if($no_rows==1)
	{
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		//printf ("%s (%s)\n",$row["Firstname"],$row["Password"]);
		$passd=$row["Password"];
		//echo "Your password:$passd";
		if($passd==$upass)
		{
			session_start();
			$_SESSION['adminUser']=$uemail;
			//echo("Hello Admin");
			header("location:addProduct.php");
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