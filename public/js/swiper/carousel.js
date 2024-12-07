$(document).ready(function () {
    var swiper = new Swiper(".mySwiper", {
        centeredSlides: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            bulletActiveClass: "swiper-pagination-bullet-active",
            bulletClass: "swiper-pagination-bullet",
            dynamicBullets: true,
            clickable: true,
        },
    });
});
