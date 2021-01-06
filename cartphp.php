<?php
session_start();
echo "cartphp.php";
$name=$_POST['cartname'];
echo $name;
$email=$_SESSION['email'];
echo $name;
echo('\n');
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sel="SELECT * FROM product WHERE Name='$name'";
$r=mysqli_query($con,$sel);
$r1=mysqli_fetch_array($r);
$s1=(int)$r1['Id'];
echo $s1;

$sel1="SELECT * FROM customers_registration WHERE Email='$email'";
$r2=mysqli_query($con,$sel1);
$r3=mysqli_fetch_array($r2);
$s=(int)$r3['Id'];

$sel2="SELECT * FROM orders WHERE customer_id='$s'";
$r4=mysqli_query($con,$sel2);
while($r5=mysqli_fetch_array($r4))
{
    $y=(int)$r5['Id'];
    $sel3="SELECT Id FROM orderitem WHERE Product_Id='$s1' AND Order_Id='$y'";
    $r6=mysqli_query($con,$sel3);
    if(mysqli_num_rows($r6)>=1)
    {
    $r7=mysqli_fetch_array($r6);
    $r8=(int)$r7[0];
    $del="DELETE FROM orderitem WHERE Id='$r8'";
    mysqli_query($con, $del);

    $z="SELECT * FROM orderitem WHERE Order_Id='$y'";
    $z1=mysqli_query($con, $z);

    if(mysqli_num_rows($z1)<=0)
    {
    $del1="DELETE FROM orders WHERE Id='$y' AND Status='Not Ordered'";
    mysqli_query($con,$del1);
    }
}
    
}

    
    //header("Refresh:1; url=cart.php");
?>