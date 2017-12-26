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
        $('a[href*="search"]').click(function() {
            event.preventDefault();	
            $('#search').fadeToggle();
        })

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
    // if($('.woocommerce-message')) {
    //     setTimeout(function(){
    //         $('.woocommerce-message').fadeOut();
    //     }, 3000);
    // }
});

// Map    
function initMap() {
    var styleArray = [{
        featureType: 'all',
        stylers: [{
            saturation: -80
        }]
    }, {
        featureType: 'road.arterial',
        elementType: 'geometry',
        stylers: [{
            hue: '#00ffee'
        }, {
            saturation: 50
        }]
    }, {
        featureType: 'all',
        elementType: 'labels',
        stylers: [{
            visibility: 'off'
        }]
    }, {
        featureType: 'road',
        elementType: 'labels',
        stylers: [{
            visibility: 'on'
        }]
    }];

    var image = '../wp-content/themes/aiate/dist/assets/img/poi.jpg';
    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
        center: {
            lat: 37.395267,
            lng: -5.9952302
        },
        zoom: 16,
        disableDefaultUI: true,
        scrollwheel: false,
        draggable: true,
        styles: styleArray,
    });


    marker = new google.maps.Marker({
        map: map,
        icon: image,
        draggable: false,
        position: {
            lat: 37.395267,
            lng: -5.9952302
        },
    });
}

