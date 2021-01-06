<?php
session_start();
$item1=$_SESSION['Item1'];
$item2=$_SESSION['Item2'];
$email=$_SESSION['email'];
// $totalsum=0;
// $total=0;
echo "<h2> Recomendation </h2>";
echo $item2;


if($item2=='Iphone XR')
{
    echo "<img src='iphonexr.jpg' onclick='myFun1()'>";
}

if($item2=='Iphone X')
{
    echo "<img src='iphone10.jpg' onclick='myFun1()'>";
}

if($item2=='Iphone 11')
{
    echo "<img src='iphone11.jpg' onclick='myFun1()'>";
}

if($item2=='Iphone 7')
{
    echo "<img src='iphone7.jpg' onclick='myFun1()'>";
}

if($item2=='Iphone 6')
{
    echo "<img src='iphone6.jpg' onclick='myFun1()'>";
}

if($item2=='Nokia 6.1 plus')
{
    echo "<img src='nokia6.1plus.jpg' onclick='myFun2()'>";
}

if($item2=='Nokia 5.1 plus')
{
    echo "<img src='nokia5.1plus.jpg' onclick='myFun2()'>";
}

if($item2=='Nokia 3.1 plus')
{
    echo "<img src='nokia3.1plus.jpg' onclick='myFun2()'>";
}

if($item2=='Nokia 8.1')
{
    echo "<img src='nokia8.1.jpg' onclick='myFun2()'>";
}

if($item2=='Nokia 7')
{
    echo "<img src='nokia7.jpg' onclick='myFun2()'>";
}


if($item2=='Samsung Galaxy M10')
{
    echo "<img src='samsunggalaxym10.jpg' onclick='myFun3()'>";
}

if($item2=='Samsung Galaxy M20')
{
    echo "<img src='samsunggalaxym20.jpg' onclick='myFun3()'>";
}

if($item2=='Samsung Galaxy A50')
{
    echo "<img src='samsunggalaxya50.jpg' onclick='myFun3()'>";
}

if($item2=='Samsung Galaxy A70')
{
    echo "<img src='samsunggalaxya70.jpg' onclick='myFun3()'>";
}

if($item2=='Samsung Galaxy Note 10')
{
    echo "<img src='samsunggalaxynote10.jpg' onclick='myFun3()'>";
}

if($item2=='Men cobalt checks shirt')
{
    echo "<img src='shirt1.jpg' onclick='myFun4()'>";
}

if($item2=='Men brown formal shirt')
{
    echo "<img src='shirt2.jpg' onclick='myFun4()'>";
}

if($item2=='Men white checks shirt')
{
    echo "<img src='shirt3.jpg' onclick='myFun4()'>";
}

if($item2=='Men skyblue casual shirt')
{
    echo "<img src='shirt4.jpg' onclick='myFun4()'>";
}

if($item2=='Men blue plain shirt')
{
    echo "<img src='shirt5.jpg' onclick='myFun4()'>";
}


if($item2=='women printed kurtha')
{
    echo "<img src='women1.jpg' onclick='myFun5()'>";
}



if($item2=='women a line kurtha')
{
    echo "<img src='women2.jpg' onclick='myFun5()'>";
}


if($item2=='women straight digital print kurtha')
{
    echo "<img src='women3.jpg' onclick='myFun5()'>";
}


if($item2=='Women gold printed sleeveless kurta')
{
    echo "<img src='women4.jpg' onclick='myFun5()'>";
}


if($item2=='women rayon kurthi')
{
    echo "<img src='women5.jpg' onclick='myFun5()'>";
}

echo "<script> 
function myFun1()
{
    opener.location.href='iphone.php';
    close();
} 

function myFun2()
{
    opener.location.href='nokia.php';
    close();
} 

function myFun3()
{
    opener.location.href='samsung.php';
    close();
} 

function myFun4()
{
    opener.location.href='shirt.php';
    close();
} 

function myFun5()
{
    opener.location.href='womendress.php';
    close();
} 
</script>";

?>
