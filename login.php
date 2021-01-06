<html>
    <head>
        <link rel="stylesheet" type="text/css" href="login.css">
        <title> Ecommerce Sign In</title>
    </head>
    <body>
        <img src="ecommerce.png">
        <div id="signinform">
            <form method="post" action="loginphp.php">
                <label>Email</label>
                <br>
                <input type="email" id="input" placeholder="email@gmail.com" name="email" required>
                <br>
                <label>Password</label>
                <br>
                <input type="password" id="password" name="password" required>
                <br>
                <input type="submit" id="signin" value="Sign In">
            </form>
            <p id='error'> </p>
            <p> <a href="signup.php"> <span> Sign Up  </span> </a> </p>
        </div>
        <?php
        session_start();
        error_reporting(0);
        $a=$_SESSION['error'];
        $email=$_SESSION['email'];
        echo "<script type='text/javascript'>document.getElementById('error').innerHTML= '".$a."';</script>";
        echo "<script type='text/javascript'>document.getElementById('input').value= '".$email."';</script>";
        session_destroy();
        ?>
    </body>
</html>