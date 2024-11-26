$(document).ready(function () {
    function load() {
        $.ajax({
            url: "../Query/task/taskLoad.php",
            type: "POST",
            success: function (data) {
                $('#tableData').html(data);
            }

        })
    }
    load();

    $("#addTask").on("click", function () {
        var task = $("#task").val();
        var date = $("#date").val();
        var select = $("#select").val();

        $.post('../Query/task/addTask.php',
            {
                task: task,
                date: date,
                select: select,
            },
            function (response) {
                alert(response);
                load();
            });

    })

    $(document).on("click", "#deleteTask", function () {
        var taskId = $(this).data('id');

        $.post('../Query/task/deleteTask.php',
            { id: taskId },
            function (response) {
                alert(response);
                load();
            });
    })

    $('.modal-toggle').on('click', function (e) {
        e.preventDefault();
        $('.modal').toggleClass('is-visible');
    });

    $(document).on("click", "#editTask", function (e) {
        $('.modal').toggleClass('is-visible');
        var taskId = $(this).data('id');
        e.preventDefault();
        $.post('../Query/task/update_task_load.php',
            { id: taskId },
            function (data) {
                $('#modal-body').html(data);
            });
    });


    // Event listener for the update button
    $(document).on('click', "#updated", function () {
        var id = $('#updateId').val();
        var task = $('#updateTask').val();
        var date = $('#updateDate').val();
        var select = $('#updateSelect').val();

        $.ajax({
            type: "POST",
            url: "../Query/task/update_task.php", // Adjust the URL to your PHP script
            data: {
                id: id,
                task: task,
                date: date,
                select: select
            },
            success: function (response) {
                if (response == "Task Successfully Updated") {
                    alert(response)
                    console.log(response); // Log the response to debug if necessary
                    $('.modal').toggleClass('is-visible');
                }// Optionally, you can refresh the task list or update the UI accordingly
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                alert("Error: " + textStatus);
            }
        });
    });


    $(document).on('change', '#task-status', function () {
        var id = $(this).data('id');
        var completed = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            type: "POST",
            url: "../Query/task/update_status.php", // Adjust the URL to your PHP script
            data: {
                id: id,
                completed: completed
            },
            success: function (response) {
                console.log(response); // Log the response to debug if necessary
                alert(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                alert("Error: " + textStatus);
            }
        });
    });


});
