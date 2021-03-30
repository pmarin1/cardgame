$(document).ready(function (){
	$("#login").submit(function (event) {
        event.preventDefault();
        setTimeout(() => {
            $.ajax({
                url: './loginurl',
                type: 'POST',
                data: { username: $("#username").val(), password: $("#password").val() },
                success: function (resp) {
                    if (resp == "invalid") {
                        $('#alertbox').addClass("text-danger");
                        $('#alertbox').html("The password is incorrect.");
                        $('#alertbox').show();
                    } else {
                        location.reload();
                    }
                }
            });


        }, 1000);
    });
});