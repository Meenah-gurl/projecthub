<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adim Dashboard</title>
    <link href="css/tailwind.min.css" rel="stylesheet"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="AOS/aos-master/aos-master/dist/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-100">
    
<!-- Header -->
    <header class="sticky top-0 w-full  z-10">
        <?php include_once 'page_head.php'; ?>
    </header>

    <!-- Side Bar -->
        <?php 
            include_once 'admin_sidebar.php'; 
            include_once  'script.php';
        
        ?>
    
    <!-- Main Content -->
    <div id="main" class="min-h-screen -ml-0 md:ml-52 py-3 px-4 md:px-8">
        
        <div class="bg-blue-500 rounded-xl py-4 px-4 text-white shadow-xl">
            <h2 class="text-2xl">
              Assigned Supervisors to Student!
            </h2>
        </div>

        <!-- other content -->

        <form method="post" name="assign">
            <input name="action" value="assign" type="hidden">
            <div class="mt-5 grid lg:grid-cols-2 grid-cols-1 font-san gap-x-6 gap-y-4 mb-7">
                <!-- first grid -->
                <div class="col-span px-4 space-y-3 w-full">
                    <!-- other content -->
                    <div class="">
                        <div class="text-gray-700 text-lg mb-5">
                            Student List
                        </div>

                        <div class="relative -top-3 ">
                            <div class="relative selectParent rounded-t-lg rounded-b-lg border cursor-pointer w-full bg-white px-2 py-4 shadow-md">
                                <span>Select a student</span>
                                <i class="fa absolute right-4 top-5 fa-caret-down"></i>
                           </div>
                            <div class="select-con hidden w-full absolute border bg-white rounded-b-lg overflow-hidden  cursor-pointer text-gray-700  shadow-lg  z-20">
                                <div class="relative top-0 shadow-md p-3">
                                    <input type="" name="student" placeholder="Search for a student" id="searchForStudent" class="w-full rounded-lg searchInput border py-1 pl-2 pr-8">
                                    <i class="fa fa-search absolute right-6 top-5"></i>
                                </div>
                                <div class="StudentList"></div>
                            </div>
                        </div>
                    </div>   
                </div>
                <!-- second grid -->
                <div class="px-4 space-y-3 w-full">
                    <div class="">
                        <div class="text-gray-700 text-lg mb-5">
                            Supervisors List
                        </div>
                        <div class="relative -top-3 ">
                            <div class="relative selectParent rounded-t-lg rounded-b-lg border cursor-pointer w-full bg-white px-2 py-4 shadow-md">
                                <span>Select a Lecturer</span>
                                <i class="fa absolute right-4 top-5 fa-caret-down"></i>
                            </div>
                            <div class="select-con hidden w-full absolute border bg-white rounded-b-lg overflow-hidden  cursor-pointer text-gray-700  shadow-lg  z-20">
                                <div class="relative top-0 shadow-md p-3">
                                    <input type="" name="lecturer" placeholder="Search for a student" id="searchForLecture" class="w-full rounded-lg searchInput border py-1 pl-2 pr-8">
                                    <i class="fa fa-search absolute right-6 top-5"></i>
                                </div>
                                <div class="lecturesList"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-green-700 mb-5 rounded-md px-2 py-2 shadow-lg hover:bg-white hover:text-gray-700 float-right w-40 text-center text-white mt-7">
                <button type="submit" class="text-md focus:ouline-none w-full h-full" name="btnAssign">Assign</button>
            </div>
        </form>
        <div class="mt-24">
            <div class="text-gray-700 text-lg mb-5">
                 Assigned List!
            </div>
            <div class="space-y-3 mb-4">
                    <div class="flex rounded-lg divide-x font-san shadow-lg text-md text-gray-700">
                        <div class="bg-white py-2 px-1 border-gray-500 rounded-l-lg">
                            SN
                        </div>
                        <div class="bg-white py-2 px-2 flex-grow">
                           Student Name
                        </div>
                        <div class="bg-white py-2 px-2 w-60">
                            Student Reg No
                        </div>
                        <div class="bg-white py-2 px-2 w-60">
                           Student Level
                        </div>
                        <div class="bg-white py-2 px-2  rounded-r-lg w-60">
                          Supervisors
                        </div>
                        
                    </div>

                    <?php 
                        include_once 'connect.php';

                        $SN = 0;

                        $user_data = $_SESSION['$user_data'];
                        $sql = "SELECT * FROM assign WHERE std_id ='$user_data' AND supervisor_id = '$$user_data'";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                $user_data = mysqli_fetch_assoc($result);

                                $SN++;
                                            ?>
                                            <div class="flex rounded-lg divide-x font-san shadow-md text-md text-gray-700">
                                                <div class="bg-white py-2 px-2 border-gray-500 rounded-l-lg">
                                                    <?php  echo $SN?>
                                                </div>
                                                <div class="bg-white py-2 px-2 flex-grow">
                                                        <?php echo $$user_data['fullname'] ?>
                                                </div>
                                                <div class="bg-white py-2 px-2 w-60">
                                                        <?php echo $$user_data['regno'] ?>
                                                </div>
                                                <div class="bg-white py-2 px-2 w-60">
                                                        <?php echo $$user_data['level'] ?>
                                                </div>
                                                <div class="bg-white py-2 px-2 w-60 rounded-r-lg">
                                                        <?php echo $$user_data['programme'] ?>
                                                </div>
                                                
                                            </div>
                                      <?php
                               
                            }
                            
                        }

                        
                        
                    ?>
                   
                    


                </div>
        </div>
    </div>
