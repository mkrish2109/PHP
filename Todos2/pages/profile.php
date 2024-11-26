<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body class="bg-gray-100">

    <?php if (isset($_COOKIE["userId"])): ?>

        <?php
        include("../Database.php");
        $db = new Database();
        $userId = $_COOKIE["userId"];
        $result = $db->sql("SELECT * FROM userdata WHERE id='{$userId}'");

        if ($result && count($result) > 0) {
            $user = $result[0];
        }
        ?>

        <?php include("../layout/navbar.php") ?>

        <div
            class="grid grid-cols-[60px_minmax(60px,_1fr)] md:grid-cols-[100px_minmax(100px,_1fr)_100px] lg:grid-cols-[250px_minmax(250px,_1fr)_300px]  ">
            <div>
                <?php include("../layout/sideBar.php") ?>
            </div>
            <div class="flex-1 p-8">
                <h3 class="font-bold text-xl pb-5">Profile</h3>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-2">
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
                        <button id="handleImg">
                            <div class="h-48 w-48 rounded-full">
                                <img class="rounded-full object-cover h-full w-full hover:cursor-pointer"
                                    src='../image/<?php echo $user['image'] ? $user['image'] : "user.png"; ?>' alt="" />
                            </div>
                        </button>

                        <h2 class="text-2xl mt-4 font-bold border-b-2 border-[#BCFD4C] pb-1">Information</h2>

                        <div class="flex-col items-center justify-center gap-2 pt-2">
                            <div class="flex gap-1">
                                <p class="text-lg font-semibold">Username:</p>
                                <p class="text-center  text-lg ">
                                    <?php echo $user["username"]; ?>
                                </p>
                            </div>
                            <div class="flex gap-1">
                                <p class="text-lg font-semibold">Email:</p>
                                <p class="text-lg"> <?php echo $user["email"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-md rounded-lg p-6 w-full md:w-full lg:w-[350px]">
                        <div class="flex flex-col gap-4">
                            <div>
                                <label for="username" class="block mb-2">Username</label>
                                <input id="username" name="username" type="text" placeholder="John Doe"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                    value="<?php echo $user["username"]; ?>" />
                            </div>
                            <div>
                                <label for="password" class="block mb-2">Password</label>
                                <input id="password" type="password" name="password"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm" />
                            </div>
                            <div>
                                <label for="cpassword" class="block mb-2">Confirm password</label>
                                <input id="cpassword" type="password" name="cpassword"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm" />
                            </div>
                            <button type="submit" id="updateData"
                                class="bg-[#BCFD4C] font-semibold text-black enabled:hover:bg-[#9aec0c] px-2 py-2 rounded-md">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal">
                <div class="modal-overlay modal-toggle"></div>
                <div class="modal-wrapper modal-transition">
                    <div class="modal-header">
                        <button class="modal-close modal-toggle"><i style="font-size:24px" class="fa">&#xf00d;</i></button>
                        <h2 class="modal-heading">Update Form</h2>
                    </div>
                    <form id="uploadImg" enctype="multipart/form-data">
                        <div class="modal-body p-6 flex justify-between">
                            <input type="file" id="uploadFile" name="uploadFile">
                            <button type="submit" id="uploadImg"
                                class="bg-[#BCFD4C] text-black enabled:hover:bg-[#9aec0c] px-2 py-2 rounded-md">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    <?php else: ?>
        <?php header("Location: http://localhost/Krishphp/Todos2/index.php"); ?>
        <?php echo "No items for auction."; ?>
    <?php endif; ?>

    <script src="../Script/profileScript.js"></script>

</body>

</html>