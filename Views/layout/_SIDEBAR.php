<?php $page = $_SERVER['PHP_SELF'];?>

<style>
    @media (max-width:1024px) {
        .hideSidebar {
            transform: translate(0%);
            transition: 0.7s;
        }
        
        .hideSidebar.show {
            transform: translate(-16%);
            transition: 0.7s;
        }
    }

</style>

<div class="hideSidebar bg-[#2a2455] lg:rounded-md lg:col-span-2 fixed h-screen shadow-lg lg:static z-10 lg:z-0 lg:row-span-10 p-4 text-white">
    <div class="w-full flex justify-end lg:hidden toggle mb-4">
        <span class="text-3xl cursor-pointer text-white">
            <i class="fa-solid fa-bars"></i>
        </span>
    </div>
    <div class="flex items-center justify-center text-xl mb-8 hide">
        <?php echo "<img width='80' src='../../src/img/images_sidebar/logo.png' alt=''>" ?>
        <h1 class="font-semibold text-[#837bbe]">RENTAL CAR</h1>
    </div>

    <div class="image flex items-center mb-10">
        <?php echo "<img class='rounded-full bg-[#423c6b] w-10 h-10 border-2 border-[#7361ff]' src='../../src/img/images_sidebar/photo youcode.jpg' alt=''>" ?>
        <div class="ml-3">
            <h1 class="hide text-sm -mb-1"><?php echo $_SESSION['owner']['username'] ?></h1>
            <span class="hide text-gray-400 text-[12px]"><?php echo $_SESSION['owner']['email'] ?></span>
        </div>
    </div>
    
    <h1 class="hide">Dashboard</h1>
    <div class="mt-2 mb-4">
        <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/dashboard.php') echo 'bg-[#595480]' ?>" href="/views/dashboard.php">
            <?php echo "<img class='p-1 bg-blue-600 rounded-md mr-4' width='26' src='../../src/img/images_sidebar/pie-chart.svg' alt=''>" ?>
            <span class="hide">
                Dashboard
            </span>
        </a>

    </div>

    <h1 class="hide">Pages</h1>
    <div class="flex flex-col mt-2 mb-4">
        <a class="p-2 mb-1 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/users/users.php') echo 'bg-[#595480]' ?>" href="/views/users/users.php">
        <?php echo "<img class='p-1 bg-emerald-600 rounded-md mr-4' width='26' src='../../src/img/images_sidebar/users.svg' alt=''>" ?>
            <span class="hide">
                Clients
            </span>
        </a>
        <a class="p-2 mb-1 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/voitures/voitures.php') echo 'bg-[#595480]' ?>" href="/views/voitures/voitures.php">
            <?php echo "<img class='p-1 bg-cyan-600 rounded-md mr-4' width='27' src='../../src/img/images_sidebar/car.svg' alt=''>" ?>
            <span class="hide">
                Cars
            </span>
        </a>
        <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/contrats/contrats.php') echo 'bg-[#595480]' ?>" href="/views/contrats/contrats.php">
            <?php echo "<img class='p-1 bg-purple-600 rounded-md mr-4' width='27' src='../../src/img/images_sidebar/contract.svg' alt=''>" ?>
            <span class="hide">
                Contracts
            </span>
        </a>
    </div>

    <h1 class="hide">Log out</h1>
    
    <div class="mt-2">
        <a class="p-2 mb-1 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/auth/login.php') echo 'bg-[#595480]' ?>" href="/views/auth/logout.php">
            <?php echo "<img class='p-1 bg-red-600 rounded-md mr-4' width='26' src='../../src/img/images_sidebar/log-out.svg' alt=''>" ?>
                <span class="hide">
                    Log out
                </span>
        </a>
    </div>
</div>

<script>
    const hideAll = document.querySelectorAll('.hide');
    const toggle = document.querySelector('.toggle');
    const hideSidebar = document.querySelector('.hideSidebar');

    toggle.addEventListener('click', () => {
        hideAll.forEach(hide => {
            hide.style.transition = '2s';
            hide.classList.toggle('hidden');
            toggle.classList.toggle('justify-center');
            document.querySelector('.image').classList.toggle('justify-center');
            document.querySelector('.image').classList.toggle('flex-col');

        })
        hideSidebar.classList.toggle('show');
    })


</script>