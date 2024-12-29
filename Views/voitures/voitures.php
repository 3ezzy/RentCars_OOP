<?php 
    require_once('../../isLogged/isOwner.php');
    require __DIR__ . '/../../controllers/VoitureController.php';

    $voitures = new VoitureController();
    $resultVoitures = $voitures->getAllVoitures();
    
?>

<?php 
include ('../layout/_HEAD.php'); 
?>


<div class="lg:w-5/6 md:w-4/5 flex flex-col items-center">
    <div class="w-full">
        <header class="rounded-md py-4 w-full">
            <input class="p-2 w-52 md:w-2/5 rounded-md bg-[#5b5680] focus:bg-white outline-none" type="search" placeholder="Search...">
        </header>
    
        <div class="py-10">
            <h1 class="text-white text-6xl font-semibold">List of Cars</h1>
        </div>
    
        <div class="mt-2 rounded-md text-white flex">
            <button class="showFormAdd py-2 px-4 rounded-md hover:bg-[#5b5680]"><i class="fa-solid fa-user-plus"></i> Add Car</button>
            <button class="py-2 px-4 rounded-md hover:bg-[#5b5680]"><i class="fa-solid fa-arrow-down-a-z"></i> Sort Cars</button>
        </div>
        <div class="hideScroll overflow-scroll w-full p-1 rounded-md">
            <table class="w-full mx-auto table-auto text-center text-gray-300">
                <thead>
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">N° Immatriculation</th>
                        <th class="p-4">Marque</th>
                        <th class="p-4">Modele</th>
                        <th class="p-4">Anne</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-[#2a2455]">
                    <!-- display all voitures -->
                    <?php if($resultVoitures) { ?>
                        <?php $index = 0; foreach($resultVoitures as $voiture) { ?>
                            <tr class="border-t-[0.2px] border-gray-500 hover:bg-[#585286]">
                                <td class="px-2 py-4"><?php echo $index +=1 ?></td>
                                <td class="px-2 py-4"><?php echo $voiture['numImmatriculation'] ?></td>
                                <td class="px-2 py-4"><?php echo $voiture['marque'] ?></td>
                                <td class="px-2 py-4"><?php echo $voiture['modele'] ?></td>
                                <td class="px-2 py-4"><?php echo $voiture['annee'] ?></td>
                                <td class="px-2 py-4 min-w-60">
                                    <a href="./voitures.php?idEditVoiture=<?php echo $voiture['id'] ?>" class="showFormEdit bg-blue-700 rounded-full px-2 py-1 text-white text-[13px] hover:bg-blue-500 mr-2">
                                        <i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit
                                    </a>
                                    <a href="./voitures.php?idDeleteVoiture=<?php echo $voiture['id'] ?>" class="showFormDelete bg-red-700 rounded-full px-2 py-1 text-white text-[13px] hover:bg-red-500 cursor-pointer">
                                        <i class="fa-regular fa-trash-can"></i>&nbsp;Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('./addVoiture.php') ?>
    <?php include('./editVoiture.php') ?>
    <?php include('./deleteVoiture.php') ?>
    <?php include('../../alertAdd.php') ?>
    <?php include('../../alertEdit.php') ?>
    <?php include('../../alertDelete.php') ?>
</div>

<?php 
    
    include('../layout/_FOOTER.php');
    if(isset($_GET['alert'])) {
        $alert = $_GET['alert'];

        if($alert == 'success_add') {
            echo "<script>
                const showAlertAdd = document.querySelector('.showAlertAdd');
                showAlertAdd.classList.remove('hidden')

                setTimeout(() => {
                    window.location.href = 'voitures.php'
                }, 3000)
            </script>";
        } else if ($alert == 'success_update') {
            echo "<script>
                const showAlertEdit = document.querySelector('.showAlertEdit');
                showAlertEdit.classList.remove('hidden')

                setTimeout(() => {
                    window.location.href = 'voitures.php'
                }, 3000)
            </script>";
        } else {
            echo "<script>
                const showAlertDelete = document.querySelector('.showAlertDelete');
                showAlertDelete.classList.remove('hidden')

                setTimeout(() => {
                    window.location.href = 'voitures.php'
                }, 3000)
            </script>";
        }
    }
?>