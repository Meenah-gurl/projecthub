<?php $stud =$_POST['student_id'];include_once 'connect.php'; ?>
<div class="">
    <?php
        $sql = "SELECT * FROM chapter1 WHERE student_id='$stud'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            ?>
                <textarea name="chapter1" id="editor" class="rounded-lg  bg-opacity-75 shadow-lg "><?php echo $row['chapter1'];?></textarea>
            <?php
        }else{
            ?>
                Does not have a chapter1 yets
            <?php
        }
    ?>
</div>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        
    } )
    .catch( error => {
        console.log( error );
    } );
</script>