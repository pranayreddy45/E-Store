<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$pid=$_POST['pid'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
$sid="SELECT Id FROM customers_registration WHERE Email='$email'";
$sid1=mysqli_query($db, $sid);
$sid2=mysqli_fetch_array($sid1);
$sid3=(int)$sid2[0];
$d="DELETE FROM images_request WHERE product_id='$pid' AND seller_id='$sid3'";
if(mysqli_query($db, $d))
{
    echo "Yeahh";
}
?>