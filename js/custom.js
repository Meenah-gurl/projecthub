$(document).ready(function(){
    $('#togglebtn').on('click', function(){
         $("#sidebar").toggleClass('-left-52');
    });

    $(".display").on('click', function() { 
        $data = {student_id:$(this).attr('id')}
        $.ajax({
            type:'POST',
            url:'stdData.php',
            data:$data,
            dataType:'html',
            success:function(res) {
                $('.Data').html(res);
                $('#current_content').html('');
            }
            
        })

    });

    
    // $('.Data').on('click','.getV', function() {
    //     $('#'+$(this).attr('name')).removeClass('hidden')
    //     $('#'+$(this).attr('name')).siblings().addClass('hidden')
    // })
    // $('.Data').on('click', '.getV', function(){
    //     let current = $(this).attr('name');
    //     if (current == 'viewProposal') {
    //         $('#selectedChapter').text('Proposal');
    //         $.ajax({
    //             type:'POST',
    //             url:'viewProposal.php',
    //             data:$data,
    //             dataType:'html',
    //             success:function(response) {
    //                 $('#current_content').html(response)
    //             }
    //         })
    //     } else{
    //         alert ('Error');
    //     }
    // })

    $('.Data').on('click','.getV', function() {
        let current = $(this).attr('name');

        if (current == 'viewProposal') {
            $('#selectedChapter').text('Proposal');
            $.ajax({
                type:'POST',
                url:'viewProposal.php',
                data:$data,
                dataType:'html',
                success:function(response) {
                    $('#current_content').html(response)
                }
            })
        } else if(current == 'viewChapterOne') {
            $('#selectedChapter').text('Chapter One');
            $.ajax({
                type:'POST',
                url:'viewChapterOne.php',
                data:$data,
                dataType:'html',
                success:function(res3) {
                    $('#current_content').html(res3);
                }
            })
        }else if(current == 'viewChapterTwo'){
            $('#selectedChapter').text('Chapter Two');
            $.ajax({
                type:'POST',
                url:'viewChapterTwo.php',
                data:$data,
                dataType:'html',
                success:function(res3) {
                    $('#current_content').html(res3);
                }
            })
                
        } else if(current == 'viewChapterThree') {
            $('#selectedChapter').text('Chapter Three');
            $.ajax({
                type:'POST',
                url:'viewChapterThree.php',
                data:$data,
                dataType:'html',
                success:function(res3) {
                    $('#current_content').html(res3);
                }
            })
        } else if (current == 'viewChapterFour'){
            $('#selectedChapter').text('Chapter Four');
            $.ajax({
                type:'POST',
                url:'viewChapterFour.php',
                data:$data,
                dataType:'html',
                success:function(res3) {
                    $('#current_content').html(res3);
                }
            })
        } else if (current == 'viewChapterFive'){
            $('#selectedChapter').text('Chapter Five');
            $.ajax({
                type:'POST',
                url:'viewChapterFive.php',
                data:$data,
                dataType:'html',
                success:function(res3) {
                    $('#current_content').html(res3);
                }
            })
        }
    })

    $('.toggleNotification').on('click',function () {
        $('.noti').toggleClass('hidden')
    })


    
    

    $("#view").on('click', function(){
        alert ('hello')
    })

    $(".btn").on('click', function(){
        alert ('hello')
    })
    
});

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

$(document).getElementByID

$('.trow').on('click',function(){
    // console.log($(this).attr('id'));
    console.log('djfkj');
})
 


