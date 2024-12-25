<?php
    require_once('../isOwner/isOwner.php');
    require_once('../connectdb/connectiondb.php');

    $countClients = mysqli_query($conn, "SELECT * FROM clients");
    $topFiveClients = mysqli_query($conn, "SELECT * FROM clients ORDER BY id DESC LIMIT 5");

    $countVoitures = mysqli_query($conn, "SELECT * FROM voitures");
    
    $countContrats = mysqli_query($conn, "SELECT * FROM contrats");
    $topFiveContrats = mysqli_query($conn, "SELECT contrats.*, clients.name, voitures.numImmatriculation 
                                            FROM ((contrats 
                                            INNER JOIN clients ON contrats.numClient = clients.id) 
                                            INNER JOIN voitures ON contrats.numVoiture = voitures.id) 
                                            ORDER BY id DESC LIMIT 5");

    $resultCountClients = mysqli_num_rows($countClients);
    $resultCountVoitures = mysqli_num_rows($countVoitures);
    $resultCountContrats = mysqli_num_rows($countContrats);
?>


<?php include('./layout/_HEAD.php'); ?>
    
    <div class="md:ml-[75px] lg:ml-0 md:col-span-3 lg:col-span-2 row-span-3 flex justify-center">
        <div class="w-full bg-[#2a2455] p-4 rounded-md">
            <div class="flex items-center mb-5">
                <div class="w-[10px] h-[10px] bg-green-300 mr-2"></div>
                <h1 class="text-green-500 font-semibold text-xl">Statistics</h1>
            </div>
            <div class="flex gap-4 h-3/4">
                <div class="flex gap-2 h-full justify-evenly items-end w-full border-r-2 border-b-2 border-gray-500">
                    <div class="chartClient w-14 bg-emerald-600"></div>
                    <div class="chartVoiture h-full w-14 bg-cyan-600"></div>
                    <div class="chartContrat h-full w-14 bg-purple-600"></div>
                </div>
                <!-- <div class="flex flex-col justify-between text-white">
                    <p>100</p>
                    <p>50</p>
                    <p>25</p>
                    <p>0</p>
                </div> -->
            </div>
        </div>
        
    </div>

    <div class="md:col-span-2 lg:col-span-2 row-span-3 flex justify-center">
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
                <h1 class="mr-10 text-white text-6xl"><?php echo $resultCountClients?></h1>
            </div>
        </div>
        
    </div>

    <div class="md:col-span-2 lg:col-span-2 row-span-3 flex justify-center">
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
                <h1 class="mr-10 text-white text-6xl"><?php echo $resultCountVoitures ?></h1>
            </div>
        </div>
        
    </div>
    <div class="md:col-span-3 lg:col-span-2 row-span-3 flex justify-center">
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
                <h1 class="mr-10 text-white text-6xl"><?php echo $resultCountContrats ?></h1>
            </div>
        </div>
        
    </div>

    <div class="md:ml-[75px] lg:ml-0 md:col-span-5 lg:col-span-3 row-span-6 flex justify-center">
        <div class="w-full bg-[#2a2455] p-4 rounded-md">
            <div class="flex items-center mb-8">
                <div class="w-2 h-2 bg-green-300 mr-2"></div>
                <h1 class="text-green-500 font-semibold">Top five client added</h1>
            </div>
            <div class="overflow-x-scroll lg:w-full lg:overflow-hidden">
                <table class="w-[400px] lg:w-full text-gray-300 text-sm">
                    <thead>
                        <tr class="text-green-500">
                            <th class="p-1 text-start">ID</th>
                            <th class="p-1 text-start">Name</th>
                            <th class="p-1 text-start">Address</th>
                            <th class="p-1 text-start">N° Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- display all users -->
                        <?php if($topFiveClients) { ?>
                            <?php $index = 0; while($topFive = mysqli_fetch_assoc($topFiveClients)) { ?>
                                <tr class="border-b-[0.2px] border-gray-500 hover:bg-[#585286]">
                                    <td class="px-1 py-4"><?php echo $index +=1 ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['name'] ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['address'] ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['numberPhone'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="md:col-span-5 lg:col-span-5 row-span-6 flex justify-center">
        <div class="w-full bg-[#2a2455] p-4 rounded-md">
        <div class="flex items-center mb-8">
            <div class="w-2 h-2 bg-green-300 mr-2"></div>
            <h1 class="text-green-500 font-semibold">Top five contrats added</h1>
        </div>
        <div class="overflow-x-scroll lg:w-full lg:overflow-hidden">
            <!-- <div class=""> -->
                <table class="w-[800px] lg:w-full text-gray-300 text-sm">
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
                        <!-- display all contrats -->
                            <?php if($topFiveContrats) { ?>
                            <?php $index = 0; while($topFive = mysqli_fetch_assoc($topFiveContrats)) { ?>
                                <tr class="border-b-[0.2px] border-gray-500 hover:bg-[#585286]">
                                    <td class="px-1 py-4"><?php echo $index +=1 ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['name'] ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['numImmatriculation'] ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['dateDebut'] ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['dateFin'] ?></td>
                                    <td class="px-1 py-4"><?php echo $topFive['duree'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            <!-- </div> -->
            </div>
        </div>
        
    </div>

<script>
    const chartClient = document.querySelector('.chartClient');
    chartClient.style.height = '<?php echo $resultCountClients?>%';

    const chartVoiture = document.querySelector('.chartVoiture');
    chartVoiture.style.height = '<?php echo $resultCountVoitures?>%';

    const chartContrat = document.querySelector('.chartContrat');
    chartContrat.style.height = '<?php echo $resultCountContrats?>%';
</script>