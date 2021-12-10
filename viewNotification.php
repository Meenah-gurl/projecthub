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
        include_once 'admin_sidebar.php'; 
        include_once  'script.php';

    ?>

    <!-- Main Content -->
    <div id="main" class="min-h-screen -ml-0 md:ml-52 py-3 px-4 md:px-8">
        
        <div class="grid grid-col-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
                <div class="bg-blue-600 py-2 px-2 text-center text-gray-100 rounded-md">
                    Message
                </div>
                <div class="bg-white shadow-lg rounded-lg py-5 mt-3">
                    <?php
                        $notifyID = $_GET['notificationID'];
                        $notifyData = mysqli_query($conn, "SELECT * FROM notifications WHERE reciever_id='$userId' AND id='$notifyID'");
                        if(mysqli_num_rows($notifyData) > 0){
                            while ($Data = mysqli_fetch_array($notifyData)) {
                                ?>
                                    <div class="px-2 py-3 space-y-4 px-5" style="line-height:15px">
                                        <div class="capitalize font-bold text-2xl"><?php echo $Data['current_chapter']?></div>
                                        <div class="text-sm"><?php echo $Data['message']?></div>
                                    </div>
                                <?php
                            }
                        }else{
                            ?>
                                <div class=" flex flex-col px-2 py-3" style="line-height:14px">
                                    <div class="text-base text-center text-gray-400">You don't have a notification with this ID</div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="">
                <div class="bg-blue-600 py-2 px-2 text-center text-gray-100 rounded-md">
                    All Notification
                </div>
                <div class="bg-white shadow-lg rounded-lg py-5 mt-3">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM notifications WHERE reciever_id='$userId'");
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
        </div>

    </div>

    <?php include_once 'script.php'; ?>
   
</body>
</html>
