<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$pid=$_POST['pid'];
$increment=$_POST['increment'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
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
echo " ";
echo $increment;


$sel8="SELECT Email FROM customers_registration WHERE Id='$sel2[2]'";
$sel9=mysqli_query($db, $sel8);
$sel10=mysqli_fetch_array($sel9);
$cemail=$sel10[0];

echo " ";
echo $cemail;
echo " ";

$sel4="SELECT * FROM images_ordered WHERE product_id='$pid'";
$sel5=mysqli_query($db, $sel4);
if(mysqli_num_rows($sel5)>=1)
{
    echo "ordered";
}
else
{
    echo " NotOrdered";
}
?>