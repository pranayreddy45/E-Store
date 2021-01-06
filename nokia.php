
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
            <div id="nokia6.1">
                <img src="nokia6.1plus.jpg">
                <P> <b>Nokia6.1 plus (6GB RAM, 64GB STORAGE) </b> </P>
                <p> &#x20b9; 15000 </p>
                
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
                            var phone="Nokia 6.1 plus";
                            var e = document.getElementById("quantity1");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                            }
                        }
                        </script>
                        
                        </p> 
            </div>
            <div id="nokia3.1">
                <img src="nokia3.1plus.jpg">
                <P> <b>Nokia3.1 plus (3GB RAM, 32GB STORAGE) </b> </P>
                <p> &#x20b9; 10000 </p>
                
                <p> Battery 2000mah</p>
                <p> Front Camera 5MP</p>
                <p> Rear Camera 14MP</p>
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
                            var phone="Nokia 3.1 plus";
                            var e = document.getElementById("quantity2");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                        }
                    }
                        </script>
                        </p> 
            </div>
            <div id="nokia5.1">
                <img src="nokia5.1plus.jpg">
                <P> <b>Nokia5.1 plus (4GB RAM, 32GB STORAGE) </b> </P>
                <p> &#x20b9; 12000 </p>
                
                <p> Battary 2500mah</p>
                <p> Front Camera 10MP</p>
                <p> Rear Camera 16MP</p>
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
                            var phone="Nokia 5.1 plus";
                            var e = document.getElementById("quantity3");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                        }
                    }
                        </script>
                        </p> 
            </div>
            <div id="nokia8.1">
                <img src="nokia8.1.jpg">
                <P> <b>Nokia8.1(6GB RAM, 124GB STORAGE) </b> </P>
                <p> &#x20b9; 18000 </p>
                
                <p> Battary 3500mah</p>
                <p> Front Camera 14MP</p>
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
                            var phone="Nokia 8.1";
                            var e = document.getElementById("quantity4");
                            var quan = e.options[e.selectedIndex].value;
                            myFun(phone,quan);
                        }
                    }
                        </script>
                        </p> 
            </div>
            <div id="nokia7">
                <img src="nokia7.jpg">
                <P> <b>Nokia7 (8GB RAM, 124GB STORAGE) </b> </P>
                <p> &#x20b9; 25000 </p>
                
                <p> Battery 3500mah</p>
                <p> Front Camera 16MP</p>
                <p> Rear Camera 32MP</p>
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
                            var phone="Nokia 7";
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