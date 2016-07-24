$(document).ready(function () {
    setTimeout(function () {
        showCall()
    }, 3000)
});
$('.navbar-1 li').on('mouseover', function () {
    $('.navbar-internal').hide();
    var id = $(this).attr('id');
    $('#nav-' + id).css({
        'display': '',
        'position': 'absolute',
        'left': $(this).offset().left,
        'top': $(this).offset().top + $(this).parent().height(),
        'width': $(this).width()
    })
})
$(document).on('click', function () {
    $('.navbar-internal').fadeOut();
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