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

$(document).on("click", '.editButton2', function(event) {
    var id = $(this).attr('id');
    var URL = `${dataUser}/${id}/edit?type=2`;
    $('#editData').html('');
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#editModal2').modal('show');
            $("input[name=user_id]").val(response.id)
            $("#name").val(response.name);
            $("input[name=email]").val(response.email);
            $("input[name=birthday]").val(response.birthday);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});

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
            loadAjaxData();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});
