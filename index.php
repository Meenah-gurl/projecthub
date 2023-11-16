<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Hub</title>
    <link href="css/tailwind.min.css" rel="stylesheet"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="AOS/aos-master/aos-master/dist/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="bg-gray-500 w-full  py-20">
        <div class="max-w-4xl mx-auto  flex flex-col-reverse md:flex-row  shadow-lg px-4">
            <div class="bg-white py-20 lg:w-0 w-full flex-grow lg:rounded-l-lg md:rounded-b-none rounded-b-lg mx-auto">
               <div class="mx-auto px-5">
                   <h3 class="text-black font-san font-bold text-2xl text-center">Welcome back,</h3>
                   <form action="" method="post">


                   <?php

                include_once 'connect.php';
                   if(isset($_POST['btnlogin'])){
                      
                       $email = $_POST['email'];
                       $password =($_POST['password']);

                       $query_str = "SELECT * FROM users WHERE email='$email' AND password='$password'";

                       $result = mysqli_query($conn, $query_str);

                       $num_rows = mysqli_num_rows($result);

                       if($num_rows > 0){
                           $user_data = mysqli_fetch_assoc($result);
                            $_SESSION['email'] = $user_data['email'];
                            $_SESSION['password'] = $user_data['password'];
                            // echo $query_str;
                            echo $user_data['role'];
                            if ($user_data['role'] == 'student') {
                                header('location:dashboard.php');
                            }else if ($user_data['role'] == 'admin') {
                                header('location:adminDashboard.php');
                            }else {
                                header('location:lec_dashboard.php');
                            }
                            
                       }else{
                           echo "Invalid Login Details";
                       }
                   }
                
                 ?>
                        <div class="text-center block mt-5 mb-4">
                            <label for="email" class="text-gray-700 block">Email</label>
                            <div>
                                <input type="email" name="email" class="border-b-2 border-gray-700  text-center outline-none w-72" required>
                                <i class="fa fa-envelope" class=""></i>
                            </div>
                        </div>

                        <div class="text-center block mt-5 mb-4">
                            <label for="password" class="text-gray-700 block">Password</label>
                           <div class="">
                                <input type="password" name="password" class="border-b-2 border-gray-700  text-center outline-none w-72" required>
                                <i class="fa fa-eye" class=""></i>
                           </div>
                        </div>

                        <div class="text-center block mt-7 mb-4">
                            <label for="forgotpass" class="text-gray-700 block">Forgot Password</label>
                            
                        </div>

                        <div class="text-center px-14 mt-10 cursor-pointer">
                            <button class="bg-green-700 text-white rounded-full px-5 py-2 text-md hover:bg-gray-700 hover:text-white w-full" name="btnlogin">Sign In</button>
                        </div>
                   </form>
               </div>
            </div>
            <div class="relative lg:w-96 w-full  lg:rounded-r-lg md:rounded-t-none rounded-t-lg" id="bgImg">
                <div class="h-full py-20 px-5 w-full  lg:rounded-r-lg md:rounded-t-none rounded-t-lg bg-black bg-opacity-75">
                    <h3 class="text-blue-600 font-bold fon-san text-3xl mb-5">
                        New Here ?
                    </h3>

                    <p class="text-blue font-san text-md text-white">SignUp to have an interactive session with your Project Supervisor</p>

                    <div class="text-center mt-64 animate-bounce">
                        <a href="register.php" class="bg-green-700 text-white rounded-full px-5 py-3 text-md hover:bg-white hover:text-gray-800">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <script src="js/jquery-3.3.1.js"></script>
     <script src="AOS/aos-master/aos-master/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
</body>
</html>

<style>
    
</style>