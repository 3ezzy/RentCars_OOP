<?php 
    require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');

    if(isset($_GET['idEditContrat'])) {
        $getId = $_GET['idEditContrat'];

        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const formEdit = document.querySelector('.formEdit');
                formEdit.classList.remove('hidden');
            });
        </script>";
    
        $resultClients = mysqli_query($conn, "SELECT * FROM clients");
        $resultVoitures = mysqli_query($conn, "SELECT * FROM voitures");

        $contrat = mysqli_query($conn, "SELECT * FROM contrats WHERE id = $getId");
        $resultContrat = mysqli_fetch_assoc($contrat);
    }
?>

<div class="formEdit absolute z-10 w-2/5 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Edit Contract</h1>
    <form action="./updateContrats.php" method="post">
        <div class="flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="nameClient2">Name Client <span class="text-red-600">*</span></label>
                <?php if($resultClients) { ?>
                    <select name="idClient" id="nameClient2" class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1">
                        <?php while($client = mysqli_fetch_assoc($resultClients)) { ?>
                            <option value="<?php echo $client['id'] ?>" <?php if($resultContrat['numClient'] == $client['id']) echo 'selected' ?>><?php echo $client['name'] ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="N° Immatriculation2">N° Immatriculation <span class="text-red-600">*</span></label>
                <?php if($resultVoitures) { ?>
                    <select name="idVoiture" id="N° Immatriculation2" class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1">
                        <?php while($voiture = mysqli_fetch_assoc($resultVoitures)) { ?>
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
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="datetime-local" name="dateDebut" value="<?php echo $resultContrat['dateDebut'] ?>" id="dateDebut2" placeholder="Enter modele car">
            </div>
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="dateFin2">Date Fin <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="datetime-local" name="dateFin" value="<?php echo $resultContrat['dateFin'] ?>" id="dateFin2" placeholder="Enter year car">
            </div>
        </div>
        <div class="flex flex-col">
            <label class="ml-2" for="duree2">Duree <span class="text-red-600">*</span></label>
            <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="duree" value="<?php echo $resultContrat['duree'] ?>" id="duree2" placeholder="Rental Period">
        </div>
        <div class="mt-5 flex justify-between">
            <button id="closeEdit" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400">Close</button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Confirm</button>
        </div>
    </form>
</div>

<script>
    const closeEdit = document.querySelector('#closeEdit');
    
    closeEdit.addEventListener('click', () => {
        window.location.href = 'users.php';
    });
</script>