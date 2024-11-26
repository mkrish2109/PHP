$(document).ready(function () {
    $("#showRegister").click(function () {
        $("#login").hide("slow");
        $("#register").show(1000);

    });
    $("#showLogin").click(function () {
        $("#register").fadeToggle("slow");
        $("#login").show(1000);
    });

    $("#registerSubmit").on("click", function (e) {
        var username = $("#username").val();
        var email = $("#registerEmail").val();
        var password = $("#registerPassword").val();
        var cpassword = $("#cpassword").val();
        console.log(username, email, password);

        if (username == '' || email == '' || password == '' || cpassword == '') {
            alert("Please fill all fields...!!!!!!");
        } else if ((password.length) < 3) {
            alert("Password should atleast 4 character in length...!!!!!!");
        } else if (!(password).match(cpassword)) {
            alert("Your passwords don't match. Try again?");
        } else {
            $.ajax({
                type: "POST",
                url: "./Query/register.php",
                data: {
                    username: username,
                    email: email,
                    password: password
                }
                ,
                success: function (data) {
                    if (data == true) {
                        alert("You have Successfully Registered.....")
                        window.location.href = "index.php"
                        $("form")[0].reset();
                    }
                    else {
                        alert(data);
                    }
                }
            });
        }
    });



    $("#loginSubmit").on("click", function () {
        var email = $("#loginEmail").val();
        var password = $("#loginPassword").val();
        $.ajax({
            type: "POST",
            url: "login.php",
            data: {
                email: email,
                password: password,
            },
            success: function (data) {
                if (data == "You have Successfully Login.....") {
                    window.location.href = "pages/profile.php";
                }
            },
        });
    });

})





