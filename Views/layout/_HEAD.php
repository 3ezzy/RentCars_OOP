<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Cars</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Arrows:wght@400..700&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=League+Spartan:wght@100..900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sansita+Swashed:wght@300..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#16113a] font-['Poppins']">
    <div class="w-full h-screen grid grid-cols-10 grid-rows-10 p-2 gap-2 relative">
        <!-- include sidebar -->
         <?php 
            if($_SERVER['PHP_SELF'] == '/views/dashboard.php') {
                include('./layout/_SIDEBAR.php');
            } else {
                include('../layout/_SIDEBAR.php');
            }
        ?>

        <header class="md:ml-[75px] md:col-span-10 lg:ml-0 lg:col-span-8 row-span-1 py-4 px-6 bg-[#2a2455] rounded-md flex justify-end">
            <input class="p-2 w-2/5 rounded-md" type="search" placeholder="Search...">
        </header>
    
