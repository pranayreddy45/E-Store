<?php
session_start();
$email=$_SESSION['email'];
$currentpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);
$con=mysqli_connect("localhost","root","","ecommerce");



if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$sel="SELECT Id FROM customers_registration WHERE Email='$email'";
$rel=mysqli_query($con,$sel);
if(mysqli_num_rows($rel)>=1)
{
$result=mysqli_fetch_array($rel);
$result1=(int)$result[0];
$pass="SELECT User_Password FROM customers_password WHERE Id='$result1'";
$pass1=mysqli_query($con,$pass);
$pass2=mysqli_fetch_array($pass1);
if($pass2[0]==$currentpassword)
{
    if($newpassword==$confirmpassword)
    {
        $r="UPDATE customers_password SET User_Password='$newpassword' WHERE Id='$result1'";
        mysqli_query($con,$r);
        echo "<script>
        alert('Password Changed Sucessfully');
        window.location.href='index.php';
        </script>";
    }
    else
    {
        $_SESSION['error']="*Confirm Password does not match";
        header("Location:changepassword.php");
    }
}
else
{
    $_SESSION['error']="* Password is incorrect.";
    // $_SESSION['email']=$email;
    header("Location:changepassword.php");
}
}
else
{
    $_SESSION['error']="* Email does not exist. Please Sigu Up.";
    // $_SESSION['email']=$email;
    header("Location:changepassword.php");
}
?>