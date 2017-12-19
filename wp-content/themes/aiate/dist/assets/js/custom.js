$(document).ready(function() {

    // Nav
    $('#toggle-menu').click(function(){
        $('.navbar').fadeToggle();
    });

    $('.navbar ul li:last-child').click(function() {
        $('ul.shop').fadeToggle();
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

    // Messages
    $('#closeMessage').click(function() {
        $('.woocommerce-message').fadeOut();
    })

});

