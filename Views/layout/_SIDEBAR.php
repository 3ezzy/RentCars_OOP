<?php $page = $_SERVER['PHP_SELF'];?>

<div class="bg-[#2a2455] lg:rounded-md shadow-lg w-full flex items-center justify-between fixed left-0 bottom-0 md:bottom-3 md:static md:block md:h-screen md:flex-col md:w-1/5 lg:w-1/6 md:p-4 text-white">
    <div class="md:flex md:flex-col items-center justify-center text-xl md:mb-8 hidden">
        <?php echo "<img width='80' src='../../src/img/images_sidebar/logo.png' alt=''>" ?>
        <h1 class="font-semibold text-[#837bbe]">RENTAL CAR</h1>
    </div>

    <div class="image flex items-center md:mb-10 md:flex-col p-2">
        <?php echo "<img class='rounded-full bg-[#423c6b] w-12 h-12 md:w-20 md:h-20 border-2 border-[#7361ff]' src='../../src/img/images_sidebar/photo youcode.jpg' alt=''>" ?>
        <div class="ml-3 hidden md:block md:text-center mt-2">
            <h1 class=" text-sm -mb-1"><?php echo $_SESSION['user']['username'] ?></h1>
            <span class=" text-gray-400 text-[12px]"><?php echo $_SESSION['user']['email'] ?></span>
        </div>
    </div>
    
    <?php if($_SESSION['user']['role'] == true) { ?>
        <h1 class="hidden lg:block">Dashboard</h1>
        <div class="">
            <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/dashboard.php') echo 'bg-[#595480]' ?>" href="/views/dashboard.php">
                <?php echo "<img class='p-1 bg-blue-600 rounded-md w-9 h-9' src='../../src/img/images_sidebar/pie-chart.svg' alt=''>" ?>
                <span class="hidden lg:block ml-2">
                    Dashboard
                </span>
            </a>

        </div>

        <h1 class="hidden lg:block md:mt-4 mb-1">Pages</h1>
        <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center mb-1 <?php if($page == '/views/clients/clients.php') echo 'bg-[#595480]' ?>" href="/views/clients/clients.php">
            <?php echo "<img class='p-1 bg-emerald-600 rounded-md w-9 h-9' src='../../src/img/images_sidebar/users.svg' alt=''>" ?>
            <span class="hidden lg:block ml-2">
                Clients
            </span>
        </a>
        
        <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center mb-1 <?php if($page == '/views/voitures/voitures.php') echo 'bg-[#595480]' ?>" href="/views/voitures/voitures.php">
            <?php echo "<img class='p-1 bg-cyan-600 rounded-md w-9 h-9' src='../../src/img/images_sidebar/car.svg' alt=''>" ?>
            <span class="hidden lg:block ml-2">
                Cars
            </span>
        </a>

        <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/contrats/contrats.php') echo 'bg-[#595480]' ?>" href="/views/contrats/contrats.php">
            <?php echo "<img class='p-1 bg-purple-600 rounded-md w-9 h-9' src='../../src/img/images_sidebar/contract.svg' alt=''>" ?>
            <span class="hidden lg:block ml-2">
                Contracts
            </span>
        </a>
    <?php } else { ?>
        <h1 class="hidden lg:block md:mt-4 mb-1">Pages</h1>
        <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center mb-1 <?php if($page == '/views/pageClient/voitures.php') echo 'bg-[#595480]' ?>" href="/views/pageClient/voitures.php">
            <?php echo "<img class='p-1 bg-cyan-600 rounded-md w-9 h-9' src='../../src/img/images_sidebar/car.svg' alt=''>" ?>
            <span class="hidden lg:block ml-2">
                Cars
            </span>
        </a>
    <?php } ?>

    <h1 class="hidden lg:block mt-4">Log out</h1>
    <div>
        <a class="p-2 hover:bg-[#595480] rounded-sm flex items-center <?php if($page == '/views/auth/login.php') echo 'bg-[#595480]' ?>" href="/views/auth/logout.php">
            <?php echo "<img class='p-1 bg-red-600 rounded-md w-9 h-9' src='../../src/img/images_sidebar/log-out.svg' alt=''>" ?>
                <span class="hidden lg:block ml-2">
                    Log out
                </span>
        </a>
    </div>
</div>