


$("#loginSubmit").on("click", function () {
    var email = $("#loginEmail").val();
    var password = $("#loginPassword").val();
    $.ajax({
        type: "POST",
        url: "./login.php",
        data: {
            email: email,
            password: password,
        },
        success: function (data) {
            if (data == "You have Successfully Login.....") {
                toastr.success("Successfully Login", { timeOut: 5000 });
                // alert(data)
                window.location.href = "pages/profile.php";
            } else {
                alert(data);
            }
        },
    });
});
