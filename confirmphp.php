<?php
session_start();
$email=$_SESSION['email'];
$state=$_POST['State'];
$address=$_POST['Address'];
$city=$_POST['city'];
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sel="SELECT * FROM customers_registration WHERE Email='$email'";
$r=mysqli_query($con,$sel);
$f=mysqli_fetch_array($r);
$date=date("Y/m/d");
$rel=(int)$f['Id'];
$rel1=$f['UserName'];
// $in="INSERT INTO customers_address(customer_id,Name,Address,City,State) VALUES ('$rel','$rel1','$address','$city','$state')";
// mysqli_query($con,$in);

$z="SELECT Id FROM orders WHERE customer_id='$rel' AND Status='Not Ordered' AND Date='$date'";
$z1=mysqli_query($con,$z);
$z2=mysqli_fetch_array($z1);
$z3=$z2[0];


$s="SELECT Id FROM orders WHERE customer_id='$rel' AND Status='Ordered' AND Date='$date'";
$s1=mysqli_query($con,$s);
$s5=mysqli_fetch_array($s1);
$id=(int)$s5[0];

if(mysqli_num_rows($s1)>=1)
{
    
    $x="SELECT * FROM orderitem WHERE Order_Id='$z3'";
    $x1=mysqli_query($con,$x);
    if(mysqli_num_rows($x1)>0)
    {
        echo "<script>echo('aaaaa')</script>";
    while($x2=mysqli_fetch_array($x1))
    {
        $d=$x2['Product_Id'];
        $q=$x2['Quantity'];
        $y="SELECT Quantity FROM  orderitem WHERE Product_Id=$d AND Order_Id='$id'";
        $y1=mysqli_query($con,$y);
        if(mysqli_num_rows($y1)>=1)
        {
        $y2=mysqli_fetch_array($y1);
        $q1=$q+$y2[0];
        $u="UPDATE orderitem SET Quantity='$q1' WHERE Product_Id=$d AND Order_Id='$id'";
        mysqli_query($con,$u);
        $ddd="DELETE FROM orderitem WHERE Order_Id='$z3' AND Product_Id=$d";
        mysqli_query($con,$ddd);
        }
    }
    }
    $s2="UPDATE orderitem SET Order_Id='$id' WHERE Order_Id='$z3'";
    mysqli_query($con,$s2);
    $del="DELETE FROM orders WHERE customer_id='$rel' AND Status='Not Ordered' AND Date='$date'";
    mysqli_query($con,$del);
}
else
{
$upd="UPDATE orders SET Status='Ordered',Date='$date' WHERE customer_id='$rel' AND Status='Not Ordered'";
mysqli_query($con,$upd);
}

$a="SELECT * FROM customer_address WHERE Order_Id='$id'";
$a1=mysqli_query($con,$a);
if(mysqli_num_rows($a1)>0)
{
    $up="UPDATE customer_address SET Address='$address', City='$city', State='$state' WHERE Order_id='$id'";
    mysqli_query($con,$up);
}
else
{
    $i="INSERT INTO customer_address(Order_Id, Address, City, State) VALUES('$id', '$address', '$city', '$state')";
    mysqli_query($con,$i);
}

echo "<script type='text/javascript'>
alert('Thank You For Shopping. Redirecting to Index Page');
window.location.href='customerresults.php';
</script>";

//header('Location:customerresults.php');
// echo "<script type='text/javascript'>
// if(confirm('Thank you for Shopping. Logout?'))
//     {
//         window.location.href = 'logout.php';
//     }
//     else
//     {
//         window.location.href = 'index.php';
//     }
//     </script>";
?>