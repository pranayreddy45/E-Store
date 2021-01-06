<?php
session_start();
$pid=$_SESSION['pppid'];
$email=$_SESSION['email'];
$state=$_POST['State'];
$address=$_POST['Address'];
$city=$_POST['city'];
$db=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$up="UPDATE images_ordered SET Address='$address', City='$city', State='$state' WHERE product_id='$pid'";
if(mysqli_query($db,$up))
{

    $up="UPDATE images SET Status='Ordered' WHERE Id='$pid'";
    mysqli_query($db,$up);
    $del="DELETE FROM images_request WHERE product_id='$pid'";
    mysqli_query($db,$del);
echo "<script type='text/javascript'>
alert('Thank You For Shopping. Redirecting to Index Page');
window.location.href='index.php';
</script>";
}
?>