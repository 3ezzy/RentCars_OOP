<?php
session_start();
    require_once __DIR__. '/../../controllers/AuthController.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $authLogin = new AuthController("",$email, $password, "");
        $user = $authLogin->user();

        if($user && password_verify($password, $user['password'])) {
            if($user['role'] == 1) {
                $_SESSION['user'] = $user;
                header('location: ../dashboard.php');
            } else{
                $_SESSION['user'] = $user;
                header('location: ../voitures/voitures.php');
            }
        } else {
            echo "password or email not correct";
        }
    }

?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Cars | login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Arrows:wght@400..700&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=League+Spartan:wght@100..900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sansita+Swashed:wght@300..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#16113a] font-['Poppins']">
    <div class="bg-[#2a2455] w-2/5 mx-auto mt-32 rounded-md p-7">
        <h1 class="text-center text-5xl font-semibold text-white mb-4">Sgin in</h1>
        <form action="./login.php" method="post">
            <div class="flex flex-col mb-4">
                <label class="text-white mb-1" for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" class="p-2 rounded-md">
                
            </div>

            <div class="flex flex-col">
                <label class="text-white mb-1" for="">Password</label>
                <input type="text" name="password" placeholder="Enter your password" class="p-2 rounded-md">
                
            </div>
            <button type="submit" class="mt-6 px-4 py-2 bg-[#5543d9] hover:bg-[#3c3286] rounded-md text-white">Sgin in</button>

        </form>
        <div class="mt-4">
            <span class="text-white">
                <a href="/views/auth/register.php" class="text-blue-600 hover:text-blue-400">Create account</a>&nbsp;
                if you don't have one
            </span>
        </div>
    </div>
    
</body>
</html>