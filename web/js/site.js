var media_pause = 0;

$(document).ready(function () {
//    setTimeout(function () {
//        showCall()
//    }, 3000);
    setTimeout(function () {
        showImage()
    }, 5000);
    setTimeout(function () {
        showTestimonial()
    }, 5000);
    setTimeout(function () {
        MoveMedia()
    }, 5000);
});
$('.navbar-1 li').on('mouseover', function () {
    $('.navbar-internal').hide();
    var id = $(this).attr('id');
    $('#nav-' + id).css({
        'display': '',
        'position': 'absolute',
        'left': $(this).offset().left,
        'top': $(this).offset().top + $(this).parent().height() - $('body').scrollTop() - 70,
        'width': $(this).width()
    })
})
$(document).on('click', function () {
    $('.navbar-internal').fadeOut();
});
$(document).on('scroll', function () {
    $('.nav-container').css({'top': $('body').scrollTop() - 55})
    $('.breadcrumb').css({'top': $('body').scrollTop() + 65 + $('.navbar-1').height() + 5})
    $('.page-title').css({'top': $('body').scrollTop() + 65 + $('.navbar-1').height() + 5})
    $('.social-media,.book-appointment').css({'top': $('body').scrollTop() + 20})
    $('.empty-div').css({'top': $('body').scrollTop()})
});
var index = 0;
function showCall() {
    $('.call-us:visible').hide();
    $('.call-us').eq(index).show();
    index++;
    if (index > 2) {
        index = 0;
    }
    setTimeout(function () {
        showCall();
    }, 3000)
}
function showImage() {
    var next = $('.front-page-image:visible').next();
    if (!next.hasClass('front-page-image')) {
        next = $('.front-page-image').eq(0);
    }
    $('.front-page-image:visible').hide();
    next.show();
    var next = $('.active-image').next();
    $('.active-image').removeClass('active-image');
    if (!next.hasClass('image-text')) {
        next = $('.image-text').eq(0);
    }
    next.addClass('active-image');

    setTimeout(function () {
        showImage()
    }, 5000);
}
function showImageClick(index) {
    $('.front-page-image:visible').hide();
    $('.front-page-image').eq(index).show();
    var next = $('.active-image').next();
    $('.active-image').removeClass('active-image');
    $('.image-text').eq(index).addClass('active-image');
}
function showTestimonial() {
    var next = $('.front-page-testimonial:visible').next();
    if (!next.hasClass('front-page-testimonial')) {
        next = $('.front-page-testimonial').eq(0);
    }
    $('.front-page-testimonial:visible').toggle("slide");
    next.show();
    setTimeout(function () {
        showTestimonial()
    }, 5000);
}
function showMedia(index) {
    $('#media-main').attr('src', $('.media-image').eq(index).find('img').attr('src'));
    $('.media-image').css({'opacity': 0.4, 'border': 'none'});
    $('.media-image').eq(index).css({'opacity': 1, 'border': '1px solid'});
    $('.active-media').removeClass('active-media');
    $('.media-image').eq(index).addClass('active-media');
}
function MoveMedia() {
    if (media_pause == 1) {
        setTimeout(function () {
            MoveMedia()
        }, 5000);
        return;
    }
    var next = $('.active-media').next();
    if (!next.hasClass('media-image')) {
        $('.media-image').eq(0).addClass('active-media');
        showMedia(0);
        $('.media-image').parent().css({'margin-left': 0})
    } else {
        var pos = $('.media-image').index($('.active-media')) + 1;
        $('.active-media').removeClass('active-media');
        $('.media-image').eq(pos).addClass('active-media');
        $('.media-image').parent().css({'margin-left': '-' + pos * $('.media-image').eq(0).width() + 'px'})
        showMedia(pos);
    }
    setTimeout(function () {
        MoveMedia()
    }, 5000);
}
function pauseMedia(pObj) {
    if ($(pObj).html() == 'Pause') {
        $(pObj).html('Continue');
        media_pause = 1;
    } else {
        $(pObj).html('Pause');
        media_pause = 0;
    }
}