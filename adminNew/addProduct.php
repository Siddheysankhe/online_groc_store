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
	<div class="row">
			<div class="col-md-4">
			</div>
            <div class="col-md-4">
                <strong>Add New Product</strong>
                <hr>
                <form method="POST" action="newProd.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Product ID" name="pid">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name" name="pname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <select name="dropmenu">
								  <option value="Fruit And Vegetables">Fruit And Vegetables</option>
								  <option value="Grocery">Grocery</option>
								  <option value="Bread and Dairy">Bread and Dairy</option>
								  <option value="Bevarages">Bevarages</option>
								  <option value="Branded Food">Branded Food</option>
								  <option value="Personal Care">Personal Care</option>
								  <option value="Meat and Fish">Meat and Fish</option>
								</select>
                            </div>
                        </div>
						<div class="col-md-6 col-sm-6">
                            <div class="form-group">
								 <input type="file" name="image" />
							</div>
						</div>
                    </div>
					<div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
							<input type="text" class="form-control" required="required" placeholder="Description" name="pdesc">
							</div>
						</div>
					</div>
					<div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
							<input type="number" class="form-control" min="1" required="required" placeholder="Quantity" name="pquant">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
                            <div class="form-group">
							<input type="number" class="form-control" min="1" required="required" placeholder="Price" name="pprice">
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
									<button type="submit" class="btn btn-primary" name="submit">Submit Request</button>
						</div>
					</div>
					</div>
                </form>
            </div>
	</div>
	</body>
	</html>
