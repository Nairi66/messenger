document.onscroll = function (){
    if ($(document).scrollTop() >= 50) {
        $('#pos_nav').css({'position': 'fixed', 'top' : '0'})
        $('.scrollup').css('display', 'block')
        $('.scrollup').css('opacity', '1')


    }else if($(document).scrollTop() == 0) {
        $('#pos_nav').css({'position': 'absolute', 'top' : '100px'})
        $('.scrollup').css('opacity', '0')
    }
}

$('.scrolimg').on('click', function(){
    var body = $("html, body");
    body.stop().animate({scrollTop:0}, 500);
    
})