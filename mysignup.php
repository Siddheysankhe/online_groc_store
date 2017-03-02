<?php
session_start();
include_once ("config.php");

//$current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>
<?php

if (isset($_POST['name']) && (isset($_POST['email'])) && (isset($_POST['pass'])))
	{
	$dob = '00/00/0000';
	$addr = 'NULL';
	$name = $_POST['name'];

	// $lastname=$_POST['lastname'];

	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$dob = $_POST['dob'];
	$addr = $_POST['addr'];

	$pass=md5($pass);
	// $myemail="siddheysankhe1996@gmail.com";

	$sentOtp = mt_rand(100000, 999999);
	//$dbc = mysqli_connect("localhost", "root", "", "online_groc") or die("Error connecting sql server");
	$query = "INSERT INTO users (Firstname,Email,DOB,Address) VALUES ('$name','$email','$dob','$addr')";
	$_SESSION['signupUser'] = $email;
	$result = mysqli_query($dbc, $query);
	$query="UPDATE users SET OTP=$sentOtp WHERE Email='$email'";
    $result=mysqli_query($dbc,$query);
	$query2="Select * from users where Email='$email'";
	$result2=mysqli_query($dbc,$query2);
	$no_rows=mysqli_num_rows($result2);
	if($no_rows==1)
	{
		$row=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		$verified=$row['Verified'];
		
	}
	if($verified==0)
	{
		$query="UPDATE users SET Password='$pass' WHERE Email='$email'";
		$result=mysqli_query($dbc,$query);
	}
	else
	{
		header("Location:index.php?alreadyPresent=1");
	}
	// //$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
	// $results = $mysqli->query("INSERT INTO users (Firstname,Email,Password,Date of Birth,Address) VALUES ('$name','$email','$pass','$dob','$addr')");
	// $query="INSERT INTO users (Firstname,Email,Password,Date of Birth,Address) VALUES ('$name','$email','$pass','$dob','$addr')";
	// $subject="Thank You for signing up";
	// $msg="This is system generated mail please do not reply";

	require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

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

	// $mail->addAddress('siddheysankhe1996@gmail.com');               // Name is optional
	// $mail->addReplyTo('info@example.com', 'Information');
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');
	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	$mail->isHTML(true); // Set email format to HTML
	$mail->Subject = "Login Authentication";
	$mail->Body = "Thank You for Sign up OTP:$sentOtp";
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	/*if (!$mail->send())
		{
		echo "Message could not be sent to $email";
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	  else
		{
		echo "Message has been sent to $email";
		}
*/
	// mail($email,$subject,$msg,'From:' . $myemail);
	// $result=mysqli_query($dbc,$query);

	/*echo "Hello $name <br />";
	echo "Your Email:$email<br />";
	echo "Please confirm your email id";
	echo "Your DOB:$dob";
	echo "Your addr:$addr";*/

	// mysqli_close($dbc);

	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome to online Grocery Shop</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>Grocery</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
					<li><a href="index_login.html">Login</a></li>
					
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+91-8149238350</a></li>
                            <li><a href="#"><strong>Mail: </strong>teonlineproject@gmail.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    Sardar Patel Institute of Technology,<br />
                                    Mumbai,INDIA
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<div class="col-md-4 text-center col-sm-6 col-xs-6">
	</div>
	<div class="col-md-4 text-center col-sm-6 col-xs-6">
        <div class="thumbnail product-box">
			<strong>Verification</strong><b>
			<form method="GET" action="mysignup.php">
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="OTP" id="otp" name="otp">
                            </div>
							<div>
								<?php
								if (isset($_POST['name']) && (isset($_POST['email'])) && (isset($_POST['pass'])))
								{
									if (!$mail->send())
									{
										echo "Sorry. The Mail could not be sent to $email Due to some network Issues. Please Try Again From The SignUp Process";
									}
									else
									{
										echo "Message has been sent to $email";
									}
								}
								if (isset($_GET['otp']))
									{
										
									//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
									$sentOtp=123;
									$currentUser=$_SESSION['signupUser'];
									$query="select  * from users where Email='$currentUser'";
									$result=mysqli_query($dbc,$query);
									$no_rows=mysqli_num_rows($result);
									if($no_rows==1)
									{
										$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
										$sentOtp=$row["OTP"];
									}	
									$checkOtp = $_GET['otp'];
									if ($checkOtp == $sentOtp)
										{
										$query="UPDATE users SET Verified='1' WHERE Email='$currentUser'";
                                        $result=mysqli_query($dbc,$query);
										$message = "Sucessfully Signed Up. Now Login";
                                        echo "<script type='text/javascript'>alert('$message');</script>";	
										header("location:index.php?login=1");
										}
									  else
										{
										echo "Invalid Otp try again!!";
										}
									}

								?>
							</div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
							<div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
							</div>
						</div>
					</div>
					
            </form>
	</div>
</body>