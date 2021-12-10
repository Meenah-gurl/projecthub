<?php
    include_once '../connect.php';
    $action=$_POST['action'];
    if ($action == 'searchForStudent') {
        $name = $_POST['name'];
        if ($name == '') {
            $query_str = "SELECT * FROM users WHERE role='student'";
        }else {
            $query_str = "SELECT * FROM users WHERE role='student' AND fullname LIKE '%". $name ."%' OR level LIKE '%" . $name . "%' OR regno LIKE '%".$name."%'";
        }
        $result = mysqli_query($conn, $query_str);
        $studentM=[];
        while ($student = mysqli_fetch_array($result)) {
            array_push($studentM, $student);
        }
        echo json_encode([
            'type'=>'student',
            'students'=>$studentM
        ]);
    
    }else{
        echo json_encode([
            'mes'=>'error'
        ]);
    }
?>