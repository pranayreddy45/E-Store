function myFun1(name)
{
    
    var n=name;
    $.post('cartphp.php',{cartname:n},
    function(data)
    {
        //$('#result').html(data);
        console.log(data);
    });

    
}


