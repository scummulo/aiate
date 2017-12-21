$(document).ready(function() {

    // Nav
    $('#toggle-menu').click(function(){
        $('.navbar').fadeToggle();
    });

        // Shop
        var $winshop = $(window);
        var $shop = $('.navbar ul li:last-child');
        
        $winshop.on("click.Bst", function(event){		
            if ($shop.has(event.target).length == 0 && !$shop.is(event.target)){
                $('.navbar ul li:last-child > .sub-menu').fadeOut();
                $('.navbar ul li:last-child a').removeClass('active');
            } else {
                $('.navbar ul li:last-child > .sub-menu').fadeIn();
                $('.navbar ul li:last-child a').addClass('active');
            }
        });

        // Cart
        var $wincart = $(window);
        var $cart = $('#toggle-cart');
        
        $wincart.on("click.Bst", function(event){		
            if ($cart.has(event.target).length == 0 && !$cart.is(event.target)){
                $('#cart').fadeOut();
            } else {
                $('#cart').fadeIn();
            }
        });
        

        // Search
        $('a[href*="search"]').click(function(event) {
            event.preventDefault();	
            $('#search').fadeIn();
        })

        $("html").click(function(event){
            var otarget = $(event.target);
            if (!otarget.parents('#search').length && otarget.attr('id')!="#search" && !otarget.parents('a[href*="search"]').length) {
                $('#search').hide();
            }
        });



        // var $winsearch = $(window);
        // var $search = $('a[href*="search"]');
        
        // $winsearch.on("click.Bst", function(event){
        //     event.preventDefault();	
        //     if ($search.has(event.target).length == 0 && !$search.is(event.target)){
        //         $('#search').fadeOut();
        //     } else {
        //         $('#search').fadeIn();
        //     }
        // });

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

    if($('.woocommerce-message')) {
        setTimeout(function(){
            $('.woocommerce-message').fadeOut();
        }, 2000);
    }

});

