<?php
include("../Database.php");
$database = new Database();
$userId = $_COOKIE["userId"]; // Assuming user ID is stored in a cookie or session
$total_tasks = $completed_tasks = $pending_tasks = 0;

$result = $database->sql("SELECT 
    COUNT(*) as total_tasks, 
    SUM(CASE WHEN isCompleted = 1 THEN 1 ELSE 0 END) as completed_tasks, 
    SUM(CASE WHEN isCompleted = 0 THEN 1 ELSE 0 END) as pending_tasks 
FROM `task` WHERE userId = {$userId}");

if (count($result) > 0) {
    $total_tasks = $result[0]['total_tasks'];
    $completed_tasks = $result[0]['completed_tasks'];
    $pending_tasks = $result[0]['pending_tasks'];
} else {
    echo "No tasks found.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body class="bg-gray-100">
    <?php include("../layout/navbar.php") ?>
    <div class="grid grid-cols-[50px_minmax(50px,_1fr)] md:grid-cols-[250px_minmax(250px,_1fr)_100px]">
        <div>
            <?php include("../layout/sideBar.php") ?>
        </div>
        <div class="p-8">
            <h2 class="font-bold text-xl pb-5">Dashboard</h2>
            <div class="grid grid-cols-1 gap-4 text-white font-bold lg:grid-cols-3 md:grid-cols-2">
                <div class="bg-red-500 p-4 rounded-md cursor-pointer" id="pendingTask" >
                    <p>Pending Task</p>
                    <p class="text-xl p-1"><?php echo $pending_tasks; ?></p>
                </div>
                <div class="bg-green-500 p-4 rounded-md cursor-pointer" id="completedTask">
                    <p>Completed Task</p>
                    <p class="text-xl p-1"><?php echo $completed_tasks; ?></p>
                </div>
                <div class="bg-blue-500 p-4 rounded-md cursor-pointer" id="totalTask">
                    <p>Total Task</p>
                    <p class="text-xl p-1"><?php echo $total_tasks; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div id="tableData" class="flex flex-col gap-4 justify-center mx-auto max-w-4xl"></div>

    <script>

    </script>

</body>
<script src="../script/deshBord.js"></script>

</html>