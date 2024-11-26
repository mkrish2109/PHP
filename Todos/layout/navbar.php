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
        <div class="items-center flex gap-[8px]">
            <h1 class="text-[#BCFD4C] font-bold	text-4xl">TODOS</h1>
        </div>
        <ul class="flex items-center gap-[10px] list-none text-[1.1rem]">
            <li class='font-medium [text-decoration-line:none] p-[10px]'>
                <a href="profile.php">Home</a>
            </li>

            <li class='font-medium [text-decoration-line:none] p-[10px]'>
                <a href="taskPage.php">Todos</a>
            </li>
            <li>
                <button id='logout'
                    class='bg-red-600 enabled:hover:bg-red-700 px-2 py-1 rounded-md font-medium'>LogOut</button>
            </li>
        </ul>
    </nav>
</body>


<script>
    $(document).ready(function () {
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

</html>