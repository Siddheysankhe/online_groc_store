<?php
session_start();
include("config.php");
if(!(isset($_SESSION['adminUser'])))
{
			header("location:index.php");		
}
if(isset($_POST['quantity']))
{
	$tableN=$_POST['category'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
	$prodName=$_POST['prodName'];
	$query="Update $tableN set quant_avai=$quantity, price=$price where name='$prodName'";
	$results = mysqli_query($dbc, $query);
	//$results = $mysqli->query("Update tableN set quant_avai=$quantity, price=$price where name='$prodName'");

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
                <a class="navbar-brand" href="#"><strong>Grocery</strong> Shop</a>
            </div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?logout=1">Logout</a></li>
					<li><a href="addProduct.php">Add Product</a></li>
		</ul>
	</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        </div>
        <!-- /.container-fluid -->
    </nav> <div class="container">
	<h2>
	Categories
	
	
	</h2>
		<form name="f1" action="updateProduct.php" method="POST">
				<input type="hidden" name="category" id="category"></p>

				<?php echo "<p><input type='submit'  value='Fruits And Vegetables'  class='btn btn-success' role='button' onclick='document.f1.category.value=\"cat_fruit\"'> 
				<input type='submit'  value='Grocery' class='btn btn-success' role='button' onclick='document.f1.category.value=\"cat_grocery\"'>
				<input type='submit'  value='Bread And Dairy' class='btn btn-success' role='button' onclick='document.f1.category.value=\"cat_bakery\"'>
				<input type='submit'  value='Beverages' class='btn btn-success' role='button' onclick='document.f1.category.value=\"cat_beverages\"'>
				<input type='submit'  value='Branded Food' class='btn btn-success' role='button' onclick='document.f1.category.value=\"cat_brandedfood\"'>
				<input type='submit'  value='Personal Care' class='btn btn-success' role='button' onclick='document.f1.category.value=\"cat_personalcare\"'>
				<input type='submit'  value='Meat' class='btn btn-success' role='button' onclick='document.f1.category.value=\"cat_meat\"'>
				
				";
				?>
		
		</form>
	</div>
	<div class="container">
      <h2>
	Products
      </h2>
      <table class="rules" cellspacing="10">
        <thead>
          <tr>
            <th>
              Name
            </th>
            <th>
              Quantity
            </th>
            <th>
			  Price
            </th>
			<th>
			  Update
            </th>
          </tr>
        </thead>
		<tbody>

<?php
//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
$cat="cat_fruit";
if(isset($_POST['category']))
{
	$cat=$_POST['category'];
}
$results = $mysqli->query("SELECT * FROM $cat");
if($results){ 

//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
	$quantity=$obj->quant_avai;
	$price=$obj->price;
	$prodName=$obj->name;
		echo "
			<tr class=\"record\">     
            <td class=\"overflow\">
			{$obj->name}
            </td>
			<td class=\"overflow\">
	<form method=\"POST\" action=\"updateProduct.php\">
		<input type=\"number\" min=\"0\" value=\"$quantity\" name=\"quantity\" id='quantity'>
            
            </td>
            <td>
			<input type=\"number\" min=\"0\" value=\"$price\" name=\"price\" id='price'>

            </td>
			<td>
				<input type='hidden' value='$cat' name='category' id='category'>
				<input type='hidden' value='$prodName' name='prodName' id='prodName'> 
	
				<p><input type=\"submit\"  value=\"Update\" class=\"btn btn-success\" role=\"button\"></p>
				
			</form>
			</td>";
	}
}

?>    
</tbody> 
  
</table>
</div>
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
