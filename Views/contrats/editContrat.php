<?php 
    require_once('../../isLogged/isOwner.php');
    require_once __DIR__ . '/../../controllers/VoitureController.php';
    require_once __DIR__ . '/../../controllers/ClientController.php';
    require_once __DIR__ . '/../../controllers/ContratController.php';

    if(isset($_GET['idEditContrat'])) {
        $getId = $_GET['idEditContrat'];

        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const formEdit = document.querySelector('.formEdit');
                formEdit.classList.remove('hidden');
            });
        </script>";
    
        $clients = new ClientController();
        $resultClients = $clients->index();

        $voitures = new VoitureController();
        $resultVoitures = $voitures->getAllVoitures();

        $contrat = new ContratController();
        $resultContrat = $contrat->getContratById($getId);
    }
?>

<div class="formEdit absolute z-10 w-2/5 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Edit Contract</h1>
    <form action="./updateContrats.php" method="post">
        <?php if($resultContrat) { ?>
            <div class="flex gap-3 justify-between mb-4">
                <div class="flex flex-col w-2/4">
                    <label class="ml-2" for="nameClient2">Name Client <span class="text-red-600">*</span></label>
                    <?php if($resultClients) { ?>
                        <select name="idClient" id="nameClient2" class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1">
                            <?php foreach( $resultClients as $client) { ?>
                                <option value="<?php echo $client['id'] ?>" <?php if($resultContrat['numClient'] == $client['id']) echo 'selected' ?>><?php echo $client['username'] ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>
                <div class="flex flex-col w-2/4">
                    <label class="ml-2" for="N° Immatriculation2">N° Immatriculation <span class="text-red-600">*</span></label>
                    <?php if($resultVoitures) { ?>
                        <select name="idVoiture" id="N° Immatriculation2" class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1">
                            <?php foreach( $resultVoitures as $voiture) { ?>
                                <option value="<?php echo $voiture['id'] ?>" <?php if($resultContrat['numVoiture'] == $voiture['id']) echo 'selected' ?>><?php echo $voiture['numImmatriculation'] ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>
            </div>
            <div class="flex gap-3 justify-between mb-4">
                <div class="flex flex-col w-2/4">
                    <input type="hidden" name="idContrat" value="<?php echo $resultContrat['id'] ?>">
                    <label class="ml-2" for="dateDebut2">Date Debut <span class="text-red-600">*</span></label>
                    <input class="dateDebut px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="date" name="dateDebut" value="<?php echo $resultContrat['dateDebut'] ?>" id="dateDebut2">
                </div>
                <div class="flex flex-col w-2/4">
                    <label class="ml-2" for="dateFin2">Date Fin <span class="text-red-600">*</span></label>
                    <input class="dateFin px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="date" name="dateFin" value="<?php echo $resultContrat['dateFin'] ?>" id="dateFin2">
                </div>
            </div>
            <div class="flex flex-col mt-4">
                <label class="ml-2" for="">Duree</label>
                <input class="inputDuree" type="hidden" name="duree" value="<?php echo $resultContrat['duree'] ?>">
                <p class="duree p-2 bg-gray-300 rounded-md"><?php echo $resultContrat['duree'] ?></p>
            </div>
            <div class="mt-5 flex justify-between">
                <button class="closeForm px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400" type="button">Close</button>
                <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400">Confirm</button>
            </div>
        <?php } ?>
    </form>
</div>
