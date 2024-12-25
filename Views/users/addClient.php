<?php require_once('../../isOwner/isOwner.php');?>

<div class="formAdd absolute z-10 w-2/6 bg-white p-5 top-20 rounded-md hidden">
    <h1 class="text-2xl font-semibold text-center mb-5">Add New Client</h1>
    <form action="./insertClient.php" method="post">
        <div class="flex gap-3 justify-between mb-4">
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="name">Name Client <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" id="name" name="name" placeholder="Enter name client">
            </div>
            <div class="flex flex-col w-2/4">
                <label class="ml-2" for="address">Address Client <span class="text-red-600">*</span></label>
                <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" id="address" name="address" placeholder="Enter address client">
            </div>
        </div>
        <div class="flex flex-col">
            <label class="ml-2" for="phone">Number Phone <span class="text-red-600">*</span></label>
            <input class="px-3 py-2 border-2 border-gray-400 rounded-md mt-1" type="text" id="phone" name="phone" placeholder="Enter phone client">
        </div>
        <div class="mt-5 flex justify-between">
            <button id="close" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-400">Close</button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-400" type="submit">Confirm</button>
        </div>
    </form>
</div>