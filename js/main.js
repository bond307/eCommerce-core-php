


jQuery(document).ready(function() {
    "use strict";


    /******************************************
       Newsletter popup
    ******************************************/

    jQuery('#myModal').appendTo("body");

    function show_modal() {
        jQuery('#myModal').modal('show');
    }

    jQuery('#myModal').modal({
        keyboard: false,
        backdrop: false
    });
    /******************************************
    	Mobile menu
    ******************************************/

    jQuery("#mobile-menu").mobileMenu({
            MenuWidth: 250,
            SlideSpeed: 300,
            WindowsMaxWidth: 767,
            PagePush: !0,
            FromLeft: !0,
            Overlay: !0,
            CollapseMenu: !0,
            ClassName: "mobile-menu"

        }),

        /******************************************
        	Our clients slider
        ******************************************/

        jQuery("#our-clients-slider .slider-items").owlCarousel({
            items: 6,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [360, 1],
            navigation: false,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: false,
            autoPlay: true
        }),

 /******************************************
           computer slider
  ******************************************/

        jQuery("#computer-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: false
        }),
		
        /******************************************
          smartphone slider
        ******************************************/

        jQuery("#smartphone-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: false
        }),


        /******************************************
        	watches slider
        ******************************************/

        jQuery("#watches-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),

        /******************************************
        	daily deal slider
        ******************************************/

        jQuery("#daily-deal-slider .slider-items").owlCarousel({
            items: 1,
            itemsDesktop: [1024, 1],
            itemsDesktopSmall: [900, 1],
            itemsTablet: [640, 1],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),
		
		/******************************************
        	Photo slider
        ******************************************/

        jQuery("#photo-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),

        /******************************************
        	best sale slider
        ******************************************/
        jQuery("#jtv-best-sale-slider .slider-items").owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1024, 4], //5 items between 1024px and 901px
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            navigation: true,
            navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
            slideSpeed: 500,
            pagination: false,
            autoPlay: true
        });
        /******************************************
        	toprate products slider
        ******************************************/
        jQuery("#toprate-products-slider .slider-items").owlCarousel({
             items: 1, //10 items above 1000px browser width
            itemsDesktop: [1024, 1], //5 items between 1024px and 901px
            itemsDesktopSmall: [900, 2], // 3 items betweem 900px and 601px
            itemsTablet: [767, 1], //2 items between 600 and 0;
            itemsMobile: [360, 1],
            navigation: false,
            navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
            slideSpeed: 500,
            pagination: true
        });

    /******************************************
    	Special products slider
    ******************************************/

    jQuery("#special-products-slider .slider-items").owlCarousel({
            items: 3,
            itemsDesktop: [1024, 3],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: false
        }),


        /******************************************
        	on sale produc slider
        ******************************************/

        jQuery("#new-products-slider .slider-items").owlCarousel({
            items: 1, //10 items above 1000px browser width
            itemsDesktop: [1024, 1], //5 items between 1024px and 901px
            itemsDesktopSmall: [900, 2], // 3 items betweem 900px and 601px
            itemsTablet: [767, 1], //2 items between 600 and 0;
            itemsMobile: [360, 1],
            navigation: false,
            navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
            slideSpeed: 500,
            pagination: true
        });

    /******************************************
    	Latest news slider
    ******************************************/

    jQuery("#latest-news-slider .slider-items").owlCarousel({
            autoplay: !0,
            items: 4,
            itemsDesktop: [1024, 3],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [640, 1],
            itemsMobile: [480, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            transitionStyle: "backSlide"
        }),
        /******************************************
        	testimonials slider
        ******************************************/

        jQuery("#testimonials-slider .slider-items").owlCarousel({
            items: 2,
            itemsDesktop: [1024, 2],
            itemsDesktopSmall: [900, 1],
            itemsTablet: [640, 1],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: false,
            autoPlay: true,
            singleItem: true
        }),

        /******************************************
        	Mega Menu
        ******************************************/

        jQuery('.mega-menu-title').on('click', function() {
            if (jQuery('.mega-menu-category').is(':visible')) {
                jQuery('.mega-menu-category').slideUp();
            } else {
                jQuery('.mega-menu-category').slideDown();
            }
        });


    jQuery('.mega-menu-category .nav > li').hover(function() {
        jQuery(this).addClass("active");
        jQuery(this).find('.popup').stop(true, true).fadeIn('slow');
    }, function() {
        jQuery(this).removeClass("active");
        jQuery(this).find('.popup').stop(true, true).fadeOut('slow');
    });


    jQuery('.mega-menu-category .nav > li.view-more').on('click', function(e) {
        if (jQuery('.mega-menu-category .nav > li.more-menu').is(':visible')) {
            jQuery('.mega-menu-category .nav > li.more-menu').stop().slideUp();
            jQuery(this).find('a').text('More category');
        } else {
            jQuery('.mega-menu-category .nav > li.more-menu').stop().slideDown();
            jQuery(this).find('a').text('Close menu');
        }
        e.preventDefault();
    });
    /******************************************
       Category desc slider
    ******************************************/

    jQuery("#category-desc-slider .slider-items").owlCarousel({
        autoPlay: true,
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1024, 1], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 1], // 3 items betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0;
        itemsMobile: [320, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });

    /******************************************
       Upsell product slider
    ******************************************/

    jQuery("#upsell-product-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: false
        }),

        /******************************************
        	Related product slider
        ******************************************/

        jQuery("#related-product-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),

        /******************************************
        	Related posts
        ******************************************/

        jQuery("#related-posts .slider-items").owlCarousel({
            items: 3,
            itemsDesktop: [1024, 3],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),


        /******************************************
            PRICE FILTER
        ******************************************/

        jQuery('.slider-range-price').each(function() {
            var min = jQuery(this).data('min');
            var max = jQuery(this).data('max');
            var unit = jQuery(this).data('unit');
            var value_min = jQuery(this).data('value-min');
            var value_max = jQuery(this).data('value-max');
            var label_reasult = jQuery(this).data('label-reasult');
            var t = jQuery(this);
            jQuery(this).slider({
                range: true,
                min: min,
                max: max,
                values: [value_min, value_max],
                slide: function(event, ui) {
                    var result = label_reasult + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                    console.log(t);
                    t.closest('.slider-range').find('.amount-range-price').html(result);
                }
            });
        })

    /******************************************
        Footer expander
    ******************************************/

    jQuery(".collapsed-block .expander").on("click", function(e) {
        var collapse_content_selector = jQuery(this).attr("href");
        var expander = jQuery(this);
        if (!jQuery(collapse_content_selector).hasClass("open")) expander.addClass("open").html("&minus;");
        else expander.removeClass("open").html("+");
        if (!jQuery(collapse_content_selector).hasClass("open")) jQuery(collapse_content_selector).addClass("open").slideDown("normal");
        else jQuery(collapse_content_selector).removeClass("open").slideUp("normal");
        e.preventDefault()
    });

    /******************************************
        Category sidebar
    ******************************************/

    jQuery(function() {
        jQuery(".category-sidebar ul > li.cat-item.cat-parent > ul").hide();
        jQuery(".category-sidebar ul > li.cat-item.cat-parent.current-cat-parent > ul").show();
        jQuery(".category-sidebar ul > li.cat-item.cat-parent.current-cat.cat-parent > ul").show();
        jQuery(".category-sidebar ul > li.cat-item.cat-parent").on("click", function() {
            if (jQuery(this).hasClass('current-cat-parent')) {
                var li = jQuery(this).closest('li');
                li.find(' > ul').slideToggle('fast');
                jQuery(this).toggleClass("close-cat");
            } else {
                var li = jQuery(this).closest('li');
                li.find(' > ul').slideToggle('fast');
                jQuery(this).toggleClass("cat-item.cat-parent open-cat");
            }
        });
        jQuery(".category-sidebar ul.children li.cat-item,ul.children li.cat-item > a").on("click", function(e) {
            e.stopPropagation();
        });
    });

    /******************************************
        colosebut
    ******************************************/

    jQuery("#colosebut1").on("click", function() {
        jQuery("#div1").fadeOut("slow");
    });
    jQuery("#colosebut2").on("click", function() {
        jQuery("#div2").fadeOut("slow");
    });
    jQuery("#colosebut3").on("click", function() {
        jQuery("#div3").fadeOut("slow");
    });
    jQuery("#colosebut4").on("click", function() {
        jQuery("#div4").fadeOut("slow");
    });


    /******************************************
        totop
    ******************************************/
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function() {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('#back-to-top').addClass('show');
                } else {
                    jQuery('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function() {
            backToTop();
        });
        jQuery('#back-to-top').on('click', function(e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    /******************************************
        tooltip
    ******************************************/


    jQuery('[data-toggle="tooltip"]').tooltip();

    /* ---------------------------------------------
        slider typist
    --------------------------------------------- */

    if (typeof Typist == 'function') {
        new Typist(document.querySelector('.typist-element'), {
            letterInterval: 60,
            textInterval: 3000
        });
    }

})


const particles = [];
for (let i = 0; i < 100; i++) {
    particles.push({
        x: Math.random() > .5 ? 0 : window.innerWidth,
        y: window.innerHeight / 2,
        vx: (Math.random() * 2) - 1,
        vy: (Math.random() * 2 - 1),
        history: [],
        size: 4 + Math.random() * 6,
        color: Math.random() > .5 ? "#000000" : Math.random() > .5 ? "#FF0000" : "#FFFF00"
    });
}

const mouse = {
    x: window.innerWidth / 2,
    y: window.innerHeight / 2
};

const canvas = document.getElementById('background');

if (canvas && canvas.getContext) {
    var context = canvas.getContext('2d');

    Initialize();
}

function Initialize() {
    canvas.addEventListener('mousemove', MouseMove, false);
    window.addEventListener('resize', ResizeCanvas, false);
    TimeUpdate();

    context.beginPath();

    ResizeCanvas();
}

function TimeUpdate(e) {

    context.clearRect(0, 0, window.innerWidth, window.innerHeight);

    for (let i = 0; i < particles.length; i++) {
        particles[i].x += particles[i].vx;
        particles[i].y += particles[i].vy;

        if (particles[i].x > window.innerWidth) {
            particles[i].vx = -1 - Math.random();
        } else if (particles[i].x < 0) {
            particles[i].vx = 1 + Math.random();
        } else {
            particles[i].vx *= 1 + (Math.random() * 0.005);
        }

        if (particles[i].y > window.innerHeight) {
            particles[i].vy = -1 - Math.random();
        } else if (particles[i].y < 0) {
            particles[i].vy = 1 + Math.random();
        } else {
            particles[i].vy *= 1 + (Math.random() * 0.005);
        }

        context.strokeStyle = particles[i].color;
        context.beginPath();
        for (var j = 0; j < particles[i].history.length; j++) {
            context.lineTo(particles[i].history[j].x, particles[i].history[j].y);
        }
        context.stroke();

        particles[i].history.push({
            x: particles[i].x,
            y: particles[i].y
        });
        if (particles[i].history.length > 45) {
            particles[i].history.shift();
        }

        for (var j = 0; j < particles[i].history.length; j++) {
            particles[i].history[j].x += 0.01 * (mouse.x - particles[i].history[j].x) / (45/j);
            particles[i].history[j].y += 0.01 * (mouse.y - particles[i].history[j].y) / (45/j);
        }


        let distanceFactor = DistanceBetween(mouse, particles[i]);
        distanceFactor = Math.pow(Math.max(Math.min(10 - (distanceFactor / 10), 10), 2), .5);

        context.fillStyle = particles[i].color;
        context.beginPath();
        context.arc(particles[i].x, particles[i].y, particles[i].size * distanceFactor, 0, Math.PI * 2, true);
        context.closePath();
        context.fill();

    }

    requestAnimationFrame(TimeUpdate);
}

function MouseMove(e) {
    mouse.x = e.layerX;
    mouse.y = e.layerY;

    //context.fillRect(e.layerX, e.layerY, 5, 5);
    //Draw( e.layerX, e.layerY );
}

function Draw(x, y) {
    context.strokeStyle = '#ff0000';
    context.lineWidth = 4;
    context.lineTo(x, y);
    context.stroke();
}

function ResizeCanvas(e) {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

function DistanceBetween(p1, p2) {
    const dx = p2.x - p1.x;
    const dy = p2.y - p1.y;
    return Math.sqrt(dx * dx + dy * dy);
}

