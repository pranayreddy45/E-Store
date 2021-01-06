<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
?>


<html>
<head>
<style>
/* input
{
    width:80px;
    height:auto;
} */
img
{
    position:relative;
    width:100px;
    height:auto;
    cursor: pointer;
}
input
{
    position:relative;
    cursor: pointer;
    margin-left: 20px;
    text-align:center;
}
input:hover
{
  background-color: greenyellow;
}

.switch {
  position: relative;
  display: inline-block;
  width: 30px;
  height: 20px;
  /* top:50px;
  left:-150px; */
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 10px;
  width: 10px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(10px);
  -ms-transform: translateX(10px);
  transform: translateX(10px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

#recomendation
{
    font-weight:bold;
    clear: both;
    float:left;
    margin-right:5px;
}
#check
{
    margin-top:10px;
}
.selling 
{
  margin-top:20px;
  margin-left:30px;
}

</style>
</head>
<body>
<p> 
<?php
echo $_SESSION['email'];
?>
 </p>
<input type="submit" value="Logout" onclick="myFun5()">
<input type="submit" value="Change Password" onclick="myFun2()">
<img src="cart.png" onclick="myFun1()">
<input type="submit" value="All Recommendations" onclick="myFun3()">
<input type="submit" value="Feedback" onclick="feedback()">
<div id='check'>
<span id='recomendation'> Recomendations </span> 
<label class="switch">
<input type="checkbox" id='mycheck' onclick='myFun4()'>
<span class="slider round"></span>
</label>
</div>
<input type="submit" value="Sell" onclick="sell()" class='selling'>
<input type="submit" value="Buy" onclick="buy()" class='selling'>
<script src="jquery-3.4.1.min.js"> </script>
<script>
function myFun5()
{
    opener.location.href="logout.php";
    close();
}
function myFun1()
{
    opener.location.href="cart.php";
    close();
}
function myFun2()
{
    opener.location.href="changepassword.php";
    close();
}
function myFun3()
{
    opener.location.href="recomendations.php";
    close();
}
function sell()
{
  opener.location.href="imageUpload.php";
  close();
}
function buy()
{
  opener.location.href="imageUploadphp.php";
  close();
}
function feedback()
{
  opener.location.href="feedback.php";
  close();
}
function myFun4()
{
    var b='';
    var c=document.getElementById('mycheck');
    if(c.checked==true)
    {
        //alert('True');
        b=true;
    }
    else
    {
       // alert('False');
        b=false;
    }
    $.ajax({
        url:'trash2.php',
        method:'POST',
        data:{item:b},
        success:function(response)
        {
            if(response)
            {
                //alert(response);
                console.log(response);
                //mychild();
            }
            else
            {
                alert("SomeThing Went Wrong");
            }
        }
        });
}
</script>
<?php
$a=$_SESSION['recomendation'];
//echo "<script> alert($a) </script>";
if($a=='true')
{
  $a=$_SESSION['recomendation'];
    //echo "<script> alert($a) </script>";
    echo "<script> 
    var c=document.getElementById('mycheck');
    c.checked=true;
     </script>";
}
else
{
   // echo "<script> alert('Bye') </script>";
    echo "<script> 
    var c=document.getElementById('mycheck');
    c.checked=false;
     </script>";   
}

?>


</body>
</html>