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
<div class="w-full text-white text-lg font-bold font-san py-3 px-3 text-blue-800 flex bg-gray-100 shadow-md">
    <div class="flex-grow">
        ProjectHub
    </div>
    <div class="flex-initial flex-shrink-0">
        <span class="relative">
            <a href="#" class="inline-block toggleNotification py-1 px-2">
                <i class="fa fa-bell"></i>
            </a>
            <div class="absolute noti hidden w-8 h-8 bg-white transform rotate-45"></div>
            <div class="absolute  z-1000 noti hidden flex flex-col w-72 overflow-hidden bg-white text-black shadow-lg rounded-lg -right-1">
                <div class="p-3 text-xl font-bold">
                    Notifications
                </div>
                <div class="flex-grow overflow-y-auto">
                    <?php
                        $userId = $user_data['id'];
                        $query = mysqli_query($conn, "SELECT * FROM notifications WHERE reciever_id='$userId' LIMIT 5");
                        if(mysqli_num_rows($query) > 0){
                            while ($notificationData = mysqli_fetch_array($query)) {
                                ?>
                                    <a href="viewNotification.php?notificationID=<?php echo $notificationData['id'] ?>" class="hover:bg-gray-100 flex flex-col cursor-pointer px-2 py-3" style="line-height:15px">
                                        <div class="capitalize"><?php echo $notificationData['current_chapter']?></div>
                                        <div class="truncate text-sm font- text-black"><?php echo $notificationData['message']?></div>
                                    </a>
                                <?php
                            }
                        }else{
                            ?>
                                <div class="hover:bg-gray-100 flex flex-col cursor-pointer px-2 py-3" style="line-height:14px">
                                    <div class="text-base text-center text-gray-400">You don't have a notification yet</div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </span>
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