<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
else
{
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$a="SELECT * FROM customers_registration";
$r=mysqli_query($con,$a);

//Trunacating Table
$t="TRUNCATE TABLE customer_results";
mysqli_query($con,$t);

while($i=mysqli_fetch_array($r))
{

    $id=$i['Id'];
    $email=$i['Email'];
    $order="SELECT * FROM orders WHERE customer_id='$id' AND Status='Ordered'";
    $order1=mysqli_query($con,$order);
    while($z=mysqli_fetch_array($order1))
    {
        $o_id=$z['Id'];
        $date=$z['Date'];
        //echo $o_id.' ';
        //echo $email.' ';
        $orderitem="SELECT * FROM orderitem WHERE Order_Id='$o_id'";
        $orderitem1=mysqli_query($con,$orderitem);
        while($orderitem2=mysqli_fetch_array($orderitem1))
        {
        $oitem_id=$orderitem2['Product_Id'];
        $product="SELECT Name FROM product WHERE Id='$oitem_id'";
        $product1=mysqli_query($con,$product);
        $product2=mysqli_fetch_array($product1);
        $products=$product2[0];
        //echo $products.' ';
        //echo $date.' ';
        //echo '<br>';
        $ins="INSERT INTO customer_results(Email,Products,Date) VALUES ('$email','$products','$date')";
        mysqli_query($con,$ins);
        }
    }

    ////echo $order1;
    //$orderitem="SELECT Product_Id FROM orderitem WHERE Order_Id="
    ////echo $email;
}

$sel="SELECT Email,Products,Date FROM customer_results";
$rows = mysqli_query($con,$sel);
$output="results.csv";
$filename=fopen($output,"w");

foreach ($rows as $line)
{
    fputcsv($filename,$line);
}


$command = escapeshellcmd('ecommerce_apriori.py');
if($output = shell_exec($command))
{
    header('Location:aprioriresults.php');
}
else
{
    echo "Fail";
}
}
?>  