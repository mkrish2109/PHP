$(document).ready(function () {
    $("#handleImg").on("click", function (e) {
        e.preventDefault();
        $('.modal').toggleClass('is-visible');
    });



    $("#uploadImg").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            url: '../Query/profile/imageUpload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                e.preventDefault();
                $('.modal').toggleClass('is-visible');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    })


    $("#updateData").on("click", function (e) {
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();

        if (username == '' || password == '' || cpassword == '') {
            alert("Please fill all fields...!!!!!!");
        } else if ((password.length) < 3) {
            alert("Password should atleast 4 character in length...!!!!!!");
        } else if (!(password).match(cpassword)) {
            alert("Your passwords don't match. Try again?");
        } else {
            $.ajax({
                type: "POST",
                url: "../Query/profile/updateData.php",
                data: {
                    username: username,
                    password: password
                },
                success: function (data) {
                    if (data == "Data Updated Successfully...") {
                        alert("Data Updated Successfully...")
                        $.ajax({
                            type: 'POST',
                            url: '../logout.php',
                            success: function () {
                                window.location.href = "../index.php";
                            }
                        })
                    }
                    else {
                        alert(data);
                    }
                }
            });
        }
    })
})