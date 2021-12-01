<?php
    include_once '../connect.php';
    $action=$_POST['action'];
    if ($action == 'searchForLecture') {
        $name = $_POST['name'];
        if ($name == '') {
            $query_str = "SELECT * FROM users WHERE role=''";
        }else {
            $query_str = "SELECT * FROM users WHERE role='' AND fullname LIKE '%". $name ."%'";
        }
        $result = mysqli_query($conn, $query_str);
        $lecturesM=[];
        while ($lecture = mysqli_fetch_array($result)) {
            array_push($lecturesM, $lecture);
        }
        echo json_encode([
            'type'=>'lecture',
            'lectures'=>$lecturesM
        ]);
    }elseif ($action == 'searchForStudent') {
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
    }elseif ($action == 'assign') {
        $std_id=$_POST['student'];
        $super_id=$_POST['lecturer'];

        $sql_string="INSERT INTO assign(std_id, supervisor_id)
        VALUES('".$std_id."', '".$super_id."')";
        
        if($conn->query($sql_string)){
            echo json_encode([
                'mes'=>'Assigned Successfully'
            ]);
        }else{
            echo json_encode([
                'mes'=>'Assigned error'
            ]);
        }
    }
?>