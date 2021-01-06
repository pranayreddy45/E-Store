<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$cemail=$_SESSION['email'];
$pid=$_POST['pid'];
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

$s="SELECT * FROM images_request WHERE product_id='$pid'";
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
if(mysqli_num_rows($sel1)>=1)
{
$in="INSERT INTO images_request(product_id, customer_id, seller_id, Crequest, Sconfirm, Cconfirm) VALUES ('$pid', '$cid3', '$sid3', 'send', 'pending', 'pending')";
    if(mysqli_query($db, $in))
    {
        echo "Request Sent";
    }
}
else
{
    echo "Sorry request cannot be sent";
}
}
// echo "<script type='text/javascript'>
// alert('Request Sent');
// window.location.href='imageUploadphp.php';
// </script>";
?>