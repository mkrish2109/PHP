$(document).ready(function () {
    function load() {
        $.ajax({
            url: "../Query/bin/bin_task_load.php",
            type: "POST",
            success: function (data) {
                $('#tableData').html(data);
            }

        })
    }
    load();

    $(document).on("click", "#retrieveTask", function () {
        var binId = $(this).data('id');
        $.post('../Query/bin/retrieve_task.php', { id: binId }, function (response) {
            alert(response);
            location.reload(); // Refresh to update the task list
        });
    })

    $(document).on("click", "#deleteTask", function () {
        var binId = $(this).data('id');
        var confirmation = confirm("Are you sure you want to permanently delete this task?");
        if (confirmation) {
            $.post('../Query/bin/bin_task_delete.php', { id: binId, confirm: 'yes' }, function (response) {
                alert(response);
                location.reload(); // Refresh to update the task list
            });
        } else { alert("Task deletion cancelled."); }

    })


})
