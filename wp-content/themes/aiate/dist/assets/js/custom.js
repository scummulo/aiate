$(document).ready(function() {

    // Nav
    $('#toggle-menu').click(function(){
        $('.navbar').fadeToggle();
    });

        // Shop
        var $win = $(window);
        var $shop = $('.navbar ul li:last-child');
        
        $win.on("click.Bst", function(event){		
            if ($shop.has(event.target).length == 0 && !$shop.is(event.target)){
                $('.navbar ul li:last-child > .sub-menu').fadeOut();
                $('.navbar ul li:last-child a').removeClass('active');
            } else {
                $('.navbar ul li:last-child > .sub-menu').fadeIn();
                $('.navbar ul li:last-child a').addClass('active');
            }
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

