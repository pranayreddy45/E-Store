    <?php
    session_start();
    if(!isset($_SESSION['email']))
    {
    header("Location:login.php");
    }
    ?>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="signup.css">
        <title> Ecommerce</title>
    </head>
    <body>
    
        <img src="ecommerce.png">
        <div id="signinform">
            <form method="post" action="changepasswordphp.php">
                <label>Current Password</label>
                <br>
                <input type="password" id="currentpassword" name="currentpassword" required>
                <br>
                <label>New Password</label>
                <br>
                <input type="password" id="newpassword" name="newpassword" required>
                <br>
                <label>Confirm Password</label>   
                <br>
                <input type="password" id="confirmpassword" name="confirmpassword" required>
                <br>
                <input type="submit" id="signup" value="OK">
            </form>
            <p id='error'> </p>
            <!-- <p id="login"> <a href="login.php"> <span> Sign In </span> </a> </p> -->
        </div>
        <?php
        error_reporting(0);
        $a=$_SESSION['error'];
        // $name=$_SESSION['name'];
        // $email=$_SESSION['email'];
        echo "<script type='text/javascript'>document.getElementById('error').innerHTML= '".$a."';</script>";
        $_SESSION['error']='';
        // echo "<script type='text/javascript'>document.getElementById('customer').value= '".$name."';</script>";
        // echo "<script type='text/javascript'>document.getElementById('input').value= '".$email."';</script>";
        // session_destroy();
        ?>
    </body>
</html>