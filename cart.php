<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
error_reporting(E_ALL ^ E_NOTICE);
$email=$_SESSION['email'];
$totalsum=0;
$total=0;
?>


<html>
<head>
<script src="jquery-3.4.1.min.js"> </script>
<style>
body {
  margin: 0;
  min-width: 1000px;
}


* {
  box-sizing: border-box;
}

#ordereditems
{
  background-color:lightgreen;
}

#ordereditems:hover
{
  background-color:#97BC62FF;
}


.ullist {
  margin: 0;
  padding: 0;
}


.ullist li {
  height:50px;
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;
  
}

#myULlist li{
  background: #f9f9f9;
}


#myULlist li:hover {
  background: #ddd;
}


.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}


#totalcss
{
  margin-top:10px;
  color:red;
  font-size:30px;
  font-weight:bold;
}

button
{
  margin:10px;
  transition: transform .2s;
}
button:hover
{
  background-color:red;
  transform: scale(1.25);
}



.itemname
{
    position:absolute;
    left:20px;
}
.amount
{
    position:absolute;
    left:350px;
}
.quantity
{
    position:absolute;
    left:450px;
}
.status
{
    position:absolute;
    left:600px;
}
.total
{
    position:absolute;
    left:800px;
}
.date
{
  position:absolute;
  left:900;
}

</style>
</head>
<?php include 'header.php';?>
<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
        $sel_userid="SELECT Id FROM customers_registration WHERE Email='$email'";
        $sel_userid1=mysqli_query($con,$sel_userid);
        $sel_userid2=mysqli_fetch_array($sel_userid1);
        $rel = (int)$sel_userid2[0];



        $sel_orderid="SELECT * FROM orders WHERE customer_id='$rel' AND Status='Not Ordered' ORDER BY Date DESC, Id DESC";
        $sel_orderid1=mysqli_query($con,$sel_orderid);
        
        echo "<ul class='ullist' id='listheader'>
        <li><span class='itemname'><b>Name</b></span>";
        echo "  ";
        
        echo "<span class='amount'><b>Amount</b></span>";
        
        echo "<span class='quantity'><b>Quantity</b></span>";
        
        echo "<span class='status'><b>Status</b></span>";
        echo " ";
        
        echo "<span class='total'><b>Total</b></span>";
        echo " ";
        echo "<span class='date'><b>Date</b></span>";
        echo "</li></ul>";

        while($a=mysqli_fetch_array($sel_orderid1))
        {
  
            $v=(int)$a['Id'];
            $sel="SELECT * FROM orderitem WHERE Order_Id='$v'";
            $r=mysqli_query($con,$sel);
            while($r5=mysqli_fetch_array($r))
            {
            //$r5=mysqli_fetch_array($r);
            $r1=(int)$r5['Product_Id'];
            $q=(int)$r5['Quantity'];
            $o=(int)$r5['Order_Id'];


            $sel123="SELECT * FROM orders WHERE Id='$o'";
            $r11=mysqli_query($con,$sel123);
            $r123=mysqli_fetch_array($r11);
            $sta=$r123['Status'];
            $date=$r123['Date'];

            $sel1="SELECT * FROM product WHERE Id='$r1'";
            $r2=mysqli_query($con,$sel1);
            $r3=mysqli_fetch_array($r2);
            $n=$r3['Name'];
            $p=(int)$r3['Price'];
            $total=$p*$q;

            $totalsum=$totalsum+$total;
            echo "<ul class='ullist' id='myULlist'>
            <li class='items' id='items'>";
            echo "<span class='itemname'>";
            echo $n;
            echo "  ";
            echo "</span>";
            
            echo "<span class='amount'>";
            echo $p;
            echo "</span>";
          
           echo "<span class='quantity'>";
            echo $q;
            echo "</span>";
           
           echo "<span class='status'>";
           echo $sta;
           echo "</span>";
           
           echo "<span class='total'>";
            echo $total;
            echo "</span>";

            echo "<span class='date'>";
            echo $date;
            echo "</span>";
            echo "</li>
            </ul>";
            }
        }
                echo "<div id='totalcss'> <center> Total Amount: ";
                echo $totalsum;
                echo "</center> </div>";
                if(strlen($n)>=1)
                {
                echo"<center> <a href='payment.php'> <button> OK </button> </a> </center>";
                }
              
?>

<script src="cart.js"> </script>

<script>

var myNodelist = document.getElementsByClassName("items");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}


var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var divs = this.parentElement;
    var text=divs.textContent;
    
    var yy=[];
    for(var i=0;i<=100;i++)
    {
      if(text[i]==' ' && text[i+1]==' ')
      {
        break;
      }
      else{
        yy.push(text[i]);
      }
    }
    var r = confirm("Are you Sure to Delete?");
  if (r == true) {
    var name=yy.join('');
    myFun1(name);
    location.reload();
  } 
  }
  
}
</script>

<?php
$xxx="SELECT * FROM orders WHERE customer_Id='$rel' AND Status='Ordered' ORDER BY Date DESC, Id DESC";
$sss=mysqli_query($con,$xxx);

        while($a=mysqli_fetch_array($sss))
        {
            $v=(int)$a['Id'];

            $sel="SELECT * FROM orderitem WHERE Order_Id='$v'";
            $r=mysqli_query($con,$sel);
            while($r5=mysqli_fetch_array($r))
            {
            //$r5=mysqli_fetch_array($r);
            $r1=(int)$r5['Product_Id'];
            $q=(int)$r5['Quantity'];
            $o=(int)$r5['Order_Id'];


            $sel123="SELECT * FROM orders WHERE Id='$o'";
            $r11=mysqli_query($con,$sel123);
            $r123=mysqli_fetch_array($r11);
            $sta=$r123['Status'];
            $date=$r123['Date'];

            $sel1="SELECT * FROM product WHERE Id='$r1'";
            $r2=mysqli_query($con,$sel1);
            $r3=mysqli_fetch_array($r2);
            $n=$r3['Name'];
            $p=(int)$r3['Price'];
            $total=$p*$q;
            $totalsum=$totalsum+$total;
            echo "<ul class='ullist' id='ulordered'>
            <li id='ordereditems'>";
            echo "<span class='itemname'>";
            echo $n;
            echo "  ";
            echo "</span>";
            echo "<span class='amount'>";
            echo $p;
            echo "</span>";
           echo "<span class='quantity'>";
            echo $q;
            echo "</span>";
           echo "<span class='status'>";
           echo $sta;
           echo "</span>";
           echo "<span class='total'>";
            echo $total;
            echo "</span>";
            echo "<span class='date'>";
            echo $date;
            echo "</span>";
            echo "</li>
            </ul>";
            }
        }
?>
</html>

