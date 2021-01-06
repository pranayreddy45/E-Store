<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
?>
<html>
<head>
<script src="jquery-3.4.1.min.js"> </script>
<style>
body {
  margin: 0;
  min-width: 1000px;
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


/* #myULlist li:nth-child(odd) {
  background-color: #f9f9f9;
} */



#myULlist li
{
    background: #f9f9f9;
}

#myULlist li:hover {
  background: #ddd;
}

.id
{
    position:absolute;
    left:50px;
}
.support
{
    position:absolute;
    left:100px;
}
.item1
{
    position:absolute;
    left:325px;
}
.item2
{
    position:absolute;
    left:550px;
}
.confidence
{
    position:absolute;
    left:800px;
}
.lift
{
  position:absolute;
  left:1000;
}

</style>
</head>
</html>
<?php include 'header.php';?>

<?php

$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sel="SELECT * FROM apriori_results";
$r=mysqli_query($con,$sel);
echo "<ul class='ullist'>
        <li> <h2> Note: Used Apriori Algorith maximum items of 2.  </h2> </li>
        <li id='listheader'><span class='id'><b>Id</b></span>";
        echo "  ";
        
        echo "<span class='support'><b>Support</b></span>";
        
        echo "<span class='item1'><b>Item1</b></span>";
        
        echo "<span class='item2'><b>Item2</b></span>";
        echo " ";
        
        echo "<span class='confidence'><b>Confidence</b></span>";
        echo " ";
        echo "<span class='lift'><b>Lift</b></span>";
        echo "</li></ul>";
while($i=mysqli_fetch_array($r))
{
  echo "<ul class='ullist' id='myULlist'>
            <li id='items'>";
            echo "<span class='id'>";
            echo $i['Id'];
            echo "  ";
            echo "</span>";
            
            echo "<span class='support'>";
            echo $i['Support'];
            echo "</span>";
          
           echo "<span class='item1'>";
            echo $i['Item1'];
            echo "</span>";
           
           echo "<span class='item2'>";
           echo $i['Item2'];
           echo "</span>";
           
           echo "<span class='confidence'>";
            echo $i['Confidence'];
            echo "</span>";

            echo "<span class='lift'>";
            echo $i['Lift'];
            echo "</span>";
            echo "</li>
            </ul>";
}
?>

