<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="css/tailwind.min.css" rel="stylesheet"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="AOS/aos-master/aos-master/dist/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    table, th, td {
        border: 1px solid black;    
        border-collapse: collapse;  
    }
</style>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="sticky top-0 w-full  z-10">
        <?php include_once 'page_head.php'; ?>
    </header>

    <!-- Side Bar -->
    <?php 
        // include_once 'sidebar.php'; 
        include_once  'script.php';
        include_once 'sidebar_lec.php';

    ?>

    <!-- Main Content -->
    <div id="main" class="min-h-screen -mr-0 md:mr-80  py-3 px-4 md:px-8">
        <div class="bg-blue-500 rounded-xl py-4 px-4 text-white shadow-xl">
            <h2 class="text-2xl">
               Lecturer  Dashboard
            </h2>
        </div>

        <!-- Other Content -->
        <div class="mt-5 grid md:grid-cols-2 grid-cols-1 gap-4">
            <div class="px-4 h-full">
                <div class="overflow-y-scroll">
                    <?php
                        include_once 'connect.php';

                        $sql = "SELECT * FROM users";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                ?>
                                    <table>
                                        <thead >
                                            <tr > 
                                                <th class="px-2 py-2">id</th>
                                                <th class="px-2 py-2">fullname</th>
                                                <th class="px-2 py-2">regno</th>
                                                <th class="px-2 py-2">level</th>
                                                <th class="px-2 py-2">programme</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="overflow-y-auto trow">
                                                <?php
                                                    $id = 0;
                                                    while($row = mysqli_fetch_array($result)){
                                                        if ($row['role'] != 'admin'){
                                                            if ($row['role'] == 'student') {
                                                                $id++;
                                                                ?>
                                                                <tr class="" id="<?php echo $row['id'] ?>">
                                                                    <td  class="py-2 px-2"><?php echo $id ?></td>
                                                                    <td class="py-2 px-2"> <?php echo $row['fullname'] ?></td>
                                                                    <td class="py-2 px-2"> <?php echo $row['regno'] ?></td>
                                                                    <td class="py-2 px-2"> <?php echo $row['level'] ?></td>
                                                                    <td class="py-2 px-2"> <?php echo $row['programme'] ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                           
                                                            
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </tbody>
                                    </table>
                                <?php



                                // echo "<table border=1>";
                                //     echo "<tr class=' text-gray-700'>";
                                //         echo "<th class='py-2 px-2'>id</th>";
                                //         echo "<th class='py-2 px-2'>fullname</th>";
                                //         echo "<th class='py-2 px-2'>regno</th>";
                                //         echo "<th class='py-2 px-2'>level</th>";
                                //         echo "<th class='py-2 px-2'>programme</th>";
                                //     echo "</tr>";
                                
                                // while($row = mysqli_fetch_array($result)){
                                //     if ($row['role'] != 'admin') {
                                //         echo '<button id="show_con" class="cursor-pointer">
                                //                 <tr id="shoow_con" data-href="#">
                                //                     <td <input type="button" id="display"  class="py-2 px-2"> ' . $row['id'] . '</td>
                                //                     <td class="py-2 px-2"> ' . $row['fullname'] . '</td>
                                //                     <td class="py-2 px-2"> ' . $row['regno'] . '</td>
                                //                     <td class="py-2 px-2"> ' . $row['level'] . '</td>
                                //                     <td class="py-2 px-2"> ' . $row['programme'] . '</td>
                                //                 </tr>
                                //             </button>';
                                //     }
                                // }
                                // echo "</table>";
                            
                                // mysqli_free_result($result);
                            } else{
                                echo "No records";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        
                    
                    ?>
                </div>
                
            </div>

            <div class=" mx-auto w-full">
                <div class="bg-blue-600 py-2 px-2 text-center text-gray-100 rounded-md w-full mb-3">
                    View Material
                </div>
                <div class="grid md:grid-cols-2 grid-cols-2 gap-3 mb-3" id="view" style="display: none;">
                    <div class="rounded-md bg-blue-600 py-2 px-2 text-white text-center">
                        <button class="" name="vproposal">View Proposal</button>
                    </div>
                    <div class="rounded-md bg-blue-600 py-2 px-2 text-white text-center">
                        <button class="" name="vchapter">View Chapters</button>
                    </div>
                </div>

                <div class="w-full bg-white shadow-xl rounded-lg px-2 py-2 text-gray-700 ">
                    <div class="overflow-y-scroll h-96 px-2">
                        <form action="" method="post">
                            <p name="details" class="mb-5 text-justify"><?php  

                                if(isset($_POST['vproposal'])){
                                                    
                                    $student_id = $_POST['student_id'];
                                    $topic =($_POST['topic']);
                                    $motivation =($_POST['motivation']);
                                    $proposal =($_POST['proposal']);

                                    $query_str = "SELECT * FROM proposal WHERE student_id='$student_id' AND topic='$topic' AND motivation='$motivation' AND proposal='$proposal'";

                                    $result = mysqli_query($conn, $query_str);

                                    $num_rows = mysqli_num_rows($result);

                                    // if($num_rows > 0){
                                    //     $user_data = mysqli_fetch_assoc($result);
                                    //     $_SESSION['email'] = $user_data['email'];
                                    //     $_SESSION['password'] = $user_data['password'];
                                    //     // echo $query_str;
                                    //     echo $user_data['role'];
                                    //     if ($user_data['role'] == 'student') {
                                    //         header('location:dashboard.php');
                                    //     }else if ($user_data['role'] == 'admin') {
                                    //         header('location:lec_dashboard.php');
                                    //     }else{
                                    //         echo "You are not a Student";
                                    //     }
                                        
                                    // }else{
                                    //     echo "Invalid Login Details";
                                    // }
                                }
                            ?>
                                INTRODUCTION
                                The project Clinical Information Management system will include registration of patients, storing their details into the system, and also computerized billing in the pharmacy, and labs. The software will have the facility to give a unique ID for every patient and stores the details of every patient and the staff automatically. User can search availability of a doctor and the details of a patient using the ID. The Clinical Information Management System can be entered using a username and password. It will be accessible either by an administrator, doctor or patient. Only will be able to add data into the database of this system. The data can be retrieved easily. The interface will be designed in such a well that it will be user-friendly. 
                                It will be designed for multispecialty hospitals, to cover a wide range of hospital administration and management processes. It will develop as an integrated end-to-end Hospital Management System that provides relevant information across the hospital to support effective decision making for patient care, hospital administration and critical financial accounting, in a seamless flow. 
                                BACKGROUND OF STUDY
                                Federal Polytechnic Nekede Medical Centre which is the case study of this project is based upon is a hospital located inside of Federal Polytechnic Nekede Owerri, Imo State. The clinical centre records huge number of patients on daily bases for different forms of treatments. With the increasing number of patients in the hospital, the existing methods of keeping patients records is becoming increasingly inconveniencing to the management.
                            </p>

                            <div class="mb-3">
                                <label for="Comments" class="bg-blue-600 text-white rounded-md py-1 px-2 block mb-3 w-24 mx-auto">Comments</label>
                                <textarea name="" id=""  class="block bg-gray-200 w-full text-gray-700 px-2"></textarea>
                            </div>
                            <div class="bg-blue-600 py-1 px-2 rounded-md text-white text-center w-20 float-right">
                                <button class="text-center">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include_once 'script.php'; ?>
   
</body>
</html>
