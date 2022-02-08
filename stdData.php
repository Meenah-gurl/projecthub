<?php 
    include_once "connect.php";
    $studid = $_POST['student_id'];

    $query = $conn->query("SELECT * FROM users WHERE id='$studid'");

    $student = $query->fetch_assoc(); 
?>
<div class=" mx-auto w-full">
    <div class="bg-blue-600 py-2 px-2 text-center text-gray-100 rounded-md w-full mb-3 text-xl">
        View <?php echo $student['fullname']; ?>'s Project Details
    </div>
    <div class="flex w-full justify-center" id="view" style="">
        <div class="text-center mx-auto grid grid-cols-2 gap-4">
            <button class="getV rounded-md bg-blue-600 py-2 px-2 text-white cursor-pointer w-44" name="viewProposal">View Proposal</button>
            <button class="getV rounded-md bg-blue-600 py-2 px-2 text-white cursor-pointer w-44" name="viewChapterOne">View Chapters 1</button>
            <button class="getV rounded-md bg-blue-600 py-2 px-2 text-white cursor-pointer w-44" name="viewChapterTwo">View Chapters 2</button>
            <button class="getV rounded-md bg-blue-600 py-2 px-2 text-white cursor-pointer w-44" name="viewChapterThree">View Chapters 3</button>
            <button class="getV rounded-md bg-blue-600 py-2 px-2 text-white cursor-pointer w-44" name="viewChapterFour">View Chapters 4</button>
            <button class="getV rounded-md bg-blue-600 py-2 px-2 text-white cursor-pointer w-44" name="viewChapterFive">View Chapters 5</button>
        </div>
    </div>
</div>