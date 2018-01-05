$(document).ready(function() {

    // Nav
    var mediaqueryMin = window.matchMedia("(min-width: 800px)");
    if (mediaqueryMin.matches) {

        // Shop
        var $winshop = $(window);
        var $shop = $('.navbar ul li:last-child');
        
        $winshop.on("mouseover", function(event){		
            if ($shop.has(event.target).length == 0 && !$shop.is(event.target)){
                $('.navbar ul li:last-child > .sub-menu').fadeOut();
                $('.navbar ul li:last-child a').removeClass('active');
            } else {
                $('.navbar ul li:last-child > .sub-menu').fadeIn();
                $('.navbar ul li:last-child > .sub-menu').css('display','flex');
                $('.navbar ul li:last-child > .sub-menu:before').css('top','-30px');
                $('.navbar ul li:last-child a').addClass('active');
            }
        });

        // Cart
        var $wincart = $(window);
        var $cart = $('.cart-wrapper');
        
        $wincart.on("click.Bst", function(event){		
            if ($cart.has(event.target).length == 0 && !$cart.is(event.target)){
                $('.cart-wrapper #cart').fadeOut();
            } else {
                $('.cart-wrapper #cart').fadeIn();
            }
        });

        // Search
        var $winsearch = $(window);
        var $search = $('.search-wrapper');
        
        $wincart.on("click.Bst", function(event){		
            if ($search.has(event.target).length == 0 && !$search.is(event.target)){
                $('.search-wrapper #search').fadeOut();
            } else {
                $('.search-wrapper #search').fadeIn();
            }
        });
    }

    // Mobile
    var mediaqueryMax = window.matchMedia("(max-width: 800px)");
    if (mediaqueryMax.matches) {
        $('#toggle-menu').click(function(){
            $('.navbar').fadeToggle();
            $('#search').fadeOut();
            $('#cart').fadeOut();
            $('body').toggleClass('toggled');
        });

        $('li.menu-item-type-custom a').click(function() {
            $(this).toggleClass('active');
        })

        $('li.menu-item-object-product_cat.menu-item-has-children > a').click(function(e) {
            e.preventDefault();
        })

        $('#toggle-cart').click(function() {
            $('#cart').fadeToggle();
            $('#search').fadeOut();
            $('.navbar').fadeOut();
        })

        $('#toggle-search').click(function() {
            $('#search').fadeToggle();
            $('#cart').fadeOut();
            $('.navbar').fadeOut();
        })
    }

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

