// ===================================================
//                AJax loading Function
// ===================================================

var targetInput = $('#keyword');
loadAjaxData();

function loadAjaxData() {
    var keyword = targetInput.val();
    var URL = `${dataUser}?keyword=${keyword}`;
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#dataTable').html(response);
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
//                Leave Add Ajax Json
// ===================================================

$(document).ready(function () {
    $('#add_leave').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/leave",
            data: $('#add_leave').serialize(),
            success: function (response) {
                console.log(response)
                $('#add_appli').modal('hide')
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
//                 Leave  Edit Json
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
//                  Leave DELETE Json
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

                loadAjaxData();
            },

        });
    })

});

// ===================================================
//                 LEave Data Update Json
// ===================================================

$(document).on("click", '#dataUpdate', function(event) {
    var id = $("input[name=leave_id]").val();
    var modal = $(this).attr('modal-id');
    var URL = `${dataUser}/${id}`;
    $.ajax({
        url: URL,
        type: "PUT",
        data: {
            leave_id: id,
            worker_name: $("input[name=name]").val(),
            leave_type: $("input[name=type]").val(),
            apply_day: $("input[name=applyday]").val(),
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
