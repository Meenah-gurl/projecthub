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
        <div class="bg-blue-500 rounded-xl py-4 px-4 text-white shadow-xl">
            <h2 class="text-2xl">
                Admin Dashboard
            </h2>
        </div>

        <!-- Other Content -->
            <div class="mt-5 grid md:grid-cols-3 grid-cols-1 gap-4">
                <div class="col-span-2 px-3 py-2">

                </div>

                <div class="col-span-1  mx-auto ">
                    <div class="bg-blue-600 py-2 px-2 text-center text-gray-100 rounded-md">
                    All Comments
                    </div>
                    
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

            

    </div>

    <?php include_once 'script.php'; ?>
   
</body>
</html>
