<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
error_reporting(E_ALL ^ E_NOTICE);
$email=$_SESSION['email'];
include 'header.php';
?>
<html>
    <style>
    body {
    margin: 0;
    min-width: 1000px;
    }
    #upi{
        position: absolute;
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        padding-top: 50px;
        width:200px;
        height:80px;
        background-color: red;
        top:300px; 
        left:100px;
        cursor:pointer; 
    }
    #debitcard{
        position: absolute;
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        padding-top: 50px;
        width:200px;
        height:80px;
        background-color: red;
        top:300px; 
        left:400px;
        cursor:pointer; 
    }
    #creditcard{
        position: absolute;
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        padding-top: 50px;
        width:200px;
        height:80px;
        background-color: red;
        top:300px; 
        left:700px;
        cursor:pointer; 
    }
    button{
        position: absolute;
        top:500px;
        left:500px;
    }
    button:hover{
        background-color: red;
        cursor: pointer;
    }
    </style>
    <body>
        <div id="upi"> UPI </div>
        <div id="debitcard"> Debit Card </div>
        <div id="creditcard"> Credit Card </div>
        <p> <center><a href='confirm.php'> <button>OK</button> </a> </center> </p>
    </body>
</html>