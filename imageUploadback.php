<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$pid=$_POST['pid'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
$s="SELECT * FROM images_request WHERE product_id='$pid'";
$s1=mysqli_query($db, $s);
$s3="SELECT * FROM images_ordered WHERE product_id='$pid'";
$s4=mysqli_query($db, $s3);
if(mysqli_num_rows($s1)>=1 || mysqli_num_rows($s4)>=1)
{
    echo "Sorry You Cannot delete";
}
else
{
$d="DELETE FROM images WHERE id='$pid'";
mysqli_query($db, $d);
}
// $d1="DELETE FROM images_request WHERE product_id='$pid'";
// mysqli_query($db, $d1);
?>