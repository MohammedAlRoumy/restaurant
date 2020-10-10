$(document).ready(function () {
    $(window).on("scroll", function () {
        100 < $(this).scrollTop()
            ? $(".navbar").addClass("bg-dark")
            : $(".navbar").removeClass("bg-dark");
    });
});