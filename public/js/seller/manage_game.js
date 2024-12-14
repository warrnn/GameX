$(document).ready(function () {
    $("#portrait_image").on("change", function () {
        $(this).addClass("border-green-500 bg-green-300 text-black");
    });

    $("#landscape_image").on("change", function () {
        $(this).addClass("border-green-500 bg-green-300 text-black");
    });
});
