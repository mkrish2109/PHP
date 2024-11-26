<?php
$id = $_POST["id"];

$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed");

$sql = "SELECT * FROM `task` WHERE id={$id}";

$result = mysqli_query($conn, $sql);

$output = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = $row["select"];
        $output .= "
            <div class='p-6 flex flex-col gap-4 justify-between'>
                <input type='text' id='updateId' hidden value='{$row["id"]}' >
                <input id='updateTask' type='text' class='grow-[1] rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset 
                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6' value='{$row["task"]}' />
                <input type='date' id='updateDate' value='{$row["date"]}' class='cursor-pointer rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6'>
                <select id='updateSelect'
                    class='cursor-pointer rounded-md w-full border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6'>
                    <option value='a' " . ($selected == 'a' ? 'selected' : '') . ">A</option>
                    <option value='b' " . ($selected == 'b' ? 'selected' : '') . ">B</option> 
                    <option value='c' " . ($selected == 'c' ? 'selected' : '') . ">C</option>
                    <option value='d' " . ($selected == 'd' ? 'selected' : '') . ">D</option>
                </select>
                <button
                    class='bg-[#bcfd4c] text-black enabled:hover:bg-[#8ee000] hover:text-[#ffff] px-2 py-2 rounded-md flex items-center justify-center gap-2'
                    id='updated'>
                    Update Task
                </button>
            </div>";
    }

    mysqli_close($conn);
    echo $output;
} else {
    echo "";
}
?>