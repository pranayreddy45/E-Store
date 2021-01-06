<?php
session_start();
$quantity=$_POST['quantity'];
$name=$_POST['name'];
$email=$_SESSION['email'];
//echo ("Name: ");
echo $name;
//echo("Quantity ");
//echo $quantity;
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$checkitems=0;
$order=0;
$date=date("Y/m/d");

$sel_productid="SELECT Id FROM product WHERE Name='$name'";
$sel_productid1=mysqli_query($con,$sel_productid);
$sel_productid2=mysqli_fetch_array($sel_productid1);
//echo("Product Id: ");
//echo $sel_productid2[0];
$rel1 = (int)$sel_productid2[0];

$sel_userid="SELECT Id FROM customers_registration WHERE Email='$email'";
        $sel_userid1=mysqli_query($con,$sel_userid);
        $sel_userid2=mysqli_fetch_array($sel_userid1);
        //echo ("Customer Id: ");
        //echo $sel_userid2[0];
        $rel = (int)$sel_userid2[0];


        $sel_userid10="SELECT * FROM orders WHERE customer_id='$rel' AND Status='Not Ordered' AND Date='$date'";
        $sel_userid11=mysqli_query($con,$sel_userid10);
        while($r77=mysqli_fetch_array($sel_userid11))
        {
            $order=1; 

            $xx=(int)$r77['Id'];

            $sel="SELECT Id FROM orderitem WHERE Order_Id='$xx' AND Product_Id='$rel1'";
            $check=mysqli_query($con,$sel);  
            if(mysqli_num_rows($check)>=1)
            {
                $checkitems=1;
                break;
            } 
        }
if($checkitems>=1)
{
    
    $sel_orderid="SELECT * FROM orders WHERE customer_id='$rel'";
    $sel_orderid1=mysqli_query($con,$sel_orderid);  
    while($x=mysqli_fetch_array($sel_orderid1))
    {
        $y=(int)$x['Id'];
        $s="SELECT Quantity FROM orderitem WHERE Product_Id='$rel1' AND Order_Id='$y'";
        $s1=mysqli_query($con,$s);
        if(mysqli_num_rows($s1)>=1)
        {
        $s2=mysqli_fetch_array($s1);
        $mul=$s2[0]+$quantity;
        $u="UPDATE orderitem SET Quantity='$mul' WHERE Product_Id='$rel1' AND Order_Id='$y'";
        $u1="UPDATE orders SET Date='$date' WHERE Id='$y'";
        mysqli_query($con,$u);
        mysqli_query($con,$u1);
        }
    }
}
else if($order>0)
{
        $sel_orderid="SELECT Id FROM orders WHERE customer_id='$rel' ORDER BY Id DESC LIMIT 1";
        $sel_orderid1=mysqli_query($con,$sel_orderid);
        $sel_orderid2=mysqli_fetch_array($sel_orderid1);
        $rel2 = (int)$sel_orderid2[0];

        $in1="INSERT INTO orderitem(Order_id, Product_id, Quantity) VALUES ('$rel2', '$rel1', '$quantity')";
        mysqli_query($con,$in1);
}
else
{
        $in="INSERT INTO orders(customer_id,Status,Date) VALUES ('$rel','Not Ordered','$date')";
        mysqli_query($con,$in);

        

        $sel_orderid="SELECT Id FROM orders WHERE customer_id='$rel' ORDER BY Id DESC LIMIT 1";
        $sel_orderid1=mysqli_query($con,$sel_orderid);
        $sel_orderid2=mysqli_fetch_array($sel_orderid1);
        $rel2 = (int)$sel_orderid2[0];

        $in1="INSERT INTO orderitem(Order_id, Product_id, Quantity) VALUES ('$rel2', '$rel1', '$quantity')";
        mysqli_query($con,$in1);

}


?>

    

        

