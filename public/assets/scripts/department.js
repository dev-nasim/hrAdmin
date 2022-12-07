// ===================================================
//                  Add Json
// ===================================================

$(document).ready(function () {
    $('#add_department').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/department",
            data: $('#add_department').serialize(),
            success: function (response) {
                $('#addModal').modal('hide')
                $.toaster({
                    priority: 'success',
                    title: 'Success',
                    message: response.message
                });
                setTimeout(function(){
                    location.reload();
                }, 1000)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.toaster({ priority : 'warning', title : 'warning', message : 'Validation failed'});
            }
        });
    });
});

// ===================================================
//                  Data Edit Json
// ===================================================

$(document).on("click", '.editDptButton', function(event) {
    event.preventDefault()
    var id = $(this).attr('id');
    var URL = `${dataUser}/${id}/edit`;
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#editDptModal').modal('show');
            $("input[name=department_id]").val(response.id)
            $("input[name=department_name]").val(response.department_name)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.toaster({ priority : 'warning', title : 'warning', message : 'Validation failed'});
        }
    });
});

// ===================================================
//                  Data update Json
// ===================================================


$(document).on("click", '#dataUpdate', function(event) {
    event.preventDefault()
    var id = $("input[name=department_id]").val();
    $('#editDptButton').modal('hide');
    // var modal = $(this).attr('modal-id');
    var URL = `${dataUser}/${id}`;
    $.ajax({
        url: URL,
        type: "PUT",
        data: {
            department_id: id,
            name: $("#update_department input[name=department_name]").val(),
            _token: csrfToken,
        },
        success: function(response) {
            // $('#editDptButton').modal('hide');
            $.toaster({
                priority: 'success',
                title: 'Success',
                message: response.message
            });
            setTimeout(function(){
                location.reload();
            }, 1000)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});



// ===================================================
//                  Data delete Json
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
                    setTimeout(function(){
                        location.reload();
                    }, 1000)
                }
            },

        });
    })

});


