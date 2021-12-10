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
<body class="bg-gray-100">
    <!-- Header -->
    <header class="sticky top-0 w-full  z-10">
        <?php include_once 'page_head.php'; ?>
    </header>

    <!-- Side Bar -->
        <?php 
            include_once 'sidebar.php'; 
            include_once  'script.php';
            include_once  'notification/Notify.php';    
        ?>
    
    <!-- Main Content -->
    <div id="main" class="min-h-screen -ml-0 md:ml-52 py-3 px-4 md:px-8">
        
        <div class="bg-blue-500 rounded-xl py-4 px-4 text-white shadow-xl">
            <h2 class="text-2xl">
                Proposal
            </h2>
        </div>

        <!-- Other Content -->
        <div class="mt-5 grid md:grid-cols-3 grid-cols-1">
            <div class="col-span-2 px-4">
                <div>
                    <form action="" method="post">
                        <?php 
                            include_once 'connect.php';
                            $stdid = $user_data['id'];
                            $notify = new Notify;

                            if(isset($_POST['prosub'])){
                                $topic=$_POST['topic'];
                                $motivation=$_POST['motivation'];
                                $proposal=$_POST['proposal'];
                                
                                // Check if the student already have proposal
                                $query = $conn->query("SELECT * FROM proposal WHERE student_id='$stdid '");
                                if ($query->num_rows > 0) {
                                    $sql_string= "UPDATE proposal SET topic='$topic', motivation='$motivation', proposal='$proposal', status='review' WHERE student_id='$stdid '";
                                    if($conn->query($sql_string)){
                                        $notify->sendNotification($stdid, '3', 'Just updated my proposal', 'proposal');   
                                        echo 'Proposal  Successfully Updated';
                                    }else{
                                        echo'An error occured ' . $conn->error; 
                                    }
                                }else{
                                    $sql_string="INSERT INTO proposal(student_id, topic, motivation, proposal)
                                    VALUES('".$stdid."', '".$topic."', '".$motivation."', '".$proposal."')";
                                    if($conn->query($sql_string)){
                                        $notify->sendNotification($stdid, '3', 'Just uploaded my proposal', 'proposal');   
                                        echo 'Proposal  Successfully Submitted';
                                        // header('refresh:2 URL=dashboard.php');
                                    }else{
                                        echo'An error occured ' . $conn->error;
                                    }
                                }
                            }

                            // Fetch Existing Data
                            $exist_data = $conn->query("SELECT * FROM proposal WHERE student_id='$stdid '");
                            $proposal = $exist_data->fetch_assoc();
                        ?>
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-5 font-san">
                            <div >
                                <label for="" class="capitalize text-gray-800 text-lg">Topic:</label>
                                <div class=" text-gray-700 rounded-lg mb-3">
                                    <input type="text" id="topic" name="topic" value="<?php echo $proposal['topic'] ?>" class=" py-2 w-full px-4 outline-none border-0 rounded-lg bg-white bg-opacity-75 shadow-lg h-12" placeholder="Topic" required>
                                </div>
                            </div>

                            <div>
                                <label for="" class="capitalize text-gray-800 text-lg">Motivation</label>
                                <div class=" text-gray-700 rounded-lg mb-3">
                                    <input type="text" id="motivation" name="motivation"  value="<?php echo $proposal['motivation'] ?>" class=" py-2 w-full px-4 outline-none border-0 rounded-lg bg-white bg-opacity-75 shadow-lg h-12" placeholder="Motivation" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="" class="capitalize text-gray-800 text-lg">Proposal</label>
                            <div class=" text-gray-700 rounded-lg mb-3 w-ful bg-red-500">
                                <textarea name="proposal" id="editor" class="rounded-lg  bg-opacity-75 shadow-lg w-full "><?php echo $proposal['proposal'] ?></textarea>
                            </div>
                        </div>

                        <div class="float-right text-center text-md mb-3">
                            <button class="py-2 px-2 text-white bg-blue-600 rounded-lg shadow-lg" name="prosub">Save Proposal</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-1  mx-auto ">
                <div class="bg-blue-600 py-2 px-2 text-center text-gray-100 rounded-md">
                    Comments
                </div>
                <!-- <form action="" method="post" class="mt-3">
                        <textarea name="correction" id="" cols="12" rows="3"></textarea>
                        <button class="bg-green-600 rounded-lg py-1 px-2 mt-3 text-white block">Send</button>
                </form> -->
                <div class="bg-white shadow-lg rounded-lg py-5 px-6 mt-3">
                    <div class="py-3 px-3 rounded-lg shadow-xl ">
                        <p class="text-gray-700 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam animi labore doloremque.</p>
                        <small class="text-gray-700 mt-4">1 hour ago</small>
                    </div>
                    <div class="py-3 px-3 rounded-lg shadow-xl ">
                        <p class="text-gray-700 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam animi labore doloremque.</p>
                        <small class="text-gray-700 mt-4">1 hour ago</small>
                    </div>

                    <div class="py-3 px-3 rounded-lg shadow-xl ">
                        <p class="text-gray-700 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam animi labore doloremque.</p>
                        <small class="text-gray-700 mt-4">1 hour ago</small>
                    </div>
                </div>

                
            </div>
        </div>
        <!-- <textarea name="" id="" class="editor" cols="30" rows="10"></textarea> -->
        

    </div>




    <!-- scripts -->
    <script src="ckeditor5/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
            
        } )
        .catch( error => {
            console.log( error );
        } );
    </script>

</body>
</html>

<style>
    .ck-content.ck-editor__editable{
        min-height: 300px;
        max-height: 400px;
        max-width: 100%;
    
        /* background-color: transparent !important; */
    }
</style>