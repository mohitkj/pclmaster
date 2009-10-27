$(document).ready(function () {
    setTimeout(function () {
        showCall()
    }, 3000);
    setTimeout(function () {
        showImage()
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
function showImageClick(index){
    $('.front-page-image:visible').hide();    
    $('.front-page-image').eq(index).show();
    var next = $('.active-image').next();
    $('.active-image').removeClass('active-image');
    $('.image-text').eq(index).addClass('active-image');
}