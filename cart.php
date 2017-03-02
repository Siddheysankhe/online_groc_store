<?php
session_start(); 
include("config.php");
//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
$total=0;
if(isset($_POST["id"]))
{
$id=$_POST["id"];
$qu=$_POST["number"];
//$db=$_POST["db"];
$tableName=$_SESSION['tabName'];
$user="anon_user";
if(isset ($_SESSION['loginUser']))
{
   $user=$_SESSION['loginUser'];
}
$query="Select *from $tableName where product_id='$id'";
$results=mysqli_query($dbc,$query);
$no_rows=mysqli_num_rows($results);
if($no_rows==1)
{	$row=mysqli_fetch_array($results,MYSQLI_ASSOC);

	$row_total=$qu*$row["price"];
	echo $row_total;
	$total=$total+$row_total;
	$name2=$row["name"];
	$qc="Select * from cart where Name='$name2' and Username='$user'";
	$query_check=mysqli_query($dbc,$qc);
	$row_cart=mysqli_fetch_array($query_check,MYSQLI_ASSOC);
	if($row_cart)
	{
	$qu2=$qu+$row_cart["Quantity"];
	$row_total2=$row_total+$row_cart["Price"];
	$query_update="Update cart set Quantity=$qu2,Price=$row_total2 where Name='$name2'";	
	mysqli_query($dbc,$query_update);	
	}
	else
	{
	$query2="INSERT INTO cart (Username,Name,Quantity,Price,tabName) VALUES ('$user','$name2',$qu,$row_total,'$tableName')";	
	mysqli_query($dbc, $query2);
	}
/*
$query2="INSERT INTO cart (Name,Quantity,Price) VALUES ('$name2',$qu,$row_total)";
if (mysqli_query($dbc, $query2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query2 . "<br>" . mysqli_error($dbc);
}
*/
}
}

header("Location: cat_fruit.php");
exit();
/*if($results){ 
while($obj = $results->fetch_object())
{
$row_total=$qu*$obj->price;
$total=$total+$row_total;
$name=$obj->name;
echo $name;
echo '<tr>';
echo '<td>$name</td>';
echo '<td>$qu</td>';
echo '<td>$row_total</td>';
}
}*/


?>



