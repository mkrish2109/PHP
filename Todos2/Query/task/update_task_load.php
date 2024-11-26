<?php
include("../../Database.php");
$db = new Database();
$id = $_POST["id"];
$output = "";

$tasks = $db->sql("SELECT * FROM `task` WHERE id={$id}");

if (count($tasks) > 0) {
    foreach ($tasks as $row) {
        $selected = $row["select"];
        $endDate = date('Y-m-d H:i:s', strtotime($row["endDate"]));
        $output .= "
            <div class='p-6 flex flex-col gap-4 justify-between'>
                <input type='text' id='updateId' hidden value='{$row["id"]}' >
                <input id='updateTask' type='text' class='grow-[1] rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset 
                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6' value='{$row["task"]}' />
                <div class='flex item-center justify-center gap-4'>
                     <p>Due date: </p>
                     <input type='datetime-local' id='updated-end-date' value='$endDate'
                                class='cursor-pointer rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm' />
                </div>
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

    echo $output;
} else {
    echo "";
}
?>