<html>
<head>
</head>
<body>
<?php
include("config.php");
if(isset($_POST["email1"]))
{
	//echo "ïn email1";
//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
$email=$_POST["email1"];
$query="Select Email,Password from users where Email='$email' and Verified=1";
$results=mysqli_query($dbc,$query);
$no_rows=mysqli_num_rows($results);
echo "$no_rows";
	if($no_rows==1)
	{
		require 'PHPMailer/PHPMailerAutoload.php';
		$obj = $results->fetch_object();
		$password=$obj->Password;
		$mail = new PHPMailer;
		echo "ïn row1";
		// $mail->SMTPDebug = 3;                               // Enable verbose debug output
		
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'onlinegrocerystores@gmail.com'; // SMTP username
		$mail->Password = 'nahibatanaja'; // SMTP password
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587; // TCP port to connect to
		$mail->setFrom('onlinegrocerystores@gmail.com', 'Online Grocery Stores');
		$mail->addAddress($email); // Add a recipient
		$mail->isHTML(true); // Set email format to HTML
		$mail->Subject = "Forgot Password Online Grocery";
		$mail->Body = "http://localhost/online_gorc2/online_gorc/newPass.php?reus=$email&$password";
		//	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
		if (!$mail->send())
		{
			echo "Sorry. The Mail could not be sent to $email Due to some network Issues. Please Try Again";
		}
		else
		{
			header("Location:index.php?ForgotPasswordmail=1");
		}
	
	}
	else
	{
		header("Location:index.php?ForgotPassword=1");
	}
	
	
	
}
?>
</body>
</html>