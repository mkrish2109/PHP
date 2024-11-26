<?php include("../Database.php");
$database = new Database();
$userId = $_COOKIE["userId"];
$currentDate = date('Y-m-d h:m'); // Query to get tasks due today or overdue 
$result = $database->sql("SELECT * FROM task WHERE userId={$userId} And isCompleted=0 ORDER by endDate ASC");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
</head>
<link rel="stylesheet" href="../style/style.css">

<body>

    <?php include("../layout/navbar.php") ?>


    <div class="grid grid-cols-[50px_minmax(50px,_1fr)] md:grid-cols-[250px_minmax(250px,_1fr)_100px]">
        <div>
            <?php include("../layout/sideBar.php") ?>
        </div>
        <div class="p-8">


            <h3 class="font-bold text-xl pt-10">Reminders</h3>
            <div id="reminders" class="mt-5">
                <ul class=' pl-5 flex list-disc gap-8 '>
                    <li class="text-lg text-red-600 font-semibold">Overdue </li>
                    <li class="text-lg text-yellow-600 font-semibold">Due Today </li>
                    <li class="text-lg text-blue-600  font-semibold">Up Coming </li>
                    <li class="text-lg text-blck-600  font-semibold">Some days latter </li>
                </ul>
                <?php
                if (count($result) > 0) {

                    echo "<ul class=' pl-5 flex flex-col gap-2'>";
                    foreach ($result as $task) {
                        $dueDate = new DateTime($task['endDate']);
                        $today = new DateTime($currentDate);
                        $daysLeft = $dueDate->diff($today)->days;
                        $interval = $dueDate->diff($today);
                        $daysLeft1 = (int) $interval->format('%R%a');

                        $endDate = date('d-M-Y H:i A', strtotime($task["endDate"]));
                        if ($dueDate < $today) {
                            echo "<div  data-id='{$task["id"]}' class='editTask bg-white cursor-pointer shadow-md rounded-lg p-6 capitalize text-lg text-red-600 font-semibold'>
                            Task: {$task['task']} - Due Date: $endDate (Overdue)</div>";
                        } elseif ($daysLeft1 === 0) {
                            echo "<div  data-id='{$task["id"]}'  class='editTask bg-white cursor-pointer shadow-md rounded-lg p-6 capitalize text-lg text-yellow-600 font-semibold' > 
                            Task: {$task['task']} - Due Date: $endDate(Due Today)</div>";
                        } elseif ($daysLeft <= 6) {
                            echo "<div  data-id='{$task["id"]}'  class='editTask bg-white cursor-pointer shadow-md rounded-lg p-6 capitalize text-lg text-blue-600 '> 
                            Task: {$task['task']} - Due Date: $endDate($daysLeft days left)</div>";
                        } else {
                            echo "<div  data-id='{$task["id"]}'  class='editTask bg-white cursor-pointer shadow-md rounded-lg p-6 capitalize text-lg text-black-600'> 
                            Task: {$task['task']} - Due Date: $endDate($daysLeft days left)</div>";
                        }
                    }
                    echo "</ul>";
                }
                ?>
            </div>
            <?php include('../common/model.php'); ?>
        </div>
    </div>

    </div>
</body>

</html>