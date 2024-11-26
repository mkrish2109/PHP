<?php
$userId = $_COOKIE["userId"]; // Retrieve the user ID from the cookie

include("../../Database.php"); // Include the Database class
$db = new Database(); // Create a new instance of the Database class
$tasks = $db->sql("SELECT * FROM `task` WHERE userId={$userId}"); // Execute SQL query

$output = "";

if (count($tasks) > 0) {
    foreach ($tasks as $row) {
        $checked = $row["isCompleted"];
        $startDate = date('d-m-Y H:i A', strtotime($row["startDate"]));
        $endDate = date('d-m-Y H:i A', strtotime($row["endDate"]));
        $output .= "
             <div class='flex items-center my-2 justify-between gap-3 text-clip overflow-hidden text-xs md:text-[1rem] h-[50px] bg-gray-200 p-[32px] rounded-[32px] w-[80%] hover:bg-gray-300'>
                 <div class='flex items-center justify-center gap-3'>
                     <input type='checkbox' id='task-status' " . ($checked == '1' ? 'checked' : 'unchecked') . " data-id='{$row["id"]}'>
                     <p class='capitalize'>{$row["task"]}</p>
                 </div>
                 <div class='flex items-center justify-center gap-3'>
                     <p>$startDate</p>
                     <p>$endDate</p>
                     <p class='uppercase'>{$row["select"]}</p>
                     <button id='editTask' data-id='{$row["id"]}' class='sidebar-link bg-[#0075C8]  p-2 rounded-full w-7 h-7 md:w-[33.59px] md:h-[33.59px] font-medium text-white hover:text-black flex items-center justify-center gap-2'>
                         <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' class='icon edit-icon'>
                             <path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z'/>
                         </svg>
                     </button>
                     <button class='sidebar-link bg-red-600 enabled:hover:bg-red-500 p-2 rounded-full font-medium  w-7 h-7 md:w-[33.59px] md:h-[33.59px] text-white hover:text-black flex items-center justify-center gap-2' id='deleteTask' data-id='{$row["id"]}'>
                         <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' class='icon'>
                             <path d='M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z'/>
                         </svg>
                     </button>
                 </div>
             </div>";
    }
    echo $output;
} else {
    echo "No tasks found.";
}
?>