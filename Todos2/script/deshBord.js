$(document).ready(function () {



    $('#pendingTask').on('click', function () {
        fetchTasks('pending');
    });

    $('#completedTask').on('click', function () {
        fetchTasks('completed');
    });

    $('#totalTask').on('click', function () {
        fetchTasks('total');
    });


    function fetchTasks(status = 'pending') {
        $.ajax({
            type: "POST",
            url: "../Query/deSHbord/getTask.php",
            data: {
                taskStatus: status
            },
            success: function (data) {
                $('#tableData').html(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    }
    fetchTasks('pending')
});