<?php 
    include_once "connect.php";
    $studid = $_POST['student_id'];

    $query = $conn->query("SELECT * FROM users WHERE id='$studid'");

    $student = $query->fetch_assoc();
?>
<div class=" mx-auto w-full">
    <div class="bg-green-700 py-2 px-2 text-center text-gray-100 rounded-md w-full mb-3 text-xl">
        View <?php echo $student['fullname']; ?>'s Project Details
    </div>
    
</div>