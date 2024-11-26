<?php
include("../../Database.php");
$database = new Database();
$userId = $_COOKIE["userId"];

$output = "";

$result = $database->sql("SELECT * from `task_bin` where userId={$userId}");


if (count($result) > 0) {
  foreach ($result as $row) {
    $startDate = date('d-m-Y H:i A', strtotime($row["startDate"]));
    $endDate = date('d-m-Y H:i A', strtotime($row["endDate"]));
    $output .= "
         <div class='flex items-center my-2 justify-between gap-3 h-[50px] bg-gray-200 p-[32px] rounded-[32px] hover:bg-gray-300 ' >
        <div class='flex items-center justify-center gap-3'>
          <p>{$row["task"]}</p>
        </div>
        <div class='flex items-center justify-center gap-3'>
          <p>$startDate</p>
                     <p>$endDate</p>
          <p class='uppercase'>{$row["select"]}</p>
          
          <button
            class='bg-[#0075C8] enabled:hover:bg-[#003A64] px-2 pb-1 rounded-md font-medium text-white' id='retrieveTask' data-id='{$row["id"]}'
           >   Retrive
          </button>
          <button
            class='bg-red-600 enabled:hover:bg-red-700 px-2 pb-1 rounded-md font-medium text-white' id='deleteTask' data-id='{$row["id"]}'>
        Permanent Delete
          </button>
        </div>
      </div>";
  }

  echo $output;
} else {
  echo "";
}
