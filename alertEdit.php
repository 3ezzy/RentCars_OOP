<?php $page = $_SERVER['PHP_SELF'] ?>

<div class="showAlertEdit absolute z-10 w-1/4 bg-white p-5 bottom-4 right-4 hidden rounded-md text-center">
    
<div class="w-full flex justify-center">
        <div class="w-10 h-10 mb-4 rounded-full border-[4px] border-green-500 flex justify-center items-center">
            <span class="text-lg text-green-500"><i class="fa-solid fa-check"></i></span>
        </div>
    </div>
    <?php 
        if($page == '/views/clients/clients.php') {
            echo "<h1 class='text-lg font-semibold text-center'>Client updated succesfuly</h1>";
        } else if($page == '/views/voitures/voitures.php') {
            echo "<h1 class='text-2xl font-semibold text-center'>Voiture updated succesfuly</h1>";
        } else {
            echo "<h1 class='text-2xl font-semibold text-center'>Contrats updated succesfuly</h1>";
        }
    ?>
</div>