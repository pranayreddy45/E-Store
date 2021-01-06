<?php
if(isset($_GET['vkey']))
{
    $vkey=$_GET['vkey'];
    $con=mysqli_connect("localhost","root","","ecommerce");
    $sel="SELECT * FROM customers_registration WHERE vkey='$vkey' AND verified=0";
    $sel1=mysqli_query($con, $sel);
    if(mysqli_num_rows($sel1)>=1)
    {
        $up="UPDATE customers_registration SET verified=1 WHERE vkey='$vkey'";
        if(mysqli_query($con, $up))
        {
            echo "<script> alert(Your account has been verified);
            window.location.href='login.php';
            </script>";
        }
        else
        {
            echo "Error";
        }
    }
    else
    {
        echo "<script> alert('This email is invalid OR already verified'); 
        window.location.href='login.php';
        </script>";
    }
}
else
{
    die("Something went wrong");
}
?>