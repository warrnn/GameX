$(document).ready(function () {
    $("a").on("click", function (e) {
        Swal.fire({
            title: "Please Login First",
            icon: "warning",
            confirmButtonColor: "#8B1E3F",
        });
    });
});
