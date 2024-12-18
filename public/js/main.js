$(document).ready(function () {
    $(window).on("load", function () {
        $("#loader").fadeOut("slow", function () {
            $("#loader").addClass("hidden");
            $("body").removeClass("overflow-y-hidden");
        });
    });

    AOS.init();
    PowerGlitch.glitch(".glitch");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
