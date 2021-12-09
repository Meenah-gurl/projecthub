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
                        <button>
                            Update Proposal
                        </button>
                    </div>
                </form>
            <?php
        }else{
            ?>
                Does not have a proporsal yets
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


    $('form[name=proposal_form]').on('submit', function(e) {
        e.preventDefault();
        let dis_data = {
            student_id : '<?php echo $stud; ?>',
            proposal: ckedit_data.getData()
        }
        $.ajax({
            type:'POST',
            url:'proposal/update.php',
            data: dis_data,
            dataType:'json',
            success:function(res) {
                if (res.status == 'success') {
                    alert('Update')
                } else {
                    alert('Error')
                }
            }
        })
    })

    
</script>