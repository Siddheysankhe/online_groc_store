<?php
session_start();
include("config.php");
if(isset($_SESSION['loginUser']))
{
$uemail=$_SESSION['loginUser'];
}
if(isset($_GET['reus']))
{
	$uemail=$_GET['reus'];
	$_SESSION['forgotUser']=$uemail;
	//$_SESSION['loginUser']=$user;
}
if(isset($_POST['passold']))
{
	$oldPassword=$_POST['passold'];
	$oldPassword=md5($oldPassword);
	$query="select * from users where Email='$uemail'";
	$result=mysqli_query($dbc,$query);
	$no_rows=mysqli_num_rows($result);
	if($no_rows==1)
	{
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			//printf ("%s (%s)\n",$row["Firstname"],$row["DOB"]);
			$opassd=$row["Password"];
			$verify=$row["Verified"];
			//echo "Your password:$passd";
			if($opassd!=$oldPassword)
			{
				header("location:changePass.php?wrongPass=1");
			}
	}
}
if(isset($_POST['passnew']))
{
	$newPassword=$_POST['passnew'];
	$newPassword=md5($newPassword);
	if(isset($_SESSION['forgotUser']))
		$uemail=$_SESSION['forgotUser'];
	$query="update users set Password='$newPassword' where Email='$uemail'";
	$result=mysqli_query($dbc,$query);
	header("location:index.php?passChange=1");
	
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
                   <li>
						<?php
							if(isset($_SESSION['loginUser']))
							{
								echo"<li><a href=\"cart_viewvik.php\">Cart</a></li>";
							}
							else
							{
								echo "<li><a href=\"cart_viewvik.php\">Cart</a></li><li><a href=\"index_signup.html\">Sign Up</a></li>";
							}
						?>
					</li>
					<li>
					<?php
						if(isset($_SESSION['loginUser']))
						{
							$uemail=$_SESSION['loginUser'];
							////$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
							$query="select Firstname from users where Email='$uemail'";
							$result=mysqli_query($dbc,$query) or die(mysql_error());
							$fname=mysqli_fetch_array($result,MYSQLI_ASSOC);
							$fname=$fname["Firstname"];
							echo "<a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">$fname
							<b class=\"caret\"></b></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"index.php?logout=1\"><strong>LOGOUT</strong></a></li>
								<li><a href=\"myOrders.php\"><strong>Your Orders </strong></a></li>
								<li><a href=\"changePass.php\"><strong>Change Password</strong></a></li>
								<li class=\"divider\"></li>
								<li><a href=\"#\"><strong>Your Email: </strong>
                                <div>
                                    $uemail
                                </div>
								</a></li>
							</ul>";
						}
						else
						{
							echo "<a href=\"index_login.html\">Login</a>";
						}
					?>
					</li>
					
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
			<strong>Change Password</strong>
			 <form method="POST" action="newPass.php">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input type="Password" class="form-control" required="required" placeholder="New Password" id="passnew" name="passnew">
                            </div>
                        </div>
                        
                    </div>
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
							<div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
							</div>
						</div>
					</div>
					
                </form>
				
		</div>
	</div>

	
</body>
</html>