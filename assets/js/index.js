$(function () {
    slider("#video-carousel1")
    slider("#video-carousel2")
    slider("#video-carousel3")
    slider("#carousel_items")

    function slider(sliderId) {
        var multipleVideoCarousel1 = document.querySelector(
            sliderId
        );
        if (window.matchMedia("(min-width: 768px)").matches) {
            var carousel = new bootstrap.Carousel(multipleVideoCarousel1, {
                interval: false,
            });
            var carouselWidth = $(sliderId + " .carousel-inner")[0].scrollWidth;
            var cardWidth = $(sliderId + " .carousel-item").width();
            var scrollPosition = 0;
            $(sliderId + " .carousel-control-next").on("click", function () {
                if (scrollPosition < carouselWidth - cardWidth * 2) {
                    scrollPosition += cardWidth;
                    $(sliderId + " .carousel-inner").animate({ scrollLeft: scrollPosition }, 600);
                }
            });
            $(sliderId + " .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $(sliderId + " .carousel-inner").animate({
                        scrollLeft: scrollPosition
                    },
                        600
                    );
                }
            });
        } else {
            $(multipleVideoCarousel1).addClass("slide");
        }
    }
});
$(function () {
    $("#navbarSupportedContent").find("li").on("click", function () {
        $("#navbarSupportedContent").find("li").css("border-bottom", "none");
        $(this).css("border-bottom", "2px solid " + $(this).data("color"));
    });
});
$(function () {
    const navbar = document.querySelector('.fixed-top');

    window.onscroll = () => {
        if (window.scrollY > 0 && window.scrollY < 1024) {
            navbar.classList.remove('scrolled-top');
        }
        else if (window.scrollY >= 1024 && window.scrollY < 3243) {
            navbar.classList.add('scrolled-top');
        }
        else if (window.scrollY >= 3243) {
            navbar.classList.remove('scrolled-top');
        }
    };
});