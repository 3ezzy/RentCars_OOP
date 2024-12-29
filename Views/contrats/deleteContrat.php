<?php
    require_once('../../isLogged/isOwner.php');
    require_once __DIR__ . '/../../controllers/ContratController.php';

    //  check if the id exist in url and get it
    if(isset($_GET['idDeleteContrat'])) {
        $getId = $_GET['idDeleteContrat'];
        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const formDelete = document.querySelector('.formDelete');
                formDelete.classList.remove('hidden');
            });
        </script>";

    }

    $contrat = new ContratController();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idContrat = $_POST['idContrat'];
        if($contrat->deleteContrat($idContrat)) {
            header('location: contrats.php?alert=success_delete');
        }
    }

    
?>

<div class="formDelete absolute z-10 w-1/4 bg-white p-5 top-20 rounded-md hidden text-center">
    <div class="w-full flex justify-center mb-10 mt-5">
        <div class="w-28 h-28 rounded-full border-[4px] border-yellow-500 flex justify-center items-center">
            <span class="text-6xl text-yellow-500">!</span>
        </div>
    </div>

    <h1 class="text-2xl font-semibold text-center mb-4">Are You Sure You Want Delete This Contract</h1>
    
    <form action="./deleteContrat.php" method="post">
        
        <input type="hidden" name="idContrat" value="<?php echo $resultgetContrat['id'] ?>">
       
        <div class="mt-10 flex justify-evenly">
            <button type="button" class="closeForm px-3 py-2 w-2/6 bg-red-600 text-white rounded-md hover:bg-red-400">No</button>
            <button class="px-3 py-2 w-2/6 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Yes</button>
        </div>
    </form>
</div>