<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$date=date("Y/m/d");
$cemail=$_SESSION['email'];
$pid=$_POST['pid'];
$_SESSION['pppid']=$pid;
$semail=$_POST['email'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
$cid="SELECT Id FROM customers_registration WHERE Email='$cemail'";
$cid1=mysqli_query($db, $cid);
$cid2=mysqli_fetch_array($cid1);
$cid3=(int)$cid2[0];
$sid="SELECT Id FROM customers_registration WHERE Email='$semail'";
$sid1=mysqli_query($db, $sid);
$sid2=mysqli_fetch_array($sid1);
$sid3=(int)$sid2[0];

$s="SELECT * FROM images_ordered WHERE product_id='$pid'";
$s1=mysqli_query($db, $s);
if(mysqli_num_rows($s1)>=1)
{
    // $up="UPDATE images_request SET customer_id='$cid3', seller_id='$sid3', Crequest='send' WHERE product_id='$pid'";
    // if(mysqli_query($db, $up))
    // {
    //     echo "Hello World";
    // }
}
else
{
$sel="SELECT * FROM images WHERE Id='$pid'";
$sel1=mysqli_query($db, $sel);
$sel2="SELECT * FROM images_request WHERE product_id='$pid'";
$sel3=mysqli_query($db, $sel2);
if(mysqli_num_rows($sel1)>=1 && mysqli_num_rows($sel3)>=1)
{
$in="INSERT INTO images_ordered(product_id, seller_id, customer_id, Date) VALUES ('$pid', '$sid3', '$cid3','$date')";
    if(mysqli_query($db, $in))
    {
        echo "ok";
    }
}
else
{
    echo "Something went wrong";
}
}