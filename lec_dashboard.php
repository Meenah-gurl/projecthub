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
    
<style>
    .ck-content.ck-editor__editable{
        min-height: 300px;
        max-height: 400px;
        max-width: 100%;
    
        /* background-color: transparent !important; */
    }
</style>
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
        include_once  'notification/Notify.php';    
       

    ?>

    <!-- Main Content -->
    <div id="main" class="min-h-screen -mr-0 md:mr-80  py-3 px-4 md:px-8">
        <div class="bg-blue-500 rounded-xl py-4 px-4 text-white shadow-xl mb-7">
            <h2 class="text-2xl">
               Lecturer  Dashboard
            </h2>
        </div>


        

        <!-- Other Content -->
        <div class="mt-5 grid md:grid-cols-2 grid-cols-1 gap-4">
            <div class="px-4 h-full mb-5">
                <div class="overflow-y-scroll">
                    <!-- search -->
                
                    <?php
                        include_once 'connect.php';


                        $sql = "SELECT * FROM users";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                ?>
                                    <input type="text" class="mb-3 border-none outline-none bg-gray-100" name="search" id="search" placeholder="Search for names..">
                                    <table id="myTable">
                                        <thead >
                                              
                                                <th class="px-2 py-2">id</th>
                                                <th class="px-2 py-2">fullname</th>
                                                <th class="px-2 py-2">regno</th>
                                                <th class="px-2 py-2">level</th>
                                                <th class="px-2 py-2">programme</th>
                                            
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
                                                                <tr class=""<?php echo $row['id'] ?>>
                                                                    <td  class="py-2 px-2"><?php echo $id ?></td>
                                                                    <td class="py-2 px-2"> <a href="#" id="<?php echo $row['id'] ?>" class="display" > <?php echo $row['fullname'] ?> </a></td>
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

                            } else{
                                echo "No records";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        
                    
                    ?>
                </div>
                
            </div>
            <div class="">
                <div class="Data">
                    <div class="text-2xl text-gray-500 py-5 text-center">Select a student</div>
                </div>
    
            </div>
        </div>
        <div class="w-full max-w-6xl mx-auto mt-5">
            <h2 class="text-xl" id="selectedChapter">
                
            </h2>
            <div id="current_content">
                <!-- <div id="viewProposal" class="viewProposal"></div>
                <div id="viewChapterOne" class="viewChapterOne hidden"></div>
                <div id="viewChapterTwo" class="viewChapterTwo hidden"></div>
                <div id="viewChapterThree" class="viewChapterThree hidden"></div>
                <div id="viewChapterFour" class="viewChapterFour hidden"></div>
                <div id="viewChapterFive" class="viewChapterFive hidden"></div> -->
            </div>


            <div class="mx-auto">
                <form  method="post">
                    <?php
                        include_once 'connect.php';
                        $notify = new Notify;
                        $superid = $user_data['id'];
                        //  $student_id='stdid';
                        if (isset($_POST['btnsendComment'])){
                            $comment = ['comment'];


                            $query = $conn->query("SELECT * FROM coments WHERE sender_id='$superid '");
                            if ($query->num_rows > 0) {
                                $sql_string= "UPDATE coments SET sender_id='$superid',  coment='$comment'";
                                if($conn->query($sql_string)){
                                    echo 'comment  Successfully Updated';
                                }else{
                                    echo'An error occured ' . $conn->error; 
                                }
                            }else{
                                $sql_string="INSERT INTO coments ( sender_id, coment)
                                VALUES('".$superid."', '".$comment."')";
                                if($conn->query($sql_string)){
                                    // $notify->sendNotification($stdid, '3', 'Just uploaded my proposal', 'proposal');   
                                    echo 'comment  Successfully Submitted';
                                    // header('refresh:2 URL=dashboard.php');
                                }else{
                                    echo'An error occured ' . $conn->error;
                                }
                            }
                        } 
                        
                         // Fetch Existing Data
                         $exist_data = $conn->query("SELECT * FROM coments WHERE sender_id='$superid '");
                         //  ($exist_data->num_rows > 0) 
                             $comment = $exist_data->fetch_assoc();
                            
                    ?>
                    <!-- <div class="text-center mb-2">
                        <h4 class="text-lg text-gray-800 font-semibold capitalize">write a comment</h4>
                    </div>
                   
                     <textarea name="" id="" class="comment outline-none w-full mb-2 px-2"><?php echo $comment ['coment'] ?></textarea>

                    <button class="comment bg-green-700 text-white py-1 px-2 rounded-md" name="btnsendComment">Send</button> -->
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
   
    <script src="ckeditor5/ckeditor.js"></script>

    <script>
    $(document).ready(function(){
        $('.comment').on('click', function(){
            $getId = $(this).attr('id');
            // $('#pensioner_id').val($getId);
        });

        $('#search').keyup(function(){ 
            search_table($(this).val());
        });

        function search_table(value){
            $('#myTable tr').each(function(){
                var found = 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0){
                        found= 'true';
                    }
                });
                if(found=='true'){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            })
        }
    })
</script>
</body>
</html>
