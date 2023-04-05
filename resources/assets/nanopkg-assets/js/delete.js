function delete_modal(url, table_id = null) {
    $("#delete-modal-form").attr("action", url);
    $("#delete-modal-form").attr("data-table", table_id);
    $("#delete-modal").modal("show");
}

$(document).ready(function () {
    $("#delete-modal-form").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        axios
            .delete(form.attr("action"))
            .then(function (response) {
                toastr.success(response.data.message, "Success");
                $("#delete-modal").modal("hide");
                form.trigger("reset");
                if (form.attr("data-table")) {
                    $("#" + form.attr("data-table"))
                        .DataTable()
                        .ajax.reload();
                } else {
                    location.reload();
                }
            })
            .catch(function (error) {
                toastr.error(error.response.data.message, "Error");
            });
    });
});
