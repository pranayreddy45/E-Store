<?php
session_start();
$email=$_POST['email'];
$password=md5($_POST['password']);
$con=mysqli_connect("localhost","root","","ecommerce");


if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sel="SELECT ID FROM customers_registration WHERE Email='$email' AND verified=1";
$rel=mysqli_query($con,$sel);
if(mysqli_num_rows($rel)>=1)
{
$result=mysqli_fetch_array($rel);
$result1=(int)$result[0];
$pass="SELECT User_Password FROM customers_password WHERE ID='$result1'";
$pass1=mysqli_query($con,$pass);
$pass2=mysqli_fetch_array($pass1);
if($pass2[0]==$password)
{
    $_SESSION['email']=$email;
    //$_SESSION['last_login_timestamp']=time();
    $_SESSION['recomendation']=true;
    $myObj->b = "true";
    $myObj->recomenditem="true";
    $myObj->ordered="false";
    $myObj->alreadyordered="false";
    //$myJSON = json_encode($myObj);
    $info = json_encode($myObj);
        $file = fopen('test.json','w') or die("File not found");
        fwrite($file, $info);
        fclose($file);
    header("Location:index.php");
}
else
{
    $_SESSION['error']="* Password is incorrect.";
    $_SESSION['email']=$email;
    header("Location:login.php");
}
}
else
{
    $s="SELECT * FROM customers_registration WHERE Email='$email'";
    $s1=mysqli_query($con, $s);
    if(mysqli_num_rows($s1)>=1)
    {
        $_SESSION['error']="* This account has not been verified. An email was sent to verify";
        $_SESSION['email']=$email;
        header("Location:login.php");
    }
    else
    {
    $_SESSION['error']="* Email does not exist. Please Sign Up.";
    $_SESSION['email']=$email;
    header("Location:login.php");
    }
}
?>