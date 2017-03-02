<?php
session_start();
include_once("config.php");
$current_url = urlencode($url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//$dbc=mysqli_connect("localhost","root","","online_groc") or die("Error connecting sql server");
$id=$_GET["no"];
$user="anon_user";
if(isset($_SESSION['loginUser']))
{
$user=$_SESSION['loginUser'];
}
//$quantity=$_POST["Quantity"];
//$id=$_POST["id"];
$mysqli->query("Delete FROM cart where id=$id and Username='$user'");
//echo "In delete";
header("location:cart_viewvik.php");
?>