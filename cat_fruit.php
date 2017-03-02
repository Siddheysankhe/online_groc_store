<?php
session_start();
include_once("config.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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
							//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
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
						else{
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
	
	
	<!-- View Cart Box Start -->

	
<?php
if(isset($_GET['tableName']))
{
	$_SESSION['tabName']=$_GET['tableName'];
}
$tableN=$_SESSION['tabName'];
$results = $mysqli->query("SELECT * FROM $tableN ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<form method="Post" action="cart.php">
	<div class="col-md-4 text-center col-sm-6 col-xs-6">
        <div class="thumbnail product-box">
			<img src="{$obj->image}">
			<h3><a href="#">{$obj->name}</a></h3>
			<p><a href="#">Price:{$obj->price}$currency</a></p>
			<fieldset>
			
			
			
	
	
	
	
EOT;
if($obj->quant_avai==0)
{
	$products_item .= <<<EOT
	<p><input type="submit" value="Add to Cart" class="btn btn-success" role="button" disabled></p><label><span>OUT OF STOCK</span></label>
EOT;
}
else
{
	$products_item .= <<<EOT
			<p><input type="submit" value="Add to Cart" class="btn btn-success" role="button"></p>
			<label>
				<span>Quantity</span>
				<input type="number" min="1" max="{$obj->quant_avai}" size="2" maxlength="2" name="number" value="1" />
			</label>
EOT;
}
$products_item.= <<<EOT
	</fieldset>
			<input type="hidden" value={$obj->product_id} name="id">
	</div>
	</div>
	</form>
EOT;
}


$products_item .= '</ul>';
echo $products_item;
}
?>       

					
				   
               


    <!--Footer -->
    <div class="col-md-12 footer-box">


        <!--<div class="row small-box ">
            <strong>Mobiles :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> | 
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
         
        </div>
        <div class="row small-box ">
            <strong>Laptops :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx Laptops</a> | 
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony Laptops</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
        </div>
        <div class="row small-box ">
            <strong>Tablets : </strong><a href="#">samsung</a> |  <a href="#">Sony Tablets</a> | <a href="#">Microx</a> | 
            <a href="#">samsung </a>|  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung Tablets</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung Tablets</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx Tablets</a> | view all items
            
        </div>
        <div class="row small-box pad-botom ">
            <strong>Computers :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> | 
            <a href="#">samsung Computers</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx Computers</a> |<a href="#">samsung Computers</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx Computers</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
            
        </div>
		-->
        <div class="row">
		<!--
            <div class="col-md-4">
                <strong>Send a Quick Query </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
			-->

            <div class="col-md-4">
                <strong>Our Location</strong>
                <hr>
                <p>
                     Sardar Patel Institute of Technology<br />
									Andheri,INDIA<br/>
                    Call:+91-8149238350<br>
                    Email:teonlineproject@gmail.com<br>
                </p>

                2016 www.onlinegroceries.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <strong>We are Social </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
						Connect us on social media
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2016 | &nbsp; All Rights Reserved | &nbsp; www.onlinegroceries.com | &nbsp; 24x7 support | &nbsp; Email:teonlineproject@gmail.com
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>

<!-- Products List End -->
</body>
</html>
