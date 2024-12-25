<?php
    require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');
    
    // select table users
    $clients = "SELECT * FROM clients";
    $resultClients = mysqli_query($conn, $clients);
?>

<?php include('../layout/_HEAD.php'); ?>

    <div class="md:ml-[75px] lg:ml-0 md:col-span-10 lg:col-span-8 row-span-1 py-4 px-6 bg-[#2a2455] rounded-md text-white flex justify-between">
        <button class="showFormAdd py-2 px-4 bg-[#423c6b] rounded-md hover:bg-[#5b5680]"><i class="fa-solid fa-user-plus"></i> Add Client</button>
        <button class="py-2 px-4 bg-[#423c6b] rounded-md hover:bg-[#5b5680]"><i class="fa-solid fa-arrow-down-a-z"></i> Sort Clients</button>
    </div>
    
    <div class="md:ml-[75px]lg:ml-0 md:col-span-10 lg:col-span-8 col-span-8 row-span-8 flex justify-center">
        <div class="w-full bg-[#2a2455] p-10 rounded-md">
            <table class="w-full mx-auto table-auto text-center text-gray-300">
                <thead>
                    <tr class="bg-[#191444]">
                        <th class="p-4">ID</th>
                        <th class="p-4">Name</th>
                        <th class="p-4">Address</th>
                        <th class="p-4">Number Phone</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- display all users -->
                    <?php if($resultClients) { ?>
                        <?php $index = 0; while($client = mysqli_fetch_assoc($resultClients)) { ?>
                            <tr class="border-t-[0.2px] border-gray-500 hover:bg-[#585286]">
                                <td class="px-2 py-4"><?php echo $index +=1 ?></td>
                                <td class="px-2 py-4"><?php echo $client['name'] ?></td>
                                <td class="px-2 py-4"><?php echo $client['address'] ?></td>
                                <td class="px-2 py-4"><?php echo $client['numberPhone'] ?></td>
                                <td class="px-2 py-4">
                                    <a href="./users.php?idEditUser=<?php echo $client['id'] ?>" class="showFormEdit bg-blue-700 rounded-full px-2 py-1 text-white text-[13px] hover:bg-blue-500 mr-2">
                                        <i class="fa-solid fa-user-pen"></i>&nbsp;Edit
                                    </a>
                                    <a href="./users.php?idDeleteUser=<?php echo $client['id'] ?>" class="showFormDelete bg-red-700 rounded-full px-2 py-1 text-white text-[13px] hover:bg-red-500 cursor-pointer">
                                        <i class="fa-solid fa-user-minus"></i>&nbsp;Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php include('./addClient.php') ?>
        <?php include('./editClient.php') ?>
        <?php include('./deleteClient.php') ?>
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
                    window.location.href = 'users.php'
                }, 3000)
            </script>";
        } else if($alert == 'success_update') {
            echo "<script>
                const showAlertEdit = document.querySelector('.showAlertEdit');
                showAlertEdit.classList.remove('hidden')

                setTimeout(() => {
                    window.location.href = 'users.php'
                }, 3000)
            </script>";
        } else {
            echo "<script>
                const showAlertDelete = document.querySelector('.showAlertDelete');
                showAlertDelete.classList.remove('hidden')

                setTimeout(() => {
                    window.location.href = 'users.php'
                }, 3000)
            </script>";
        }
    }
?>