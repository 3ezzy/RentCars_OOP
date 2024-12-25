<?php session_start();

    session_destroy()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Cars | Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Arrows:wght@400..700&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=League+Spartan:wght@100..900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sansita+Swashed:wght@300..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#16113a] font-['Poppins']">

    <div class="bg-[#2a2455] w-2/5 mx-auto mt-32 rounded-md p-7">
        <h1 class="text-center text-white font-semibold text-5xl mb-6">Sgin up</h1>
        
        <form action="./newOwner.php" method="post">
            <div class="flex flex-col mb-4">
                <label class="text-white mb-1" for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" class="p-2 rounded-md">
                <?php
                    if(isset($_SESSION['validationUsername'])) {
                        echo "<p class='text-red-500 mt-1'>".$_SESSION['validationUsername']."</p>";
                    }
                ?>
            </div>
            <div class="flex flex-col mb-4">
                <label class="text-white mb-1" for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" class="p-2 rounded-md">
                <?php
                    if(isset($_SESSION['validationEmpEmail'])) {
                        echo "<p class='text-red-500 mt-1'>".$_SESSION['validationEmpEmail']."</p>";
                    }

                    if(isset($_SESSION['validationEmail'])) {
                        echo "<p class='text-red-500 mt-1'>".$_SESSION['validationEmail']."</p>";
                    }

                    if(isset($_SESSION['validationExistEmail'])) {
                        echo "<p class='text-red-500 mt-1'>".$_SESSION['validationExistEmail']."</p>";
                    }
                ?>
            </div>

            <div class="flex flex-col mb-4">
                <label class="text-white mb-1" for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Enter your password" class="p-2 rounded-md">
                <?php
                    if(isset($_SESSION['validationPassword'])) {
                        echo "<p class='text-red-500 mt-1'>".$_SESSION['validationPassword']."</p>";
                    }

                    if(isset($_SESSION['validationEmpPassword'])) {
                        echo "<p class='text-red-500 mt-1'>".$_SESSION['validationEmpPassword']."</p>";
                    }
                ?>
            </div>
            <div class="flex flex-col">
                <label class="text-white mb-1" for="confirm_password">Confirm Password</label>
                <input type="text" id="confirm_password" name="confirm_password" placeholder="Confirm your password" class="p-2 rounded-md">
                <?php
                 
                    if(isset($_SESSION['validationEmpConfirmPassword'])) {
                        echo "<p class='text-red-500 mt-1'>".$_SESSION['validationEmpConfirmPassword']."</p>";
                    }
                ?>
            </div>
            <button type="submit" class="mt-6 px-4 py-2 bg-[#5543d9] hover:bg-[#3c3286] text-white rounded-md">Sgin up</button>

            <div class="mt-4">
                <span class="text-white">
                    Go back to
                    <a href="/views/auth/login.php" class="text-blue-600 hover:text-blue-400 ml-1">Login</a>&nbsp;
                </span>
            </div>
        </form>
    </div>
    
</body>
</html>