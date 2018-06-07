jQuery( document ).ready(function() {

	jQuery('.match-height').matchHeight({
	    //byRow: false,
	    property: 'height',
	    target: null,
	    remove: false
	});
	
//owls/////////////////////////////////////////////////////	
	jQuery('.owl-carousel-1').owlCarousel({
	    loop:true,
	    margin:24,
	    nav:true,
	    autoplay:false,
	    autoplayTimeout: 5000,
	    'navText' : ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    lazyLoad:true,
	    autoHeight:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        
	        480:{
	            items:1
	        },
	        
	        767:{
	            items:1
	        },
	        979:{
	            items:1
	        },
	        1200:{
	            items:1
	        }
	    }

	});
	jQuery('.owl-carousel-2').owlCarousel({
	    loop:true,
	    margin:24,
	    nav:true,
	    autoplay:false,
	    autoplayTimeout: 5000,
	    'navText' : ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    lazyLoad:true,
	    autoHeight:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        
	        480:{
	            items:1
	        },
	        
	        767:{
	            items:2
	        },
	        979:{
	            items:2
	        },
	        1200:{
	            items:2
	        }
	    }

	});
	jQuery('.owl-carousel-3').owlCarousel({
	    loop:true,
	    margin:24,
	    nav:true,
	    autoplay:false,
	    autoplayTimeout: 5000,
	    'navText' : ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    lazyLoad:true,
	    autoHeight:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        
	        480:{
	            items:1
	        },
	        
	        767:{
	            items:2
	        },
	        979:{
	            items:3
	        },
	        1200:{
	            items:3
	        }
	    }

	});
	jQuery('.owl-carousel-4').owlCarousel({
	    loop:true,
	    margin:24,
	    nav:true,
	    autoplay:false,
	    autoplayTimeout: 5000,
	    'navText' : ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    lazyLoad:true,
	    autoHeight:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        
	        480:{
	            items:1
	        },
	        
	        767:{
	            items:2
	        },
	        979:{
	            items:3
	        },
	        1200:{
	            items:4
	        }
	    }

	});
	jQuery('.owl-carousel-5').owlCarousel({
	    loop:true,
	    margin:24,
	    nav:true,
	    autoplay:false,
	    autoplayTimeout: 5000,
	    'navText' : ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    lazyLoad:true,
	    autoHeight:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        
	        480:{
	            items:2
	        },
	        
	        767:{
	            items:3
	        },
	        979:{
	            items:4
	        },
	        1200:{
	            items:5
	        }
	    }

	});
	jQuery('.owl-carousel-6').owlCarousel({
	    loop:true,
	    margin:24,
	    nav:true,
	    autoplay:false,
	    autoplayTimeout: 5000,
	    'navText' : ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    lazyLoad:true,
	    autoHeight:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        
	        480:{
	            items:1
	        },
	        
	        767:{
	            items:3
	        },
	        979:{
	            items:5
	        },
	        1200:{
	            items:6
	        }
	    }

	});
//Endsowls/////////////////////////////////////////////////////	

	if (jQuery('#back-to-top').length) {
	    var scrollTrigger = 100, // px
	        backToTop = function () {
	            var scrollTop = jQuery(window).scrollTop();
	            if (scrollTop > scrollTrigger) {
	                jQuery('#back-to-top').addClass('show');
	            } else {
	                jQuery('#back-to-top').removeClass('show');
	            }
	        };
	    backToTop();
	    jQuery(window).on('scroll', function () {
	        backToTop();
	    });
	    jQuery('#back-to-top').on('click', function (e) {
	        e.preventDefault();
	        jQuery('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	}




});//ends doc ready///////////////////////////////////////////////////////////////////////////
