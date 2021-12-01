<?php
session_start();

include_once 'connect.php';

    if (isset($_SESSION['email']) and isset($_SESSION['password'])) {
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $query_str = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query_str);

        $num_rows = mysqli_num_rows($result);
        if($num_rows > 0){
            $user_data = mysqli_fetch_assoc($result);
        }else{
            // header('location:index.php');
        }
    }else{
        header('location:index.php');
    }
?>
<div class="w-full text-white text-lg font-bold font-san py-3 px-3 text-blue-700 flex bg-gray-100 shadow-md">
    <div class="flex-grow">
        ProjectHub
    </div>
    <div class="flex-initial flex-shrink-0">
        <a href="#" class="inline-block py-1 px-2">
            <i class="fa fa-bell"></i>
        </a>
        <a href="#" class="inline-block py-1 px-2">
            <i class="fa fa-envelope"></i>
        </a>
        <a href="#" class="inline-block py-1 px-2">
            <i class="fa fa-user"></i>
        </a>
        <a href="logout.php" class="inline-block py-1 px-2" id="" name="logout">
            <i class="fa fa-sign-out"></i>
        </a>
        <a href="#" class="inline-block md:hidden py-1 px-2" id="togglebtn">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>