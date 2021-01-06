<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$pid=$_POST['pid'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
$cid="SELECT Id FROM customers_registration WHERE Email='$email'";
$cid1=mysqli_query($db, $cid);
$cid2=mysqli_fetch_array($cid1);
$cid3=(int)$cid2[0];
$d="DELETE FROM images_request WHERE product_id='$pid' AND customer_id='$cid3'";
if(mysqli_query($db, $d))
{
    echo "Yeahh";
}
?>