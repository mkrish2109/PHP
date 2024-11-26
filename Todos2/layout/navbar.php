<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="flex items-center justify-between bg-[#5f5f5f] text-[#fff] px-[32px] py-[24px]">
        <div class="flex items-center gap-[8px]">
            <h1 class="text-[#BCFD4C] font-bold text-2xl md:4xl">TODOS</h1>
        </div>

        <!-- Hamburger Icon for Mobile View -->
        <div class="md:hidden">
            <button id="hamburger" class="text-white h-2 w-2">
                <i class="fa fa-bars text-4xl"></i>
            </button>
        </div>

        <!-- Navigation Links (Hidden on Mobile) -->
        <ul class="flex items-center gap-[10px] list-none text-[1.1rem] hidden md:flex">
            <li class='font-medium p-[10px]'>
                <a href="profile.php">Home</a>
            </li>
            <li class='font-medium p-[10px]'>
                <a href="taskPage.php">Todos</a>
            </li>
            <li>
                <button id='logout' class='bg-red-600 hover:bg-red-700 px-2 py-1 rounded-md font-medium'>
                    LogOut
                </button>
            </li>
        </ul>

        <!-- Mobile Menu (Hidden by default) -->
        <ul id="mobile-menu"
            class="md:hidden absolute top-[70px] z-10 right-0 bg-[#5f5f5f] text-white w-full p-4 hidden">
            <li class='font-medium p-[10px] border-b-2	border-gray-500'>
                <a href="profile.php">Home</a>
            </li>
            <li class='font-medium p-[10px] border-b-2	border-gray-500'>
                <a href="taskPage.php">Todos</a>
            </li>
            <li class="pt-2">
                <button id='logout1' class='bg-red-600 hover:bg-red-700 px-2 py-1 rounded-md font-medium m'>
                    LogOut
                </button>
            </li>

        </ul>
    </nav>

    <script>
        $(document).ready(function () {
            // Toggle mobile menu
            $('#hamburger').click(function () {
                $('#mobile-menu').toggleClass('hidden');
            });

            // Logout action
            $('#logout1','#logout').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '../logout.php',
                    success: function () {
                        // toastr.error("Record Updated", "Successfully Updated", { timeOut: 10000 })
                        alert("You have been logged out");
                        window.location.href = "../index.php";
                    }
                })
            });
            $('#logout').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '../logout.php',
                    success: function () {
                        // toastr.error("Record Updated", "Successfully Updated", { timeOut: 10000 })
                        alert("You have been logged out");
                        window.location.href = "../index.php";
                    }
                })
            });
        });
    </script>
</body>

</html>