<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$pid=$_POST['pid'];
$cemail=$_POST['email'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
$cid="SELECT Id FROM customers_registration WHERE Email='$email'";
$cid1=mysqli_query($db, $cid);
$cid2=mysqli_fetch_array($cid1);
$cid3=(int)$cid2[0];
$sid="SELECT Id FROM customers_registration WHERE Email='$cemail'";
$sid1=mysqli_query($db, $sid);
$sid2=mysqli_fetch_array($sid1);
$sid3=(int)$sid2[0];
$in="INSERT INTO images_request(product_id, customer_id, seller_id, Crequest, Sconfirm, Cconfirm) VALUES ('$pid', '$cid3', '$sid3', 'send', 'pending', 'pending')";
if(mysqli_query($db, $in))
{
    header("Location:imageUploadphp.php");
}
?>