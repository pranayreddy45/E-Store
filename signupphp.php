<?php
session_start();
$name=$_POST['customer'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$confirmpassword=md5($_POST['confirmpassword']);
$con=mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sel="SELECT UserName FROM customers_registration WHERE Email='$email' AND verified=1";
$check=mysqli_query($con,$sel);   
if(mysqli_num_rows($check)>=1)
{
    $_SESSION['error']="* User already exist. Please SignIn.";
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    header("Location:signup.php");
}
else
{
    $emailexplode=explode("@",$email);
    $domain=$emailexplode[1];
    echo $domain;
if(!checkdnsrr($domain,"MX"))
{
    $_SESSION['error']="* Email domain does not exist";
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    header("Location:signup.php");
}
else {
if($password==$confirmpassword)
{
$s="SELECT UserName FROM customers_registration WHERE Email='$email'";
$s1=mysqli_query($con, $s);
if(mysqli_num_rows($s1)>=1)
{
    $d="DELETE FROM customers_registration WHERE Email='$email'";
    mysqli_query($con,$d);
}
$vkey=md5(time().$email);
$date=date('d/m/y');
$ins1="INSERT INTO customers_registration(UserName,Email,vkey,datecreated) VALUES ('$name','$email','$vkey','$date')";
$ins2="INSERT INTO customers_password(User_Password) VALUES ('$password')";
if(mysqli_query($con,$ins1) && mysqli_query($con,$ins2))
{
    $_SESSION['email']=$email;
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
    // echo "<script type='text/javascript'>
    // if(confirm('Registration Sucessful. Go to main page'))
    // {
    //     window.location.href = 'index.php';
    // }
    // else
    // {
    //     window.location.href = 'signup.php';
    // }
    // </script>";
        $to=$email;
        $subject="Email Verification";
        $headers = "From: saipranayreddy45@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $vkey=md5(time().$to);
        $msg="<a href='http://localhost/Ecommerce%20Editing/verify.php?vkey=$vkey'> Register </a>";

        $s=mail($to, $subject, $msg, $headers);
        if($s)
        {
            header("Location: thankyou.php");
        }
        else
        {
            echo "Error in sending mail";
        }
}
}
else
{
    $_SESSION['error']="* Confirm password does not match";
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    header("Location:signup.php");
}
}
}
?>