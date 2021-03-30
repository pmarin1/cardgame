$(document).ready(function (){
	$("#register").submit(function (event) {
        event.preventDefault();
        var user = $("#username").val();
        var pass = $("#password").val();
        var pass2 = $("#password2").val();
        if(pass == pass2) {
        setTimeout(() => {
                $.ajax({
                    url: './registerurl',
                    type: 'POST',
                    data: { username: $("#username").val(), password: $("#password").val() },
                    success: function (resp) {
                        if (resp == "success") {
                            $('#alertbox').html('Your account has been successfully created! Go back and log in!');
                            if ($('#alertbox').hasClass('text-danger')) {
                                $('#alertbox').removeClass('text-danger');
                            }
                            $('#alertbox').fadeIn('slow').addClass('text-success');
                        } else {
                            $('#alertbox').html(resp);
                            $('#alertbox').fadeIn('slow').addClass('text-danger');
                        }
                    }
                });
        }, 1000);
        } else {
                $('#alertbox').html("The passwords do not match!");
                            $('#alertbox').fadeIn('slow').addClass('text-danger');
            }
    });
});