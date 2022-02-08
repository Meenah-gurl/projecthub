<?php $stud =$_POST['student_id'];include_once 'connect.php'; ?>
<div class="">
<?php
    $sql = "SELECT * FROM chapter2 WHERE student_id='$stud'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        ?>
            <form action="" name="chapter2_form">
                <div class="mb-4">
                    <textarea name="chapter1" id="editor" class="rounded-lg  bg-opacity-75 shadow-lg "><?php echo $row['chapter2'];?></textarea>
                </div>
                <div class="mb-4">
                    <button class="py-2 px-2 text-white bg-blue-600 rounded-lg shadow-lg">
                        Update Chapter Two
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
<script src="ckeditor5/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        
    } )
    .catch( error => {
        console.log( error );
    } );


    $('form[name=chapter2_form').on('submit', function(e) {
        e.preventDefault();
        let dis_data = {
            student_id : '<?php echo $stud; ?>',
            chapter1: ckedit_data.getData()
        }
        $.ajax({
            type:'POST',
            url:'chapter_two/update.php',
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