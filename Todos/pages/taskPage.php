<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style/style.css">

</head>
<style>
    .icon1 {
        height: 1rem;
        width: 1rem;
        fill: black;
        /* Initial color for bin icon */
        transition: fill 0.3s ease;
        /* Smooth transition for color change */
    }


    button:hover .icon1 {
        fill: white;

        /* Color on hover for SVG icons */
    }

    /* If needed, apply the same logic to other custom icons or elements */
</style>

<body>
    <?php include("../layout/navbar.php") ?>
    <div class="grid grid-cols-[250px_minmax(250px,_1fr)_100px] ">
        <div class=" ">
            <?php include("../layout/sideBar.php") ?>
        </div>
        <div>

            <div class='flex items-center justify-center mx-[10%] my-[1%] gap-[8px]' id="addContainer">

                <h2 class="text-[20px] font-extrabold whitespace-nowrap mr-[10px] tracking-wider">Add Task</h2>
                <input id="task" name="task" type="text" placeholder="Task"
                    class=" grow-[1] rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" />

                <input type="date" id="date"
                    class="cursor-pointer rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">

                <div>
                    <select name="" id="select"
                        class="cursor-pointer rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>

                <button
                    class="bg-[#bcfd4c] text-black enabled:hover:bg-[#8ee000] hover:text-[#ffff] px-2 py-2 rounded-md  flex items-center justify-center gap-2  "
                    id="addTask">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icon1">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                    Add Task
                </button>
                <a href="binPage.php">

                    <button
                        class="bg-[#67C8E5] text-black enabled:hover:bg-[#2671B7] hover:text-[#ffff] px-2 py-2 rounded-md flex items-center justify-center gap-2 "
                        id="bin">
                        <!-- <i class="fa-solid fa-trash"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icon1">
                            <path
                                d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>
                        Bin
                    </button>
                </a>
            </div>

            <div id="tableData" class='flex-col gap-3 items-center justify-between gap-3 mx-20 '>
            </div>

            <div class="modal">
                <div class="modal-overlay modal-toggle"></div>
                <div class="modal-wrapper modal-transition">
                    <div class="modal-header">
                        <button class="modal-close modal-toggle"><i style="font-size:24px"
                                class="fa">&#xf00d;</i></button>
                        <h2 class="modal-heading">Update Task</h2>
                    </div>
                    <form id="uploadImg" enctype="multipart/form-data">
                        <div class="modal-body" id="modal-body">
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

<script src="../Script/task.js"></script>

</html>