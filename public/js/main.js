$(document).ready(function () {
    AOS.init();
    PowerGlitch.glitch(".glitch");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
