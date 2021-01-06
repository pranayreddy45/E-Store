
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
        <div id="samsunggalaxym10">
                <img src="samsunggalaxym10.jpg">
                <P> <b>Samsung Galaxy M10 (3GB RAM, 32GB STORAGE) </b> </P>
                <p> &#x20b9; 10000 </p>
                
                <p> Battary 3000mah</p>
                <p> Front Camera 10MP</p>
                <p> Rear Camera 16MP</p>
                <p> Color Blue</p>
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
                            var phone="Samsung Galaxy M10";
                            var e = document.getElementById("quantity1");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                            }
                        }
                        </script>
                        
                        </p> 
            </div>
            <div id="samsunggalaxym20">
                <img src="samsunggalaxym20.jpg">
                <P> <b>Samsung Galaxy M20 (3GB RAM, 64GB STORAGE) </b> </P>
                <p> &#x20b9; 12000 </p>
                
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
                            var phone="Samsung Galaxy M20";
                            var e = document.getElementById("quantity2");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                        }
                    }
                        </script>
                        </p> 
            </div>
            <div id="samsunggalaxya50">
                <img src="samsunggalaxya50.jpg">
                <P> <b>Samsung Galaxy A50 (4GB RAM, 64GB STORAGE) </b> </P>
                <p> &#x20b9; 15000 </p>
                
                <p> Battary 4000mah</p>
                <p> Front Camera 16MP</p>
                <p> Rear Camera 32MP</p>
                <p> Color Blue</p>
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
                            var phone="Samsung Galaxy A50";
                            var e = document.getElementById("quantity3");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                        }
                    }
                        </script>
                        </p> 
            </div>
            <div id="samsunggalaxya70">
                <img src="samsunggalaxya70.jpg">
                <P> <b>Samsung Galaxy A70(6GB RAM, 124GB STORAGE) </b> </P>
                <p> &#x20b9; 20000 </p>
                
                <p> Battary 400mah</p>
                <p> Front Camera 16MP</p>
                <p> Rear Camera 32MP</p>
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
                            var phone="Samsung Galaxy A70";
                            var e = document.getElementById("quantity4");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                        }
                    }
                        </script>
                        </p> 
            </div>
            <div id="samsunggalaxynote10">
                <img src="samsunggalaxynote10.jpg">
                <P> <b>Samsung Galaxynote 10 (8GB RAM, 124GB STORAGE) </b> </P>
                <p> &#x20b9; 30000 </p>
                
                <p> Battary 500mah</p>
                <p> Front Camera 16MP</p>
                <p> Rear Camera 48MP</p>
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
                            var phone="Samsung Galaxy Note 10";
                            var e = document.getElementById("quantity5");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                        }
                    }
                        </script>
                        </p> 
            </div>
        </div>
    </body>
</html>