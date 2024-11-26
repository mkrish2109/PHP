<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<?php
if (isset($_COOKIE["userId"])) {
    header("Location: http://localhost/Krishphp/Todos/pages/profile.php");
} else {
    ?>

    <body>
        <div id="login" class="items-center flex justify-center h-[calc(100vh-88px-90px)] ">
            <div
                class="px-8 pb-8 pt-2 rounded-lg min-w-[300px] max-w-md flex [box-shadow:0px_12px_99px_15px_rgba(0,0,0,0.1)]  flex-col gap-4 ">
                <h1 class="text-center text-4xl pb-4 pt-2 font-serif">Login</h1>
                <div>
                    <div class="mb-2 block">
                        <label for="email" value="Your email">Your Email</label>
                    </div>
                    <input id="loginEmail" type="email" name="loginEmail"
                        class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                        placeholder="name@flowbite.com" required />
                </div>
                <div>
                    <div class="mb-2 block">
                        <label for="password" value="Your password">Your Password</label>
                    </div>
                    <input id="loginPassword" name="loginPassword" type="password" required
                        class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" />
                </div>
                <button id="loginSubmit"
                    class="bg-[#BCFD4C] text-black enabled:hover:bg-[#9aec0c] px-1 py-2 rounded-md">Login</button>
                <!-------------------------------------------------->
                <p class="text-center">OR</p>
                <button id="showRegister" class="text-center underline hover:underline-offset-4 hover:text-[#679a0f]"
                    href="register.php">
                    Register
                </button>
            </div>
        </div>
    </body>
    <script src="./Script/loginScript.js"></script>

    </html>
<?php } ?>