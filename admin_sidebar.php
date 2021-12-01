 
<div id="sidebar" class="fixed top-0 h-full w-52 -left-52 md:left-0 z-50">
    <div class="py-2 w-full min-h-screen mt-14 bg-white rounded-r-xl shadow-lg">
        <div class=" mt-3 py-10 w-full">
            <div class="rounded-full h-14 w-14 bg-gray-500 mx-auto">
                <img src="/imgs/user.png" alt="" class="rounded-full mx-auto h-14 w-14">
                
            </div>
            <p class="text-center text-xs mt-3 font-bold"><?php echo $user_data['fullname'] ?></p>
            <div class="mt-4 font-san">
               <ul class="mt-8">
                   <li class="text-md hover:bg-blue-500 hover:text-white">  
                        <a href="dashboard.php" class="px-4 py-2 inline-block font-semibold">
                            <i class="fa fa-dashboard mr-1"></i> Dashboard
                        </a>
                    </li>
                   <li class="text-md hover:bg-blue-500 hover:text-white">  
                        <a href="add_supervisors.php" class="px-4 py-2 inline-block font-semibold">
                        <i class="fa fa-edit mr-1"></i> Add Supervisors
                        </a>
                    </li>
                   <li class="text-md hover:bg-blue-500 hover:text-white">  
                        <a href="view_supervisors.php" class="px-4 py-2 inline-block font-semibold">
                            <i class="fa fa-pencil mr-1"></i> View Supervisors
                        </a>
                    </li>
                   <li class="text-md hover:bg-blue-500 hover:text-white">  
                        <a href="view_students.php" class="px-4 py-2 inline-block font-semibold">
                            <i class="fa fa-edit mr-1"></i> View Students
                        </a>
                    </li>
                    <li class="text-md hover:bg-blue-500 hover:text-white">  
                        <a href="assigned_details.php" class="px-4 py-2 inline-block font-semibold">
                            <i class="fa fa-pencil mr-1"></i> Assigned Details
                        </a>
                    </li>
               </ul>
            </div>
        </div>
    </div>

</div>