        
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="signup.css">
        <title> Ecommerce Sign In</title>
    </head>
    <body>
    
        <img src="ecommerce.png">
        <div id="signinform">
            <form method="post" action="signupphp.php">
                <label>Name</label>
                <br>
                <input type="text" id="customer" name="customer" required>
                <br>
                <label>Email</label>
                <br>
                <input type="email" id="input" placeholder="email@gmail.com" name="email" required>
                <br>
                <label>Password</label>
                <br>
                <input type="password" id="password" name="password" required>
                <br>
                <label>Confirm Password</label>   
                <br>
                <input type="password" id="confirmpassword" name="confirmpassword" required>
                <br>
                <input type="submit" id="signup" value="Sign Up">
            </form>
            <p id='error'> </p>
            <p id="login"> <a href="login.php"> <span> Sign In </span> </a> </p>
        </div>
        <?php
        session_start();
        error_reporting(0);
        $a=$_SESSION['error'];
        $name=$_SESSION['name'];
        $email=$_SESSION['email'];
        echo "<script type='text/javascript'>document.getElementById('error').innerHTML= '".$a."';</script>";
        echo "<script type='text/javascript'>document.getElementById('customer').value= '".$name."';</script>";
        echo "<script type='text/javascript'>document.getElementById('input').value= '".$email."';</script>";
        session_destroy();
        ?>
    </body>
</html>