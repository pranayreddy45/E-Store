
<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="shirt.css">
        <script src="jquery-3.4.1.min.js"> </script>
    </head>
    <body>
    <?php include 'header.php';?>
        <div id="dress">
            <div id="shirt1">
                <img src="shirt1.jpg">
                <P> <b> Men Checks Shirt </b> </P>
                <p> &#x20b9; 1000 </p>
                <p> Material: Cotton</p>
                <p>Size
                <select id="size1">
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="42">42</option>
                    <option value="44">44</option>
                </select>  </p>
                <p> Color: Cobalt</p>
                <p> Fit Type: Regular</p>
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
                    var s = document.getElementById("size1");
                    var x = s.options[s.selectedIndex].value;
                    var shirt="Men cobalt checks shirt ";
                    var name=shirt.concat(x);
                    var e = document.getElementById("quantity1");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(name,quan);
                    }
                }
                </script>
                
                </p> 
            </div>
            <div id="shirt2">
                <img src="shirt2.jpg">
                <P> <b> Men Formal Shirt </b> </P>
                <p> &#x20b9; 1200 </p>
                <p> Material: Cotton</p>
                <p>Size
                <select id="size2">
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="42">42</option>
                    <option value="44">44</option>
                </select>  </p>
                <p> Color: Brown</p>
                <p> Fit Type: Slim </p>
                <p>  
                
                <select name='quantity' id='quantity2'>
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
                <button id="button2"> Buy </button> 
                <script  src="orderitemsinsertion.js"> </script>
                <script>
                document.getElementById('button2').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var s = document.getElementById("size2");
                    var x = s.options[s.selectedIndex].value;
                    var shirt="Men brown formal shirt ";
                    var name=shirt.concat(x);
                    var e = document.getElementById("quantity2");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(name,quan);
                    }
                }
                </script>
                
                </p> 
            </div>
            <div id="shirt3">
                <img src="shirt3.jpg">
                <P> <b> Men Checks Shirt </b> </P>
                <p> &#x20b9; 1500 </p>
                <p> Material: Cotton</p>
                <p>Size
                <select id="size3">
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="42">42</option>
                    <option value="44">44</option>
                </select>  </p>
                <p> Color: White</p>
                <p> Fit Type: Slim </p>
                <p>  
                
                <select name='quantity' id='quantity3'>
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
                <button id="button3"> Buy </button> 
                <script  src="orderitemsinsertion.js"> </script>
                <script>
                document.getElementById('button3').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var s = document.getElementById("size3");
                    var x = s.options[s.selectedIndex].value;
                    var shirt="Men white checks shirt ";
                    var name=shirt.concat(x);
                    var e = document.getElementById("quantity3");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(name,quan);
                    }
                }
                </script>
                
                </p> 
            </div>
            <div id="shirt4">
                <img src="shirt4.jpg">
                <P> <b> Men Casual Shirt </b> </P>
                <p> &#x20b9; 500 </p>
                <p> Material: Cotton</p>
                <p>Size
                <select id="size4">
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="42">42</option>
                    <option value="44">44</option>
                </select>  </p>
                <p> Color: Sky blue</p>
                <p> Fit Type: Regular </p>
                <p>  
                
                <select name='quantity' id='quantity4'>
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
                <button id="button4"> Buy </button> 
                <script  src="orderitemsinsertion.js"> </script>
                <script>
                document.getElementById('button4').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var s = document.getElementById("size4");
                    var x = s.options[s.selectedIndex].value;
                    var shirt="Men skyblue casual shirt ";
                    var name=shirt.concat(x);
                    var e = document.getElementById("quantity4");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(name,quan);
                    }
                }
                </script>
                
                </p> 
            </div>
            <div id="shirt5">
                <img src="shirt5.jpg">
                <P> <b> Men Plain Shirt </b> </P>
                <p> &#x20b9; 800 </p>
                <p> Material: Cotton</p>
                <p>Size
                <select id="size5">
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="42">42</option>
                    <option value="44">44</option>
                </select>  </p>
                <p> Color: Blue</p>
                <p> Fit Type: Slim</p>
                <p>  
                
                <select name='quantity' id='quantity5'>
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
                <button id="button5"> Buy </button> 
                <script  src="orderitemsinsertion.js"> </script>
                <script>
                document.getElementById('button5').onclick=function()
                {
                    var r = confirm("Add To Cart?");
                    if(r==true)
                    {
                    var s = document.getElementById("size5");
                    var x = s.options[s.selectedIndex].value;
                    var shirt="Men blue plain shirt ";
                    var name=shirt.concat(x);
                    var e = document.getElementById("quantity5");
                    var quan = e.options[e.selectedIndex].value;
                    myFun(name,quan);
                    }
                }
                </script>
                
                </p> 
            </div>
        </div>
    </body>
</html>