</body> 
</html>
<script>
    $('.selectParent').on('click',function(){
        $(this).toggleClass('rounded-b-lg');
        $(this).siblings().toggleClass('hidden');
        $(this).parent().parent().parent().siblings().children().children().children('.selectParent').siblings().addClass('hidden')
        $(this).parent().parent().parent().siblings().children().children().children('.selectParent').addClass('rounded-b-lg')
    })
    $('.searchInput').on('keyup',function(){
        var val = $(this).val()
        var action = $(this).attr('id')
        getData(action,val)
    })
    $lecturesList=[];
    $StudentList=[];
    function getData(action,val) {
        $data = {action:action, name:val}
        $.ajax({
            type:'post',
            url:'backend/query.php',
            data:$data,
            dataType:'json',
            success: function(respond) {
                if(respond.type == 'lecture'){
                    $lecturesList=[];
                    respond.lectures.forEach((lecture) => {
                        $lecturesList += `
                            <div class="option hover:bg-green-700 cursor-pointer hover:text-white  bg-white">
                                <input type="radio" name="lecturer" value="${lecture.id}" class="w-full rounded-lg hidden appearance-none" id="lect_name">
                                <label for="lect_name" class="nameSelector block px-4 cursor-pointer py-1">${lecture.fullname}</label>
                            </div>
                        `
                    });
                }else{
                    $StudentList=[];
                    respond.students.forEach((student) => {
                        $StudentList += `
                            <div class="option hover:bg-green-700 cursor-pointer hover:text-white  bg-white">
                                <input type="radio" name="student" value="${student.id}" class="w-full rounded-lg hidden appearance-none" id="std_name">
                                <label for="std_name" class="nameSelector block px-4 cursor-pointer py-1">${student.fullname}</label>
                            </div>
                        `
                    });
                }
                $('.lecturesList').html($lecturesList)
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
    $('.lecturesList').on('click','.nameSelector',function() {
        $name = $(this).text()
        $(this).parent().parent().parent().siblings().children('span').text($name);
        $(this).parent().parent().parent().addClass('hidden');
        $(this).parent().parent().parent().siblings().addClass('rounded-b-lg')
    })
    $('form[name=assign]').on('submit',function(evt){
        evt.preventDefault();
        $data =$(this).serialize();
        $.ajax({
            type:'post',
            url:'backend/query.php',
            data:$data,
            dataType:'json',
            success: function(res) {
                console.log(res.mes);
            }
        })
    })
    getData('searchForLecture','')
    getData('searchForStudent','')
</script>