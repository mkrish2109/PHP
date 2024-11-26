<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div id="register" style="display: none;" class="items-center justify-center flex h-[calc(100vh-88px-90px)] ">
        <div class=" flex max-w-md flex-col gap-4  [box-shadow:0px_12px_99px_15px_rgba(0,0,0,0.1)] p-7 rounded-lg">
            <h1 class="text-center text-4xl pb-2 pt-2 font-serif		">Register</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <div class="mb-2 block">
                        <label for="username" value="Username"
                            class="block text-sm/6 font-medium text-gray-900">Username</label>
                    </div>
                    <input id="username" name="username" type="text" placeholder="John Doe" required
                        class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" />
                </div>
                <div>
                    <div class="mb-2 block">
                        <label for="email" value="Email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                    </div>
                    <input id="registerEmail" name="registerEmail" type="email" placeholder="john12@gmail.com"
                        class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                        required />
                </div>
            </div>
            <div>
                <div class="mb-2 block">
                    <label for="password" value="Password"
                        class="block text-sm/6 font-medium text-gray-900">Password</label>
                </div>
                <input id="registerPassword" type="password" name="registerPassword"
                    class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                    required />
            </div>
            <div>
                <div class="mb-2 block">
                    <label for="cpassword" value="Repeat password"
                        class="block text-sm/6 font-medium text-gray-900">Repeat password</label>
                </div>
                <input id="cpassword" type="password" name="cpassword"
                    class=" block w-full rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                    required />
            </div>

            <button id="registerSubmit" class="bg-[#BCFD4C] text-black enabled:hover:bg-[#9aec0c] px-1 py-2 rounded-md">
                Register new account
            </button>
            <p class="text-center">OR</p>
            <button class="text-center underline hover:underline-offset-4 hover:text-[#679a0f]" id="showLogin">
                Login
            </button>
        </div>
    </div>
</body>

</html>