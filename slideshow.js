var val=document.getElementById("myUL");
val.style.display="none";

var a=document.getElementById('aaa');
var b=document.getElementById('bbb');
var c=document.getElementById('ccc');
var d=document.getElementById('ddd');

var arr=[a,b,c,d];

var i=0;

myFun1();

function myFun(s)
{
    if(s==-1 && i==0){
        i=3;
    } else if(s==1 && i==3){
        i=0;
    }else if(i>=0 && i<=3){
        i=i+s;
    }else{
        i=0;
    }
    for(var j=0;j<arr.length;j++)
    {
        if(j==i)
        {
            arr[j].style.display="block";
        }else {
            arr[j].style.display="none";
        }
    }
}

function myFun1()
{
    if(i==4)
    {
        i=0;
    }
    for(var j=0;j<arr.length;j++)
    {
        if(j==i)
        {
            arr[j].style.display="block";
        }else {
            arr[j].style.display="none";
        }
    }
    i=i+1;
    setTimeout(myFun1,5000);

}

    function childFun()
    {
        var myWindow=window.open("child.php", "myWindow", config="width=300,height=350,scrollbars=no,resizable=no"); 
        myWindow.moveTo(screen.width-100,(screen.height/2)/2);
        myWindow.focus();

    }

     function mySearch() {
    var val=document.getElementById("search").value;
      var x = document.getElementById("myUL");
        x.style.display = "block";
        if(val=="")
        {
            x.style.display = "none";
        }
    }
    function mySearch1(event) {
      var x = event.keyCode;
      if (x == 27) {  // 27 is the ESC key
        var x = document.getElementById("myUL");
        x.style.display = "none";
      }
    }
   
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    // function mySearch2()
    // {
    //     var x = document.getElementById("myUL");
    //     x.style.display = "none";
    // }
