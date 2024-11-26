<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php include('../layout/navbar.php') ?>
    <div class="grid grid-cols-[250px_minmax(250px,_1fr)_100px]">
        <div>
            <?php include("../layout/sideBar.php") ?>
        </div>
        <div>  

            <div id="tableData" class='flex-col gap-3 items-center justify-between gap-3 mx-20 '>
            </div>

        </div>
    </div>
    </div>
</body>
<script src="../Script/bin.js"></script>
</html>