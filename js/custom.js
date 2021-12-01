$(document).ready(function(){
    $('#togglebtn').on('click', function(){
         $("#sidebar").toggleClass('-left-52');
    });

    $("#display").on('click', function() { 
        $('#view').show(); 
    }); 
    

    $("#view").on('click', function(){
        alert ('hello')
    })

    $(".btn").on('click', function(){
        alert ('hello')
    })
    
});

$('.trow').on('click',function(){
    // console.log($(this).attr('id'));
    console.log('djfkj');
})
 


