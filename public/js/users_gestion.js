$(document).ready(function() {
    $('#table').DataTable({
        language: {
            "sProcessing":     "Traitement en cours...",
            "sSearch":         "Rechercher&nbsp;:",
            "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
            "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
            "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix":    "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
            "oPaginate": {
                "sFirst":      "Premier",
                "sPrevious":   "Pr&eacute;c&eacute;dent",
                "sNext":       "Suivant",
                "sLast":       "Dernier"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
            },
            "select": {
                "rows": {
                    _: "%d lignes séléctionnées",
                    0: "Aucune ligne séléctionnée",
                    1: "1 ligne séléctionnée"
                }
            }
        },
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
                        "'><i class=\"fas fa-2x fa-pencil-alt\"></i></button>"+
                        "<button type='submit' id=\"delete-button\" data-toggle=\"modal\" data-target=\"#deleteModal\" class='btn btn-danger btn-sm' " +
                        "data-id='"+row.id+
                        "' data-first_name='"+row.first_name+"'"+
                        "' data-last_name='"+row.last_name+"'"+
                        "' data-email='"+row.email+"'"+
                        "' data-role='"+row.role_id+"'"+
                        "'><i class=\"fas fa-2x fa-trash-alt\"></i></button>";

                }
            }
        ]
    });

} );


$(document).on('click', '#edit-button', function(){
    var button = $('#edit-button'); // Button that triggered the modal
    var modal = $('#editModal');

    modal.find('.modal-body #user_id').val(button.data('id'));
    modal.find('.modal-body #user_first_name').val(button.data('first_name'));
    modal.find('.modal-body #user_last_name').val(button.data('last_name'));
    modal.find('.modal-body #user_email').val(button.data('email'));
    modal.find('.modal-body #user_role').val(button.data('role_id'));
});

$(document).on('click', '#delete-button', function(){
    var button = $('#delete-button'); // Button that triggered the modal
    var modal = $('#deleteModal');

    var modal_body = modal.find('.modal-body');
    modal_body.append("<input type='text' id='id' name='id' hidden>");

    modal_body.append("<h3>Infos utilisateur</h3><ul id='infos'></ul>");


    var id_input = modal_body.find("input[name='id']");
    id_input.val($(this).data('id'));

    $.each($(this).data(), function(key, value) {
        modal_body.find('#infos').append("<li><span class='font-weight-bold'>"+key+"</span>: "+value+"</li>");
    })

});


$('#update-button').click(function(e){

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

$('#add-button').click(function(e){

    $.ajax({
        type: 'post',
        url: '/addUser',
        data: {
            _token: $('input[name="_token"]').val(),
            'first_name': $('#first_name').val(),
            'last_name': $('#last_name').val(),
            'email': $('#email').val(),
            'password' : $('#password').val(),
            'password_confirmation' : $('#password_confirmarion').val()
        },
        success: function(data) {
            console.log(data);

            $('#table').DataTable().ajax.reload(null,false);
        }
    });
});

$('#delete_user_button').click(function(e){

    $.ajax({
        type: 'delete',
        url: '/removeUser',
        data: {
            _token: $('input[name="_token"]').val(),
            'id': $('input[name="id"]').val(),
        },
        success: function(data) {
            //console.log(data);

            $('#table').DataTable().ajax.reload(null,false);
        }
    });
});


// reset html body when switching between users on delete
$(".modal").on("hidden.bs.modal", function(){
    $("#deleteModal .modal-body").html("");
    $("#addModal input").val("");
    $('#deleteModal input[name="id"]').val("");
});
