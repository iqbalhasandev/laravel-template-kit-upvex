// init tooltip
$(document).ready(function () {
    // init tooltip
    $("[data-bs-toggle=tooltip]").tooltip();
});

/**
 * Show axios errors to toastr
 * @param {*} error
 */
function showAxiosErrors(error) {
    if (
        typeof error.response !== "undefined" &&
        typeof error.response.data !== "undefined" &&
        typeof error.response.data.message !== "undefined"
    ) {
        toastr.error(error.response.data.message);
    } else if (
        typeof error.response !== "undefined" &&
        typeof error.response.data !== "undefined" &&
        typeof error.response.data.errors !== "undefined" &&
        typeof error.response.data.errors.message !== "undefined"
    ) {
        toastr.error(error.response.data.errors.message);
    } else {
        toastr.error("Something went wrong");
    }
    if (
        typeof error.response !== "undefined" &&
        typeof error.response.data !== "undefined" &&
        typeof error.response.data.data !== "undefined" &&
        typeof error.response.data.data !== "undefined"
    ) {
        toastr.error(error.response.data.data);
    }
}

function copySummernoteContentToClipboard(editorId, type = "text") {
    // Get the HTML content of the Summernote editor
    var content = $(editorId)
        .summernote("code")
        .replace(/<\/?[^>]+(>|$)/g, "");
    console.log(content);
    // Create a new textarea element to copy the content to clipboard
    var $temp = $("<textarea>");
    $("body").append($temp);

    // Set the textarea value to the HTML content
    $temp.val(content).select();

    // Copy the content to clipboard using the Clipboard API
    navigator.clipboard
        .writeText(content)
        .then(function () {
            console.log("Content copied to clipboard");
        })
        .catch(function (error) {
            console.error("Failed to copy content: ", error);
        })
        .finally(function () {
            // Remove the temporary textarea element
            $temp.remove();
        });
}
