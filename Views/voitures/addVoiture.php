<?php  
require_once('../../isLogged/isOwner.php');
require_once __DIR__.('/../../controllers/VoitureController.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $immatriculation = $_POST['immatriculation'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $price = $_POST['price'];
    $imageCar = $_FILES['imageCar']['name'];
    $tempName = $_FILES['imageCar']['tmp_name'];
    $folder = '../../src/img/cars/'. $imageCar;

    if(move_uploaded_file($tempName, $folder)) {
        $voiture = new VoitureController();
        $addVoiture = $voiture->CreatVoiture($immatriculation, $marque, $modele, $annee, $price, $imageCar);
        header('Location: voitures.php?alert=success_add');
    }
}


?>

<div class="formAdd absolute z-10 w-5/6 md:w-3/5 lg:w-2/6 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Add New Car</h1>
    <form action="./addVoiture.php" method="POST" enctype="multipart/form-data">
        <div class="md:flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="immatriculation">N° Immatriculation <span class="text-red-600">*</span></label>
                <input class="px-3 py-1 border-2 border-gray-400 rounded-md mt-1" type="text" name="immatriculation" id="immatriculation" placeholder="Enter number immatriculation">
            </div>
            <div class="flex flex-col w-full md:w-2/4">
                <label class="ml-2" for="marque">Marque <span class="text-red-600">*</span></label>
                <input class="px-3 py-1 border-2 border-gray-400 rounded-md mt-1" type="text" name="marque" id="marque" placeholder="Enter marque car">
            </div>
        </div>
        <div class="md:flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="modele">Modele <span class="text-red-600">*</span></label>
                <input class="px-3 py-1 border-2 border-gray-400 rounded-md mt-1" type="text" name="modele" id="modele" placeholder="Enter modele car">
            </div>
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="anne">Anne <span class="text-red-600">*</span></label>
                <input class="px-3 py-1 border-2 border-gray-400 rounded-md mt-1" type="number" name="annee" id="annee" placeholder="Enter year car">
            </div>
        </div>
        <div class="flex flex-col mb-4">
                <label class="ml-2" for="anne">Price / hour <span class="text-red-600">*</span></label>
                <input class="px-3 py-1 border-2 border-gray-400 rounded-md mt-1" type="number" name="price" id="price" placeholder="Enter price car for hour">
        </div>
        <div class="flex flex-col">
            <label class="ml-2" for="anne">Upload Image <span class="text-red-600">*</span></label>
            <input class="px-3 py-1 border-2 border-gray-400 rounded-md mt-1" type="file" name="imageCar" id="imageCar">
        </div>
        <div class="mt-5 flex justify-between">
            <button type="button" class="closeForm px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400">Close</button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Confirm</button>
        </div>
    </form>
</div>