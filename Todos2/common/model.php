<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model</title>
</head>
<link rel="stylesheet" href="../style/common/style.css">

<body>
    <div class="modal">
        <div class="modal-overlay modal-toggle"></div>
        <div class="modal-wrapper modal-transition">
            <div class="modal-header">
                <button class="modal-close modal-toggle"><i style="font-size:24px" class="fa">&#xf00d;</i></button>
                <h2 class="modal-heading">Update Form</h2>
            </div>

            <div class="modal-body" id="modal-body">
                <!-- Dynamic content for updating tasks will be injected here -->
            </div>

        </div>
    </div>

</body>
<script>
    $(document).ready(function () {

        $(".modal-toggle").on("click", function (e) {
            e.preventDefault();
            $(".modal").toggleClass("is-visible");
        });

        $(".editTask").on("click", function (e) {
            $(".modal").toggleClass("is-visible");
            var taskId = $(this).data("id");
            e.preventDefault();
            $.post(
                "../Query/task/update_task_load.php",
                { id: taskId },
                function (data) {
                    $("#modal-body").html(data);
                }
            );
        });

        $(document).on("click", "#updated", function () {
            var id = $("#updateId").val();
            var task = $("#updateTask").val();
            var endDate = $("#updated-end-date").val();

            var select = $("#updateSelect").val();

            $.ajax({
                type: "POST",
                url: "../Query/task/update_task.php",
                data: {
                    id: id,
                    task: task,
                    endDate: endDate,
                    select: select,
                },
                success: function (response) {
                    if (response == true) {
                        alert("Task Successfully Updated");
                        $(".modal").toggleClass("is-visible");
                        location.reload();

                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    alert("Error: " + textStatus);
                },
            });
        });
    });
</script>

</html>