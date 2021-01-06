<?php

session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}

$email=$_SESSION['email'];
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "ecommerce");

  $sel="SELECT Id FROM customers_registration WHERE Email='$email'";
  $sel1=mysqli_query($db, $sel);
  $sel2=mysqli_fetch_array($sel1);
  $customerId=$sel2[0];

  $result = mysqli_query($db, "SELECT * FROM images WHERE email!='$email' AND Status='Not Ordered' ORDER BY date DESC, Id DESC");
  $rel=mysqli_query($db, "SELECT UserName FROM customers_registration WHERE Email='$email'");
  if(mysqli_num_rows($rel)>=1)
{
$r=mysqli_fetch_array($rel);
$name=$r[0];
}
?>
<?php include 'header.php';?>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
body {
  margin: 0;
  min-width: 1000px;
}
   /* #content{ */
   	/* width: 100%; */
   	/* margin: 20px auto; */
    /* border: 1px solid #cbcbcb; */
   /* } */
   /* form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   } */
   #img_div{
    padding:5% 5% 5% 10%;
    position: relative;   
    border-bottom: 1px solid red; 
   }
   #img_div img:hover
    {
    transform: scale(1.5);
    }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
    position: relative;
    float: left;
    transition: transform .2s;
    height:200px;
   }
   #image
   {
     position: relative;
     float: left;
   }
   #data
   {
    display: block;
    position: relative;
    float: right;
    width:500px;
    right:20px;
   }
   p
   {
    position: relative;
    text-align: center;
   }
   button
   {
     margin-left: 10px;
   }
   button:hover
   {
       background-color:red;
       transform: scale(1.25);
      cursor: pointer;
   }
   .reqcancelp, .confirmp, .msg 
   {
     display: none;
   }

</style>
</head>
<body>
  <?php
    while ($row = mysqli_fetch_array($result)) { 
      echo "<div id='img_div' class='img_divs'>";
      echo "<div id='image'>";
        echo "<img src='images/".$row['image']."' >";
        echo "</div>";
        echo "<div id='data'>";
        echo "<p> <b> Product Id: </b>".$row['Id']."</p>";
      //  echo "<p> <b> Name: </b>".$name."</p>";
        echo "<p> <b> Email: </b>".$row['email']."</p>";
        echo "<p> <b> Date: </b>".$row['date']."</p>";
          echo "<p>".$row['text']."</p>";
         echo "<p class='reqp'> <button class='reques'> Request </button> </p>";
         echo "<p class='reqcancelp'> <button class='requescancel'> Cancle Request </button> <span style='color:green;'> ***Request has been sent <span> </p>";
         echo "<p class='confirmp'> <button class='ok'> Ok </button> <button class='cancel'>Cancel</button><span style='color:green;'> ***Waiting for confirmation <span> </p>";
         echo "<p class='msg'><span style='color:red;'> ***Someone has sent request <span></p>";
         echo "</div>"; 
      echo "</div>";
    }
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  var divs=document.querySelectorAll(".img_divs");

  var i=0;
  for(i;i<divs.length;i++)
  {
    var txt=divs[i].textContent;
    //console.log(txt);
    var s=txt.split(" ");
    //console.log(s);
    var id=s[4];
    var emailid=s[10];
    
    $.post('checkRequest.php',{pid:id, increment:i},
    function(data)
    {
      var customerId="<?php echo "$customerId"?>";
      
      //console.log(data);
      var s=data.split(" ");
      var cid=s[2];
      var Crequest=s[4];
      var Sconfirm=s[5];
      var Cconfirm=s[6];
      var i=s[7];
      console.log(s[4]+" "+s[5]+" "+s[6]);
      var d=document.querySelectorAll(".img_divs");
      console.log(d);
      var reqp=d[i].getElementsByClassName("reqp")[0];
    var reqcancelp=d[i].getElementsByClassName("reqcancelp")[0];
    var confirmp=d[i].getElementsByClassName("confirmp")[0];
    var msg=d[i].getElementsByClassName("msg")[0];
      if(s[5]=="send" && customerId==cid)
      {
        reqp.style.display="none";
        reqcancelp.style.display="none";
        confirmp.style.display="block";
        msg.style.display="none";
      }
      else if(s[4]=="send" && customerId==cid)
      {
        reqp.style.display="none";
        reqcancelp.style.display="block";
        confirmp.style.display="none";
        msg.style.display="none";
      }
      else if(s[4]=="send" && customerId!=cid)
      {
        reqp.style.display="none";
        reqcancelp.style.display="none";
        confirmp.style.display="none";
        msg.style.display="block";
      }
    });
  }


  divs.forEach(d=>
  d.getElementsByClassName('reques')[0].onclick=function(){
    var txt=d.textContent;
    console.log(txt);
    var s=txt.split(" ");
    console.log(s);
    var id=s[4];
    var emailid=s[7];
    console.log(id);
    $.post('customerRequest.php',{pid:id,email:emailid},
    function(data)
    {
      console.log("I am working");
      console.log(data);
      alert(data);  
      location.reload();  
    });
  });
  
  divs.forEach(d=>
  d.getElementsByClassName('requescancel')[0].onclick=function(){
    var txt=d.textContent;
    console.log(txt);
    var s=txt.split(" ");
    console.log(s);
    var id=s[4];
    var emailid=s[10];
    console.log(id);
    var r=confirm("Are you sure to cancel the request");
    if(r==true)
    {
    $.post('deleteRequest.php',{pid:id,email:emailid},
    function(data)
    {
      console.log("I am working");
      console.log(data);
      alert('Request Cancelled Sucessfully');  
      location.reload();  
    });
  }
  });

  divs.forEach(d=>
  d.getElementsByClassName('ok')[0].onclick=function(){
    var txt=d.textContent;
    console.log(txt);
    var s=txt.split(" ");
    console.log(s);
    var id=s[4];
    var emailid=s[7];
    console.log(id);
    console.log(emailid);
    $.post('customerConfirm.php',{pid:id,email:emailid},
    function(data)
    {
      console.log("I am working");
      console.log(data);
      window.location.href='address.php';
    });
  });

  divs.forEach(d=>
  d.getElementsByClassName('cancel')[0].onclick=function(){
    var txt=d.textContent;
    console.log(txt);
    var s=txt.split(" ");
    console.log(s);
    var id=s[4];
    var emailid=s[10];
    console.log(id);
    var r=confirm("Are you sure to cancel the request");
    if(r==true)
    {
    $.post('deleteRequest.php',{pid:id,email:emailid},
    function(data)
    {
      console.log("I am working");
      console.log(data);
      alert('Request Cancelled Sucessfully');  
      location.reload();  
    });
  }
  });

  </script>
</body>
</html>