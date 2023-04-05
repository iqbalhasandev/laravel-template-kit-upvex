$(document).ready(function () {
    "use strict"; // Start of use strict

    // password show hide
    let allShowHidePassword = document.querySelectorAll(".password-showHide");

    allShowHidePassword.forEach((item) => {
        item.addEventListener("click", () => {
            item.classList.toggle("hide");
            if (
                item.closest(".form-input").querySelector("input").type ===
                "password"
            ) {
                item.closest(".form-input").querySelector("input").type =
                    "text";
            } else {
                item.closest(".form-input").querySelector("input").type =
                    "password";
            }
        });
    });
});
