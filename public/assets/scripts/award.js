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
//                 User Data Edit Json
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
//                 User Data Update Json
// ===================================================


$(document).on("click", '#dataUpdate', function(event) {
    var id = $("input[name=award_id]").val();
    var modal = $(this).attr('modal-id');
    var URL = `${dataUser}/${id}`;
    $.ajax({
        url: URL,
        type: "PUT",
        data: {
            award_id: id,
            awd_name: $("input[name=awd_name]").val(),
            awd_des: $("input[name=awd_des]").val(),
            employee_id: $("input[name=employee_id]").val(),
            awd_item: $("input[name=awd_item]").val(),
            awd_date: $("input[name=awd_date]").val(),
            awd_by: $("input[name=awd_by]").val(),
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

// ===================================================
//                 User Add Json
// ===================================================

$(document).ready(function () {
    $('#add_award').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/award",
            data: $('#add_award').serialize(),
            success: function (response) {
                console.log(response)
                $('#add_gift').modal('hide')
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
