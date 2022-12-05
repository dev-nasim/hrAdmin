var targetInput = $('#keyword');
loadAjaxData();

function loadAjaxData() {
    var URL = `${dataUser}`;
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#roleListBody').html(response);
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
//                 Role Data Delete Json
// ===================================================


$(document).on("click", '.deleteButton', function(event) {
    event.preventDefault();
    var id = $(this).attr('id');
    var URL = `${dataUser}/${id}`;
    $('#deleteModal').modal('show');
    $('#deleteModal').on('hide.bs.modal', function(event) {
        $('#btConfirm').off('click');
    });

    $('#btConfirm').on('click', function(event) {
        event.preventDefault();
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
                    loadAjaxData();
                }
                // location.reload();
            },

        });
    })

});


// ===================================================
//                 Role Add Json
// ===================================================


$(document).ready(function () {
    $('#add_role').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/role",
            data: $('#add_role').serialize(),
            success: function (response) {
                console.log(response)
                $('#add_modal').modal('hide')
                $.toaster({
                    priority: 'success',
                    title: 'Success',
                    message: response.message
                });
                loadAjaxData();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.toaster({ priority : 'warning', title : 'warning', message : 'Validation failed'});
            }
        });
    });
});



// ===================================================
//                 Role Data Edit Json
// ===================================================



$(document).on("click", '.editButton', function(event) {
    var id = $(this).attr('id');
    var URL = `${dataUser}/${id}/edit`;
    $('#editData').html('');
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#editModal').modal('show');
            $('#editData').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});

// ===================================================
//                 Role Data Update Json
// ===================================================

$(document).on("click", '#dataUpdate', function(event) {
    var id = $("input[name=role_id]").val();
    var modal = $(this).attr('modal-id');
    var URL = `${dataUser}/${id}`;
    $.ajax({
        url: URL,
        type: "PUT",
        data: {
            role_id: id,
            role: $("input[name=role]").val(),
            _token: csrfToken,
        },
        success: function(response) {
            $('#'+modal).modal('hide');
            $.toaster({
                priority: 'success',
                title: 'Success',
                message: response.message
            });
            loadAjaxData();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});
