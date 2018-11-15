$(document).ready(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": "/users",
            "type": "get",
            dataSrc: ''
        },
        "columns": [
            { "data": "id", "searchable": false},
            { "data": "first_name", "searchable": true },
            { "data": "last_name", "searchable": true },
            { "data": "email", "searchable": true },
            { "data": "role_id" },
            { "data": "download_link",
                "render": function ( data, type, row, meta ) {
                    return "<button type='submit' id=\"edit-button\" data-toggle=\"modal\" data-target=\"#editModal\" class='btn btn-info btn-sm' " +
                        "data-id='"+row.id+
                        "' data-first_name='"+row.first_name+"'"+
                        "' data-last_name='"+row.last_name+"'"+
                        "' data-email='"+row.email+"'"+
                        "' data-role='"+row.role_id+"'"+
                        "'><i class=\"fas fa-2x fa-pencil-alt\"></i></button>";

                }
            }
        ]
    });
    //$('#table').DataTable().ajax.url( '/users' ).load();
} );


$(document).on('click', '#edit-button', function(){
    var button = $('#edit-button'); // Button that triggered the modal
    var modal = $('#editModal');

    modal.find('.modal-body #user_id').val(button.data('id'));
    modal.find('.modal-body #user_first_name').val(button.data('first_name'));
    modal.find('.modal-body #user_last_name').val(button.data('last_name'));
    modal.find('.modal-body #user_email').val(button.data('email'));
    modal.find('.modal-body #user_role').val(button.data('role_id'));
    /*$.each($(this).data(), function(key, value) {
        console.log(key);
        console.log(value);

    });*/
});



$('.btn-outline-success').click(function(e){

    $.ajax({
        type: 'post',
        url: '/editUser',
        data: {
            _token: $('input[name="_token"]').val(),
            'id': $("#user_id").val(),
            'first_name': $('#user_first_name').val(),
            'last_name': $('#user_last_name').val(),
            'email': $('#user_email').val(),
        },
        success: function(data) {
            console.log(data);

            $('#table').DataTable().ajax.reload(null,false);
        }
    });
});

