$(document).ready(function() {

    // Nav
    $('#toggle-menu').click(function(){
        // $('header').toggleClass('active')
        $('.navbar').fadeToggle()
    });

    // Sliders
    $('#post-slider').glide({
        type: 'carousel',
        beforeInit: function(data){
            setTimeout(function(){
                $('.active .featured').css('opacity','1')
            }, 300);
        },
        beforeTransition: function(data){
            $('.active .featured').css('opacity','0')
        },
        afterTransition: function(data){
            $('.active .featured').css('opacity','1')
        },
    });

    $('#product-detail-slider').glide({
        type: 'carousel'
    });

});

