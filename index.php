<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}

?>
<html>
    <head>
        <title> E-Commerence </title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
      
        
        <?php include 'header.php';?>
           
        <div id="mainbody">
            <div id="main">
                    <a href="iphone.php "> <img src="iphoneadd.jpg" id="aaa"> </a>
                    <a href="samsung.php"> <img src="samsung.jpg" id="bbb" style="display:none"> </a>
                    <a href="womendress.php"><img src="women.jpg" id="ccc" style="display:none"></a>
                    <a href="shirt.php"> <img src="men.jpg" id="ddd" style="display:none"></a>
                    <script src="slideshow.js"> </script>
                    <button id="prev" onclick="myFun(-1)"> Prev </button>
                    <button id="next" onclick="myFun(1)"> Next </button>
            </div>
            <div id="mobiles">
                <a href="nokia.php"> <img src="nokia.jpg"> </a>
                <a href="iphone.php"> <img src="iphone.jpg"> </a>
                <a href="samsung.php"> <img src="samsungimg.jpg"> </a>
               
            </div>
     
            <div id="style">
               <a href="shirt.php"> <img src="menstyle.jpg"> </a>
                <a href="womendress.php"> <img src="womenstyle.jpg"> </a>
                
            </div>
        </div>
    </body>
</html>