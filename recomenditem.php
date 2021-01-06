
<?php
session_start();
$email=$_SESSION['email'];
$item=$_POST['item'];
echo $item;
echo "<br>";
if(strpos($item,'Men')===0||strpos($item,'women')===0)
{
    $item=preg_replace('/\W\w+\s*(\W*)$/', '$1', $item);
}
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$s="SELECT * FROM apriori_results";
$r=mysqli_query($con,$s);
$b=false;
while($i=mysqli_fetch_array($r))
{
    if($item==$i['Item1'])
    {
        $b=true;
        $item2=$i['Item2']; 
    break;   
    } 
}
//echo $item2;

$_SESSION['Item1']=$item;
if($b)
{
$_SESSION['Item2']=$item2;
}
$jsonString = file_get_contents('test.json');
$data = json_decode($jsonString, true);

if(!isset($item2))
{
    $data['recomenditem']="false";
}
else
{
    $data['recomenditem']="true";

$bool=false;
$bool1=false;
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



while($a=mysqli_fetch_array($sel_orderid1))
{

    $v=(int)$a['Id'];
    $sel="SELECT * FROM orderitem WHERE Order_Id='$v'";
    $r=mysqli_query($con,$sel);
    while($r5=mysqli_fetch_array($r))
    {
    $r1=(int)$r5['Product_Id'];
    //$q=(int)$r5['Quantity'];
    $o=(int)$r5['Order_Id'];


    $sel123="SELECT * FROM orders WHERE Id='$o'";
    $r11=mysqli_query($con,$sel123);
    $r123=mysqli_fetch_array($r11);
    //$sta=$r123['Status'];
    //$date=$r123['Date'];

    $sel1="SELECT * FROM product WHERE Id='$r1'";
    $r2=mysqli_query($con,$sel1);
    $r3=mysqli_fetch_array($r2);
    $n=$r3['Name'];
    //$p=(int)$r3['Price'];
    //$total=$p*$q;
    
    if(strpos($n,'Men')===0 || strpos($n,'women')===0)
    {
        $n= preg_replace('/\W\w+\s*(\W*)$/', '$1', $n);
    }
    if($n==$item2)
    {
        $bool=true;
    break;
    }
    }
}
if($bool)
{
    $data['ordered']="true";
}
else
{
    $data['ordered']="false";
}

$date=date("Y/m/d");
$select="SELECT * FROM orders WHERE customer_id='$rel' AND Status='Ordered' AND Date='$date'";
$sel_orderid1=mysqli_query($con,$select);



while($a=mysqli_fetch_array($sel_orderid1))
{

    $v=(int)$a['Id'];
    $sel="SELECT * FROM orderitem WHERE Order_Id='$v'";
    $r=mysqli_query($con,$sel);
    while($r5=mysqli_fetch_array($r))
    {
    $r1=(int)$r5['Product_Id'];
    //$q=(int)$r5['Quantity'];
    $o=(int)$r5['Order_Id'];


    $sel123="SELECT * FROM orders WHERE Id='$o'";
    $r11=mysqli_query($con,$sel123);
    $r123=mysqli_fetch_array($r11);
    //$sta=$r123['Status'];
    //$date=$r123['Date'];

    $sel1="SELECT * FROM product WHERE Id='$r1'";
    $r2=mysqli_query($con,$sel1);
    $r3=mysqli_fetch_array($r2);
    $n=$r3['Name'];
    //$p=(int)$r3['Price'];
    //$total=$p*$q;
    
    if(strpos($n,'Men')===0 || strpos($n,'women')===0)
    {
        $n= preg_replace('/\W\w+\s*(\W*)$/', '$1', $n);
    }
    if($n==$item2)
    {
        $bool1=true;
    break;
    }
    }
}
if($bool1)
{
    $data['alreadyordered']="true";
}
else
{
    $data['alreadyordered']="false";
}

}

$newJsonString = json_encode($data);
file_put_contents('test.json', $newJsonString);
?>
