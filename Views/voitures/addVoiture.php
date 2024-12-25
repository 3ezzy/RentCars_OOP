<?php  require_once('../../isOwner/isOwner.php'); ?>

<div class="formAdd absolute z-10 w-2/5 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Add New Voiture</h1>
    <form action="./insertVoiture.php" method="POST">
        <div class="flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="immatriculation">Number Immatriculation <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="immatriculation" id="immatriculation" placeholder="Enter number immatriculation">
            </div>
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="marque">Marque <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="marque" id="marque" placeholder="Enter marque car">
            </div>
        </div>
        <div class="flex flex-col mb-4">
            <label class="ml-2" for="modele">Modele <span class="text-red-600">*</span></label>
            <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="modele" id="modele" placeholder="Enter modele car">
        </div>
        <div class="flex flex-col">
            <label class="ml-2" for="anne">Anne <span class="text-red-600">*</span></label>
            <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" name="annee" id="annee" placeholder="Enter year car">
        </div>
        <div class="mt-5 flex justify-between">
            <button id="close" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400">Close</button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Confirm</button>
        </div>
    </form>
</div>