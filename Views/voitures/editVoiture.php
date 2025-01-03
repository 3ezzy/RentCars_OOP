<?php
require_once('../../isLogged/isOwner.php');
if (isset($_GET['idEditVoiture'])) {
    $getId = $_GET['idEditVoiture'];

    echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const formEdit = document.querySelector('.formEdit');
                formEdit.classList.remove('hidden');
            });
        </script>";

    $voiture = new VoitureController();
    $resultVoiture = $voiture->getVoitureById($getId);
}

?>

<div class="formEdit absolute z-10 w-5/6 md:w-3/5 lg:w-2/6 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Edit Car</h1>
    <form action="./updateVoiture.php" method="post" enctype="multipart/form-data">
        <div class="md:flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="immatriculation2">N° Immatriculation <span class="text-red-600">*</span></label>
                <input type="hidden" name="idVoiture" value="<?php echo $resultVoiture['id'] ?>">
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="Immatriculation" value="<?php echo $resultVoiture['numImmatriculation'] ?>" id="immatriculation2" placeholder="Enter number immatriculation">
            </div>
            <div class="flex flex-col w-full md:w-2/4">
                <label class="ml-2" for="marque2">Marque <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="marque" value="<?php echo $resultVoiture['marque'] ?>" id="marque2" placeholder="Enter marque car">
            </div>
        </div>
        <div class="md:flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="modele2">Modele <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="modele" value="<?php echo $resultVoiture['modele'] ?>" id="modele2" placeholder="Enter modele car">
            </div>
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="year">Year <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="number" name="annee" value="<?php echo $resultVoiture['annee'] ?>" id="year" placeholder="Enter year car">
            </div>
        </div>
        <div class="flex flex-col mb-4">
            <label class="ml-2" for="priceHour">Price / hour <span class="text-red-600">*</span></label>
            <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="number" name="priceHour" value="<?php echo $resultVoiture['priceHour'] ?>" id="priceHour" placeholder="Enter price car for hour">
        </div>
        <div class="flex flex-col">
            <label class="ml-2" for="year">Upload Image <span class="text-red-600">*</span></label>
            <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="file" name="imageCar" value="<?php echo $resultVoiture['image'] ?>" id="imageCar">
        </div>
        <div class="mt-5 flex justify-between">
            <button class="closeForm px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400" type="button">Close</button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Confirm</button>
        </div>
    </form>
</div>

<script>
    const closeEdit = document.querySelector('#closeEdit');

    closeEdit.addEventListener('click', () => {
        window.location.href = 'voitures.php';
    });
</script>