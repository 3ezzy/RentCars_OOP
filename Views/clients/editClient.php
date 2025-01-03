<?php 
    require_once('../../isLogged/isOwner.php');
    require_once __DIR__ . '/../../controllers/UserManager.php';
    //  check if the id exist in url and get it
    if(isset($_GET['idEditUser'])) {
        $getId = $_GET['idEditUser'];
        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const formEdit = document.querySelector('.formEdit');
                formEdit.classList.remove('hidden');
            });
        </script>";

        $showClient = new UserManager();

        $resultClient = $showClient->show($getId);
    }
?>

<div class="formEdit absolute z-10 w-5/6 md:w-3/5 lg:w-2/6 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Edit Client</h1>
    <form action="./updateClient.php" method="POST">
    <?php if($resultClient) { ?>
            <div class="md:flex gap-3 justify-between mb-4">
                <input type="hidden" name="idUser" value="<?php echo $resultClient['id'] ?>">
                <div class="flex flex-col w-full md:w-2/4 mb-4 md:mb-0">
                    <label class="ml-2" for="name2">Name Client <span class="text-red-600">*</span></label>
                    <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" value="<?php echo $resultClient['username'] ?>" name="updateName" id="name2" placeholder="Enter name client">
                </div>
                <div class="flex flex-col w-full md:w-2/4">
                    <label class="ml-2" for="email2">Name Client <span class="text-red-600">*</span></label>
                    <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" value="<?php echo $resultClient['email'] ?>" name="updateEmail" id="email2" placeholder="Enter name client">
                </div>
            </div>
            <div class="flex flex-col mb-4">
                <label class="ml-2" for="address2">Address Client <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" value="<?php echo $resultClient['address'] ?>" name="updateAddress" id="address2" placeholder="Enter address client">
            </div>
            <div class="flex flex-col">
                <label class="ml-2" for="phone2">Number Phone <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" value="<?php echo $resultClient['numberPhone'] ?>" id="phone2" name="updatePhone" placeholder="Enter phone client">
            </div>
            <?php } ?>
        <div class="mt-5 flex justify-between">
            <button type="button" class="closeForm px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400">Close</button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Confirm</button>
        </div>
    </form>
</div>

<script>
    const closeEdit = document.querySelector('#closeEdit');
    
    closeEdit.addEventListener('click', () => {
        window.location.href = 'clients.php';
    });

</script>