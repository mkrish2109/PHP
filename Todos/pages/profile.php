<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<link rel="stylesheet" href="../style/style.css">
<?php
if (isset($_COOKIE["userId"])) {
    $userId = $_COOKIE["userId"];
    $conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed.");
    $sql = "SELECT * FROM userdata WHERE id='{$userId}'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    }

    ?>

    <body>
        <?php include("../layout/navbar.php") ?>
        <div class="grid grid-cols-[250px_minmax(250px,_1fr)_100px] ">
            <div class=" ">
                <?php include("../layout/sideBar.php") ?>
            </div>
            <div class="ml-8">
                <h3 class="font-bold text-2xl pt-5 ">Profile</h3>
                <div class="grid grid-cols-2 items-center">
                    <div
                        class="justify-center  items-center flex [box-shadow:0px_12px_99px_15px_rgba(0,0,0,0.1)] p-8  gap-5">
                        <div class="items-center justify-center">

                            <button id="handleImg">
                                <div class="h-[200px] w-[200px] rounded-full 	">
                                    <img class=" rounded-full object-cover h-full w-full hover:cursor-pointer	"
                                        src='../image/<?php print ($user['image']) ? $user['image'] : "../image/user.png"; ?>'
                                        alt="" />
                                </div>
                            </button>

                            <p class="text-center pt-3 text-lg font-semibold">
                                <?php echo $user["username"]; ?>
                            </p>
                        </div>

                        <div class="">
                            <h2 class="text-2xl font-bold  border-b-2 border-[#BCFD4C] pb-2">
                                Information
                            </h2>
                            <p class="text-lg pt-6 font-semibold ">Email:</p>
                            <p class="text-lg "> <?php echo $user["email"]; ?></p>
                        </div>
                    </div>
                    <div class=" ">
                        <div class="items-center justify-center p-8 grow-[1] cols-1">
                            <div
                                class="flex max-w-md flex-col gap-4  [box-shadow:0px_12px_99px_15px_rgba(0,0,0,0.1)] p-7 rounded-lg ">
                                <div>
                                    <div class="mb-2 block">
                                        <label for="username" value="Username">Username</label>
                                    </div>
                                    <input id="username" name="username" type="text" placeholder="John Doe"
                                        class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                        value=<?php echo $user["username"]; ?> />
                                </div>
                                <div>
                                    <div class="mb-2 block">
                                        <label for="password" value="Password">Password</label>
                                    </div>
                                    <input id="password" type="password" name="password"
                                        class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" />
                                </div>
                                <div>
                                    <div class="mb-2 block">
                                        <label for="repeat-password" value="Confirm password">Confirm password</label>
                                    </div>
                                    <input id="cpassword" type="password" name="cpassword"
                                        class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" />
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
                            <button class="modal-close modal-toggle"><i style="font-size:24px"
                                    class="fa">&#xf00d;</i></button>
                            <h2 class="modal-heading">Update Form </h2>
                        </div>
                        <form id="uploadImg" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="p-6 flex justify-between">
                                    <input type="file" id="uploadFile" name="uploadFile">
                                    <button type="submit" id="uploadImg"
                                        class="bg-[#BCFD4C] text-black enabled:hover:bg-[#9aec0c] px-2 py-2 rounded-md">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <div>

        </div>
    </body>
    <script src="../Script/profileScript.js"></script>

    </html>
    <?php
} else {
    header("Location: http://localhost/Krishphp/login2/index.php");
    echo "No items for auction.";
}
?>