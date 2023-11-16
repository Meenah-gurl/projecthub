<?php $stud =$_POST['student_id']; include_once 'connect.php'; ?>
<div class="">
    <?php
        $sql = "SELECT * FROM chapter1 WHERE student_id='$stud'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            ?>
                <form action="" name="chapter1_form">
                    <div class="mb-4">
                        <textarea name="chapter1" id="editor" class="rounded-lg  bg-opacity-75 shadow-lg "><?php echo $row['chapter1'];?></textarea>
                    </div>
                    <div class="mb-4">
                        <button class="py-2 px-2 text-white bg-green-700 rounded-lg shadow-lg">
                            Update Chapter One
                        </button>
                    </div>
                </form>
            <?php
        }else{
            ?>
                Does not have chapter one yet.
            <?php
        }
    ?>
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
    })
    .catch( error => {
        console.log( error );
    } );


    $('form[name=chapter1_form]').on('submit', function(e) {
        e.preventDefault();
        let dis_data = {
            student_id : '<?php echo $stud; ?>',
            chapter1: ckedit_data.getData()
        }
        $.ajax({
            type:'POST',
            url:'chapter_one/update.php',
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

    
</script>