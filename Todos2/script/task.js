$(document).ready(function () {
    function load() {
        $.ajax({
            url: "../Query/task/taskLoad.php",
            type: "POST",
            success: function (data) {
                $("#tableData").html(data);
            },
        });
    }
    load();

    $("#addTask").on("click", function (e) {
        e.preventDefault();
        var task = $("#task").val();
        var startDate = $("#start-date").val();
        var endDate = $("#end-date").val();
        var select = $("#select").val();

        $.post(
            "../Query/task/addTask.php",
            {
                task: task,
                endDate: endDate,
                select: select,
            },
            function (response) {
                alert(response);
                $("#addData").trigger("reset");
                load();
            }
        );
    });

    $(document).on("click", "#deleteTask", function () {
        var taskId = $(this).data("id");

        $.post("../Query/task/deleteTask.php", { id: taskId }, function (response) {
            alert(response);
            load();
        });
    });

    $(".modal-toggle").on("click", function (e) {
        e.preventDefault();
        $(".modal").toggleClass("is-visible");
    });

    $(document).on("click", "#editTask", function (e) {
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
                    load();
                    $(".modal").toggleClass("is-visible");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                alert("Error: " + textStatus);
            },
        });
    });

    $(document).on("change", "#task-status", function () {
        var id = $(this).data("id");
        var completed = $(this).is(":checked") ? 1 : 0;

        $.ajax({
            type: "POST",
            url: "../Query/task/update_status.php",
            data: {
                id: id,
                completed: completed,
            },
            success: function (response) {
                console.log(response);
                alert(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                alert("Error: " + textStatus);
            },
        });
    });
});
