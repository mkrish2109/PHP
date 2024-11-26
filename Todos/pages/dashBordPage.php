<?php
$userId = $_COOKIE["userId"]; // Assuming user ID is stored in a cookie or session
$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed");

$sql = "SELECT 
    COUNT(*) as total_tasks, 
    SUM(CASE WHEN isCompleted = 1 THEN 1 ELSE 0 END) as completed_tasks, 
    SUM(CASE WHEN isCompleted = 0 THEN 1 ELSE 0 END) as pending_tasks 
FROM `task` WHERE userId = {$userId}";

$result = mysqli_query($conn, $sql);

$total_tasks = $completed_tasks = $pending_tasks = 0;

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_tasks = $row['total_tasks'];
    $completed_tasks = $row['completed_tasks'];
    $pending_tasks = $row['pending_tasks'];
} else {
    echo "No tasks found.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>

<body>
    <?php include("../layout/navbar.php") ?>
    <div class="grid grid-cols-[250px_minmax(250px,_1fr)_100px]">
        <div>
            <?php include("../layout/sideBar.php") ?>
        </div>
        <div class="p-8">
            <h2 class="font-bold text-xl pb-5">Dashbord</h2>
            <div class="grid grid-cols-3 gap-4 text-white font-bold">
                <div class=" bg-red-500 p-4 rounded-md">
                    <p>Pending Task</p>
                    <p class="text-xl p-1"><?php echo $pending_tasks; ?></p>
                </div>
                <div class=" bg-green-500 p-4 rounded-md">
                    <p>Complete Task</p>
                    <p class="text-xl p-1"><?php echo $completed_tasks; ?></p>
                </div>
                <div class=" bg-blue-500 p-4 rounded-md">
                    <p>Total Task</p>
                    <p class="text-xl p-1"><?php echo $total_tasks; ?></p>
                </div>
            </div>
        </div>
    </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>