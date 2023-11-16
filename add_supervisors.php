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
               Add Supervisors
            </h2>
        </div>

        <!-- other content -->

        <div class="mt-5 grid md:grid-cols-3 grid-cols-1 font-san ">
            <div class="col-span-2 px-4">
                <div>
                    Add Supervisors Details!
                </div>
                <form action="" method="post" class="">
                    <?php
                        include_once 'connect.php';

                        if(isset($_POST['btnAddsuper'])){
                        $fullname=$_POST['fullname'];
                        $email=$_POST['email'];
                        $phone=$_POST['phone'];
                        $pass=$_POST['password'];
                        
                        
                            $sql_string="INSERT INTO users(fullname, email, phone,  password)
                            VALUES('".$fullname."', '".$email."', '".$phone."', '".$pass."')";
                            
                            if($conn->query($sql_string)){
                                echo 'Added Successful';
                            }else{
                                echo'An error occured ' . $conn->error;
                            }
                        }
                    
                    ?>

                    <div class="mt-5 grid md:grid-cols-2 grid-cols-1 gap-4">
                       <div class="mb-3">
                            <div class="mb-3 mt-3">
                                <label for="fullname" class="text-md text-gray-700 ">Fullname:</label>
                            </div>
                           <div class="rounded-lg bg-white text-gray-700 shadow-2xl h-12">
                               <input type="text" name="fullname" class="rounded-lg px-3 py-2 w-full h-12 outline-none" placeholder="Enter fullname">
                           </div>
                       </div>

                       <div>
                            <div class="mb-3 mt-3">
                                <label for="email"  class="text-md text-gray-700 ">Email:</label>
                            </div>
                           <div class="rounded-lg bg-white text-gray-700 shadow-2xl h-12">
                               <input type="email" name="email" class="rounded-lg px-3 w-full h-12 outline-none" placeholder="Enter your email">
                           </div>
                       </div>
                    </div>

                    <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                       <div class="mb-3">
                            <div class="mb-3 mt-3">
                                <label for="phone"  class="text-md text-gray-700 ">Phone:</label>
                            </div>
                           <div class="rounded-lg bg-white text-gray-700 shadow-2xl h-12">
                               <input type="text" name="phone" class="rounded-lg px-3 py-2 w-full h-12 outline-none" placeholder="Enter Phone">
                           </div>
                       </div>

                       <div>
                            <div class="mb-3 mt-3">
                                <label for="password"  class="text-md text-gray-700 ">Password:</label>
                            </div>
                           <div class="rounded-lg bg-white text-gray-700 shadow-2xl h-12">
                               <input type="password" name="password" class="rounded-lg px-3 w-full h-12 outline-none" placeholder="Enter your email">
                           </div>
                       </div>
                    </div>
                    
                    <div class="mt-5 rounded-lg shadow-lg px-3 py-2 text-white bg-green-700 mx-auto w-40 text-center">
                        <button name="btnAddsuper">Add Supervisors</button>
                    </div>
                </form>
            </div>

            <div>
               
            </div>
        </div>
    </div>
</body>
</html>