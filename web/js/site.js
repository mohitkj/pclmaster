$(document).ready(function () {
    setTimeout(function () {
        showCall()
    }, 3000);
});
$('.navbar-1 li').on('mouseover', function () {
    $('.navbar-internal').hide();
    var id = $(this).attr('id');
    $('#nav-' + id).css({
        'display': '',
        'position': 'absolute',
        'left': $(this).offset().left,
        'top': $(this).offset().top + $(this).parent().height()-$('body').scrollTop()-60,
        'width': $(this).width()
    })
})
$(document).on('click', function () {
    $('.navbar-internal').fadeOut();
});
$(document).on('scroll',function(){
   $('.nav-container').css({'top':$('body').scrollTop() -55 })
   $('.breadcrumb').css({'top':$('body').scrollTop() + 65 + $('.navbar-1').height()+ 5})
   $('.page-title').css({'top':$('body').scrollTop() + 65 + $('.navbar-1').height()+ 5})
   $('.social-media,.book-appointment').css({'top':$('body').scrollTop()+20 })
   $('.empty-div').css({'top':$('body').scrollTop()})
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