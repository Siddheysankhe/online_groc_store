<?php
session_start();
include("config.php");
if(!(isset($_SESSION['adminUser'])))
{
			header("location:index.php");		
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
					<li><a href="updateProduct.php">Update Existing Product</a></li>
		</ul>
	</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<?php
		
		if(isset($_POST['submit']))
		{
			$id=$_POST['pid'];
			$name=$_POST['pname'];
			$category=$_POST['dropmenu'];
			//$img_name=$_POST['pimage'];
			$desc=$_POST['pdesc'];
			$quant=$_POST['pquant'];
			$price=$_POST['pprice'];
			
			
			
			if(isset($_POST['dropmenu']))
			{
				if($category=="Fruit And Vegetables")
				{
					$table="cat_fruit";
					$cat_fold="Fruits&veggies";
					//echo "In Fruit And Vegetables";
				}
				else if($category=="Grocery")
				{
					$table="cat_grocery";
					$cat_fold="Grocery";
					//echo "In Grocery";
				}
				else if($category=="Bread and Dairy")
				{
					$table="cat_bakery";
					$cat_fold="Bakery";
					//echo "Bread and Dairy";
				}
				else if($category=="Bevarages")
				{
					$table="cat_beverages";
					$cat_fold="Beverages";
					//echo "In Bevarages";
				}
				else if($category=="Branded Food")
				{
					$table="cat_brandedfood";
					$cat_fold="Branded food";
					//echo "In Branded Food";
				}
				else if($category=="Personal Care")
				{
					$table="cat_personalcare";
					$cat_fold="Personalcare";
					//echo "In Personal Care";
				}
				else if($category=="Meat and Fish")
				{
					$table="cat_meat";
					$cat_fold="Meat";
					//echo "Meat and Fish";
				}
			}
			
			if(isset($_FILES['image']))
			{	
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];   
				$exploded = explode('.',$_FILES['image']['name']);
				$file_ext=strtolower(end($exploded));		
				
				$expensions= array("jpeg","jpg"); 		
				if(in_array($file_ext,$expensions)=== false)
				{
					$errors[]="extension not allowed, please choose a JPEG";
				}
				if($file_size > 2097152){
				$errors[]='File size must be excately 2 MB';
				}				
				if(empty($errors)==true){
					move_uploaded_file($file_tmp,"c:/xampp/htdocs/online_gorc2/online_gorc/images/$cat_fold/".$file_name);
					echo "Success";
				}else{
					print_r($errors);
				}
			}
			
			$img_name="images/$cat_fold/$file_name";
			//echo "$id \n $name \n $img_name \n $desc \n $quant $price \n $table \n $cat_fold \n";
			//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
	
			$query="Insert into $table (product_id,name,image,description,quant_avai,price) values ('$id','$name','$img_name','$desc','$quant','$price')";
			$result=mysqli_query($dbc,$query) or die(mysql_error());
			
		}
		header("location:addProduct.php");
		
	?>
</body>
</html>
