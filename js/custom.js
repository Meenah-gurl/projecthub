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
        // $.ajax({
        //     type:'POST',
        //     url:'viewProposal.php',
        //     data:$data,
        //     dataType:'html',
        //     success:function(res2) {
        //         $('.viewProposal').html(res2)
        //     }
        // })
        // $.ajax({
        //     type:'POST',
        //     url:'viewChapterOne.php',
        //     data:$data,
        //     dataType:'html',
        //     success:function(res3) {
        //         $('.viewChapterOne').html(res3);
        //     }
        // })

        // $.ajax({
        //     type:'POST',
        //     url:'viewChapterTwo.php',
        //     data:$data,
        //     dataType:'html',
        //     success:function(res4) {
        //         $('.viewChapterTwo').html(res4)
        //     }
        // })

        // $.ajax({
        //     type:'POST',
        //     url:'viewChapterThree.php',
        //     data:$data,
        //     dataType:'html',
        //     success:function(res5) {
        //         $('.viewChapterThree').html(res5)
        //     }
        // })

        // $.ajax({
        //     type:'POST',
        //     url:'viewChapterFour.php',
        //     data:$data,
        //     dataType:'html',
        //     success:function(res6) {
        //         $('.viewChapterFour').html(res6)
        //     }
        // })

        // $.ajax({
        //     type:'POST',
        //     url:'viewChapterFive.php',
        //     data:$data,
        //     dataType:'html',
        //     success:function(res7) {
        //         $('.viewChapterFive').html(res7)
        //     }
        // })
    });

    // $('.Data').on('click','.getV', function() {
    //     $('#'+$(this).attr('name')).removeClass('hidden')
    //     $('#'+$(this).attr('name')).siblings().addClass('hidden')
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
                    $('.viewChapterOne').html(res3);
                }
            })
        }
    })



    
    

    $("#view").on('click', function(){
        alert ('hello')
    })

    $(".btn").on('click', function(){
        alert ('hello')
    })
    
});

$(document).getElementByID

$('.trow').on('click',function(){
    // console.log($(this).attr('id'));
    console.log('djfkj');
})
 


