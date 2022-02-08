<?php
include_once '../connect.php';
include_once  '../notification/Notify.php';  
$notify = new Notify;

$student_id = $_POST['student_id'];
$chapter2 = $_POST['chapter2'];

$sql_string= "UPDATE chapter2 SET chapter2='$chapter2' WHERE student_id='$student_id '";
    if($conn->query($sql_string)){
        $notify->sendNotification('3', $stdid, 'Just updated my chapter two', 'proposal');   
        echo json_encode([
            'status' => 'success'
        ]);
    }else{
        echo json_encode([
            'status' => 'error'
        ]);
    }


?>