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

    ?>

    <!-- Main Content -->
    <div id="main" class="min-h-screen -mr-0 md:mr-80  py-3 px-4 md:px-8">
        <div class="bg-blue-500 rounded-xl py-4 px-4 text-white shadow-xl mb-7">
            <h2 class="text-2xl">
               Lecturer  Dashboard
            </h2>
        </div>

        <div class="select-con w-80 mt-3absolute border bg-white rounded-lg overflow-hidden  cursor-pointer text-gray-700  shadow-lg  z-20">
            <div class="relative -top-2 shadow-md p-3">
                <input type="" name="student" placeholder="Search for a student" id="searchForStudent" class="w-80 rounded-lg searchInput border-none outline-none py-1 pl-2 pr-8">
                <i class="fa fa-search absolute right-6 top-5"></i>
            </div>
            <!-- <div class="StudentList"></div> -->
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
        </div>
    </div>

    <?php include_once 'script.php'; ?>
   
    <script src="ckeditor5/ckeditor.js"></script>

    <script>
        $('.searchInput').on('keyup',function(){
        var val = $(this).val()
        var action = $(this).attr('id')
        getData(action,val)
        })

        $StudentList=[];

        function getData (action,val){
            $data = {action:action, name:val};
            $.ajax({
                type:'post',
                url:'backend/query2.php',
                data:$data,
                dataType:'json',
                success: function(respond) {
                    if(respond.type == 'student'){
                        $StudentList=[];
                        respond.students.forEach((student) => {
                            $StudentList += `
                                <div class="option hover:bg-blue-600 cursor-pointer hover:text-white  bg-white">
                                    <input type="radio" name="student" value="${student.id}" class="w-full rounded-lg hidden appearance-none" id="std_name">
                                    <label for="std_name" class="nameSelector block px-4 cursor-pointer py-1">${student.fullname}</label>
                                </div>
                            `
                        });
                    }else{
                    alert ('Error')
                    }
                    $('.StudentList').html($StudentList)
                }
                
            })
        }

        $('.StudentList').on('click','.nameSelector',function() {
            $name = $(this).text()
            $(this).parent().parent().parent().siblings().children('span').text($name);
            $(this).parent().parent().parent().addClass('hidden');
            $(this).parent().parent().parent().siblings().addClass('rounded-b-lg')
        })

        getData('searchForStudent','')
    </script>
</body>
</html>
