<?php
require_once '../../isLogged/isClient.php';
require_once __DIR__ . '/../../controllers/VoitureController.php';
require __DIR__ . '/../../controllers/ContratController.php';
if (isset($_GET['idVoiture'])) {
    $getId = $_GET['idVoiture'];

    echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const formReserve = document.querySelector('.formReserve');
                formReserve.classList.remove('hidden');
            });
        </script>";

    $voiture = new VoitureController();
    $resultVoiture = $voiture->getVoitureById($getId);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idClient = $_POST['username'];
    $idVoiture = $_POST['idVoiture'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $duree = $_POST['duree'];

    $contrat = new ContratController();

    if($contrat->CreatContrat($idClient, $idVoiture, $dateDebut, $dateFin, $duree)) {
        header('location: voitures.php');
    }
}

?>

<div class="formReserve absolute z-10 w-5/6 md:w-3/5 lg:w-2/6 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Reserve Car</h1>
    <form action="./reserve.php" method="post">
        <div class="flex mb-6">
            <div class="w-12 h-12 mr-2">
                <img class="object-cover rounded-full" src="../../src/img/images_sidebar/photo youcode.jpg" alt="">
            </div>
            <div class="flex flex-col justify-center">
                <input type="hidden" name="username" value="<?php echo $_SESSION['user']['id'] ?>">
                <p class="font-semibold"><?php echo $_SESSION['user']['username'] ?></p>
                <span class="text-sm text-gray-500"><?php echo $_SESSION['user']['email'] ?></span>
            </div>
        </div>
        <div class="flex gap-3 mb-4">
            <div class="p-2 w-2/4 bg-gray-300 rounded-md">
                <input type="hidden" name="idVoiture" value="<?php echo $resultVoiture['id'] ?>" id="">
                <p><?php echo $resultVoiture['numImmatriculation'] ?></p>
            </div>
            <div class="p-2 w-2/4 bg-gray-300 rounded-md">
                <p><?php echo $resultVoiture['marque'] ?></p>
            </div>
        </div>
        <div class="md:flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="dateDebut">Date Debut <span class="text-red-600">*</span></label>
                <input class="dateDebut px-3 py-1 border-2 border-gray-400 rounded-md mt-1" type="date" name="dateDebut" id="dateDebut">
            </div>
            <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                <label class="ml-2" for="dateFin">Date Fin <span class="text-red-600">*</span></label>
                <input class="dateFin px-3 py-1 border-2 border-gray-400 rounded-md mt-1" value="" type="date" name="dateFin" id="dateFin">
            </div>
        </div>
        <div>
        <div class="flex flex-col mt-4">
            <label class="ml-2" for="">Duree</label>
            <input class="inputDuree" type="hidden" name="duree">
            <p class="duree p-2 bg-gray-300 rounded-md">0</p>
        </div>
        <div class="mt-5 flex justify-between">
            <button id="closeEdit" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400" type="button">Close</button>
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