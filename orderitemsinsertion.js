var b='true';

function myFun(phone,quan)
{
    var p=phone;
    var q=quan;
    $.post('orderitemsinsertion.php',{name:p,quantity:q},
    function(data) //The optional callback parameter is the name of a function to be executed if the request succeeds.
    {
        //$('#result').html(data);
        console.log(data);
        myalert(data);  
    });  
    
}
function myalert(data)
{
    var len=data.length;
    var x='';
    for(i=0;i<len-22;i++)
    {
        x=x+data[i];
    }
    //alert(x);
    $.ajax({
        url:'recomenditem.php',
        method:'POST',
        data:{item:x},
        success:function(response)
        {
            if(response)
            {
                console.log(response);
                mychild();
            }
            else
                alert("SomeThing Went Wrong");
        }
        });
}

// function myfun1(x)
// {
//     var username=x;
//     $.ajax({
//         url:'iphone.php',
//         method:'post',
//         data:{name:username},
//         success:function(data)
//         {
//         alert("Sucess");
//         },
//         error:function(data)
//         {
//         alert("error");
//         }
//         });
// }


function mychild()
{
        var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        console.log(myObj);
        //document.getElementById("demo").innerHTML = myObj.b;
        var bool=myObj.b;
        var recomenditem=myObj.recomenditem;
        var ordered=myObj.ordered;
        var alreadyordered=myObj.alreadyordered;

        
    if(bool=='true' && recomenditem=='true' && ordered=='false' && alreadyordered=='false')
    {
    var myWindow=window.open("recomenditem1.php", "myWindow", config="width=250,height=500,scrollbars=no,resizable=no"); 
    myWindow.moveTo(screen.width-300,(screen.height/2)/2);
    myWindow.focus();
    }
    }
    };
    xmlhttp.open("GET", "test.json", true);
    xmlhttp.send();
   
}