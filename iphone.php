
<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="phone.css">
        <script src="jquery-3.4.1.min.js"> </script>
    </head>
    <body>
    <?php include 'header.php';?>
        <div id="phones">
            <div id="iphonexr">
                <img src="iphonexr.jpg">
                <P> <b>Iphone XR</b> (3GB RAM, 128GB STORAGE) </P>
                <p> &#x20b9; 50000 </p>
                
                <p> Battary 3000mah</p>
                <p> Front Camera 16MP</p>
                <p> Rear Camera 32MP</p>
                <p> Color Black</p>
                <p>  
                
                <select name='quantity' id='quantity1'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                </select>
                <button id="button1"> Buy </button> 
                <script  src="orderitemsinsertion.js"> </script>
                <script>
                document.getElementById('button1').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var phone="Iphone XR";
                    var e = document.getElementById("quantity1");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(phone,quan);
                    }
                }
                </script>
                
                </p> 
            </div>
            <div id="iphone10">
                <img src="iphone10.jpg">
                <P> <b>Iphone X (3GB RAM, 128GB STORAGE) </b> </P>
                <p> &#x20b9; 60000 </p>
                
                <p> Battary 3500mah</p>
                <p> Front Camera 16MP</p>
                <p> Rear Camera 32MP</p>
                <p> Color Black</p>
                <p> 

                <select name="quantity"  id='quantity2'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                </select>
                <button id="button2" type="submit"> Buy </button> 
                <script>
                document.getElementById('button2').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var phone="Iphone X";
                    var e = document.getElementById("quantity2");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(phone,quan);
                }
            }
                </script>
                </p> 
            </div>
            <div id="iphone11">
                <img src="iphone11.jpg">
                <P> <b>Iphone 11 (4GB RAM, 512GB STORAGE) </b> </P>
                <p> &#x20b9; 70000 </p>
                
                <p> Battary 4000mah</p>
                <p> Front Camera 16MP</p>
                <p> Rear Camera 32MP</p>
                <p> Color Black</p>
                <p> 
                <select name="quantity"  id='quantity3'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                </select>
                <button id="button3" type="submit"> Buy </button> 

                <script>
                document.getElementById('button3').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var phone="Iphone 11";
                    var e = document.getElementById("quantity3");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(phone,quan);
                }
            }
                </script>
                </p> 
            </div>
            <div id="iphone7">
                <img src="iphone7.jpg">
                <P> <b>Iphone 7(2GB RAM, 32GB STORAGE) </b> </P>
                <p> &#x20b9; 30000 </p>
                
                <p> Battary 2500mah</p>
                <p> Front Camera 6MP</p>
                <p> Rear Camera 16MP</p>
                <p> Color Black</p>
                <p> 
                <select name="quantity"  id='quantity4'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                </select>
                <button id="button4" type="submit"> Buy </button> 
                
                <script>
                document.getElementById('button4').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var phone="Iphone 7";
                    var e = document.getElementById("quantity4");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(phone,quan);
                }
            }
                </script>
                </p> 
            </div>
            <div id="iphone6">
                <img src="iphone6.jpg">
                <P> <b>Iphone 6 (2GB RAM, 32GB STORAGE) </b> </P>
                <p> &#x20b9; 25000 </p>
                
                <p> Battary 2500mah</p>
                <p> Front Camera 4MP</p>
                <p> Rear Camera 8MP</p>
                <p> Color Blue</p>
                <p> 
                <select name="quantity"  id='quantity5'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                </select>
                <button id="button5" type="submit"> Buy </button> 
                <script>
                document.getElementById('button5').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var phone="Iphone 6";
                    var e = document.getElementById("quantity5");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(phone,quan);
                }
            }
                </script>
                </p> 
            </div>
        </div>
        <!-- <script src="samsung.js"></script> -->
    </body>
    
</html>