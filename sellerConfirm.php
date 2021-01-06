<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$pid=$_POST['pid'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
$up="UPDATE images_request SET Sconfirm='send' WHERE product_id='$pid'";
if(mysqli_query($db, $up))
{
    $sel="SELECT * FROM images_request WHERE product_id='$pid'";
    $sel1=mysqli_query($db, $sel);
    $sel2=mysqli_fetch_array($sel1);
    echo $sel2[0];
    echo " ";
    echo $sel2[1];
    echo " ";
    echo $sel2[2];
    echo " ";
    echo $sel2[3];
    echo " ";
    echo $sel2[4];
    echo " ";
    echo $sel2[5];
    echo " ";   
    echo $sel2[6];
}
?>