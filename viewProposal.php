<?php $stud =$_POST['student_id']; include_once 'connect.php'; ?>
<div class="">
    <?php
        $sql = "SELECT * FROM proposal WHERE student_id='$stud'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            ?>
                <form action="" name="proposal_form">
                    <div class="mb-4">
                        <textarea name="proposal" id="editor" class="rounded-lg  bg-opacity-75 shadow-lg "><?php echo $row['proposal'];?></textarea>
                    </div>

                    <div class="mb-4">
                        <button class="py-2 px-2 text-white bg-blue-600 rounded-lg shadow-lg">
                            Update Proposal
                        </button>
                    </div>
                </form>
                <div>
                   
                </div>
            <?php
        }else{
            ?>
                Does not have a proporsal yets
            <?php
        }
    ?>

    <!-- <div>
        <form  method="post" name="form_coment">

        <div>
            <label for="studentId">Student id</label>
            <input type="text" class="border-none outline-none" id="std_id" name="std_id">
        </div>
        <div>
            <label for="studentId">super id</label>
            <input type="text" class="border-none outline-none" id="std_id" name="super_id">
        </div>
        <div class="mb-4">
            <label for="comments" class="block text-lg text-gray-700 font-semibold">Coments</label>
            <textarea name="coments" id="coment" class="block w-full px-2"></textarea>
        </div>

        <div class="mb-4">
        <button class="py-2 px-2 text-white bg-blue-600 rounded-lg shadow-lg">
             Update coment
        </button>
        </div>
        </form>
    </div> -->
</div>
<script>
    var ckedit_data = '';
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        highlight: {
            options: [
                {
                    model: 'greenMarker',
                    class: 'marker-green',
                    title: 'Green marker',
                    color: 'var(--ck-highlight-marker-green)',
                    type: 'marker'
                },
                {
                    model: 'redPen',
                    class: 'pen-red',
                    title: 'Red pen',
                    color: 'var(--ck-highlight-pen-red)',
                    type: 'pen'
                }
            ]
        },
    } )
    .then((editor) => {
        ckedit_data = editor;
        // coment = coments;
    })
    
    .catch( error => {
        console.log( error );
    } );


    $('form[name=proposal_form]').on('submit', function(e) {
        e.preventDefault();
        let dis_data = {
            student_id : '<?php echo $stud; ?>',
            proposal: ckedit_data.getData(),
        }
        $.ajax({
            type:'POST',
            url:'proposal/update.php',
            data: dis_data,
            dataType:'json',
            success:function(res) {
                if (res.status == 'success') {
                    alert('Updated')
                } else {
                    alert('Error')
                }
            }
        })
    })

    // $('form[name=form_coment]').on('submit',function(e) {
    //     e.preventDefault();
    //     let comment_data ={
    //         std_id : ',
    //         // 
    //         alert (std_id);
    //     }

    //     $.ajax({
    //         type:'POST',
    //         URL: 'lec_data.php';
    //         data: comment_data,
    //         dataType: 'json',
    //         success:function res('success') {
    //             success:function(res) {
    //             if (res.status == 'success') {
    //                 alert('Updated')
    //             } else {
    //                 alert('Error')
    //             }
    //         }
    //         }
    //     })
    // })

    
</script>