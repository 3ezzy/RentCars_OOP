<?php
    require_once('../isLogged/isOwner.php');
    require_once __DIR__ . '/../controllers/UserManager.php';

    $userManager = new UserManager();

    $totalClients = $userManager->countRows("users");
    $totalVoitures = $userManager->countRows("voitures");
    $totalContrats = $userManager->countRows("contrats");
?>


<?php include('./layout/_HEAD.php'); ?>
    
<div class="w-full mb-16">

    <div class="my-6">
        <h1 class="text-4xl text-white font-semibold mb-2">Dashboard</h1>
        <p class="text-green-500">Welcome back to your dashborad</p>
    </div>
    <div class="md:grid md:grid-cols-2 lg:grid-cols-4 gap-4 md:mb-4">
        <div class="flex justify-center min-h-52 mb-4 md:mb-0">
            <div class="w-full flex flex-col justify-between bg-[#2a2455] p-4 rounded-md">
                <div class="flex items-center mb-5">
                    <div class="w-[10px] h-[10px] bg-green-300 mr-2"></div>
                    <h1 class="text-green-500 font-semibold text-xl">Statistics</h1>
                </div>
                <div class="flex justify-between items-end gap-6 border-b-2 h-full border-gray-600">
                    <div class="w-full h-[<?php echo $totalClients ?>%] bg-emerald-600"></div>
                    <div class="w-full h-[<?php echo $totalVoitures ?>%] bg-cyan-600"></div>
                    <div class="w-full h-[<?php echo $totalContrats ?>%] bg-purple-600"></div>
                </div>
            </div>
        </div>
    
        <div class="flex justify-center mb-4 md:mb-0">
            <div class="w-full bg-[#2a2455] p-4 rounded-md">
                <div class="flex items-center mb-3">
                    <div class="w-[10px] h-[10px] bg-green-300 mr-2"></div>
                    <h1 class="text-green-500 font-semibold text-xl">Total clients</h1>
                </div>
                <div class="mb-8">
                    <a href="" class="px-2 py-1 text-white bg-emerald-600 rounded-md hover:bg-emerald-400">
                        <i class="fa-solid fa-angles-left"></i>
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <img class='p-1 bg-emerald-600 rounded-md mr-4' width='80' src='../src/img/images_sidebar/users.svg' alt=''>
                    <h1 class="mr-10 text-white text-6xl"><?php echo $totalClients ?></h1>
                </div>
            </div>
            
        </div>
    
        <div class="flex justify-center mb-4 md:mb-0">
            <div class="w-full bg-[#2a2455] p-4 rounded-md">
            <div class="flex items-center mb-3">
                    <div class="w-[10px] h-[10px] bg-green-300 mr-2"></div>
                    <h1 class="text-green-500 font-semibold text-xl">Total Voitures</h1>
                </div>
                <div class="mb-8">
                    <a href="./voitures/voitures.php" class="px-2 py-1 text-white bg-cyan-600 rounded-md hover:bg-cyan-400">
                        <i class="fa-solid fa-angles-left"></i>
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <img class='p-1 bg-cyan-600 rounded-md mr-4' width='80' src='../src/img/images_sidebar/car.svg' alt=''>
                    <h1 class="mr-10 text-white text-6xl"><?php echo $totalVoitures ?></h1>
                </div>
            </div>
            
        </div>
        
        <div class="flex justify-center mb-4 md:mb-0">
            <div class="w-full bg-[#2a2455] p-4 rounded-md">
            <div class="flex items-center mb-3">
                    <div class="w-[10px] h-[10px] bg-green-300 mr-2"></div>
                    <h1 class="text-green-500 font-semibold text-xl">Total Contrats</h1>
                </div>
                <div class="mb-8">
                    <a href="./contrats/contrats.php" class="px-2 py-1 text-white bg-purple-600 rounded-md hover:bg-purple-400">
                        <i class="fa-solid fa-angles-left"></i>
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <img class='p-1 bg-purple-600 rounded-md mr-4' width='80' src='../src/img/images_sidebar/contract.svg' alt=''>
                    <h1 class="mr-10 text-white text-6xl"><?php echo $totalContrats ?></h1>
                </div>
            </div>
            
        </div>
    </div>

    <div class="w-full md:flex md:gap-4">
        <div class="md:w-2/5 flex justify-center mb-4 md:mb-0">
            <div class="w-full bg-[#2a2455] p-4 rounded-md">
                <div class="flex items-center mb-8">
                    <div class="w-2 h-2 bg-green-300 mr-2"></div>
                    <h1 class="text-green-500 font-semibold">Top five client added</h1>
                </div>
                <div class="hideScroll overflow-scroll w-full p-1 rounded-md">
                    <table class="w-full text-center text-gray-300">
                        <thead>
                            <tr class="text-green-500">
                                <th class="p-1 text-start">ID</th>
                                <th class="p-1 text-start">Name</th>
                                <th class="p-1 text-start">Address</th>
                                <th class="p-1 text-start">N° Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="md:w-3/5 flex justify-center">
            <div class="w-full bg-[#2a2455] p-4 rounded-md">
            <div class="flex items-center mb-8">
                <div class="w-2 h-2 bg-green-300 mr-2"></div>
                <h1 class="text-green-500 font-semibold">Top five contrats added</h1>
            </div>
            <div class="hideScroll overflow-scroll w-full p-1 rounded-md">
                <table class="w-full text-center text-gray-300">
                    <thead>
                        <tr class="text-green-500">
                            <th class="p-1 text-start">ID</th>
                            <th class="p-1 text-start">Name Client</th>
                            <th class="p-1 text-start">N° Immatriculation</th>
                            <th class="p-1 text-start">Date Debut</th>
                            <th class="p-1 text-start">Date Fin</th>
                            <th class="p-1 text-start">Duree</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                </div>
            </div>
            
        </div>
    </div>
</div>