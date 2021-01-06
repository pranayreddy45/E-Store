
<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$date=date("Y/m/d");
$db = mysqli_connect("localhost", "root", "", "ecommerce");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
    if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (email, image, text, date, Status) VALUES ('$email', '$image', '$image_text', '$date','Not Ordered')";
  	// execute query
      mysqli_query($db, $sql);
      $_POST['upload']=null;

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
      header("Location:imageUpload.php");
  	}else{
  		$msg = "Failed to upload image";
      }
   }
  $result = mysqli_query($db, "SELECT * FROM images WHERE email='$email' ORDER BY date DESC, Id DESC");
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
   /* #content{
   	width: 100%;
   	margin: 20px auto;
    border: 1px solid #cbcbcb;
   } */
   form{
   	width: 50%;
	margin: 20px auto;
	/* border-bottom: 1px solid red;  */
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
    padding:5% 5% 5% 10%;
    position: relative;   
    border-top: 1px solid red; 
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
    width: auto;
   }
   #image
   {
     position: relative;
     float: left;
   }
   p
   {
    position: relative;
    text-align: center;
   }
   #data
   {
    display: block;
    position: relative;
    float: right;
    width:500px;
    right: 50px;
   }
   .close
   {
    display: block;
    position: absolute;
     width:25px;
     height: 25px;
     text-align: center;
     border:3px solid red;
     background-color: red;
     float: right;
     top:10px;
     right:20px; 
   }
   .close:hover
   {
      transform: scale(1.25);
      cursor: pointer;
   }
   button
   {
     margin-left: 20px;
   }
   button:hover
   {
     background-color: red;
    transform: scale(1.25);
      cursor: pointer;
   }
   .reqDiv, .ordered
   {
     display: none;
   }
</style>
</head>
<body>
<div id="content">
  <form method="POST" action="imageUpload.php" enctype="multipart/form-data">
  	<!-- <input type="hidden" name="size" value="1000000"> -->
  	<div>
  	  <input type="file" name="image" required>
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Description about Product..." required></textarea>
  	</div>
  	<div>
  		<input type="submit" name="upload" value="Upload">
  	</div>
  </form>
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div' class='img_divs'>";
      echo "<span class='close'> X </span>";

      echo "<div id='image'>";
      echo "<img src='images/".$row['image']."' >";
      echo "</div>";

      echo "<div id='data'>";
      echo "<p> <b> Product Id: </b>".$row['Id']."</p>";
		  //echo "<p> <b> Email: </b>".$row['email']."</p>";
		  echo "<p> <b> Date: </b>".$row['date']."</p>";
        echo "<p>".$row['text']."</p>";
        echo "<p class='ordered' style='color:green;'> <b> Ordered </b> </p>";
        echo "<p class='reqDiv'><button class='ok'> OK </button> <button class='cancel'> Cancel </button></p>";
        echo "<p class='para' style='color:yellow;'>  </p>"; 
        echo "<p class='msg' style='color:green;'> </p>";
        echo "</div>";
      echo "</div>";
    }
  ?>
</div>
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
    var id=s[6];
    
    $.post('checkRequest.php',{pid:id, increment:i},
    function(data)
    {
      //console.log(data);
      var s=data.split(" ");
      console.log(s);
      var Crequest=s[4];
      var Sconfirm=s[5];
      var Cconfirm=s[6];
      var i=s[7];
      var cemail=s[8];
      var ordered=s[9];
      console.log(s[4]+" "+s[5]+" "+s[6]);
      var d=document.querySelectorAll(".img_divs");
      console.log(d[i]);
      var reqd=d[i].getElementsByClassName("reqDiv")[0];
      var ordered=d[i].getElementsByClassName("ordered")[0];
      if(s[9]=="ordered")
      {
        ordered.style.display="block";
      }
      if(s[5]=="send" && s[4]=="send")
      {
        ordered.style.display="none";
        reqd.style.display="none";
        var para=d[i].getElementsByClassName("para")[0];
        para.innerHTML='** '+cemail+" is interested";
        var msg=d[i].getElementsByClassName("msg")[0];
        msg.innerHTML="** "+cemail+" yet to be confirmed";
      }
      else if(s[4]=="send")
      {
        ordered.style.display="none";
        reqd.style.display="block";
        var para=d[i].getElementsByClassName("para")[0];
        para.innerHTML='** '+cemail+" is interested";
      }
    });
  }


  document.querySelectorAll('.img_divs').forEach(d=>
  d.getElementsByClassName("close")[0].onclick=function(){
    console.log(d);
    var txt=d.textContent;
    console.log(txt); 
    var s=txt.split(" ");
    console.log(s);
    var id=s[6];
    console.log(id);
    function dis(h)
    {
      var dd=h.getElementsByClassName("reqDiv")[0];
      dd.style.display="block";
    }
    function myfunc(id)
    {
      var i=id;
    $.post('imageUploadback.php', {pid:i},
    function(data)
    {
      console.log("I am working");
       // console.log(data);
      //location.reload();
      if(data.length>=2)
      {
        alert(data);
      }
    });
    }
    var r=confirm("Are you Sure to Delete?");
    if(r==true)
    {
      myfunc(id);
      //dis(d);
      location.reload();
    }
  });

  document.querySelectorAll('.img_divs').forEach(d=>
  d.getElementsByClassName('ok')[0].onclick=function(){
    var txt=d.textContent;
    console.log(txt);
    var s=txt.split(" ");
    console.log(s);
    var id=s[6];
    //var emailid=s[7];
    console.log(id);
    $.post('sellerConfirm.php',{pid:id},
    function(data)
    {
      console.log("I am working");
      console.log(data);
      alert('Confirm Request Sent');  
      location.reload();  
    });
  });

  divs.forEach(d=>
  d.getElementsByClassName('cancel')[0].onclick=function(){
    var txt=d.textContent;
    console.log(txt);
    var s=txt.split(" ");
    console.log(s);
    var id=s[6];
    var emailid=s[10];
    console.log(id);
    var r=confirm("Are you sure to cancel the request");
    if(r==true)
    {
    $.post('deleteRequestSeller.php',{pid:id,email:emailid},
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

