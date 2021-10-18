let all_carousel = ['#bootstrap-touch-slider', '#images-slide'],
    current_position, slideCount;
all_carousel.forEach((carousel_id) => {
    $(carousel_id + ' .left.carousel-control').click(() => {
        current_position = $(carousel_id).find('.carousel-indicators li.active').index();
        slideCount = $(carousel_id).find('.carousel-indicators li').length;
        if (current_position == 0) {
            $(carousel_id).find('.carousel-indicators li')[slideCount - 1].click();
        } else {
            $(carousel_id).find('.carousel-indicators li')[current_position - 1].click();
        }
    });
    $(carousel_id + ' .right.carousel-control').click(() => {
        current_position = $(carousel_id).find('.carousel-indicators li.active').index();
        slideCount = $(carousel_id).find('.carousel-indicators li').length;
        if (current_position == slideCount - 1) {
            $(carousel_id).find('.carousel-indicators li')[0].click();
        } else {
            $(carousel_id).find('.carousel-indicators li')[current_position + 1].click();
        }
    });
});
$(document).on('keydown', function(e) {
    if (e.keyCode == 37) {
        $('.carousel .left.carousel-control').click();
    }
    if (e.keyCode == 39) {
        $('.carousel .right.carousel-control').click();
    }
});