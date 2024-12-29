<?php
    require_once '../../isLogged/isClient.php';
    require_once __DIR__ . '/../../controllers/VoitureController.php';

    $voitures = new VoitureController();

    $resultVoitures = $voitures->getAllVoitures();
?>



<?php include ('../layout/_HEAD.php'); ?>

<div class="lg:w-5/6 md:w-4/5 flex flex-col items-center">
    <div class="w-full ">
        <header class="rounded-md py-4 w-full">
            <input class="p-2 w-52 md:w-2/5 rounded-md bg-[#5b5680] focus:bg-white outline-none" type="search" placeholder="Search...">
        </header>
    
        <div class="py-10">
            <h1 class="text-white text-6xl font-semibold">List of Cars</h1>
        </div>
    
        <div class="mt-2 rounded-md text-white flex">
            <button class="py-2 px-4 rounded-md hover:bg-[#5b5680]"><i class="fa-solid fa-arrow-down-a-z"></i> Sort Cars</button>
        </div>
    </div>

    <div class="w-full hideScroll overflow-scroll mt-4">
        <div class="xl:grid xl:grid-cols-3 lg:grid lg:grid-cols-2 mt-3 gap-3 mb-20 md:mb-0">
            <?php if($resultVoitures) { ?>
                <?php foreach($resultVoitures as $voiture) { ?>
                    <div class="bg-[#2a2455] hover:drop-shadow-[0px_0px_4px_#307f9b] duration-500 m-1 p-4 text-white lg:mt-0 rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="flex gap-3 text-sm">
                                <div class="flex gap-2 border p-1 rounded-md">
                                    <span class="text-yellow-400"><i class="fa-solid fa-star"></i></span>
                                    <p class="font-medium">4.5 <span class="font-normal text-gray-400">(345)</span></p>
                                </div>
                                <?php echo ($voiture['status'] == 1) ? "<span class='border border-green-300 bg-green-300 bg-opacity-25 text-green-300 p-1 rounded-md'>Available now</span>" : "<span class='border border-red-300 bg-red-300 bg-opacity-25 text-red-300 p-1 rounded-md'>Unvailable</span>" ?>
                                
                                <span class="p-1 rounded-md">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    160 km
                                </span>
                            </div>
                            <span class="text-2xl">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                        </div>
                        <div class="w-full h-48 flex justify-center">
                            <img class="object-contain hover:scale-110 duration-300" src="../../src/img/cars/<?php echo $voiture['image'] ?>" alt="">
                        </div>
                        <div>
                            <span class="text-lg font-semibold text-gray-300"><?php echo $voiture['marque'] ?></span>
                            <div class="flex justify-between mt-2">
                                <span><?php echo $voiture['modele'] ?></span>
                                <p>$<?php echo $voiture['priceHour'] ?> <span class="text-gray-400">/ hour</span></p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 mt-3 border-t border-gray-500">
                            <div class="flex gap-7">
                                <p class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3222ac"><path d="M160-120q-50 0-85-35t-35-85q0-39 22.5-70t57.5-43v-254q-35-12-57.5-43T40-720q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 70T200-607v87h240v-87q-35-12-57.5-43T360-720q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 70T520-607v87h200q17 0 28.5-11.5T760-560v-47q-35-12-57.5-43T680-720q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 70T840-607v47q0 50-35 85t-85 35H520v87q35 12 57.5 43t22.5 70q0 50-35 85t-85 35q-50 0-85-35t-35-85q0-39 22.5-70t57.5-43v-87H200v87q35 12 57.5 43t22.5 70q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T200-240q0-17-11.5-28.5T160-280q-17 0-28.5 11.5T120-240q0 17 11.5 28.5T160-200Zm0-480q17 0 28.5-11.5T200-720q0-17-11.5-28.5T160-760q-17 0-28.5 11.5T120-720q0 17 11.5 28.5T160-680Zm320 480q17 0 28.5-11.5T520-240q0-17-11.5-28.5T480-280q-17 0-28.5 11.5T440-240q0 17 11.5 28.5T480-200Zm0-480q17 0 28.5-11.5T520-720q0-17-11.5-28.5T480-760q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Zm320 0q17 0 28.5-11.5T840-720q0-17-11.5-28.5T800-760q-17 0-28.5 11.5T760-720q0 17 11.5 28.5T800-680ZM160-240Zm0-480Zm320 480Zm0-480Zm320 0Z"/></svg>
                                    &nbsp;<span>Manual</span>
                                </p>
                                <p class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3222ac"><path d="M160-120v-640q0-33 23.5-56.5T240-840h240q33 0 56.5 23.5T560-760v280h40q33 0 56.5 23.5T680-400v180q0 17 11.5 28.5T720-180q17 0 28.5-11.5T760-220v-288q-9 5-19 6.5t-21 1.5q-42 0-71-29t-29-71q0-32 17.5-57.5T684-694l-84-84 42-42 148 144q15 15 22.5 35t7.5 41v380q0 42-29 71t-71 29q-42 0-71-29t-29-71v-200h-60v300H160Zm80-440h240v-200H240v200Zm480 0q17 0 28.5-11.5T760-600q0-17-11.5-28.5T720-640q-17 0-28.5 11.5T680-600q0 17 11.5 28.5T720-560ZM240-200h240v-280H240v280Zm240 0H240h240Z"/></svg>
                                    &nbsp;<span>Diesel</span>
                                </p>
                            </div>
                            <div>
                                <a href="./voitures.php?idVoiture=<?php echo $voiture['id'] ?>" class="py-1 px-4 hover:bg-[#5b5680] rounded-md">Reserve now</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
        </div>
    </div>
    <?php include('./reserve.php') ?>
</div>

<?php include('../layout/_FOOTER.php');?>