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

    ?>

    <!-- Main Content -->
    <div id="main" class="min-h-screen -ml-0 md:ml-52 py-3 px-4 md:px-8">
        <div class="bg-blue-500 rounded-xl py-4 px-4 text-white shadow-xl">
            <h2 class="text-2xl">
                Dashboard
            </h2>
        </div>

        <!-- Other Content -->
        <div class="mt-5 grid md:grid-cols-3 grid-cols-1 gap-4">
            <div class="col-span-2 px-3 py-2">
               <div class="grid md:grid-cols-3 grid-cols-1 bg-blue-100 px-7 py-7 rounded-lg font-san relative mb-5">
                  <div class="col-span-2">
                        <div class="text-gray-700">
                            <p class="text-2xl text-blue-600">Welcome back <span><?php echo $user_data['fullname'] ?></p></span></p>
                            <p class="capitalize text-md font-semibold text-gray-600">supervisor: mr destiny brotobor</p>
                            <p class="text-sm mt-2">You have gone 30% of your project.</p>
                            <p class="text-sm">Keep it put to get a faster result.</p>
                        </div>
                  </div>
                   <div class="col-span-1 ">
                        <div class="mx-auto">
                            <img src="/imgs/blue.png" alt="" class="w-60 lg:mx-0 mx-auto lg:absolute lg:right-2  lg:bottom-0">
                        </div>
                    </div>
                </div>  

                <div class="grid md:grid-cols-2 grid-cols-1 gap-3 mb-12">
                    <div class="shadow-lg bg-white rounded-lg py-5 px-4 font-san text-gray-700">
                        <span class="text-semibold text-md text-blue-600">Your Progress</span>
                        <div class="flex gap-3 mt-3">
                            <span>Proposal:</span>
                            <div class="mt-3 w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 50%"></div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-3">
                            <div class="flex-grow flex-shrink-0">Chapter One:</div>
                            <div class="mt-3 w-full bg-gray-200 rounded-full h-1.5 flex-initial">
                                <div class="bg-green-700 h-1.5 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-3">
                            <div class="flex-grow flex-shrink-0">Chapter Two:</div>
                            <div class="mt-3 w-full bg-gray-200 rounded-full h-1.5 flex-initial">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 40%"></div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-3">
                            <div class="flex-grow flex-shrink-0">Chapter Three:</div>
                            <div class="mt-3 w-full bg-gray-200 rounded-full h-1.5 flex-initial">
                                <div class="bg-red-700 h-1.5 rounded-full" style="width: 30%"></div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-3">
                            <div class="flex-grow flex-shrink-0">Chapter Four:</div>
                            <div class="mt-3 w-full bg-gray-200 rounded-full h-1.5 flex-initial">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 50%"></div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-3">
                            <div class="flex-grow flex-shrink-0">Chapter Five:</div>
                            <div class="mt-3 w-full bg-gray-200 rounded-full h-1.5 flex-initial">
                                <div class="bg-red-700 h-1.5 rounded-full" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="shadow-lg bg-white rounded-lg py-10">

                    </div>
                </div>

                <!-- <div class="grid md:grid-cols-3 grid-cols-1 gap-7">
                    <div class="bg-blue-600 text-center text-white rounded-lg px-2 py-3 shadow-lg">
                        fvlfkglsr
                    </div>

                    <div class="bg-red-400 text-center text-white rounded-lg px-2 py-3 shadow-lg">
                        fvlfkglsr
                    </div>

                    <div class="bg-green-600 text-center text-white rounded-lg px-2 py-3 shadow-lg">
                        fvlfkglsr
                    </div>
                </div> -->
            </div>
            

            <div class="col-span-1  mx-auto ">
                <div class="bg-blue-600 py-2 px-2 text-center text-gray-100 rounded-md">
                   All Comments
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

                    <div class="py-3 px-3 rounded-lg shadow-xl">
                        <p class="text-gray-700 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam animi labore doloremque.</p>
                        <small class="text-gray-700 mt-4">1 hour ago</small>
                    </div>
                </div>
        </div>

    </div>

    <?php include_once 'script.php'; ?>
   
</body>
</html>
