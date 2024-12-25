<?php
    require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');

    $clients = "SELECT * FROM clients";
    $voitures = "SELECT * FROM voitures";
    
    $resultClients = mysqli_query($conn, $clients);
    $resultVoitures = mysqli_query($conn, $voitures);

?>


<div class="formAdd absolute z-10 w-2/5 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Add Contract</h1>
    <form action="./insertContrats.php" method="post">
        <div class="flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="nameClient">Name Client <span class="text-red-600">*</span></label>
                <?php if($resultClients) { ?>
                    <select name="nameClient" id="nameClient" class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1">
                        <?php while($client = mysqli_fetch_assoc($resultClients)) { ?>
                            <option value="<?php echo $client['id'] ?>"><?php echo $client['name'] ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="N° Immatriculation">N° Immatriculation <span class="text-red-600">*</span></label>
                <?php if($resultVoitures) { ?>
                    <select name="immatriculation" id="N° Immatriculation" class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1">
                        <?php while($voiture = mysqli_fetch_assoc($resultVoitures)) { ?>
                            <option value="<?php echo $voiture['id'] ?>"><?php echo $voiture['numImmatriculation'] ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>
        </div>
        <div class="flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="dateDebut">Date Debut <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="date" name="dateDebut" id="dateDebut" placeholder="Enter modele car">
            </div>
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="dateFin">Date Fin <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="date" name="dateFin" id="dateFin" placeholder="Enter year car">
            </div>
        </div>
        <div class="flex flex-col">
            <label class="ml-2" for="duree">Duree <span class="text-red-600">*</span></label>
            <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="duree" id="duree" placeholder="Rental Period">
        </div>
        <div class="mt-5 flex justify-between">
            <button id="close" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400" type="button">Close</button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Confirm</button>
        </div>
    </form>
</div>