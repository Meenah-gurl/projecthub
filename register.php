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
            <div class="bg-white py-16 lg:w-0 w-full flex-grow lg:rounded-l-lg md:rounded-b-none rounded-b-lg mx-auto">
               <div class="mx-auto px-5">
                   <h3 class="text-black font-san font-bold text-2xl text-center">Register</h3>
                   <form action="" method="post">

                   <?php
                    include_once 'connect.php';

                    if(isset($_POST['btnSubmit'])){
                     $fullname=$_POST['fullname'];
                     $email=$_POST['email'];
                     $regno=$_POST['regno'];
                     $level=$_POST['level'];
                     $programme=$_POST['programme'];
                     $phone=$_POST['phone'];
                     $pass=$_POST['password'];
                     $cpass=$_POST['cpassword'];
                     
                     if($pass != $cpass){
                         echo 'Password Mismatched!';
                     }else{
                         
                        $sql_string="INSERT INTO users(fullname, email, regno, level, programme, phone,  password, cpassword )
                        VALUES('".$fullname."', '".$email."', '".$regno."', '".$level."',  '".$programme."','".$phone."', '".$pass."', '".$cpass."')";
                        
                        if($conn->query($sql_string)){
                            echo 'Registration Successful';
                            header('refresh:2 URL=index.php');
                        }else{
                            echo'An error occured ' . $conn->error;
                        }
                     }
                       
             
                    }
                 
                  ?>
                        <div class="text-center block mt-5 mb-4">
                            <label for="fullname" class="text-gray-700 block">Fullname</label>
                            <div>
                                <input type="text" name="fullname" class="border-b-2 border-gray-700  text-center outline-none w-72" required>
                                <i class="fa fa-user" class=""></i>
                            </div>
                        </div>
                        <div class="text-center block mt-5 mb-4">
                            <label for="email" class="text-gray-700 block">Email</label>
                            <div>
                                <input type="email" name="email" class="border-b-2 border-gray-700  text-center outline-none w-72" required>
                                <i class="fa fa-envelope" class=""></i>
                            </div>
                        </div>

                        <div class="text-center block mt-5 mb-4">
                            <label for="regno" class="text-gray-700 block">Reg No</label>
                            <div>
                                <input type="text" name="regno" class="border-b-2 border-gray-700  text-center outline-none w-72">
                                <i class="fa fa-pencil" class=""></i>
                            </div>
                        </div>

                        <div class="text-center block mt-5 mb-4">
                            <label for="regno" class="text-gray-700 block">Level</label>
                            <div>
                                <input type="text" name="level" class="border-b-2 border-gray-700  text-center outline-none w-72">
                                <i class="fa fa-pencil" class=""></i>
                            </div>
                        </div>

                        <div class="text-center block mt-5 mb-4">
                            <label for="regno" class="text-gray-700 block">programme</label>
                            <div>
                                <input type="text" name="programme" class="border-b-2 border-gray-700  text-center outline-none w-72">
                                <i class="fa fa-pencil" class=""></i>
                            </div>
                        </div>

                        <div class="text-center block mt-5 mb-4">
                            <label for="text" class="text-gray-700 block">Phone</label>
                            <div>
                                <input type="text" name="phone" class="border-b-2 border-gray-700  text-center outline-none w-72" required>
                                <i class="fa fa-phone" class=""></i>
                            </div>
                        </div>

                        <div class="text-center block mt-5 mb-4">
                            <label for="password" class="text-gray-700 block">Password</label>
                           <div class="">
                                <input type="password" name="password" class="border-b-2 border-gray-700  text-center outline-none w-72" required>
                                <i class="fa fa-eye" class=""></i>
                           </div>
                        </div>

                        <div class="text-center block mt-5 mb-4">
                            <label for="password" class="text-gray-700 block">Comfirm Password</label>
                           <div class="">
                                <input type="password" name="cpassword" class="border-b-2 border-gray-700  text-center outline-none w-72" required>
                                <i class="fa fa-eye" class=""></i>
                           </div>
                        </div>

                        <div class="text-center px-14 mt-10">
                            <button class="bg-green-700 text-white rounded-full px-5 py-2 text-md hover:bg-gray-700 hover:text-white w-full" name="btnSubmit">Sign In</button>
                        </div>
                   </form>
               </div>
            </div>
            <div class="relative lg:w-96 w-full  lg:rounded-r-lg md:rounded-t-none rounded-t-lg" id="bgImg">
                <div class="h-full py-16 px-5 w-full  lg:rounded-r-lg md:rounded-t-none rounded-t-lg bg-black bg-opacity-75">
                    <h3 class="text-blue-600 font-bold fon-san text-3xl mb-5">
                        Already a Member?
                    </h3>

                    <p class="text-blue font-san text-md text-white">SignIn to have an interactive session with your Project Supervisor</p>

                    <div class="text-center mt-96 animate-bounce">
                        <a href="index.php" class="bg-green-700 text-white rounded-full px-5 py-3 text-md hover:bg-white hover:text-gray-800">Sign in</a>
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