$(document).ready(function (){
	$("#addfriend").submit(function (event) {
        event.preventDefault();
        var user = $("#fname").val();
       
        setTimeout(() => {
                $.ajax({
                    url: './addfriend',
                    type: 'POST',
                    data: { friend: $("#fname").val() },
                    success: function (resp) {
                        if (resp == "success") {
                            $('#alert').html(`You successfully send a request to ${user}`);
                            if ($('#alert').hasClass('text-danger')) {
                                $('#alert').removeClass('text-danger');
                            }
                            $('#alert').fadeIn('slow').addClass('text-success');
                        } else {
                            $('#alert').html(resp);
                            $('#alert').fadeIn('slow').addClass('text-danger');
                        }
                    }
                });
        }, 1000);

    });
});