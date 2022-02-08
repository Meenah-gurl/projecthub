<?php
include_once '../connect.php';
include_once  '../notification/Notify.php';  
$notify = new Notify;

$student_id = $_POST['student_id'];
$chapter2 = $_POST['chapter5'];

$sql_string= "UPDATE chapter5 SET chapter5='$chapter5' WHERE student_id='$student_id '";
    if($conn->query($sql_string)){
        $notify->sendNotification('3', $stdid, 'Just updated my chapter five', 'chapter');   
        echo json_encode([
            'status' => 'success'
        ]);
    }else{
        echo json_encode([
            'status' => 'error'
        ]);
    }


?>