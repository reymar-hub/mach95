$(function () {
    
    var multipleCardCarousel = document.querySelector(
        "#carousel_items"
    );
    if (window.matchMedia("(min-width: 768px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarousel, {
            interval: false,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $("#carousel_items .carousel-control-next").on("click", function() {
            if (scrollPosition < carouselWidth - cardWidth * 2) {
                scrollPosition += cardWidth;
                $("#carousel_items .carousel-inner").animate({
                        scrollLeft: scrollPosition
                    },
                    600
                );
            }
        });
        $("#carousel_items .carousel-control-prev").on("click", function() {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carousel_items .carousel-inner").animate({
                        scrollLeft: scrollPosition
                    },
                    600
                );
            }
        });
    } else {
        $(multipleCardCarousel).addClass("slide");
    }
});