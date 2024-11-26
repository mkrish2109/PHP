<?php
$userId = $_COOKIE["userId"];

$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed");

$sql = "SELECT * from `task_bin` where userId={$userId}";

$result = mysqli_query($conn, $sql);

$output = "";

if (mysqli_num_rows($result) > 0) {



  while ($row = mysqli_fetch_assoc($result)) {
    $output .= "
         <div class='flex items-center my-2 justify-between gap-3 h-[50px] bg-gray-200 p-[32px] rounded-[32px] hover:bg-gray-300 ' >
        <div class='flex items-center justify-center gap-3'>
          <p>{$row["task"]}</p>
        </div>
        <div class='flex items-center justify-center gap-3'>
          <p>{$row["date"]}</p>
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


  mysqli_close($conn);
  echo $output;
} else {
  echo "";
}
