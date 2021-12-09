<?php $stud =$_POST['student_id'];include_once 'connect.php'; ?>
<div class="">
    <?php
        $sql = "SELECT * FROM chapte2 WHERE student_id='$stud'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            ?>
                <textarea name="chapter2" id="editor" class="rounded-lg  bg-opacity-75 shadow-lg "><?php echo $row['chapter2'];?></textarea>
            <?php
        }else{
            ?>
                Does not have a chapter2 yets
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
</script>