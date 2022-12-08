var targetInput = $('#keyword');
loadAjaxData();

function loadAjaxData() {
    var URL = `${dataUser}`;
    $.ajax({
        url: URL,
        type: "get",
        success: function(response) {
            $('#userRoleListBody').html(response);
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
