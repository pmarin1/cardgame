$(document).ready(function () {

    // Online friends
    $.ajax({
        url: './fillmain',
        type: 'POST',
        dataType: "json",
        data: { action: 'friends' },
        success: function (data) {
            $("#friends").empty();
            for (var i = 0; i < Object.keys(data).length; i++) {
                    $("#friends").append(`
                        <tr>
                            <th scope="row">${i}</th>
                            <td>${data[i].friend}</td>
                            <td><button class="btn btn-primary" id="invite" value="${data[i].friend}">Invite</button></td>
                        </tr>
                    `);
                    $('#invite').on('click', function () {
                        $.ajax({
                            url: './sendinv',
                            type: 'POST',
                            data: { sendby: usersess, sendto: fid },
                        });
                    });
                        

                }

        },
        error: function (e) {
            //called when there is an error
            console.log(e.message);
        }
    });
    setInterval(function () {
        $.ajax({
            url: './fillmain',
            type: 'POST',
            dataType: "json",
            data: { action: 'friends' },
            success: function (data) {
                $("#friends").empty();
                for (var i = 0; i < Object.keys(data).length; i++) {
                    $("#friends").append(`
                        <tr>
                            <th scope="row">${i}</th>
                            <td>${data[i].friend}</td>
                            <td><button class="btn btn-primary" id="invite" value="${data[i].friend}">Invite</button></td>
                        </tr>
                    `);
                }
                
                $('#invite').on('click', function () {
                        $.ajax({
                            url: './sendinv',
                            type: 'POST',
                            data: { sendby: usersess, sendto: $("#invite").val() },
                        });
                    });

            },
            error: function (e) {
                //called when there is an error
                console.log(e.message);
            }
        });

    }, 1000)

    // Invites table
    $.ajax({
        url: './invitetable',
        type: 'POST',
        dataType: "json",
        success: function (data) {
            $("#invitestable").empty();
            if (Object.keys(data).length > 0) {
                for (var i = 0; i < Object.keys(data).length; i++) {
                    $("#invitestable").append(`
                        <tr>
                            <th scope="row">${i}</th>
                            <td>${data[i].sendby}</td>
                            <td>${data[i].sendto}</td>
                            <td><span class="text-warning">In pending...</span></td>
                        </tr>
                    `);
                }
            }

        },
        error: function (e) {
            //called when there is an error
            console.log(e.message);
        }
    });
    setInterval(function () {
        $.ajax({
            url: './invitetable',
            type: 'POST',
            dataType: "json",
            success: function (data) {
                $("#invitestable").empty();
                if (Object.keys(data).length > 0) {
                    for (var i = 0; i < Object.keys(data).length; i++) {
                        $("#invitestable").append(`
                            <tr>
                                <th scope="row">${i}</th>
                                <td>${data[i].sendby}</td>
                                <td>${data[i].sendto}</td>
                                <td><span class="text-warning">In pending...</span></td>
                            </tr>
                        `);
                    }
                }

            },
            error: function (e) {
                //called when there is an error
                console.log(e.message);
            }
        });

    }, 1000);

    // Modal invites
    $.ajax({
        url: './invites',
        type: 'POST',
        dataType: "json",
        success: function (data) {
            $("#modals").empty();
            if (Object.keys(data).length > 0) {
                for (var i = 0; i < Object.keys(data).length; i++) {
                    $("#modals").append(`
                        <div class="modal fade" id="inviteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="inviteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="inviteModalLabel">You got invited!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                An invitation has been recieved from your friend <b>${data[i].sendby}</b>.
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="rejectinv">Reject</button>
                                <button type="button" class="btn btn-primary">Accept</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    `);
                    var iID = data[i].id;
                    $('#inviteModal').modal('show');

                    $('#rejectinv').on('click', function () {
                        $.ajax({
                            url: './rejectinv',
                            type: 'POST',
                            data: { invid: iID },
                        });
                    });
                }
            }

        },
        error: function (e) {
            //called when there is an error
            console.log(e.message);
        }
    });
    
});