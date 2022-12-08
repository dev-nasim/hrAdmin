var targetInput = $('#keyword');
loadAjaxData();

function loadAjaxData() {
    var keyword = targetInput.val();
    var URL = `${dataUser}?keyword=${keyword}`;
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#userListBody').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}
targetInput.on('keyup', function() {
    loadAjaxData();
});


// ===================================================
//                 User Data Delete Json
// ===================================================


$(document).on("click", '.deleteButton', function(event) {
    var id = $(this).attr('id');
    var URL = `${dataUser}/${id}`;


    $('#deleteModal').modal('show');

    $('#deleteModal').on('hide.bs.modal', function(event) {
        $('#btConfirm').off('click')

    })

    $('#btConfirm').on('click', function(event) {
        $('#deleteModal').modal('hide');
        $('#btConfirm').off('click')
        $.ajax({
            url: URL,
            type: "DELETE",
            success: function(response) {
                if(response.status == 2000) {
                    $.toaster({
                        priority: 'success',
                        title: 'Successfull',
                        message: response.message
                    });
                }
                $('#user'+id).remove();
            },

        });
    })

});






// ===================================================
//                 User Data Edit Json
// ===================================================



$(document).on("click", '.editButton', function(event) {
    var id = $(this).attr('id');
    var rowID = $(this).closest('tr').attr('row_index');
    console.log(rowID);
    var URL = `${dataUser}/${id}/edit`;
    $('#editData').html('');
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#editModal').append("<input type='hidden' name='row_index' value="+rowID+">").modal('show');
            $('#editData').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});

// ===================================================
//                 User Data Update Json
// ===================================================


$(document).on("click", '#dataUpdate', function(event) {
    var id = $("input[name=user_id]").val();
    var modal = $(this).attr('modal-id');
    var URL = `${dataUser}/${id}`;
    $.ajax({
        url: URL,
        type: "PUT",
        data: {
            user_id: id,
            name: $("#name").val(),
            email: $("input[name=email]").val(),
            birthday: $("input[name=birthday]").val(),
            _token: csrfToken,
        },
        success: function(response) {
            $('#'+modal).modal('hide');
            $.toaster({
                priority: 'success',
                title: 'Success',
                message: response.message
            });
            $('#user'+id).remove();
            var lastID = parseInt($(this).closest('tr').attr('lastID'))+1;
            $('#userListBody').append("<tr id=user"+id+">"+
                "<td>"+id+"</td>" +
                "<td>"+$("#name").val()+"</td>" +
                "<td>"+$("input[name=email]").val()+"</td>" +
                "<td>"+$("input[name=birthday]").val()+"</td>" +
                "<td>" +
                "   <a class=\"btn btn-sm btn-outline-warning editButton\" id="+id+">Edit</a>" +
                "   <a class=\"btn btn-sm btn-outline-danger deleteButton\" id="+id+">Delete</a>" +
                "</td>" +
                "</tr>");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});


// ===================================================
//                 User Add Json
// ===================================================

$(document).ready(function () {
    $('#add_user').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/users",
            data: $('#add_user').serialize(),
            success: function (response) {
            console.log(response),
                $('#add_modal').modal('hide')
                $.toaster({
                    priority: 'success',
                    title: 'Success',
                    message: response.message,
                });
            var lastID = parseInt($('#userListBody tr:last').attr('lastID'))+1;
            $('#userListBody').append("<tr id=user"+response.id+">"+
                    "<td>"+lastID+"</td>" +
                    "<td>"+response.data.name+"</td>" +
                    "<td>"+response.data.email+"</td>" +
                    "<td>"+response.data.birthday+"</td>" +
                    "<td>" +
                    "   <a class=\"btn btn-sm btn-outline-warning editButton\" id=\"1\">Edit</a>" +
                    "   <a class=\"btn btn-sm btn-outline-danger deleteButton\" id=\"1\">Delete</a>" +
                    "</td>" +
                    "</tr>");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.toaster({ priority : 'warning', title : 'warning', message : 'Validation failed'});
            }
        });
    });
});
